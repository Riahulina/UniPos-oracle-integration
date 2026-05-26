<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usaha;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\StokLog;
use App\Models\Absensi;
use App\Models\SettingUsaha;

class SuperAdminController extends Controller
{
    // ─────────────────────────────────────────
    // DASHBOARD
    // ─────────────────────────────────────────
    public function dashboard()
    {
        return view('superadmin.dashboard', [
            'totalUsaha'     => Usaha::count(),
            'pendingUsaha'   => Usaha::where('status', 'pending')->count(),
            'totalUser'      => User::count(),
            'pendingUser'    => User::where('status', 'nonaktif')->count(),
            'totalProduk'    => Produk::count(),
            'totalKategori'  => Kategori::count(),
            'totalTransaksi' => Transaksi::count(),
            'totalDetail'    => DetailTransaksi::count(),
            'totalStokLog'   => StokLog::count(),
            'totalAbsensi'   => Absensi::count(),
            'usahaPending'   => Usaha::where('status', 'pending')->latest()->get(),
        ]);
    }

    // ─────────────────────────────────────────
    // USAHA
    // ─────────────────────────────────────────
    public function usaha()
    {
        $status = request('status', 'all');

        $query = Usaha::latest();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        return view('superadmin.usaha', [
            'usahaList'    => $query->paginate(15),
            'usahaPending' => Usaha::where('status', 'pending')->get(),
            'usahaAktif'   => Usaha::where('status', 'aktif')->get(),
            'totalUsaha'   => Usaha::count(),
        ]);
    }

    public function approve($id)
    {
        $usaha = Usaha::findOrFail($id);

        $usaha->update([
            'status'      => 'aktif',
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Usaha berhasil disetujui. Kirim link login via WhatsApp.');
    }

    public function reject($id)
    {
        $usaha = Usaha::findOrFail($id);

        $usaha->update(['status' => 'ditolak']);

        return back()->with('success', 'Usaha ditolak.');
    }

    // ─────────────────────────────────────────
    // USER
    // ─────────────────────────────────────────
    public function user()
    {
        $query = User::with('usaha')->latest();

        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        return view('superadmin.user', [
            'users'       => $query->paginate(15),
            'totalUser'   => User::count(),
            'nonaktifUser' => User::where('status', 'nonaktif')->count(),
        ]);
    }

    public function toggleUser($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status' => $user->status === 'aktif' ? 'nonaktif' : 'aktif',
        ]);

        return back()->with('success', 'Status user berhasil diubah.');
    }

    // ─────────────────────────────────────────
    // PRODUK
    // ─────────────────────────────────────────
    public function produk()
    {
        $query = Produk::with(['kategori', 'usaha'])->latest();

        if (request('search')) {
            $query->where('nama_produk', 'like', '%' . request('search') . '%');
        }

        if (request('usaha_id')) {
            $query->where('usaha_id', request('usaha_id'));
        }

        return view('superadmin.produk', [
            'produks'     => $query->paginate(20),
            'usahaList'   => Usaha::where('status', 'aktif')->orderBy('nama_usaha')->get(),
            'totalProduk' => Produk::count(),
        ]);
    }

    // ─────────────────────────────────────────
    // TRANSAKSI
    // ─────────────────────────────────────────
    public function transaksi()
    {
        $query = Transaksi::with(['usaha', 'user'])->latest();

        if (request('usaha_id')) {
            $query->where('usaha_id', request('usaha_id'));
        }

        if (request('dari')) {
            $query->whereDate('created_at', '>=', request('dari'));
        }

        if (request('sampai')) {
            $query->whereDate('created_at', '<=', request('sampai'));
        }

        // Hitung total omzet berdasarkan filter yang aktif
        $omzetQuery = Transaksi::query();
        if (request('usaha_id'))  $omzetQuery->where('usaha_id', request('usaha_id'));
        if (request('dari'))      $omzetQuery->whereDate('created_at', '>=', request('dari'));
        if (request('sampai'))    $omzetQuery->whereDate('created_at', '<=', request('sampai'));

        return view('superadmin.transaksi', [
            'transaksis'      => $query->paginate(20),
            'usahaList'       => Usaha::where('status', 'aktif')->orderBy('nama_usaha')->get(),
            'totalTransaksi'  => Transaksi::count(),
            'totalOmzet'      => $omzetQuery->sum('total'),
        ]);
    }

    // ─────────────────────────────────────────
    // STOK LOG
    // ─────────────────────────────────────────
    public function stoklog()
    {
        $query = Produk::with(['usaha'])->latest();

        if (request('usaha_id')) {
            $query->where('usaha_id', request('usaha_id'));
        }

        if (request('tipe')) {
            // tidak dipakai karena produk tidak punya tipe log
        }

        $produks = $query->get();

        // kita ubah jadi format "log" supaya blade kamu tidak rusak
        $stoklogs = $produks->map(function ($produk) {
            return (object)[
                'created_at'   => $produk->updated_at,
                'usaha'        => $produk->usaha,
                'produk'       => $produk,
                'tipe'         => 'koreksi', // default saja
                'jumlah'       => 0,
                'stok_sebelum' => 0,
                'stok_sesudah' => $produk->stok,
                'keterangan'   => 'Data stok saat ini dari produk',
            ];
        });

        return view('superadmin.stoklog', [
            'stoklogs'  => $stoklogs,
            'usahaList' => Usaha::where('status', 'aktif')->orderBy('nama_usaha')->get(),
        ]);
    }

    // ─────────────────────────────────────────
    // ABSENSI
    // ─────────────────────────────────────────
    public function absensi()
    {
        $query = Absensi::with(['user.usaha'])->latest();

        if (request('usaha_id')) {
            $query->whereHas('user', function ($q) {
                $q->where('usaha_id', request('usaha_id'));
            });
        }

        if (request('tanggal')) {
            $query->whereDate('tanggal', request('tanggal'));
        }

        return view('superadmin.absensi', [
            'absensis'  => $query->paginate(20),
            'usahaList' => Usaha::where('status', 'aktif')->orderBy('nama_usaha')->get(),
        ]);
    }

    // ─────────────────────────────────────────
    // SETTING
    // ─────────────────────────────────────────
    public function setting()
    {
        $query = SettingUsaha::with('usaha');

        if (request('usaha_id')) {
            $query->where('usaha_id', request('usaha_id'));
        }

        return view('superadmin.setting', [
            'settings'  => $query->paginate(12),
            'usahaList' => Usaha::orderBy('nama_usaha')->get(),
        ]);
    }
}
