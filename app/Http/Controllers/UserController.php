<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function index() {
        return view('users.users', [
            'users' => User::all(),
            'fields' => Field::all(),
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|unique:users|email',
            'role' => 'required',
        ]);

        $validatedData['password'] = Hash::make('password');

        User::create($validatedData);
        return redirect('/dashboard/users')->with('success', "Pengguna berhasil ditambahkan");
    }

    public function update(Request $request, User $user) {
        $rules = [
            'name' => 'required|min:5|max:255',
            'email' => 'required|email',
            'role' => 'required',
        ];

        if ($request['email'] !== $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)->update($validatedData);
        return redirect('/dashboard/users')->with('success', "Pengguna berhasil diubah");
    }

    public function destroy(User $user) {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', "Pengguna berhasil dihapus");
    }
}
