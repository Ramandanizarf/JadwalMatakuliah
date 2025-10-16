<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman form registrasi.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // Pastikan Anda memiliki file view di 'resources/views/auth/register.blade.php'
        return view('auth.register');
    }

    /**
     * Menangani permintaan registrasi dari form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // min:8 adalah standar keamanan yang baik
        ]);

        // 2. Buat pengguna baru di database
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', 
        ]);

        // 3. Login pengguna yang baru dibuat secara otomatis
        Auth::login($user);

        // 4. Alihkan ke halaman /home setelah berhasil
        return redirect('/home');
    }
}

