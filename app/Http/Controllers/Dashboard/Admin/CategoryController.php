<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function edit(Category $category)
    {
        return view('dashboard.admin.categories-edit', ['data' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard.admin.index', ['tab' => 'categories'])->with('success', 'Kategori diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->update(['status' => 'inactive']);

        return redirect()->route('dashboard.admin.index', ['tab' => 'categories'])->with('success', 'Kategori dinonaktifkan.');
    }
}