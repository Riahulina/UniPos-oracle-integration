@extends('layouts.super-admin')

@section('content')
    <div class="space-y-8">

        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

            {{-- Total Usaha --}}
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-start justify-between group hover:shadow-md transition-shadow">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Total Usaha</p>
                    <h3 class="text-4xl font-bold mt-2 text-slate-800">{{ $totalUsaha }}</h3>
                    <p class="text-xs text-slate-400 mt-2">Terdaftar di UniPOS</p>
                </div>
                <div
                    class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z" />
                        <path d="M3 9V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v2" />
                        <line x1="12" y1="12" x2="12" y2="19" />
                    </svg>
                </div>
            </div>

            {{-- Usaha Pending --}}
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-start justify-between group hover:shadow-md transition-shadow">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Usaha Pending</p>
                    <h3 class="text-4xl font-bold mt-2 text-amber-500">{{ $pendingUsaha }}</h3>
                    <p class="text-xs text-slate-400 mt-2">Menunggu persetujuan</p>
                </div>
                <div
                    class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center group-hover:bg-amber-100 transition-colors">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f59e0b"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                </div>
            </div>

            {{-- Total User --}}
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-start justify-between group hover:shadow-md transition-shadow">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Total User</p>
                    <h3 class="text-4xl font-bold mt-2 text-slate-800">{{ $totalUser }}</h3>
                    <p class="text-xs text-slate-400 mt-2">Seluruh pengguna</p>
                </div>
                <div
                    class="w-12 h-12 rounded-2xl bg-violet-50 flex items-center justify-center group-hover:bg-violet-100 transition-colors">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
            </div>

            {{-- User Nonaktif --}}
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-start justify-between group hover:shadow-md transition-shadow">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest">User Nonaktif</p>
                    <h3 class="text-4xl font-bold mt-2 text-rose-500">{{ $pendingUser }}</h3>
                    <p class="text-xs text-slate-400 mt-2">Akun dinonaktifkan</p>
                </div>
                <div
                    class="w-12 h-12 rounded-2xl bg-rose-50 flex items-center justify-center group-hover:bg-rose-100 transition-colors">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ef4444"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <line x1="23" y1="11" x2="17" y2="11" />
                    </svg>
                </div>
            </div>

        </div>

        {{-- Stat kecil baris 2 --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 gap-4">
            @php
                $miniStats = [
                    ['label' => 'Produk', 'value' => $totalProduk, 'color' => 'text-blue-600', 'bg' => 'bg-blue-50'],
                    [
                        'label' => 'Kategori',
                        'value' => $totalKategori,
                        'color' => 'text-violet-600',
                        'bg' => 'bg-violet-50',
                    ],
                    [
                        'label' => 'Transaksi',
                        'value' => $totalTransaksi,
                        'color' => 'text-emerald-600',
                        'bg' => 'bg-emerald-50',
                    ],
                    [
                        'label' => 'Detail Trx',
                        'value' => $totalDetail,
                        'color' => 'text-teal-600',
                        'bg' => 'bg-teal-50',
                    ],
                    [
                        'label' => 'Stok Log',
                        'value' => $totalStokLog,
                        'color' => 'text-orange-600',
                        'bg' => 'bg-orange-50',
                    ],
                    ['label' => 'Absensi', 'value' => $totalAbsensi, 'color' => 'text-pink-600', 'bg' => 'bg-pink-50'],
                ];
            @endphp

            @foreach ($miniStats as $stat)
                <div class="bg-white rounded-xl p-4 shadow-sm border border-slate-100 text-center">
                    <p class="text-xs text-slate-400 font-medium">{{ $stat['label'] }}</p>
                    <p class="text-2xl font-bold {{ $stat['color'] }} mt-1">{{ number_format($stat['value']) }}</p>
                </div>
            @endforeach
        </div>

        {{-- Pending Usaha Table --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">

            <div class="px-6 py-5 flex items-center justify-between border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-amber-50 flex items-center justify-center">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#f59e0b"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 text-sm">Usaha Menunggu Approval</h3>
                        <p class="text-xs text-slate-400">{{ $usahaPending->count() }} usaha perlu ditinjau</p>
                    </div>
                </div>
                <a href="{{ route('superadmin.usaha') }}?status=pending"
                    class="text-xs text-blue-600 hover:text-blue-700 font-medium flex items-center gap-1">
                    Lihat semua
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-slate-400 text-xs font-semibold uppercase tracking-wider bg-slate-50/60">
                            <th class="px-6 py-3">Kode</th>
                            <th class="px-6 py-3">Nama Usaha</th>
                            <th class="px-6 py-3">Telepon</th>
                            <th class="px-6 py-3">Daftar</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usahaPending as $usaha)
                            <tr class="border-t border-slate-50 hover:bg-slate-50/70 transition-colors">

                                <td class="px-6 py-4">
                                    <span class="font-mono text-xs text-slate-500 bg-slate-100 px-2 py-1 rounded-lg">
                                        {{ $usaha->kode_usaha }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <p class="font-semibold text-slate-800">{{ $usaha->nama_usaha }}</p>
                                    <p class="text-xs text-slate-400 mt-0.5">{{ $usaha->alamat ?? 'Alamat belum diisi' }}
                                    </p>
                                </td>

                                <td class="px-6 py-4 text-slate-600 text-sm">
                                    {{ $usaha->telp }}
                                </td>

                                <td class="px-6 py-4 text-slate-400 text-xs">
                                    {{ $usaha->created_at->format('d M Y') }}<br>
                                    <span class="text-slate-300">{{ $usaha->created_at->diffForHumans() }}</span>
                                </td>

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Pending
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">

                                        {{-- Approve --}}
                                        <form action="{{ route('superadmin.usaha.approve', $usaha->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-medium transition-colors">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12" />
                                                </svg>
                                                Approve
                                            </button>
                                        </form>

                                        {{-- WhatsApp --}}
                                        @php
                                            $phone = preg_replace(
                                                '/^0/',
                                                '62',
                                                preg_replace('/[^0-9]/', '', $usaha->telp),
                                            );
                                            $msg = "Halo *{$usaha->nama_usaha}*! 👋\n\nKami dari UniPOS ingin mengkonfirmasi pendaftaran usaha Anda.\n\nMohon balas pesan ini untuk informasi lebih lanjut.";
                                        @endphp
                                        <a href="https://wa.me/{{ $phone }}?text={{ urlencode($msg) }}"
                                            target="_blank"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-500 hover:bg-green-600 text-white text-xs font-medium transition-colors">
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                                            </svg>
                                            WA
                                        </a>

                                        {{-- Tolak --}}
                                        <form action="{{ route('superadmin.usaha.reject', $usaha->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menolak usaha {{ $usaha->nama_usaha }}?')">
                                            @csrf
                                            @method('PUT')
                                            <button
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-rose-100 text-slate-500 hover:text-rose-600 text-xs font-medium transition-colors">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <line x1="18" y1="6" x2="6" y2="18" />
                                                    <line x1="6" y1="6" x2="18" y2="18" />
                                                </svg>
                                                Tolak
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div
                                        class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center mx-auto mb-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </div>
                                    <p class="text-slate-500 font-medium text-sm">Semua beres!</p>
                                    <p class="text-slate-400 text-xs mt-1">Tidak ada usaha yang menunggu approval.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
