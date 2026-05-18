<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class KaryawanController extends Controller
{
    // ─────────────────────────────────────────────
    // INDEX
    // ─────────────────────────────────────────────
    public function index()
    {
        $usahaId = Auth::user()->usaha_id;

        // Semua karyawan selain owner
        $karyawan = User::where('usaha_id', $usahaId)
            ->where('role', '!=', 'owner')
            ->orderByDesc('created_at')
            ->get();

        // Statistik
        $totalKaryawan = $karyawan->count();

        $aktif = $karyawan
            ->where('status', 'aktif')
            ->count();

        $nonaktif = $karyawan
            ->where('status', '!=', 'aktif')
            ->count();

        return view('dashboard.karyawan.index', compact(
            'karyawan',
            'totalKaryawan',
            'aktif',
            'nonaktif'
        ));
    }

    // ─────────────────────────────────────────────
    // CREATE
    // ─────────────────────────────────────────────
    public function create()
    {
        return view('dashboard.karyawan.create');
    }

    // ─────────────────────────────────────────────
    // STORE
    // ─────────────────────────────────────────────
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],

            'role' => [
                'required',
                'in:kasir,manager,karyawan',
            ],
        ]);

        User::create([
            'name' => $request->name,

            'email' => strtolower($request->email),

            'password' => Hash::make($request->password),

            // otomatis ikut usaha owner
            'usaha_id' => Auth::user()->usaha_id,

            'role' => $request->role,

            'status' => 'aktif',
        ]);

        return redirect()
            ->route('karyawan.index')
            ->with(
                'success',
                'Karyawan berhasil ditambahkan.'
            );
    }

    // ─────────────────────────────────────────────
    // EDIT
    // ─────────────────────────────────────────────
    public function edit(User $user)
    {
        abort_if(
            $user->usaha_id != Auth::user()->usaha_id,
            403
        );

        abort_if(
            $user->role === 'owner',
            403
        );

        return view('dashboard.karyawan.edit', compact('user'));
    }

    // ─────────────────────────────────────────────
    // UPDATE
    // ─────────────────────────────────────────────
    public function update(Request $request, User $user)
    {
        abort_if(
            $user->usaha_id != Auth::user()->usaha_id,
            403
        );

        abort_if(
            $user->role === 'owner',
            403
        );

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],

            'role' => [
                'required',
                'in:kasir,manager,karyawan',
            ],

            'status' => [
                'required',
                'in:aktif,nonaktif',
            ],

            'password' => [
                'nullable',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);

        $data = [
            'name' => $request->name,

            'email' => strtolower($request->email),

            'role' => $request->role,

            'status' => $request->status,
        ];

        // Update password kalau diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('karyawan.index')
            ->with(
                'success',
                'Data karyawan berhasil diperbarui.'
            );
    }

    // ─────────────────────────────────────────────
    // DESTROY
    // ─────────────────────────────────────────────
    public function destroy(User $user)
    {
        // Pastikan usaha sama
        abort_if(
            $user->usaha_id != Auth::user()->usaha_id,
            403
        );

        // Owner tidak boleh dihapus
        abort_if(
            $user->role === 'owner',
            403,
            'Owner tidak dapat dihapus.'
        );

        // Tidak boleh hapus diri sendiri
        abort_if(
            $user->id === Auth::id(),
            403,
            'Anda tidak dapat menghapus akun sendiri.'
        );

        $user->delete();

        return back()->with(
            'success',
            'Karyawan berhasil dihapus.'
        );
    }
}
