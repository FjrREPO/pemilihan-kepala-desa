<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilihController extends Controller
{
    public function loginForm()
    {
        return view('pemilih.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('pemilih')->attempt($credentials)) {
            return redirect()->route('pemilih.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function dashboard()
    {
        return view('pemilih.dashboard');
    }

    public function logout()
    {
        Auth::guard('pemilih')->logout();
        return redirect()->route('pemilih.login');
    }
}
