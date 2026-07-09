<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = User::where('role', 'user')->get();
            $products = Product::all();

            if ($customers->isEmpty() || $products->isEmpty()) {
                return;
            }

            foreach ($customers as $customer) {
                Transaction::factory(10)->create([
                    'user_id' => $customer->id,
                ])->each(function ($transaction) use ($products) {
                    $this->createTransactionItems($transaction, $products);
                });
            }

            Transaction::factory(5)->create([
                'user_id' => fn() => $customers->random()->id,
            ])->each(function ($transaction) use ($products) {
                $this->createTransactionItems($transaction, $products);
            });
    }

     private function createTransactionItems($transaction, $products): void
    {
        $total = 0;
        $randomProducts = $products->random(rand(1, 3));

        foreach ($randomProducts as $product) {
            $qty = rand(1, 4);
            $subtotal = $product->price * $qty;
            $total += $subtotal;

            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'quantity' => $qty,
                'price_at_sale' => $product->price,
                'subtotal' => $subtotal,
            ]);
        }

        $paymentAmount = ceil($total / 50000) * 50000;
        if ($paymentAmount < $total) {
            $paymentAmount = $total;
        }

        $transaction->update([
            'total_amount' => $total,
            'payment_amount' => $paymentAmount,
            'change_amount' => $paymentAmount - $total,
        ]);
    }
}
