<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('dashboard.index');
    }
    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.category_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('dashboard.index');
    }
}
