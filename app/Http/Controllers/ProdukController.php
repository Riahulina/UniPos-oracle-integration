<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')
            ->where('usaha_id', auth()->user()->usaha_id)
            ->latest()
            ->paginate(24);

        $kategori    = Kategori::where('usaha_id', auth()->user()->usaha_id)->get();
        $totalProduk = Produk::where('usaha_id', auth()->user()->usaha_id)->count();
        $totalAktif  = Produk::where('usaha_id', auth()->user()->usaha_id)->where('status', 'aktif')->count();
        $totalKategori = $kategori->count();
        $stokMenipis = Produk::where('usaha_id', auth()->user()->usaha_id)
            ->where('is_jasa', false)
            ->whereColumn('stok', '<=', 'stok_minimal')
            ->count();

        return view('dashboard.produk.index', compact(
            'produk',
            'kategori',
            'totalProduk',
            'totalAktif',
            'totalKategori',
            'stokMenipis',
        ));
    }

    public function create()
    {
        $kategori = Kategori::where('usaha_id', auth()->user()->usaha_id)->get();
        return view('dashboard.produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk'  => 'required|string|max:255',
            'kategori_id'  => 'required|exists:kategori,id',
            'kode_produk'  => 'nullable|string|max:50',
            'barcode'      => 'nullable|string|max:100|unique:produk,barcode',
            'harga_beli'   => 'nullable|numeric|min:0',
            'harga_jual'   => 'required|numeric|min:0',
            'stok'         => 'nullable|integer|min:0',
            'stok_minimal' => 'nullable|integer|min:0',
            'satuan'       => 'nullable|string|max:50',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'       => 'required|in:aktif,nonaktif',
        ]);

        $barcode = $request->barcode
            ?: 'BC' . now()->format('ymd') . strtoupper(Str::random(6));

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create([
            'usaha_id'     => auth()->user()->usaha_id,
            'kategori_id'  => $request->kategori_id,
            'kode_produk'  => $request->kode_produk,
            'barcode'      => $barcode,
            'nama_produk'  => $request->nama_produk,
            'harga_beli'   => $request->harga_beli ?? 0,
            'harga_jual'   => $request->harga_jual,
            'stok'         => $request->is_jasa ? 0 : ($request->stok ?? 0),
            'stok_minimal' => $request->stok_minimal ?? 0,
            'satuan'       => $request->satuan,
            'gambar'       => $gambarPath,
            'is_jasa'      => $request->boolean('is_jasa'),
            'status'       => $request->status,
        ]);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Produk $produk)
    {
        $this->authorizeOwner($produk);
        $kategori = Kategori::where('usaha_id', auth()->user()->usaha_id)->get();

        return view('dashboard.produk.create', compact('produk', 'kategori'));
    }

    public function update(Request $request, Produk $produk)
    {
        $this->authorizeOwner($produk);

        $request->validate([
            'nama_produk'  => 'required|string|max:255',
            'kategori_id'  => 'required|exists:kategori,id',
            'kode_produk'  => 'nullable|string|max:50',
            'barcode'      => 'nullable|string|max:100|unique:produk,barcode,' . $produk->id,
            'harga_beli'   => 'nullable|numeric|min:0',
            'harga_jual'   => 'required|numeric|min:0',
            'stok'         => 'nullable|integer|min:0',
            'stok_minimal' => 'nullable|integer|min:0',
            'satuan'       => 'nullable|string|max:50',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'       => 'required|in:aktif,nonaktif',
        ]);

        $gambarPath = $produk->gambar;
        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $gambarPath = $request->file('gambar')->store('produk', 'public');
        }

        $barcode = $request->barcode ?: $produk->barcode;

        $produk->update([
            'kategori_id'  => $request->kategori_id,
            'kode_produk'  => $request->kode_produk,
            'barcode'      => $barcode,
            'nama_produk'  => $request->nama_produk,
            'harga_beli'   => $request->harga_beli ?? 0,
            'harga_jual'   => $request->harga_jual,
            'stok'         => $request->is_jasa ? 0 : ($request->stok ?? $produk->stok),
            'stok_minimal' => $request->stok_minimal ?? 0,
            'satuan'       => $request->satuan,
            'gambar'       => $gambarPath,
            'is_jasa'      => $request->boolean('is_jasa'),
            'status'       => $request->status,
        ]);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Produk $produk)
    {
        $this->authorizeOwner($produk);

        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    private function authorizeOwner(Produk $produk): void
    {
        abort_if(
            $produk->usaha_id !== auth()->user()->usaha_id,
            403,
            'Akses ditolak.'
        );
    }
}