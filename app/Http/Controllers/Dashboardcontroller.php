<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user     = Auth::user();
        $usahaId  = $user->usaha_id;
        $today    = Carbon::today();
        $yesterday= Carbon::yesterday();

        // ── PENJUALAN HARI INI ──────────────────────────────────
        $penjualanHariIni = Transaksi::where('usaha_id', $usahaId)
            ->where('status', 'lunas')
            ->whereDate('created_at', $today)
            ->sum('total');

        $penjualanKemarin = Transaksi::where('usaha_id', $usahaId)
            ->where('status', 'lunas')
            ->whereDate('created_at', $yesterday)
            ->sum('total');

        // Persentase naik/turun vs kemarin
        $penjualanPersen = $penjualanKemarin > 0
            ? round((($penjualanHariIni - $penjualanKemarin) / $penjualanKemarin) * 100, 1)
            : ($penjualanHariIni > 0 ? 100 : 0);

        // ── TOTAL TRANSAKSI HARI INI ────────────────────────────
        $totalTrxHariIni = Transaksi::where('usaha_id', $usahaId)
            ->where('status', 'lunas')
            ->whereDate('created_at', $today)
            ->count();

        $totalTrxKemarin = Transaksi::where('usaha_id', $usahaId)
            ->where('status', 'lunas')
            ->whereDate('created_at', $yesterday)
            ->count();

        $trxSelisih = $totalTrxHariIni - $totalTrxKemarin;

        // ── TOTAL PRODUK AKTIF ──────────────────────────────────
        $totalProduk = Produk::where('usaha_id', $usahaId)
            ->where('status', 'aktif')
            ->count();

        // ── STOK MENIPIS ────────────────────────────────────────
        $stokMenipis = Produk::where('usaha_id', $usahaId)
            ->where('is_jasa', false)
            ->whereColumn('stok', '<=', 'stok_minimal')
            ->count();

        // ── PESANAN PENDING ─────────────────────────────────────
        $totalPending = Transaksi::where('usaha_id', $usahaId)
            ->where('status', 'pending')
            ->count();

        // ── GRAFIK 7 HARI TERAKHIR ──────────────────────────────
        $grafik = [];
        for ($i = 6; $i >= 0; $i--) {
            $tgl  = Carbon::today()->subDays($i);
            $total = Transaksi::where('usaha_id', $usahaId)
                ->where('status', 'lunas')
                ->whereDate('created_at', $tgl)
                ->sum('total');

            $grafik[] = [
                'label' => $tgl->isoFormat('ddd'),   // Sen, Sel, Rab, ...
                'total' => (float) $total,
                'today' => $tgl->isToday(),
            ];
        }

        // Cari nilai tertinggi untuk skala bar
        $maxGrafik = max(array_column($grafik, 'total')) ?: 1;

        // ── TRANSAKSI TERBARU (5) ───────────────────────────────
        $transaksiTerbaru = Transaksi::with(['items', 'user'])
            ->where('usaha_id', $usahaId)
            ->where('status', 'lunas')
            ->latest()
            ->take(5)
            ->get();

        // ── TOTAL MINGGU INI ────────────────────────────────────
        $totalMingguIni = Transaksi::where('usaha_id', $usahaId)
            ->where('status', 'lunas')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('total');

        return view('dashboard', compact(
            'penjualanHariIni',
            'penjualanKemarin',
            'penjualanPersen',
            'totalTrxHariIni',
            'totalTrxKemarin',
            'trxSelisih',
            'totalProduk',
            'stokMenipis',
            'totalPending',
            'grafik',
            'maxGrafik',
            'transaksiTerbaru',
            'totalMingguIni',
        ));
    }
}