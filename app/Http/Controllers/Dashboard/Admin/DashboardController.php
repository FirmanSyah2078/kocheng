<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'users');

        $data = match ($tab) {
            'categories' => Category::withCount('products')->get(),
            'products' => Product::with('category')->get(),
            'transactions' => Transaction::with('user')->latest()->get(),
            default => User::all(),
        };

        return view('dashboard.admin.index', compact('data', 'tab'));
    }
}