<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('dashboard.admin.users-edit', ['data' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required|in:admin,user',
            'status' => 'required|in:active,inactive',
        ]);

        $user->update($request->only('name', 'role', 'status'));

        return redirect()->route('dashboard.admin.index')->with('success', 'User diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->update(['status' => 'inactive']);

        return redirect()->route('dashboard.admin.index')->with('success', 'User dinonaktifkan.');
    }
}