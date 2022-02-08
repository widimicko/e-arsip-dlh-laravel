<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\User;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->back()->with('failed', 'Login gagal, periksa kredensial anda!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function showChangePassword() {
        return view('auth.change_password', ['fields' => Field::all()]);
    }

    public function changePassword(Request $request) {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|max:16|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        if (!Hash::check($validatedData['current_password'], Auth::user()->password)) {
            return redirect()->back()->with('failed', 'Password saat ini tidak sama dengan password yang tersimpan!');
        }

        User::where('id', Auth::id())->update(['password' => Hash::make($validatedData['password'])]);
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Password berhasil diubah, silahkan login kembali');
    }
}
