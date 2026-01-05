<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilin halaman login dong
    public function login()
    {
        return view('auth.login');
    }

    // Nah, ini proses cek apakah user valid atau enggak
    public function authenticate(Request $request)
    {
        // Cek dulu, email sama passwordnya diisi gak?
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.'
        ]);

        // Gas login pake data yang udah diinput
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/articles');
        }

        // Waduh, gagal login nih. Balikin ke halaman login lagi
        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }

    // Tampilin form buat daftar akun baru
    public function register()
    {
        return view('auth.register');
    }

    // Proses simpan data user baru biar resmi jadi member
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed'
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 5 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'user' // Default role sebagai user biasa
        ]);

        // Abis daftar langsung login otomatis, biar praktis
        Auth::login($user);

        return redirect('/articles')->with('success', 'Akun berhasil dibuat! Selamat datang.');
    }

    // Oke logout dulu, bersihin session
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
