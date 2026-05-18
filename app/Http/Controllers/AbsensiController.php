<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    // ─────────────────────────────────────────────────────────────
    // INDEX — Halaman absensi hari ini
    // ─────────────────────────────────────────────────────────────
    public function index()
    {
        $user = Auth::user();

        $usahaId = $user->usaha_id;

        $today = Carbon::today();

        // Semua karyawan usaha yang sama (selain owner)
        $karyawan = User::where('usaha_id', $usahaId)
            ->where('status', 'aktif')
            ->where('role', '!=', 'owner')
            ->orderBy('name')
            ->get();

        // Absensi hari ini
        $absensiHariIni = Absensi::where('usaha_id', $usahaId)
            ->whereDate('tanggal', $today)
            ->with('user')
            ->get()
            ->keyBy('user_id');

        // Statistik
        $statHadir = $absensiHariIni->where('status', 'hadir')->count();

        $statIzin = $absensiHariIni->where('status', 'izin')->count();

        $statSakit = $absensiHariIni->where('status', 'sakit')->count();

        $statAlpha = $absensiHariIni->where('status', 'alpha')->count();

        $belumAbsen = $karyawan->count() - $absensiHariIni->count();

        return view('dashboard.absensi.index', compact(
            'karyawan',
            'absensiHariIni',
            'today',
            'statHadir',
            'statIzin',
            'statSakit',
            'statAlpha',
            'belumAbsen',
        ));
    }

    // ─────────────────────────────────────────────────────────────
    // STORE — Simpan / update absensi satu karyawan
    // ─────────────────────────────────────────────────────────────
    public function store(Request $request)
    {
        $admin = Auth::user();

        $usahaId = $admin->usaha_id;

        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'status'     => 'required|in:hadir,izin,sakit,alpha',
            'jam_masuk'  => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'catatan'    => 'nullable|string|max:255',
        ]);

        // Pastikan user berada di usaha yang sama & bukan owner
        $targetUser = User::where('id', $request->user_id)
            ->where('usaha_id', $usahaId)
            ->where('role', '!=', 'owner')
            ->firstOrFail();

        // Validasi jam manual
        if (
            $request->jam_masuk &&
            $request->jam_keluar &&
            $request->jam_keluar <= $request->jam_masuk
        ) {
            return back()->with(
                'error',
                'Jam keluar harus lebih besar dari jam masuk.'
            );
        }

        Absensi::updateOrCreate(
            [
                'user_id'  => $targetUser->id,
                'usaha_id' => $usahaId,
                'tanggal'  => Carbon::today()->toDateString(),
            ],
            [
                'status' => $request->status,

                // FIX ORACLE DATE/TIME
                'jam_masuk' => $request->jam_masuk
                    ? Carbon::today()->format('Y-m-d') . ' ' . $request->jam_masuk . ':00'
                    : null,

                'jam_keluar' => $request->jam_keluar
                    ? Carbon::today()->format('Y-m-d') . ' ' . $request->jam_keluar . ':00'
                    : null,

                'catatan' => $request->catatan,

                'dicatat_oleh' => $admin->id,
            ]
        );

        return back()->with(
            'success',
            "Absensi {$targetUser->name} berhasil disimpan."
        );
    }

    // ─────────────────────────────────────────────────────────────
    // STORE BULK — Simpan semua sekaligus
    // ─────────────────────────────────────────────────────────────
    public function storeBulk(Request $request)
    {
        $admin = Auth::user();

        $usahaId = $admin->usaha_id;

        $today = Carbon::today()->toDateString();

        $request->validate([
            'absen' => 'required|array',

            'absen.*.user_id' => 'required|exists:users,id',

            'absen.*.status' => 'required|in:hadir,izin,sakit,alpha',

            'absen.*.jam_masuk' => 'nullable|date_format:H:i',

            'absen.*.jam_keluar' => 'nullable|date_format:H:i',

            'absen.*.catatan' => 'nullable|string|max:255',
        ]);

        // User valid dalam usaha ini (selain owner)
        $validIds = User::where('usaha_id', $usahaId)
            ->where('role', '!=', 'owner')
            ->pluck('id')
            ->toArray();

        foreach ($request->absen as $row) {

            if (!in_array($row['user_id'], $validIds)) {
                continue;
            }

            // Validasi jam
            if (
                !empty($row['jam_masuk']) &&
                !empty($row['jam_keluar']) &&
                $row['jam_keluar'] <= $row['jam_masuk']
            ) {
                continue;
            }

            Absensi::updateOrCreate(
                [
                    'user_id'  => $row['user_id'],
                    'usaha_id' => $usahaId,
                    'tanggal'  => $today,
                ],
                [
                    'status' => $row['status'],

                    // FIX ORACLE DATE/TIME
                    'jam_masuk' => !empty($row['jam_masuk'])
                        ? Carbon::today()->format('Y-m-d') . ' ' . $row['jam_masuk'] . ':00'
                        : null,

                    'jam_keluar' => !empty($row['jam_keluar'])
                        ? Carbon::today()->format('Y-m-d') . ' ' . $row['jam_keluar'] . ':00'
                        : null,

                    'catatan' => $row['catatan'] ?? null,

                    'dicatat_oleh' => $admin->id,
                ]
            );
        }

        return back()->with(
            'success',
            'Absensi semua karyawan berhasil disimpan.'
        );
    }

    // ─────────────────────────────────────────────────────────────
    // RIWAYAT — History absensi
    // ─────────────────────────────────────────────────────────────
    public function riwayat(Request $request)
    {
        $user = Auth::user();

        $usahaId = $user->usaha_id;

        $start = $request->start_date
            ? Carbon::parse($request->start_date)->startOfDay()
            : Carbon::now()->startOfMonth();

        $end = $request->end_date
            ? Carbon::parse($request->end_date)->endOfDay()
            : Carbon::now()->endOfDay();

        // Semua karyawan selain owner
        $karyawan = User::where('usaha_id', $usahaId)
            ->where('role', '!=', 'owner')
            ->orderBy('name')
            ->get();

        // Query
        $query = Absensi::with('user')
            ->where('usaha_id', $usahaId)
            ->whereBetween('tanggal', [
                $start->toDateString(),
                $end->toDateString()
            ])
            ->orderBy('tanggal', 'desc')
            ->orderBy('user_id');

        // Filter karyawan
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $riwayat = $query->paginate(20);

        // Rekap
        $rekap = [
            'hadir' => $riwayat->where('status', 'hadir')->count(),
            'izin'  => $riwayat->where('status', 'izin')->count(),
            'sakit' => $riwayat->where('status', 'sakit')->count(),
            'alpha' => $riwayat->where('status', 'alpha')->count(),
        ];

        return view('dashboard.absensi.riwayat', compact(
            'riwayat',
            'karyawan',
            'start',
            'end',
            'rekap',
        ));
    }

    // ─────────────────────────────────────────────────────────────
    // DESTROY — Hapus absensi
    // ─────────────────────────────────────────────────────────────
    public function destroy(Absensi $absensi)
    {
        abort_if(
            $absensi->usaha_id !== Auth::user()->usaha_id,
            403
        );

        $absensi->delete();

        return back()->with(
            'success',
            'Data absensi dihapus.'
        );
    }
}
