<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usaha;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'name' => ['required','string','max:255'],
            'email' => ['required','string','lowercase','email','max:255','unique:'.User::class],
            'password' => ['required','confirmed',Rules\Password::defaults()],
            'kode_usaha' => ['required']
        ]);

        // cari usaha berdasarkan kode usaha
        $usaha = Usaha::where('kode_usaha', $request->kode_usaha)->first();

        if (!$usaha) {
            throw ValidationException::withMessages([
                'kode_usaha' => ['Kode usaha tidak ditemukan.'],
            ]);
        }

        // buat user kasir
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usaha_id' => $usaha->id,
            'role' => 'kasir'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}