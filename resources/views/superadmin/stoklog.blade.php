@extends('layouts.super-admin')

@section('content')
    <div class="space-y-6 animate-fade-in">

        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-1 border-b border-slate-100">
            <div>
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Stok Log</h2>
                <p class="text-slate-500 text-xs mt-0.5">Riwayat mutasi dan perubahan stok barang dari semua unit usaha.</p>
            </div>
            <div class="flex items-center">
                <span
                    class="px-3 py-1.5 bg-blue-50 text-blue-700 border border-blue-100 rounded-xl text-xs font-semibold shadow-sm">
                    📊 Total {{ number_format($stoklogs->total()) }} Records Log
                </span>
            </div>
        </div>

        {{-- Normal & Clean Filter Form --}}
        <div class="bg-white p-3.5 rounded-xl border border-slate-100 shadow-sm">
            <form method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2.5 items-end">
                <div class="space-y-1">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Unit Usaha</label>
                    <select name="usaha_id"
                        class="w-full px-3 py-2 bg-slate-50/50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-slate-700 transition cursor-pointer">
                        <option value="">Semua Usaha</option>
                        @foreach ($usahaList as $usaha)
                            <option value="{{ $usaha->id }}" {{ request('usaha_id') == $usaha->id ? 'selected' : '' }}>
                                {{ $usaha->nama_usaha }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Tipe Log</label>
                    <select name="tipe"
                        class="w-full px-3 py-2 bg-slate-50/50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-slate-700 transition cursor-pointer">
                        <option value="">Semua Tipe</option>
                        <option value="masuk" {{ request('tipe') === 'masuk' ? 'selected' : '' }}>🟢 Masuk</option>
                        <option value="keluar" {{ request('tipe') === 'keluar' ? 'selected' : '' }}>🔴 Keluar</option>
                        <option value="koreksi" {{ request('tipe') === 'koreksi' ? 'selected' : '' }}>🟡 Koreksi</option>
                    </select>
                </div>

                <div class="space-y-1">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Mulai Tanggal</label>
                    <input type="date" name="dari" value="{{ request('dari') }}"
                        class="w-full px-3 py-2 bg-slate-50/50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-slate-600 transition">
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="flex-1 px-4 py-2 bg-slate-900 text-white font-semibold rounded-lg text-xs hover:bg-slate-800 active:scale-[0.98] transition shadow-sm h-[34px]">
                        Filter
                    </button>
                    @if (request()->anyFilled(['usaha_id', 'tipe', 'dari']))
                        <a href="{{ route('superadmin.stoklog') }}"
                            class="px-3 py-2 bg-slate-100 text-slate-600 font-semibold rounded-lg text-xs hover:bg-slate-200 text-center transition flex items-center justify-center h-[34px]">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Table Container --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-xs">
                    <thead
                        class="bg-slate-50 border-b border-slate-100 text-[11px] uppercase tracking-wider text-slate-500 font-bold">
                        <tr>
                            <th class="px-5 py-3 text-left w-24">Waktu</th>
                            <th class="px-5 py-3 text-left">Asal Usaha</th>
                            <th class="px-5 py-3 text-left">Nama Produk</th>
                            <th class="px-5 py-3 text-left w-28">Jenis Mutasi</th>
                            <th class="px-5 py-3 text-left w-20">Jumlah</th>
                            <th class="px-5 py-3 text-center w-24">Stok Awal</th>
                            <th class="px-5 py-3 text-center w-24">Stok Akhir</th>
                            <th class="px-5 py-3 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($stoklogs as $log)
                            <tr class="hover:bg-slate-50/60 transition duration-100 group">
                                {{-- Waktu --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-400 font-mono text-[11px]">
                                    {{ $log->created_at->format('d M Y H:i') }}
                                </td>

                                {{-- Usaha Badge --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <span
                                        class="inline-block px-2 py-0.5 bg-blue-50/60 text-blue-700 border border-blue-100/50 rounded text-[11px] font-medium">
                                        {{ $log->usaha->nama_usaha ?? ($log->produk->usaha->nama_usaha ?? '-') }}
                                    </span>
                                </td>

                                {{-- Nama Produk --}}
                                <td class="px-5 py-3 font-semibold text-slate-800 group-hover:text-blue-600 transition">
                                    {{ $log->produk->nama_produk ?? '-' }}
                                </td>

                                {{-- Tipe Badge --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    @if ($log->tipe === 'masuk')
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100/60">
                                            <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Barang Masuk
                                        </span>
                                    @elseif($log->tipe === 'keluar')
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-100/60">
                                            <span class="w-1 h-1 rounded-full bg-rose-500"></span> Barang Keluar
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-100/60">
                                            <span class="w-1 h-1 rounded-full bg-amber-500"></span> Penyesuaian
                                        </span>
                                    @endif
                                </td>

                                {{-- Jumlah Mutasi --}}
                                <td
                                    class="px-5 py-3 whitespace-nowrap font-mono font-bold text-sm
                                    {{ $log->tipe === 'masuk' ? 'text-emerald-600' : ($log->tipe === 'keluar' ? 'text-rose-600' : 'text-amber-600') }}">
                                    {{ $log->tipe === 'masuk' ? '+' : ($log->tipe === 'keluar' ? '-' : '±') }}{{ number_format($log->jumlah) }}
                                </td>

                                {{-- Stok Sebelum --}}
                                <td class="px-5 py-3 text-center font-mono text-slate-400">
                                    {{ number_format($log->stok_sebelum ?? 0) }}
                                </td>

                                {{-- Stok Sesudah --}}
                                <td class="px-5 py-3 text-center font-mono font-semibold text-slate-700 bg-slate-50/30">
                                    {{ number_format($log->stok_sesudah ?? 0) }}
                                </td>

                                {{-- Keterangan --}}
                                <td class="px-5 py-3 text-slate-500 max-w-[200px] truncate" title="{{ $log->keterangan }}">
                                    {{ $log->keterangan ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-5 py-12 text-center text-slate-400">
                                    <div class="text-3xl mb-2">📋</div>
                                    <div class="font-semibold text-slate-700 text-sm">Log Kosong</div>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Tidak ditemukan data log mutasi stok sesuai
                                        filter.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Compact Pagination Footer --}}
            @if ($stoklogs->hasPages())
                <div class="px-5 py-3.5 border-t border-slate-100 bg-slate-50/40">
                    {{ $stoklogs->appends(request()->query())->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
