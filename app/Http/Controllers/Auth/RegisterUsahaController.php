<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usaha;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterUsahaController extends Controller
{
    public function create()
    {
        return view('auth.register_usaha');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required',
            'alamat' => 'nullable',
            'telp' => 'nullable',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'nama_owner' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $logoName = null;

        // upload logo
        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $logoName = time().'_'.$file->getClientOriginalName();

            $file->storeAs('logo_usaha', $logoName, 'public');
        }

        // generate kode usaha
        $kodeUsaha = 'USH-' . strtoupper(Str::random(5));

        // simpan usaha
        $usaha = Usaha::create([
            'kode_usaha' => $kodeUsaha,
            'nama_usaha' => $request->nama_usaha,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'logo' => $logoName
        ]);

        // buat user owner
        User::create([
            'name' => $request->nama_owner,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'owner',
            'usaha_id' => $usaha->id
        ]);

        return redirect('/register')->with([
            'success' => 'Usaha berhasil dibuat',
            'kode_usaha' => $kodeUsaha
        ]);
    }
}