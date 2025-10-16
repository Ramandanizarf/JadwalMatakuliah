<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; // Pastikan Controller di-import

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     */
    
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan Anda memiliki view ini
    }

    /**
     * Menangani permintaan login.
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba untuk mengautentikasi pengguna
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 3. JIKA BERHASIL, ARAHKAN KE '/home'
            // HomeController kemudian akan menentukan halaman mana yang ditampilkan
            // berdasarkan peran (role) pengguna.
            return redirect()->intended('/home');
        }

        // 4. Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang diberikan tidak cocok.',
        ])->onlyInput('email');
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}