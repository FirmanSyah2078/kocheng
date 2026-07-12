<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('dashboard.user.cart')->with('error', 'Keranjang kamu masih kosong.');
        }

        $products = Product::whereIn('id', array_keys($cart))->get();
        $grandTotal = $products->sum(fn ($p) => $p->price * $cart[$p->id]);
        $formattedGrandTotal = Number::currency($grandTotal, in: 'IDR', locale: 'id', precision: 0);

        return view('dashboard.user.payment', compact('products', 'cart', 'formattedGrandTotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:qris,ovo,dana,paypal,bayar ditempat',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('dashboard.user.cart')->with('error', 'Keranjang kamu masih kosong.');
        }

        $products = Product::whereIn('id', array_keys($cart))->get();
        $grandTotal = $products->sum(fn ($p) => $p->price * $cart[$p->id]);

        $transaction = DB::transaction(function () use ($products, $cart, $grandTotal, $request) {
            $trx = Transaction::create([
                'user_id' => Auth::id(),
                'invoice_number' => 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6)),
                'total_amount' => $grandTotal,
                'payment_amount' => $grandTotal,
                'change_amount' => 0,
                'status' => 'pending',
                'payment_method' => $request->payment_method,
            ]);

            foreach ($products as $product) {
                $qty = $cart[$product->id];

                TransactionItem::create([
                    'transaction_id' => $trx->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price_at_sale' => $product->price,
                    'subtotal' => $product->price * $qty,
                ]);

                $product->decrement('stock', $qty);
            }

            return $trx;
        });

        session()->forget('cart');

        return redirect()->route('dashboard.user.cart')
            ->with('success', "Pesanan berhasil! Invoice: {$transaction->invoice_number}. Tunjukkan ini saat ambil barang di toko.");
    }
}