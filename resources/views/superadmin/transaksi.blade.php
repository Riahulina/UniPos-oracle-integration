@extends('layouts.super-admin')

@section('content')
    <div class="space-y-5 animate-fade-in">

        {{-- Header Section & Simple Badges --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-1 border-b border-slate-100">
            <div>
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Data Transaksi</h2>
                <p class="text-slate-500 text-xs mt-0.5">Seluruh log transaksi dari semua afiliasi usaha UniPOS.</p>
            </div>
            <div class="flex items-center gap-2">
                <span
                    class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg text-xs font-semibold border border-blue-100/60 shadow-sm">
                    📊 {{ $totalTransaksi }} Transaksi
                </span>
                <span
                    class="inline-flex items-center px-3 py-1.5 bg-emerald-50 text-emerald-700 rounded-lg text-xs font-bold border border-emerald-100/60 shadow-sm">
                    💰 Rp {{ number_format($totalOmzet, 0, ',', '.') }}
                </span>
            </div>
        </div>

        {{-- Standard & Compact Filter Form --}}
        <div class="bg-white p-3.5 rounded-xl border border-slate-100 shadow-sm">
            <form method="GET" class="flex flex-wrap items-center gap-2.5">
                <div class="w-full sm:w-auto flex-1 sm:flex-none min-w-[180px]">
                    <select name="usaha_id"
                        class="w-full px-3 py-1.5 bg-slate-50/50 border border-slate-200 rounded-lg text-xs font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 placeholder:text-slate-400 transition h-[34px]">
                        <option value="">Semua Usaha</option>
                        @foreach ($usahaList as $usaha)
                            <option value="{{ $usaha->id }}" {{ request('usaha_id') == $usaha->id ? 'selected' : '' }}>
                                {{ $usaha->nama_usaha }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-1.5 w-full sm:w-auto">
                    <input type="date" name="dari" value="{{ request('dari') }}"
                        class="w-full sm:w-auto px-3 py-1.5 bg-slate-50/50 border border-slate-200 rounded-lg text-xs text-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition h-[34px]">
                    <span class="text-slate-400 text-xs font-medium px-0.5">s/d</span>
                    <input type="date" name="sampai" value="{{ request('sampai') }}"
                        class="w-full sm:w-auto px-3 py-1.5 bg-slate-50/50 border border-slate-200 rounded-lg text-xs text-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition h-[34px]">
                </div>

                <div class="flex items-center gap-2 w-full sm:w-auto ml-auto sm:ml-0">
                    <button type="submit"
                        class="flex-1 sm:flex-initial px-4 py-1.5 bg-slate-900 text-white font-semibold rounded-lg text-xs hover:bg-slate-800 active:scale-[0.98] transition shadow-sm h-[34px]">
                        Filter
                    </button>

                    @if (request('usaha_id') || request('dari') || request('sampai'))
                        <a href="{{ route('superadmin.transaksi') }}"
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
                            <th class="px-5 py-3 text-left w-28">No. Transaksi</th>
                            <th class="px-5 py-3 text-left">Usaha</th>
                            <th class="px-5 py-3 text-left">Kasir</th>
                            <th class="px-5 py-3 text-left">Total</th>
                            <th class="px-5 py-3 text-left">Bayar</th>
                            <th class="px-5 py-3 text-left w-24">Metode</th>
                            <th class="px-5 py-3 text-left w-36">Waktu</th>
                            <th class="px-5 py-3 text-left w-24">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($transaksis as $trx)
                            <tr class="hover:bg-slate-50/60 transition duration-100">
                                {{-- Code / ID --}}
                                <td class="px-5 py-3 font-mono text-[11px] text-slate-500 whitespace-nowrap">
                                    {{ $trx->no_transaksi ?? '#' . $trx->id }}
                                </td>

                                {{-- Usaha Badge --}}
                                <td class="px-5 py-3 whitespace-nowrap font-medium text-slate-800">
                                    <span
                                        class="inline-block px-2 py-0.5 bg-blue-50 text-blue-700 border border-blue-100 rounded text-[10px] font-bold uppercase tracking-wide">
                                        {{ $trx->usaha->nama_usaha ?? '-' }}
                                    </span>
                                </td>

                                {{-- Cashier Name --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-600">
                                    {{ $trx->user->name ?? '-' }}
                                </td>

                                {{-- Total Amount --}}
                                <td class="px-5 py-3 whitespace-nowrap font-semibold text-slate-800">
                                    Rp {{ number_format($trx->total, 0, ',', '.') }}
                                </td>

                                {{-- Paid Amount --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-600">
                                    Rp {{ number_format($trx->bayar ?? $trx->total, 0, ',', '.') }}
                                </td>

                                {{-- Payment Method --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <span
                                        class="inline-block px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border
                                        {{ ($trx->metode_bayar ?? 'tunai') === 'tunai'
                                            ? 'bg-slate-100 text-slate-600 border-slate-200/60'
                                            : 'bg-purple-50 text-purple-700 border-purple-100' }}">
                                        {{ $trx->metode_bayar ?? 'tunai' }}
                                    </span>
                                </td>

                                {{-- Formatted Date --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-500 text-[11px] font-medium">
                                    {{ $trx->created_at->translatedFormat('d M Y, H:i') }}
                                </td>

                                {{-- Status Badge --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    @if (($trx->status ?? 'selesai') === 'selesai')
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                            <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Selesai
                                        </span>
                                    @elseif(($trx->status ?? '') === 'void')
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-100">
                                            <span class="w-1 h-1 rounded-full bg-rose-400"></span> Void
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-100">
                                            <span class="w-1 h-1 rounded-full bg-amber-400"></span>
                                            {{ ucfirst($trx->status) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-5 py-12 text-center text-slate-400">
                                    <div class="text-3xl mb-2">🧾</div>
                                    <div class="font-semibold text-slate-700 text-sm">Belum Ada Transaksi</div>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Tidak ditemukan data transaksi untuk
                                        kriteria filter ini.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Compact Pagination Footer --}}
            @if ($transaksis->hasPages())
                <div class="px-5 py-3.5 border-t border-slate-100 bg-slate-50/40">
                    {{ $transaksis->appends(request()->query())->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
