<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');
        $selectedCategories = $request->input('categories', []);

        if (!empty($selectedCategories)) {
            $query->whereHas('category', function ($q) use ($selectedCategories) {
                $q->whereIn('slug', $selectedCategories);
            });
        }

        $products = $query->get();
        $categories = Category::all();


        return view('users.product', compact('products', 'categories'));
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->update(['status' => 'inactive']);

        return redirect()->route('dashboard.index');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $categories = Category::where('status', 'active')->get();
        return view('admin.product_edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'describtion' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $data = Product::findOrFail($id);
        $data->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'describtion' => $request->describtion,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard.index');
    }
}
