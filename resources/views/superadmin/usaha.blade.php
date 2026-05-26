@extends('layouts.super-admin')

@section('content')
    <div class="space-y-6">

        {{-- Header --}}
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Data Usaha</h2>
                <p class="text-slate-400 text-sm mt-1">Kelola dan tinjau semua usaha yang terdaftar di UniPOS</p>
            </div>
            <div class="flex gap-3">
                <span
                    class="inline-flex items-center gap-1.5 px-4 py-2 bg-amber-50 text-amber-700 rounded-xl text-xs font-semibold border border-amber-100">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                    {{ $usahaPending->count() }} Pending
                </span>
                <span
                    class="inline-flex items-center gap-1.5 px-4 py-2 bg-emerald-50 text-emerald-700 rounded-xl text-xs font-semibold border border-emerald-100">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    {{ $usahaAktif->count() }} Aktif
                </span>
            </div>
        </div>

        {{-- Filter Tab & Search --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200">
            <div class="flex gap-1 overflow-x-auto no-scrollbar">
                <a href="?status=all"
                    class="px-5 py-3 text-sm font-medium border-b-2 transition-all whitespace-nowrap
                {{ request('status', 'all') === 'all' ? 'border-blue-600 text-blue-600 font-semibold' : 'border-transparent text-slate-400 hover:text-slate-600' }}">
                    Semua <span
                        class="ml-1 px-2 py-0.5 text-xs rounded-md {{ request('status', 'all') === 'all' ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-500' }}">{{ $totalUsaha }}</span>
                </a>
                <a href="?status=pending"
                    class="px-5 py-3 text-sm font-medium border-b-2 transition-all whitespace-nowrap
                {{ request('status') === 'pending' ? 'border-blue-600 text-blue-600 font-semibold' : 'border-transparent text-slate-400 hover:text-slate-600' }}">
                    Pending <span
                        class="ml-1 px-2 py-0.5 text-xs rounded-md {{ request('status') === 'pending' ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-500' }}">{{ $usahaPending->count() }}</span>
                </a>
                <a href="?status=aktif"
                    class="px-5 py-3 text-sm font-medium border-b-2 transition-all whitespace-nowrap
                {{ request('status') === 'aktif' ? 'border-blue-600 text-blue-600 font-semibold' : 'border-transparent text-slate-400 hover:text-slate-600' }}">
                    Aktif <span
                        class="ml-1 px-2 py-0.5 text-xs rounded-md {{ request('status') === 'aktif' ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-500' }}">{{ $usahaAktif->count() }}</span>
                </a>
                <a href="?status=ditolak"
                    class="px-5 py-3 text-sm font-medium border-b-2 transition-all whitespace-nowrap
                {{ request('status') === 'ditolak' ? 'border-blue-600 text-blue-600 font-semibold' : 'border-transparent text-slate-400 hover:text-slate-600' }}">
                    Ditolak
                </a>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr
                            class="text-left text-slate-400 text-xs font-semibold uppercase tracking-wider bg-slate-50/60 border-b border-slate-100">
                            <th class="px-6 py-4">Kode</th>
                            <th class="px-6 py-4">Nama Usaha</th>
                            <th class="px-6 py-4">Telepon</th>
                            <th class="px-6 py-4">Daftar</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($usahaList as $usaha)
                            <tr class="hover:bg-slate-50/70 transition-colors group">

                                {{-- Kode Usaha --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="font-mono text-xs text-slate-500 bg-slate-100 group-hover:bg-slate-200/80 transition-colors px-2.5 py-1 rounded-lg border border-slate-200/50">
                                        {{ $usaha->kode_usaha }}
                                    </span>
                                </td>

                                {{-- Nama & Alamat --}}
                                <td class="px-6 py-4">
                                    <div
                                        class="font-semibold text-slate-800 text-base group-hover:text-blue-600 transition-colors">
                                        {{ $usaha->nama_usaha }}</div>
                                    <div class="text-xs text-slate-400 mt-1 max-w-xs truncate"
                                        title="{{ $usaha->alamat }}">{{ $usaha->alamat ?? 'Alamat belum diisi' }}</div>
                                </td>

                                {{-- No Telp --}}
                                <td class="px-6 py-4 text-slate-600 font-medium whitespace-nowrap">
                                    {{ $usaha->telp }}
                                </td>

                                {{-- Tanggal Daftar --}}
                                <td class="px-6 py-4 whitespace-nowrap text-slate-400 text-xs">
                                    <span
                                        class="font-medium text-slate-600">{{ $usaha->created_at->format('d M Y') }}</span>
                                    <div class="text-slate-300 mt-0.5">{{ $usaha->created_at->diffForHumans() }}</div>
                                </td>

                                {{-- Status Badge --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($usaha->status === 'aktif')
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Aktif
                                        </span>
                                    @elseif($usaha->status === 'pending')
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                            Pending
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-rose-50 text-rose-700 border border-rose-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                            Ditolak
                                        </span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex items-center justify-end gap-2">

                                        {{-- Approve --}}
                                        @if ($usaha->status === 'pending')
                                            <form action="{{ route('superadmin.usaha.approve', $usaha->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-medium shadow-sm shadow-emerald-200 transition-all transform active:scale-95">
                                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12" />
                                                    </svg>
                                                    Approve
                                                </button>
                                            </form>

                                            <form action="{{ route('superadmin.usaha.reject', $usaha->id) }}"
                                                method="POST" onsubmit="return confirm('Yakin tolak usaha ini?')">
                                                @csrf
                                                @method('PUT')
                                                <button
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-rose-50 text-slate-500 hover:text-rose-600 border border-slate-200/60 text-xs font-medium transition-all transform active:scale-95">
                                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <line x1="18" y1="6" x2="6" y2="18" />
                                                        <line x1="6" y1="6" x2="18" y2="18" />
                                                    </svg>
                                                    Tolak
                                                </button>
                                            </form>
                                        @endif

                                        {{-- Kirim link login via WA --}}
                                        @if ($usaha->status === 'aktif')
                                            @php
                                                $loginLink = route('usaha.login', ['kode' => $usaha->kode_usaha]);
                                                $waMsg = "Halo *{$usaha->nama_usaha}*! 🎉\n\nUsaha Anda telah disetujui di UniPOS.\n\nSilakan login melalui link berikut:\n{$loginLink}\n\nKode usaha Anda: *{$usaha->kode_usaha}*\n\nTerima kasih!";
                                                $phone = preg_replace('/[^0-9]/', '', $usaha->telp);
                                                $phone = preg_replace('/^0/', '62', $phone);
                                            @endphp
                                            <a href="https://wa.me/{{ $phone }}?text={{ urlencode($waMsg) }}"
                                                target="_blank"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-500 hover:bg-green-600 text-white text-xs font-medium shadow-sm shadow-green-200 transition-all transform active:scale-95">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                                                </svg>
                                                Kirim Link
                                            </a>
                                        @endif

                                        {{-- Chat WA Biasa --}}
                                        @php
                                            $phone2 = preg_replace('/[^0-9]/', '', $usaha->telp);
                                            $phone2 = preg_replace('/^0/', '62', $phone2);
                                        @endphp
                                        <a href="https://wa.me/{{ $phone2 }}" target="_blank"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-50 hover:bg-slate-100 text-slate-600 border border-slate-200 text-xs font-medium transition-colors">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"
                                                class="text-green-500">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                                            </svg>
                                            WA
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div
                                        class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center mx-auto mb-4 border border-slate-100">
                                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                            stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z" />
                                            <path d="M3 9V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v2" />
                                        </svg>
                                    </div>
                                    <p class="text-slate-500 font-semibold text-base">Tidak Ada Data Usaha</p>
                                    <p class="text-slate-400 text-xs mt-1 max-w-xs mx-auto">Data usaha dengan status yang
                                        Anda pilih saat ini tidak ditemukan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($usahaList->hasPages())
                <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
                    {{ $usahaList->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
