<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminAuthController extends Controller
{
    public function create()
    {
        return view('superadmin.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $login = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'super_admin',
        ]);

        if (!$login) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('superadmin.dashboard');
    }
}
