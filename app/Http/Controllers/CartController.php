<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class CartController extends Controller
{

    public function index()
    {
        $cart = session('cart', []);


        $products = Product::whereIn('id', array_keys($cart))->get();


        $grandTotal = $products->sum(function ($product) use ($cart) {
            return $product->price * $cart[$product->id];
        });

        $formatedGrandtotal = Number::currency($grandTotal, in: 'IDR', locale: 'id', precision: 0);


        $totalItems = array_sum($cart);

        return view('users.cart', compact('products', 'formatedGrandtotal', 'totalItems', 'cart'));
    }


    public function addToCart($id)
    {
        $cart = session()->get('cart', []);


        $cart[$id] = ($cart[$id] ?? 0) + 1;

        session(['cart' => $cart]);
        return back()->with('success', 'Item added to cart!');
    }

    public function updateQuantity($id, $action)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return back();
        }

        if ($action === 'plus') {
            $cart[$id]++;
        } elseif ($action === 'minus' && $cart[$id] > 1) {
            $cart[$id]--;
        }

        session(['cart' => $cart]);
        return back();
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session(['cart' => $cart]);
        return back()->with('success', 'Item removed from cart!');
    }
}
