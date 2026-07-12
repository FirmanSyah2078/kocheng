<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->where('status', 'active');
        $selected = $request->input('categories', []);

        if (! empty($selected)) {
            $query->whereHas('category', fn($q) => $q->whereIn('slug', $selected));
        }

        $products = $query->paginate(12)->withQueryString();

        $categories = Category::where('status', 'active')->get();

        return view('dashboard.user.products', compact('products', 'categories', 'selected'));
    }
}
