<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        $products = $query->get();
        $categories = Category::all();

        return view('users.product', compact('products', 'categories'));
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect()->route('dashboard.index');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.product_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Product::findOrFail($id);
        $data->update([
            // 'category' => $request->name,
            'name' => $request->name,
            'describtion' => $request->describtion,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dashboard.index');

    }
}
