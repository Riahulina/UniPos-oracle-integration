<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * HALAMAN UTAMA TRANSAKSI (LIST + PRODUK / KASIR)
     */
    public function index()
    {
        $user = auth()->user();

        // 🔹 Data transaksi
        $transaksi = Transaksi::where('usaha_id', $user->usaha_id)
            ->latest()
            ->paginate(15);

        // 🔹 Produk untuk kasir
        $produk = Produk::with('kategori')
            ->where('usaha_id', $user->usaha_id)
            ->where('status', 'aktif')
            ->orderBy('nama_produk')
            ->get();

        // 🔹 Kategori (optional filter UI)
        $kategori = Kategori::where('usaha_id', $user->usaha_id)->get();

        return view('dashboard.transaksi.index', compact(
            'transaksi',
            'produk',
            'kategori'
        ));
    }

    /**
     * SIMPAN TRANSAKSI
     */
    public function store(Request $request)
    {
        $request->validate([
            'items'     => 'required|json',
            'total'     => 'required|numeric|min:1',
            'bayar'     => 'required|numeric|min:0',
            'kembalian' => 'required|numeric|min:0',
        ]);

        $items = json_decode($request->items, true);

        if (empty($items)) {
            return back()->with('error', 'Keranjang kosong.');
        }

        if ((float) $request->bayar < (float) $request->total) {
            return back()->with('error', 'Nominal bayar kurang.');
        }

        DB::beginTransaction();

        try {
            $transaksi = Transaksi::create([
                'usaha_id'  => auth()->user()->usaha_id,
                'user_id'   => auth()->id(),
                'total'     => $request->total,
                'bayar'     => $request->bayar,
                'kembalian' => $request->kembalian,
            ]);

            foreach ($items as $item) {

                $produk = Produk::lockForUpdate()->findOrFail($item['id']);

                // 🔹 Cek stok
                if (!$produk->is_jasa && $produk->stok < $item['qty']) {
                    throw new \Exception("Stok '{$produk->nama_produk}' tidak cukup (sisa {$produk->stok})");
                }

                TransaksiItem::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id'    => $produk->id,
                    'nama_produk'  => $produk->nama_produk,
                    'harga'        => $produk->harga_jual,
                    'qty'          => $item['qty'],
                    'subtotal'     => $produk->harga_jual * $item['qty'],
                ]);

                // 🔹 Kurangi stok
                if (!$produk->is_jasa) {
                    $produk->decrement('stok', $item['qty']);
                }
            }

            DB::commit();

            return redirect()
                ->route('transaksi.show', $transaksi->id)
                ->with('success', 'Transaksi berhasil!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * DETAIL TRANSAKSI
     */
    public function show(Transaksi $transaksi)
    {
        abort_if($transaksi->usaha_id !== auth()->user()->usaha_id, 403);

        $transaksi->load('items');

        return view('dashboard.transaksi.show', compact('transaksi'));
    }

    /**
     * HAPUS TRANSAKSI
     */
    public function destroy(Transaksi $transaksi)
    {
        abort_if($transaksi->usaha_id !== auth()->user()->usaha_id, 403);

        $transaksi->items()->delete();
        $transaksi->delete();

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi dihapus.');
    }
}