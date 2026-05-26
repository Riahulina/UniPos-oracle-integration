@extends('layouts.super-admin')

@section('content')
    <div class="space-y-6 animate-fade-in">

        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-1 border-b border-slate-100">
            <div>
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Manajemen User</h2>
                <p class="text-slate-500 text-xs mt-0.5">Kelola hak akses, status, dan pantau seluruh pengguna platform
                    UniPOS.</p>
            </div>
        </div>

        {{-- Statistics Cards Widgets (Standardized Size) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div
                class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex items-center justify-between hover:shadow-md transition duration-200">
                <div class="space-y-0.5">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total Pengguna</p>
                    <h3 class="text-xl font-bold text-slate-800">{{ number_format($totalUser) }}</h3>
                </div>
                <div class="w-9 h-9 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-base">
                    👥
                </div>
            </div>

            <div
                class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex items-center justify-between hover:shadow-md transition duration-200">
                <div class="space-y-0.5">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Akun Nonaktif</p>
                    <h3 class="text-xl font-bold text-rose-600">{{ number_format($nonaktifUser) }}</h3>
                </div>
                <div class="w-9 h-9 bg-rose-50 text-rose-600 rounded-lg flex items-center justify-center text-base">
                    🚫
                </div>
            </div>

            <div
                class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm flex items-center justify-between hover:shadow-md transition duration-200 sm:col-span-2 lg:col-span-1">
                <div class="space-y-0.5">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Akun Aktif</p>
                    <h3 class="text-xl font-bold text-emerald-600">{{ number_format($totalUser - $nonaktifUser) }}</h3>
                </div>
                <div class="w-9 h-9 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center text-base">
                    ⚡
                </div>
            </div>
        </div>

        {{-- Normal & Clean Filter Form --}}
        <div class="bg-white p-3.5 rounded-xl border border-slate-100 shadow-sm">
            <form method="GET" action="{{ route('superadmin.user') }}" class="flex flex-col sm:flex-row gap-2.5">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama pengguna, email, atau instansi..."
                        class="w-full pl-9 pr-3 py-2 bg-slate-50/50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 placeholder:text-slate-400 transition h-[34px]">
                </div>

                <div class="flex gap-2 w-full sm:w-auto">
                    <button type="submit"
                        class="flex-1 sm:flex-initial px-5 py-2 bg-slate-900 text-white font-semibold rounded-lg text-xs hover:bg-slate-800 active:scale-[0.98] transition shadow-sm h-[34px]">
                        Cari Data
                    </button>
                    @if (request('search'))
                        <a href="{{ route('superadmin.user') }}"
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
                            <th class="px-5 py-3 text-left">Profil Pengguna</th>
                            <th class="px-5 py-3 text-left w-36">Hak Akses / Role</th>
                            <th class="px-5 py-3 text-left">Afiliasi Usaha</th>
                            <th class="px-5 py-3 text-left w-32">Status Akun</th>
                            <th class="px-5 py-3 text-left w-36">Tanggal Bergabung</th>
                            <th class="px-5 py-3 text-right w-32">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($users as $i => $user)
                            <tr class="hover:bg-slate-50/60 transition duration-100 group">
                                {{-- Index --}}
                                <td class="px-5 py-3 text-center text-slate-400 font-mono text-[11px]">
                                    {{ $users->firstItem() + $i }}
                                </td>

                                {{-- Profile Info with Compact Avatar --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <div class="flex items-center gap-2.5">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-slate-100 text-slate-700 font-bold text-xs flex items-center justify-center uppercase border border-slate-200/50 shadow-sm group-hover:scale-102 transition duration-150">
                                            {{ substr($user->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <div class="font-semibold text-slate-800 group-hover:text-blue-600 transition">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-[10px] text-slate-400 font-medium">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Role Badge --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <span
                                        class="inline-block px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border
                                        {{ $user->role === 'owner'
                                            ? 'bg-purple-50 text-purple-700 border-purple-100'
                                            : 'bg-indigo-50 text-indigo-700 border-indigo-100' }}">
                                        {{ $user->role ?? 'kasir' }}
                                    </span>
                                </td>

                                {{-- Usaha --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <div class="text-slate-700 font-medium">
                                        {{ $user->usaha->nama_usaha ?? '-' }}
                                    </div>
                                    @if (isset($user->usaha->nama_usaha))
                                        <span
                                            class="inline-block text-[9px] bg-slate-100 text-slate-400 px-1 rounded font-mono mt-0.5">Linked</span>
                                    @endif
                                </td>

                                {{-- Status Active --}}
                                <td class="px-5 py-3 whitespace-nowrap">
                                    @if ($user->status === 'aktif')
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                            <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Aktif
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-100">
                                            <span class="w-1 h-1 rounded-full bg-rose-400"></span> Suspend
                                        </span>
                                    @endif
                                </td>

                                {{-- Created At --}}
                                <td class="px-5 py-3 whitespace-nowrap text-slate-500 text-[11px] font-medium">
                                    {{ $user->created_at->translatedFormat('d M Y') }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-5 py-3 text-right whitespace-nowrap">
                                    <form action="{{ route('superadmin.user.toggle', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin mengubah status akses akun {{ $user->name }}?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg text-[11px] font-bold transition shadow-sm border cursor-pointer active:scale-95 h-7
                                            {{ $user->status === 'aktif'
                                                ? 'bg-rose-50 text-rose-600 border-rose-200 hover:bg-rose-600 hover:text-white hover:border-rose-600'
                                                : 'bg-emerald-50 text-emerald-600 border-emerald-200 hover:bg-emerald-600 hover:text-white hover:border-emerald-600' }}">
                                            {{ $user->status === 'aktif' ? 'Nonaktifkan' : 'Aktifkan Akun' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center text-slate-400">
                                    <div class="text-3xl mb-2">🔍</div>
                                    <div class="font-semibold text-slate-700 text-sm">Data User Tidak Ditemukan</div>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Sistem tidak menemukan kecocokan akun untuk
                                        kata kunci tersebut.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Compact Pagination Footer --}}
            @if ($users->hasPages())
                <div class="px-5 py-3.5 border-t border-slate-100 bg-slate-50/40">
                    {{ $users->appends(request()->query())->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
