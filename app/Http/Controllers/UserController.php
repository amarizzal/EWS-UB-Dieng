<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // Cek apakah username yang menyebabkan error
            if ($validator->errors()->has('username')) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Username sudah ada.');
            }

            // Jika error bukan dari username
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Lolos validasi, simpan user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diubah.');
    }

    public function destroy(User $user)
    {
        $user->record()->delete();
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
