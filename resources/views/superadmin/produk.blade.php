@extends('layouts.super-admin')

@section('content')
    <div class="space-y-6 animate-fade-in">

        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-1 border-b border-slate-100">
            <div>
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Katalog Produk Global</h2>
                <p class="text-slate-500 text-xs mt-0.5">Pantau, filter, dan awasi ketersediaan komoditas barang dari seluruh
                    mitra usaha.</p>
            </div>
            <div class="flex items-center">
                <span
                    class="px-3 py-1.5 bg-blue-50 text-blue-700 border border-blue-100 rounded-xl text-xs font-semibold shadow-sm">
                    📦 Total {{ number_format($totalProduk) }} SKU Produk
                </span>
            </div>
        </div>

        {{-- Statistics Cards Widgets (Standardized Size) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div
                class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex items-center justify-between hover:shadow-md transition duration-200">
                <div class="space-y-0.5">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total Jenis SKU</p>
                    <h3 class="text-xl font-bold text-slate-800">{{ number_format($totalProduk) }}</h3>
                </div>
                <div class="w-9 h-9 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-base">
                    📦
                </div>
            </div>

            <div
                class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex items-center justify-between hover:shadow-md transition duration-200">
                <div class="space-y-0.5">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Stok Kritis (≤ 5)</p>
                    <h3 class="text-xl font-bold text-amber-600">
                        {{ $produks->getCollection()->where('stok', '<=', 5)->count() }}
                    </h3>
                </div>
                <div class="w-9 h-9 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center text-base">
                    ⚠️
                </div>
            </div>

            <div
                class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex items-center justify-between hover:shadow-md transition duration-200 sm:col-span-2 lg:col-span-1">
                <div class="space-y-0.5">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Mitra Terdaftar</p>
                    <h3 class="text-xl font-bold text-indigo-600">{{ count($usahaList) }}</h3>
                </div>
                <div class="w-9 h-9 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-base">
                    🏢
                </div>
            </div>
        </div>

        {{-- Normal & Clean Filter Form --}}
        <div class="bg-white p-3.5 rounded-xl border border-slate-100 shadow-sm">
            <form method="GET" action="{{ route('superadmin.produk') }}"
                class="grid grid-cols-1 md:grid-cols-4 gap-2.5 items-end">
                <div class="space-y-1 md:col-span-2 class-relative">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Pencarian</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama produk atau kode SKU..."
                            class="w-full pl-9 pr-3 py-2 bg-slate-50/50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 placeholder:text-slate-400 transition">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Filter Unit Usaha</label>
                    <select name="usaha_id"
                        class="w-full px-3 py-2 bg-slate-50/50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-slate-700 transition cursor-pointer">
                        <option value="">Semua Unit Usaha</option>
                        @foreach ($usahaList as $usaha)
                            <option value="{{ $usaha->id }}" {{ request('usaha_id') == $usaha->id ? 'selected' : '' }}>
                                {{ $usaha->nama_usaha }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="flex-1 px-4 py-2 bg-slate-900 text-white font-semibold rounded-lg text-xs hover:bg-slate-800 active:scale-[0.98] transition shadow-sm h-[34px]">
                        Terapkan Filter
                    </button>
                    @if (request('search') || request('usaha_id'))
                        <a href="{{ route('superadmin.produk') }}"
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
                            <th class="px-5 py-3 text-center w-12">#</th>
                            <th class="px-5 py-3 text-left">Detail Komoditas</th>
                            <th class="px-5 py-3 text-left">Klasifikasi Kategori</th>
                            <th class="px-5 py-3 text-left">Kepemilikan Usaha</th>
                            <th class="px-5 py-3 text-left w-28">Harga Pokok (Beli)</th>
                            <th class="px-5 py-3 text-left w-28">Harga Pasar (Jual)</th>
                            <th class="px-5 py-3 text-left w-28">Ketersediaan Stok</th>
                            <th class="px-5 py-3 text-left w-24">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($produks as $i => $produk)
                            <tr class="hover:bg-slate-50/60 transition duration-100 group">
                                {{-- Index --}}
                                <td class="px-5 py-3 text-center text-slate-400 font-mono text-[11px]">
                                    {{ $produks->firstItem() + $i }}
                                </td>

                                {{-- Product Info --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-slate-800 group-hover:text-blue-600 transition">
                                        {{ $produk->nama_produk }}
                                    </div>
                                    @if ($produk->kode_produk)
                                        <div class="text-[10px] font-mono text-slate-400 tracking-wider mt-0.5">
                                            {{ $produk->kode_produk }}
                                        </div>
                                    @else
                                        <div class="text-[10px] italic text-slate-300 mt-0.5">Tanpa Barcode/SKU</div>
                                    @endif
                                </td>

                                {{-- Category --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-600 font-medium">
                                    {{ $produk->kategori->nama_kategori ?? 'Umum / Lainnya' }}
                                </td>

                                {{-- Enterprise Affiliation --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <span
                                        class="inline-block px-2 py-0.5 bg-blue-50/60 text-blue-700 border border-blue-100/50 rounded text-[11px] font-medium">
                                        {{ $produk->usaha->nama_usaha ?? '-' }}
                                    </span>
                                </td>

                                {{-- Buying Price --}}
                                <td class="px-5 py-3 whitespace-nowrap font-mono text-slate-500 text-[11px]">
                                    Rp{{ number_format($produk->harga_beli ?? 0, 0, ',', '.') }}
                                </td>

                                {{-- Selling Price --}}
                                <td class="px-5 py-3 whitespace-nowrap font-mono font-semibold text-slate-800">
                                    Rp{{ number_format($produk->harga_jual, 0, ',', '.') }}
                                </td>

                                {{-- Stock Level --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <div class="flex items-center gap-1.5">
                                        <span class="font-mono font-bold text-slate-800">
                                            {{ number_format($produk->stok) }}
                                        </span>
                                        @if ($produk->stok <= 5)
                                            <span
                                                class="inline-flex items-center px-1 py-0.2 rounded text-[9px] font-bold uppercase tracking-wide bg-rose-50 text-rose-600 border border-rose-100 animate-pulse">
                                                Kritis
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                {{-- Status --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    @if ($produk->is_aktif ?? true)
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100/60">
                                            <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Tersedia
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-medium bg-slate-100 text-slate-500 border border-slate-200/50">
                                            <span class="w-1 h-1 rounded-full bg-slate-400"></span> Arsip
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-5 py-12 text-center text-slate-400">
                                    <div class="text-3xl mb-2">🔍</div>
                                    <div class="font-semibold text-slate-700 text-sm">Katalog Produk Kosong</div>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Tidak ditemukan data produk yang cocok
                                        dengan filter.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Compact Pagination Footer --}}
            @if ($produks->hasPages())
                <div class="px-5 py-3.5 border-t border-slate-100 bg-slate-50/40">
                    {{ $produks->appends(request()->query())->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
