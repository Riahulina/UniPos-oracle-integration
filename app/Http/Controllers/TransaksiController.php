<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    // ─────────────────────────────────────────────────────────────
    // INDEX — Riwayat transaksi LUNAS
    // ─────────────────────────────────────────────────────────────
    public function index()
    {
        $user = Auth::user();

        $produk = Produk::with('kategori')
            ->where('usaha_id', $user->usaha_id)
            ->where('status', 'aktif')
            ->orderBy('nama_produk')
            ->get();

        $kategori = Kategori::where('usaha_id', $user->usaha_id)->get();

        $transaksi = Transaksi::where('usaha_id', $user->usaha_id)
            ->where('status', 'lunas')
            ->latest()
            ->paginate(15);

        return view('dashboard.transaksi.index', compact(
            'produk',
            'kategori',
            'transaksi'
        ));
    }

    // ─────────────────────────────────────────────────────────────
    // CREATE — Form transaksi baru
    // ─────────────────────────────────────────────────────────────
    public function create()
    {
        $user = Auth::user();

        $produk = Produk::with('kategori')
            ->where('usaha_id', $user->usaha_id)
            ->where('status', 'aktif')
            ->orderBy('nama_produk')
            ->get();

        $kategori = Kategori::where('usaha_id', $user->usaha_id)->get();

        return view('dashboard.transaksi.create', compact('produk', 'kategori'));
    }

    // ─────────────────────────────────────────────────────────────
    // STORE — Simpan transaksi (mode: order | pay)
    // ─────────────────────────────────────────────────────────────
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'items'               => 'required|json',
            'total'               => 'required|numeric|min:1',
            'bayar'               => 'nullable|numeric|min:0',
            'kembalian'           => 'nullable|numeric|min:0',
            'mode'                => 'required|in:order,pay',
            'nama_pelanggan_baru' => 'nullable|string|max:255',
        ]);

        $items = json_decode($request->items, true);
        if (empty($items)) {
            return back()->with('error', 'Keranjang kosong.');
        }

        $mode = $request->mode;
        if ($mode === 'pay' && (float)$request->bayar < (float)$request->total) {
            return back()->with('error', 'Nominal bayar kurang dari total.');
        }

        DB::beginTransaction();
        try {
            $nama = !empty(trim($request->nama_pelanggan_baru ?? ''))
                ? trim($request->nama_pelanggan_baru)
                : null;

            $transaksi = Transaksi::create([
                'usaha_id'       => $user->usaha_id,
                'user_id'        => $user->id,
                'nama_pelanggan' => $nama,
                'total'          => $request->total,
                'bayar'          => $mode === 'pay' ? $request->bayar    : 0,
                'kembalian'      => $mode === 'pay' ? $request->kembalian : 0,
                'status'         => $mode === 'order' ? 'pending' : 'lunas',
            ]);

            foreach ($items as $item) {
                $produk = Produk::lockForUpdate()->findOrFail($item['id']);

                if (!$produk->is_jasa && $produk->stok < $item['qty']) {
                    throw new \Exception("Stok '{$produk->nama_produk}' tidak cukup (tersisa {$produk->stok}).");
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

            if ($mode === 'order') {
                return redirect()
                    ->route('transaksi.pesanan')
                    ->with('success', 'Pesanan berhasil disimpan!');
            }

            return redirect()
                ->route('transaksi.show', $transaksi->id)
                ->with('success', 'Transaksi berhasil diproses!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    // ─────────────────────────────────────────────────────────────
    // SHOW — Detail + struk (hanya transaksi LUNAS)
    // ─────────────────────────────────────────────────────────────
    public function show(Transaksi $transaksi)
    {
        abort_if($transaksi->usaha_id !== Auth::user()->usaha_id, 403);

        if ($transaksi->status !== 'lunas') {
            return redirect()
                ->route('transaksi.pesanan')
                ->with('error', 'Pesanan belum dibayar.');
        }

        $transaksi->load('items', 'user', 'usaha');

        return view('dashboard.transaksi.show', compact('transaksi'));
    }

    // ─────────────────────────────────────────────────────────────
    // DESTROY — Hapus (kembalikan stok jika pending)
    // ─────────────────────────────────────────────────────────────
    public function destroy(Transaksi $transaksi)
    {
        abort_if($transaksi->usaha_id !== Auth::user()->usaha_id, 403);

        DB::beginTransaction();
        try {
            if ($transaksi->status === 'pending') {
                foreach ($transaksi->items as $item) {
                    $produk = Produk::find($item->produk_id);
                    if ($produk && !$produk->is_jasa) {
                        $produk->increment('stok', $item->qty);
                    }
                }
            }

            $transaksi->items()->delete();
            $transaksi->delete();

            DB::commit();

            $from = str_contains(request()->header('referer', ''), 'pesanan')
                ? 'transaksi.pesanan'
                : 'transaksi.index';

            return redirect()->route($from)->with('success', 'Dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    // ─────────────────────────────────────────────────────────────
    // PESANAN — Daftar pesanan pending
    // ─────────────────────────────────────────────────────────────
    public function pesanan()
    {
        $pesanan = Transaksi::with('items')
            ->where('usaha_id', Auth::user()->usaha_id)
            ->where('status', 'pending')
            ->latest()
            ->get();

        $pesananData = $pesanan->map(function ($p) {
            return [
                'id'    => $p->id,
                'total' => (float) $p->total,
                'nama'  => $p->nama_pelanggan,
                'items' => $p->items->map(function ($i) {
                    return [
                        'nama_produk' => $i->nama_produk,
                        'qty'         => $i->qty,
                        'harga'       => (float) $i->harga,
                        'subtotal'    => (float) $i->subtotal,
                    ];
                })->toArray(),
            ];
        })->keyBy('id');

        return view('dashboard.transaksi.pesanan', compact('pesanan', 'pesananData'));
    }

    // ─────────────────────────────────────────────────────────────
    // BAYAR — Bayar pesanan pending → redirect ke struk
    // ─────────────────────────────────────────────────────────────
    public function bayar(Request $request, int $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        abort_if($transaksi->usaha_id !== Auth::user()->usaha_id, 403);

        if ($transaksi->status === 'lunas') {
            return redirect()
                ->route('transaksi.show', $transaksi->id)
                ->with('error', 'Pesanan ini sudah dibayar.');
        }

        $request->validate([
            'bayar' => [
                'required',
                'numeric',
                'min:' . $transaksi->total,
            ],
        ], [
            'bayar.min' => 'Nominal bayar minimal Rp ' . number_format($transaksi->total, 0, ',', '.'),
        ]);

        $transaksi->update([
            'bayar'     => $request->bayar,
            'kembalian' => $request->bayar - $transaksi->total,
            'status'    => 'lunas',
        ]);

        // → redirect ke show (struk langsung keluar, bisa langsung cetak)
        return redirect()
            ->route('transaksi.show', $transaksi->id)
            ->with('success', 'Pembayaran berhasil! Struk siap dicetak.');
    }

    public function riwayat()
    {
        $transaksi = Transaksi::with('items')
            ->where('usaha_id', Auth::user()->usaha_id)
            ->where('status', 'lunas')
            ->latest()
            ->paginate(15);

        return view('dashboard.transaksi.riwayat', compact('transaksi'));
    }
}
