<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $transaksi = Transaksi::where('usaha_id', $user->usaha_id)
            ->latest()
            ->paginate(15);

        $produk = Produk::with('kategori')
            ->where('usaha_id', $user->usaha_id)
            ->where('status', 'aktif')
            ->orderBy('nama_produk')
            ->get();

        $kategori = Kategori::where('usaha_id', $user->usaha_id)->get();

        $pelanggan = Pelanggan::where('usaha_id', $user->usaha_id)->get();

        return view('dashboard.transaksi.index', compact(
            'transaksi',
            'produk',
            'kategori',
            'pelanggan'
        ));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return back()->with('error', 'User tidak terdeteksi, silakan login ulang.');
        }

        $request->validate([
            'items'        => 'required|json',
            'total'        => 'required|numeric|min:1',
            'bayar'        => 'required|numeric|min:0',
            'kembalian'    => 'required|numeric|min:0',
            'pelanggan_id' => 'nullable|exists:pelanggan,id',
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

            // 🔥 AUTO CREATE PELANGGAN JIKA INPUT NAMA BARU
            $pelanggan_id = $request->pelanggan_id;

            if (empty($pelanggan_id) && $request->nama_pelanggan_baru) {

            dd('MASUK CREATE PELANGGAN'); 

                $pelanggan = Pelanggan::create([
                    'usaha_id' => $user->usaha_id,
                    'nama'     => $request->nama_pelanggan_baru,
                    'telepon'  => null,
                    'email'    => null,
                    'alamat'   => null,
                ]);

                $pelanggan_id = $pelanggan->id;
            }

            // 🔥 CREATE TRANSAKSI
            $transaksi = Transaksi::create([
                'usaha_id'     => $user->usaha_id,
                'user_id'      => $user->id,
                'pelanggan_id' => $pelanggan_id,
                'total'        => $request->total,
                'bayar'        => $request->bayar,
                'kembalian'    => $request->kembalian,
            ]);

            // 🔥 INSERT ITEM
            foreach ($items as $item) {

                $produk = Produk::lockForUpdate()->findOrFail($item['id']);

                if (!$produk->is_jasa && $produk->stok < $item['qty']) {
                    throw new \Exception("Stok {$produk->nama_produk} tidak cukup");
                }

                TransaksiItem::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id'    => $produk->id,
                    'nama_produk'  => $produk->nama_produk,
                    'harga'        => $produk->harga_jual,
                    'qty'          => $item['qty'],
                    'subtotal'     => $produk->harga_jual * $item['qty'],
                ]);

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

    public function show(Transaksi $transaksi)
    {
        abort_if($transaksi->usaha_id !== Auth::user()->usaha_id, 403);

        $transaksi->load('items', 'pelanggan', 'user');

        return view('dashboard.transaksi.show', compact('transaksi'));
    }

    public function destroy(Transaksi $transaksi)
    {
        abort_if($transaksi->usaha_id !== Auth::user()->usaha_id, 403);

        $transaksi->items()->delete();
        $transaksi->delete();

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi dihapus.');
    }
}