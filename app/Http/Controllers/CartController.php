<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
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
        unset($cart[$id]); // Remove the item from the array
    }

    session(['cart' => $cart]);
    return back()->with('success', 'Item removed from cart!');
}
}
