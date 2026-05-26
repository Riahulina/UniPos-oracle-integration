@extends('layouts.super-admin')

@section('content')
    <div class="space-y-5 animate-fade-in">

        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-1 border-b border-slate-100">
            <div>
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Data Absensi</h2>
                <p class="text-slate-500 text-xs mt-0.5">Riwayat & log kehadiran karyawan dari seluruh cabang usaha UniPOS.
                </p>
            </div>
        </div>

        {{-- Standard & Compact Filter Form --}}
        <div class="bg-white p-3.5 rounded-xl border border-slate-100 shadow-sm">
            <form method="GET" class="flex flex-wrap items-center gap-2.5">
                <div class="w-full sm:w-auto flex-1 sm:flex-none min-w-[180px]">
                    <select name="usaha_id"
                        class="w-full px-3 py-1.5 bg-slate-50/50 border border-slate-200 rounded-lg text-xs font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition h-[34px]">
                        <option value="">Semua Usaha</option>
                        @foreach ($usahaList as $usaha)
                            <option value="{{ $usaha->id }}" {{ request('usaha_id') == $usaha->id ? 'selected' : '' }}>
                                {{ $usaha->nama_usaha }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full sm:w-auto flex-1 sm:flex-none">
                    <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                        class="w-full px-3 py-1.5 bg-slate-50/50 border border-slate-200 rounded-lg text-xs text-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition h-[34px]">
                </div>

                <div class="flex items-center gap-2 w-full sm:w-auto ml-auto sm:ml-0">
                    <button type="submit"
                        class="flex-1 sm:flex-initial px-5 py-1.5 bg-slate-900 text-white font-semibold rounded-lg text-xs hover:bg-slate-800 active:scale-[0.98] transition shadow-sm h-[34px]">
                        Filter
                    </button>

                    @if (request()->anyFilled(['usaha_id', 'tanggal']))
                        <a href="{{ route('superadmin.absensi') }}"
                            class="px-3 py-1.5 bg-slate-100 text-slate-600 font-semibold rounded-lg text-xs hover:bg-slate-200 text-center transition flex items-center justify-center h-[34px]">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Standard Table Container --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-xs">
                    <thead
                        class="bg-slate-50 border-b border-slate-100 text-[11px] uppercase tracking-wider text-slate-500 font-bold">
                        <tr>
                            <th class="px-5 py-3 text-left">Karyawan</th>
                            <th class="px-5 py-3 text-left">Usaha</th>
                            <th class="px-5 py-3 text-left w-32">Tanggal</th>
                            <th class="px-5 py-3 text-left w-24">Jam Masuk</th>
                            <th class="px-5 py-3 text-left w-24">Jam Keluar</th>
                            <th class="px-5 py-3 text-left w-24">Durasi</th>
                            <th class="px-5 py-3 text-left w-28">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($absensis as $absen)
                            <tr class="hover:bg-slate-50/60 transition duration-100 group">
                                {{-- Employee Info --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-slate-800 group-hover:text-blue-600 transition">
                                        {{ $absen->user->name ?? '-' }}
                                    </div>
                                    <div class="text-[10px] text-slate-400 font-medium uppercase tracking-wider mt-0.5">
                                        {{ $absen->user->role ?? 'karyawan' }}
                                    </div>
                                </td>

                                {{-- Business Badge --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <span
                                        class="inline-block px-2 py-0.5 bg-blue-50 text-blue-700 border border-blue-100 rounded text-[10px] font-bold uppercase tracking-wide">
                                        {{ $absen->usaha->nama_usaha ?? ($absen->user->usaha->nama_usaha ?? '-') }}
                                    </span>
                                </td>

                                {{-- Date --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-600 font-medium text-[11px]">
                                    {{ \Carbon\Carbon::parse($absen->tanggal)->translatedFormat('d M Y') }}
                                </td>

                                {{-- Clock In --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-700 font-mono font-medium text-[11px]">
                                    {{ $absen->jam_masuk ? \Carbon\Carbon::parse($absen->jam_masuk)->format('H:i') : '-' }}
                                </td>

                                {{-- Clock Out --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-600 font-mono text-[11px]">
                                    {{ $absen->jam_keluar ? \Carbon\Carbon::parse($absen->jam_keluar)->format('H:i') : '—' }}
                                </td>

                                {{-- Duration --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-500 font-medium">
                                    @if ($absen->jam_masuk && $absen->jam_keluar)
                                        @php
                                            $masuk = \Carbon\Carbon::parse($absen->jam_masuk);
                                            $keluar = \Carbon\Carbon::parse($absen->jam_keluar);
                                            $durasi = $masuk->diff($keluar);
                                        @endphp
                                        <span
                                            class="bg-slate-100 text-slate-600 px-1.5 py-0.5 rounded font-mono text-[11px]">
                                            {{ $durasi->h }}j {{ $durasi->i }}m
                                        </span>
                                    @else
                                        <span class="text-slate-300">—</span>
                                    @endif
                                </td>

                                {{-- Attendance Status Badge --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    @if (($absen->status ?? 'hadir') === 'hadir')
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                            <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Hadir
                                        </span>
                                    @elseif(($absen->status ?? '') === 'izin')
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-100">
                                            <span class="w-1 h-1 rounded-full bg-amber-500"></span> Izin
                                        </span>
                                    @elseif(($absen->status ?? '') === 'sakit')
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                            <span class="w-1 h-1 rounded-full bg-blue-500"></span> Sakit
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-100">
                                            <span class="w-1 h-1 rounded-full bg-rose-400"></span> Alpha
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center text-slate-400">
                                    <div class="text-3xl mb-2">🕒</div>
                                    <div class="font-semibold text-slate-700 text-sm">Belum Ada Data Absensi</div>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Tidak ditemukan data log kehadiran untuk
                                        kriteria filter ini.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Compact Pagination Footer --}}
            @if ($absensis->hasPages())
                <div class="px-5 py-3.5 border-t border-slate-100 bg-slate-50/40">
                    {{ $absensis->appends(request()->query())->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
