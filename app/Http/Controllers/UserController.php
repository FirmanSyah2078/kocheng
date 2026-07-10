<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
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
        ]);

        return redirect()->route('dashboard');

    }
}
