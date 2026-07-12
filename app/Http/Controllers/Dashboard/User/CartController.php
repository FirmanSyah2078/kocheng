<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Number;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();

        $grandTotal = $products->sum(fn ($p) => $p->price * $cart[$p->id]);
        $formattedGrandTotal = Number::currency($grandTotal, in: 'IDR', locale: 'id', precision: 0);
        $totalItems = array_sum($cart);

        return view('dashboard.user.cart', compact('products', 'formattedGrandTotal', 'totalItems', 'cart'));
    }

    public function addToCart(Product $product)
    {
        if ($product->stock <= 0) {
            return back()->with('error', 'Maaf, stok produk ini sudah habis.');
        }

        $cart = session('cart', []);
        $currentQty = $cart[$product->id] ?? 0;

        if ($currentQty >= $product->stock) {
            return back()->with('error', "Maaf, Anda tidak bisa menambah lebih dari {$product->stock} item.");
        }

        $cart[$product->id] = $currentQty + 1;
        session(['cart' => $cart]);

        return back()->with('success', 'Produk ditambahkan ke keranjang.');
    }

    public function updateQuantity(Product $product, string $action)
    {
        $cart = session('cart', []);

        if (! isset($cart[$product->id])) {
            return back();
        }

        if ($action === 'plus') {
            if ($cart[$product->id] >= $product->stock) {
                return back()->with('error', "Maaf, stok maksimal adalah {$product->stock} item.");
            }
            $cart[$product->id]++;
        } elseif ($action === 'minus' && $cart[$product->id] > 1) {
            $cart[$product->id]--;
        }

        session(['cart' => $cart]);

        return back();
    }

    public function removeItem(Product $product)
    {
        $cart = session('cart', []);
        unset($cart[$product->id]);
        session(['cart' => $cart]);

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }
}
