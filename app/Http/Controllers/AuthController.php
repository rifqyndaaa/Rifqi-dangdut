<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        // Jika user sudah login, redirect ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek password
        if ($user && Hash::check($request->password, $user->password)) {

            Auth::login($user); // Simpan session login
            session(['last_login' => now()]);

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus semua session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth')->with('success', 'Logout berhasil!');
    }
}
