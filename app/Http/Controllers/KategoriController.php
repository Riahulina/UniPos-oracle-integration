<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        // ✅ FIX PATH VIEW
        return view('dashboard.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI (biar aman)
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'usaha_id' => 1, // 🔥 sementara (nanti bisa dari user login)
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        // ✅ FIX PATH VIEW
        return view('dashboard.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }
}