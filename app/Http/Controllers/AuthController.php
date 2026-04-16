<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman form register front-end
    public function showRegister()
    {
        return view('auth.register');
    }

    // Memproses data pendaftaran akun baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain atau login.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Otomatis pasangkan role 'siswa' (Spatie)
        $user->assignRole('siswa');

        // Login-kan otomatis
        Auth::login($user);

        // Langsung lempar ke Dashboard Filament!
        return redirect('/admin')->with('success', 'Akun berhasil dibuat! Selamat datang di Portal Study Club.');
    }
}