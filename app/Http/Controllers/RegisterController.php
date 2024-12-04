<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Memproses registrasi
    public function register(Request $request)
    {
        // Validasi data input
        $validateData = $request->validate([
            'nik' => 'required|unique:users|digits:16',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        // Menyimpan data pemilih ke database
        User::create([
            'nik' => $validateData['nik'],
            'nama' => $validateData['nama'],
            'tanggal_lahir' => $validateData['tanggal_lahir'],
            'alamat' => $validateData['alamat'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'role' => 'pemilih', // Menetapkan role default sebagai pemilih
        ]);

        // Redirect ke halaman login setelah registrasi
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}
