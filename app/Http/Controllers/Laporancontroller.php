<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $user    = Auth::user();
        $usahaId = $user->usaha_id;

        // ── PERIODE ─────────────────────────────────────────────
        $start = $request->start_date
            ? Carbon::parse($request->start_date)->startOfDay()
            : Carbon::now()->startOfMonth();

        $end = $request->end_date
            ? Carbon::parse($request->end_date)->endOfDay()
            : Carbon::now()->endOfDay();

        // Swap jika start > end
        if ($start->gt($end)) [$start, $end] = [$end, $start];

        // ── BASE QUERY ───────────────────────────────────────────
        $baseQuery = Transaksi::where('usaha_id', $usahaId)
            ->where('status', 'lunas')
            ->whereBetween('created_at', [$start, $end]);

        // ── RINGKASAN ────────────────────────────────────────────
        $totalPenjualan = (clone $baseQuery)->sum('total');
        $totalTransaksi = (clone $baseQuery)->count();
        $totalItem      = TransaksiItem::whereHas('transaksi', fn($q) =>
            $q->where('usaha_id', $usahaId)
              ->where('status', 'lunas')
              ->whereBetween('created_at', [$start, $end])
        )->sum('qty');

        // ── PRODUK TERLARIS ──────────────────────────────────────
        $produkTerlaris = TransaksiItem::selectRaw('nama_produk, SUM(qty) as total')
            ->whereHas('transaksi', fn($q) =>
                $q->where('usaha_id', $usahaId)
                  ->where('status', 'lunas')
                  ->whereBetween('created_at', [$start, $end])
            )
            ->groupBy('nama_produk')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        // ── GRAFIK (per hari jika <= 31 hari, per minggu jika > 31) ──
        $diffDays = $start->diffInDays($end) + 1;

        $grafik = [];

        if ($diffDays <= 31) {
            // Per hari
            for ($i = 0; $i < $diffDays; $i++) {
                $tgl   = (clone $start)->addDays($i);
                $total = (clone $baseQuery)
                    ->whereDate('created_at', $tgl->format('Y-m-d'))
                    ->sum('total');

                $grafik[] = [
                    'label' => $tgl->isoFormat('D/M'),
                    'total' => (float) $total,
                    'today' => $tgl->isToday(),
                ];
            }
        } else {
            // Per minggu — ambil max 12 titik
            $weeks = (int) ceil($diffDays / 7);
            $weeks = min($weeks, 12);

            for ($i = 0; $i < $weeks; $i++) {
                $wStart = (clone $start)->addWeeks($i)->startOfDay();
                $wEnd   = (clone $wStart)->addDays(6)->endOfDay();
                if ($wEnd->gt($end)) $wEnd = clone $end;

                $total = Transaksi::where('usaha_id', $usahaId)
                    ->where('status', 'lunas')
                    ->whereBetween('created_at', [$wStart, $wEnd])
                    ->sum('total');

                $grafik[] = [
                    'label' => 'W'.($i + 1),
                    'total' => (float) $total,
                    'today' => false,
                ];
            }
        }

        $maxGrafik = max(array_column($grafik, 'total')) ?: 1;

        // ── DETAIL TRANSAKSI ─────────────────────────────────────
        $transaksi = (clone $baseQuery)
            ->with(['user', 'items'])
            ->withCount('items')
            ->latest()
            ->get();

        return view('laporan', compact(
            'start',
            'end',
            'totalPenjualan',
            'totalTransaksi',
            'totalItem',
            'produkTerlaris',
            'grafik',
            'maxGrafik',
            'transaksi',
        ));
    }

    // ── EXPORT CSV ───────────────────────────────────────────────
    public function export(Request $request)
    {
        $user    = Auth::user();
        $usahaId = $user->usaha_id;

        $start = $request->start_date
            ? Carbon::parse($request->start_date)->startOfDay()
            : Carbon::now()->startOfMonth();

        $end = $request->end_date
            ? Carbon::parse($request->end_date)->endOfDay()
            : Carbon::now()->endOfDay();

        $transaksi = Transaksi::with(['user', 'items'])
            ->where('usaha_id', $usahaId)
            ->where('status', 'lunas')
            ->whereBetween('created_at', [$start, $end])
            ->latest()
            ->get();

        $filename = 'laporan-penjualan-'
            . $start->format('Ymd') . '-'
            . $end->format('Ymd') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($transaksi) {
            $handle = fopen('php://output', 'w');

            // BOM untuk Excel bisa baca UTF-8
            fputs($handle, "\xEF\xBB\xBF");

            // Header
            fputcsv($handle, [
                'No. Transaksi',
                'Tanggal',
                'Jam',
                'Pelanggan',
                'Kasir',
                'Produk',
                'Qty',
                'Harga Satuan',
                'Subtotal',
                'Total Transaksi',
            ]);

            foreach ($transaksi as $trx) {
                foreach ($trx->items as $item) {
                    fputcsv($handle, [
                        'TRX-' . str_pad($trx->id, 6, '0', STR_PAD_LEFT),
                        $trx->created_at->format('d/m/Y'),
                        $trx->created_at->format('H:i'),
                        $trx->nama_pelanggan ?? '-',
                        $trx->user->name ?? '-',
                        $item->nama_produk,
                        $item->qty,
                        $item->harga,
                        $item->subtotal,
                        $trx->total,
                    ]);
                }
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}