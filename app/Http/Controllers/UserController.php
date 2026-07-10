<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'users');

        if ($tab == 'categories') {
            $data = Category::all();
        } else {
            $data = User::all();
        }

        return view('admin.dashboard', compact('data', 'tab'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('dashboard');

    }
}
