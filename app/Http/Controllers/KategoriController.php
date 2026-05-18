<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $kategori = Kategori::where('usaha_id', $user->usaha_id)->get();

        return view('dashboard.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'usaha_id' => $user->usaha_id,
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = Auth::user();

        $kategori = Kategori::where('usaha_id', $user->usaha_id)
            ->findOrFail($id);

        return view('dashboard.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::where('usaha_id', $user->usaha_id)
            ->findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = Auth::user();

        $kategori = Kategori::where('usaha_id', $user->usaha_id)
            ->findOrFail($id);

        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }
}