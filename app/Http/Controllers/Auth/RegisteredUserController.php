<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usaha;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'kode_usaha' => ['required']
        ]);

        $usaha = Usaha::where('kode_usaha', $request->kode_usaha)->first();

        if (!$usaha) {
            throw ValidationException::withMessages([
                'kode_usaha' => ['Kode usaha tidak ditemukan.'],
            ]);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usaha_id' => $usaha->id,
            'role' => 'kasir',
            'status' => 'nonaktif'
        ]);

        return redirect()->route('pending.approval');
    }
}
