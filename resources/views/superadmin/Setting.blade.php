@extends('layouts.super-admin')

@section('content')
    <div class="space-y-6">

        {{-- Header --}}
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Setting Usaha</h2>
            <p class="text-slate-500 mt-1">Konfigurasi setting dari setiap usaha</p>
        </div>

        {{-- Filter --}}
        <form method="GET" class="flex gap-3">
            <select name="usaha_id"
                class="px-4 py-2.5 border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
                <option value="">Semua Usaha</option>
                @foreach ($usahaList as $usaha)
                    <option value="{{ $usaha->id }}" {{ request('usaha_id') == $usaha->id ? 'selected' : '' }}>
                        {{ $usaha->nama_usaha }}
                    </option>
                @endforeach
            </select>
            <button type="submit"
                class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm hover:bg-blue-700 transition">
                Filter
            </button>
        </form>

        {{-- Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($settings as $setting)
                <div class="bg-white rounded-2xl shadow-sm border p-6 space-y-4">

                    {{-- Header card --}}
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="font-semibold text-slate-800 text-base">
                                {{ $setting->usaha->nama_usaha ?? 'Usaha #' . $setting->usaha_id }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-0.5">
                                {{ $setting->usaha->kode_usaha ?? '' }}
                            </p>
                        </div>
                        <span
                            class="px-3 py-1 rounded-full text-xs
                        {{ ($setting->usaha->status ?? '') === 'aktif' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                            {{ ucfirst($setting->usaha->status ?? 'pending') }}
                        </span>
                    </div>

                    <hr class="border-slate-100">

                    {{-- Setting detail --}}
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Nama Toko (Struk)</span>
                            <span class="text-slate-800 font-medium">{{ $setting->nama_toko ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Alamat</span>
                            <span class="text-slate-800 text-right max-w-[200px]">{{ $setting->alamat ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Mata Uang</span>
                            <span class="text-slate-800 font-medium">{{ $setting->mata_uang ?? 'IDR' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Pajak</span>
                            <span class="text-slate-800 font-medium">{{ $setting->pajak ?? 0 }}%</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Pesan Struk</span>
                            <span class="text-slate-600 italic text-xs text-right max-w-[200px]">
                                {{ $setting->pesan_struk ?? '-' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Fitur Absensi</span>
                            <span
                                class="font-medium {{ $setting->fitur_absensi ?? false ? 'text-emerald-600' : 'text-slate-400' }}">
                                {{ $setting->fitur_absensi ?? false ? '✓ Aktif' : '✕ Nonaktif' }}
                            </span>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="pt-2 text-xs text-slate-400 border-t">
                        Terakhir diupdate: {{ $setting->updated_at->format('d M Y H:i') }}
                    </div>

                </div>
            @empty
                <div class="col-span-2 bg-white rounded-2xl shadow-sm border p-12 text-center text-slate-400">
                    <div class="text-4xl mb-3">⚙️</div>
                    <div>Belum ada data setting usaha.</div>
                </div>
            @endforelse
        </div>

    </div>
@endsection
