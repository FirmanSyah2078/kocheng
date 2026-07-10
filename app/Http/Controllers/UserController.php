<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'users');

        if ($tab == 'categories') {
            $data = Category::withCount('products')->get();
        } elseif ($tab == 'product') {
            $data = Product::with('category')->get();
        } else {
            $data = User::all();
        }

        return view('admin.dashboard', compact('data', 'tab'));
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->update(['status' => 'inactive']);

        return redirect()->route('dashboard.index');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status
        ]);

        return redirect()->route('dashboard.index');

    }
}
