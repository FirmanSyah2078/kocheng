<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function edit(Product $product)
    {
        $categories = Category::where('status', 'active')->get();

        return view('dashboard.admin.products-edit', ['data' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'describtion' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'describtion' => $request->describtion,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard.admin.index', ['tab' => 'products'])->with('success', 'Produk diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->update(['status' => 'inactive']);

        return redirect()->route('dashboard.admin.index', ['tab' => 'products'])->with('success', 'Produk dinonaktifkan.');
    }
}