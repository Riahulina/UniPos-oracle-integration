<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin – UniPOS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #6499E9;
            --sky: #9EDDFF;
            --aqua: #A6F6FF;
            --mint: #BEFFF7;
            --navy: #1e3a8a;
            /* Menggunakan navy gelap untuk teks/ikon kontras tinggi */
            --muted: #6b7a99;
            --surface: #f8faff;
            --white: #ffffff;
            --border: #e8eef8;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--surface);
        }

        .mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Sidebar dengan perpaduan gradasi warna primary ke sky baru Anda */
        .sidebar {
            background: linear-gradient(160deg, #7eabf4 0%, #5d8bf8 60%, #8599f2 100%);
        }

        /* Navigasi item aktif yang senada dengan warna Mint & Aqua */
        .nav-item-active {
            background: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #ffffff;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(100, 153, 233, 0.15);
        }

        .nav-item-active .nav-icon {
            background: #BEFFF7;
            color: #6499E9;
        }

        /* Navigasi item saat diarahkan kursor (hover) */
        .nav-item {
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.25);
            color: #ffffff;
        }

        /* Efek teks bercahaya lembut pada logo */
        .logo-glow {
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.3);
        }

        /* Kustomisasi scrollbar internal milik navigasi sidebar */
        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }

        /* Area utama konten berlatar belakang surface senada */
        .main-content {
            background: var(--surface);
            background-image:
                radial-gradient(circle at 20% 0%, rgba(100, 153, 233, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 100%, rgba(158, 221, 255, 0.05) 0%, transparent 50%);
        }

        /* Header atas (Topbar) */
        .topbar {
            background: rgba(248, 250, 255, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        /* Desain toast sukses */
        .toast-success {
            background: linear-gradient(135deg, #e8f7f0, #f2fbf7);
            border-left: 4px solid #22c55e;
        }

        /* Animasi penunjuk status aktif */
        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.6;
                transform: scale(1.2.5);
            }
        }

        .pulse-dot {
            animation: pulse-dot 2s ease-in-out infinite;
        }

        /* Animasi transisi halaman masuk */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp 0.3s ease forwards;
        }
    </style>
</head>

<body class="text-slate-900">

    <div class="flex min-h-screen">

        {{-- ═══════════════════════════════════════ --}}
        {{-- SIDEBAR --}}
        {{-- ═══════════════════════════════════════ --}}
        <aside class="sidebar w-64 flex flex-col fixed h-full z-20 shadow-xl border-r border-white/10">

            {{-- Logo Perusahaan --}}
            <div class="px-6 py-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-white flex items-center justify-center shadow-md">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6499E9"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <path d="M16 10a4 4 0 0 1-8 0" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-white font-extrabold text-xl leading-none logo-glow tracking-wide">UniPOS</h1>
                        <p class="text-white/80 text-[10px] font-bold mt-1 uppercase tracking-wider mono">super admin
                        </p>
                    </div>
                </div>
            </div>

            {{-- Profil Singkat Pengguna --}}
            <div class="px-4 py-3 mx-3 mt-4 rounded-xl bg-white/15 border border-white/10 shadow-inner">
                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-[#6499E9] text-xs font-bold shadow-sm">
                        {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-xs font-bold truncate">{{ auth()->user()->name ?? 'Super Admin' }}</p>
                        <p class="text-white/70 text-[11px] truncate mt-0.5">
                            {{ auth()->user()->email ?? 'admin@unipos.com' }}</p>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-emerald-300 pulse-dot flex-shrink-0"></div>
                </div>
            </div>

            {{-- Navigasi Menu Utama --}}
            <nav class="flex-1 px-3 py-5 space-y-1 sidebar-nav overflow-y-auto">

                <p class="text-white/60 text-[10px] font-bold px-3 pb-2.5 uppercase tracking-widest">Menu Utama</p>

                @php
                    $currentRoute = Route::currentRouteName();
                    $navItems = [
                        [
                            'route' => 'superadmin.dashboard',
                            'label' => 'Dashboard',
                            'svg' =>
                                '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
                        ],
                        [
                            'route' => 'superadmin.usaha',
                            'label' => 'Data Usaha',
                            'svg' =>
                                '<path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z"/><path d="M3 9V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v2"/><line x1="12" y1="12" x2="12" y2="19"/>',
                        ],
                        [
                            'route' => 'superadmin.user',
                            'label' => 'Data User',
                            'svg' =>
                                '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
                        ],
                        [
                            'route' => 'superadmin.produk',
                            'label' => 'Produk',
                            'svg' =>
                                '<line x1="16.5" y1="9.4" x2="7.5" y2="4.21"/><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/>',
                        ],
                        [
                            'route' => 'superadmin.transaksi',
                            'label' => 'Transaksi',
                            'svg' =>
                                '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>',
                        ],
                        [
                            'route' => 'superadmin.stoklog',
                            'label' => 'Stok Log',
                            'svg' =>
                                '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/>',
                        ],
                        [
                            'route' => 'superadmin.absensi',
                            'label' => 'Absensi',
                            'svg' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
                        ],
                    ];
                @endphp

                @foreach ($navItems as $item)
                    @php $isActive = $currentRoute === $item['route']; @endphp
                    <a href="{{ route($item['route']) }}"
                        class="nav-item {{ $isActive ? 'nav-item-active' : 'text-white/85' }} flex items-center gap-3 px-3 py-2.5 rounded-xl">
                        <div
                            class="nav-icon w-7 h-7 rounded-lg {{ $isActive ? '' : 'bg-white/10 text-white' }} flex items-center justify-center flex-shrink-0 transition-all">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                {!! $item['svg'] !!}
                            </svg>
                        </div>
                        <span class="text-[13.5px] font-medium tracking-wide">{{ $item['label'] }}</span>
                        @if ($isActive)
                            <div class="ml-auto w-2 h-2 rounded-full bg(#BEFFF7) shadow"
                                style="background-color: var(--mint);"></div>
                        @endif
                    </a>
                @endforeach

            </nav>

            {{-- Bagian Tombol Keluar --}}
            <div class="p-3 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="nav-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-rose-100 hover:text-white hover:bg-rose-500/20 transition-all">
                        <div class="w-7 h-7 rounded-lg bg-rose-500/20 text-rose-200 flex items-center justify-center">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <polyline points="16 17 21 12 16 7" />
                                <line x1="21" y1="12" x2="9" y2="12" />
                            </svg>
                        </div>
                        <span class="text-[13.5px] font-medium tracking-wide">Keluar Sistem</span>
                    </button>
                </form>
            </div>

        </aside>

        {{-- ═══════════════════════════════════════ --}}
        {{-- MAIN CONTENT AREA --}}
        {{-- ═══════════════════════════════════════ --}}
        <div class="flex-1 flex flex-col ml-64">

            {{-- Top bar --}}
            <header class="topbar sticky top-0 z-10 px-8 py-4 flex items-center justify-between">

                {{-- Judul Dinamis Halaman --}}
                <div>
                    @php
                        $pageTitles = [
                            'superadmin.dashboard' => [
                                'Dashboard Utama',
                                'Ringkasan performa dan metrik sistem UniPOS',
                            ],
                            'superadmin.usaha' => ['Data Usaha Mitra', 'Manajemen data seluruh partner usaha dagang'],
                            'superadmin.user' => ['Pengaturan Pengguna', 'Kelola semua hak akses dan akun pengguna'],
                            'superadmin.produk' => [
                                'Katalog Produk global',
                                'Semua daftar komoditas dari seluruh entitas usaha',
                            ],
                            'superadmin.transaksi' => [
                                'Arsip Transaksi',
                                'Konsolidasi riwayat penjualan seluruh cabang',
                            ],
                            'superadmin.stoklog' => [
                                'Log Mutasi Stok',
                                'Audit trail perubahan jumlah inventori produk',
                            ],
                            'superadmin.absensi' => ['Monitor Absensi', 'Presensi dan catatan kehadiran tim kerja'],
                        ];
                        $pageInfo = $pageTitles[Route::currentRouteName()] ?? [
                            'Halaman Panel',
                            'Sistem Manajemen Terpadu UniPOS',
                        ];
                    @endphp
                    <h2 class="text-slate-800 font-extrabold text-lg tracking-tight leading-none">{{ $pageInfo[0] }}
                    </h2>
                    <p class="text-slate-400 text-xs mt-1.5 font-medium">{{ $pageInfo[1] }}</p>
                </div>

                {{-- Sisi Kanan Atas (Waktu & Profil) --}}
                <div class="flex items-center gap-4">
                    {{-- Informasi Waktu Server --}}
                    <div class="text-right hidden md:block">
                        <p class="text-slate-700 text-xs font-bold uppercase tracking-wider">
                            {{ now()->translatedFormat('l') }}</p>
                        <p class="text-[#6499E9] text-[11px] font-bold mt-0.5 mono">{{ now()->format('d M Y') }}</p>
                    </div>

                    {{-- Avatar Ringkas --}}
                    <div
                        class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#6499E9] to-blue-600 flex items-center justify-center text-white text-sm font-bold shadow-sm">
                        {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
                    </div>
                </div>

            </header>

            {{-- Konten Utama Internal --}}
            <main class="main-content flex-1 p-8">

                {{-- Notifikasi Sukses (Toast) --}}
                @if (session('success'))
                    <div class="toast-success mb-6 px-5 py-3.5 rounded-2xl flex items-center gap-3 shadow-sm fade-up">
                        <div class="w-7 h-7 rounded-lg bg-emerald-500 flex items-center justify-center flex-shrink-0">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white"
                                stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                        </div>
                        <p class="text-emerald-800 text-xs font-semibold">{{ session('success') }}</p>
                    </div>
                @endif

                {{-- Notifikasi Error (Toast) --}}
                @if (session('error'))
                    <div
                        class="mb-6 px-5 py-3.5 rounded-2xl flex items-center gap-3 shadow-sm fade-up bg-rose-50 border-l-4 border-rose-500">
                        <div class="w-7 h-7 rounded-lg bg-rose-500 flex items-center justify-center flex-shrink-0">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white"
                                stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </div>
                        <p class="text-rose-800 text-xs font-semibold">{{ session('error') }}</p>
                    </div>
                @endif

                {{-- Inject Konten Halaman --}}
                <div class="fade-up">
                    @yield('content')
                </div>

            </main>

        </div>

    </div>

</body>

</html>
