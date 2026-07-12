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
    public function index(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('dashboard.user.cart')->with('error', 'Keranjang kamu masih kosong.');
        }

        $paymentMethod = $request->input('payment_method', 'qris');
        $products = Product::whereIn('id', array_keys($cart))->get();
        $grandTotal = $products->sum(fn ($p) => $p->price * $cart[$p->id]);
        $formattedGrandTotal = Number::currency($grandTotal, in: 'IDR', locale: 'id', precision: 0);

        $invoiceNumber = 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        $date = now()->format('d M Y, H:i');

        return view('dashboard.user.payment', compact('products', 'cart', 'formattedGrandTotal', 'paymentMethod', 'invoiceNumber', 'date'));
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
        
        // 1. STOCK VALIDATION: Check if all products have enough stock before proceeding
        foreach ($products as $product) {
            $requestedQty = $cart[$product->id];
            if ($product->stock < $requestedQty) {
                return redirect()->route('dashboard.user.cart')
                    ->with('error', "Maaf, stok untuk {$product->name} tidak mencukupi (Sisa stok: {$product->stock}).");
            }
        }

        $grandTotal = $products->sum(fn ($p) => $p->price * $cart[$p->id]);

        // 2. DATABASE TRANSACTION: Ensure either everything is saved or nothing is
        $transaction = DB::transaction(function () use ($products, $cart, $grandTotal, $request) {
            // Create the main transaction record
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

                // Record the specific item in the transaction
                TransactionItem::create([
                    'transaction_id' => $trx->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price_at_sale' => $product->price,
                    'subtotal' => $product->price * $qty,
                ]);

                // DECREASE STOCK: This corresponds to the DB integration you requested
                $product->decrement('stock', $qty);
            }

            return $trx;
        });

        // Clear the cart after successful transaction
        session()->forget('cart');

        return redirect()->route('dashboard.user.cart')
            ->with('success', "Pesanan berhasil! Invoice: {$transaction->invoice_number}. Tunjukkan ini saat ambil barang di toko.");
    }
}
