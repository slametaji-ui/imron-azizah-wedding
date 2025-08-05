<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:administrator,finance,student',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            session()->flash('success', 'User created successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create user. Please try again.');
        }

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:administrator,finance,student',
        ]);

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);

            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'required|string|min:8|confirmed',
                ]);
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            session()->flash('success', 'User updated successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to updated user. Please try again.');
        }
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            session()->flash('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to deleted user. Please try again.');
        }
        return redirect()->route('users.index');
    }
}
