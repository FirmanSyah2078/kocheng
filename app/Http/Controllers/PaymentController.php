<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $cart = session('cart', []);
        $paymentMethod = $request->input('payment_method', 'qris');

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $products = Product::whereIn('id', array_keys($cart))->get();

        $grandTotal = $products->sum(function ($product) use ($cart) {
            return $product->price * $cart[$product->id];
        });

        $formattedGrandTotal = Number::currency($grandTotal, in: 'IDR', locale: 'id', precision: 0);


        $invoiceNumber = 'INV-' . strtoupper(Str::random(8));
        $date = now()->format('d M Y, H:i');

        return view('users.payment', compact(
            'products',
            'cart',
            'formattedGrandTotal',
            'paymentMethod',
            'invoiceNumber',
            'date'
        ));
    }
}
