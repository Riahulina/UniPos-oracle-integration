<!DOCTYPE html>
<html lang="id" style="height:100%;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniPOS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #6499E9;
            --sky: #9EDDFF;
            --aqua: #A6F6FF;
            --mint: #BEFFF7;
            --navy: #6499E9;
            --muted: #6b7a99;
            --surface: #f8faff;
            --white: #ffffff;
            --border: #e8eef8;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* ─── FULL HEIGHT FIX ─────────────────────────── */
        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: var(--surface);
            -webkit-font-smoothing: antialiased;
        }

        .app-shell {
            display: flex;
            height: 100vh;
            /* ← kunci utama */
            overflow: hidden;
            /* ← cegah scroll double */
        }

        /* ─── SIDEBAR ─────────────────────────────────── */
        .sidebar {
            width: 252px;
            flex-shrink: 0;
            background: var(--navy);
            display: flex;
            flex-direction: column;
            height: 100%;
            /* ← ikut tinggi app-shell */
            position: relative;
            overflow: hidden;
            z-index: 40;
        }

        /* Decorative blobs */
        .sidebar::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -60px;
            width: 220px;
            height: 220px;
            background: radial-gradient(circle, rgba(100, 153, 233, .18) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .sidebar::after {
            content: '';
            position: absolute;
            bottom: 80px;
            left: -60px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(190, 255, 247, .08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Top gradient accent */
        .sidebar-top-bar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--sky), var(--mint));
            z-index: 2;
        }

        /* Brand */
        .sb-brand {
            padding: 22px 20px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, .07);
            position: relative;
            z-index: 1;
            flex-shrink: 0;
            margin-top: 3px;
        }

        .sb-brand-icon {
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, var(--primary), var(--sky));
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .sb-logo-img {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .sb-brand-name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 19px;
            font-weight: 800;
            color: white;
            letter-spacing: -.4px;
            text-decoration: none;
        }

        .sb-brand-name span {
            color: var(--sky);
        }

        /* Usaha chip */
        .sb-usaha {
            margin: 14px 14px 0;
            background: rgba(100, 153, 233, .12);
            border: 1px solid rgba(158, 221, 255, .15);
            border-radius: 10px;
            padding: 9px 13px;
            position: relative;
            z-index: 1;
            flex-shrink: 0;
        }

        .sb-usaha-label {
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: rgba(158, 221, 255, .5);
            margin-bottom: 2px;
        }

        .sb-usaha-name {
            font-size: 13px;
            font-weight: 600;
            color: rgba(255, 255, 255, .85);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Nav */
        .sb-nav {
            flex: 1;
            /* ← ambil sisa ruang */
            padding: 14px 10px;
            overflow-y: auto;
            position: relative;
            z-index: 1;
        }

        .sb-nav::-webkit-scrollbar {
            width: 0;
        }

        .sb-section-label {
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: .10em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .25);
            padding: 0 10px;
            margin: 18px 0 6px;
        }

        .sb-section-label:first-child {
            margin-top: 4px;
        }

        .sb-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 11px;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 500;
            color: rgba(255, 255, 255, .5);
            text-decoration: none;
            transition: all .18s;
            margin-bottom: 2px;
            position: relative;
        }

        .sb-link:hover {
            background: rgba(255, 255, 255, .06);
            color: rgba(255, 255, 255, .88);
        }

        .sb-link.active {
            background: rgba(100, 153, 233, .22);
            color: white;
            font-weight: 600;
        }

        .sb-link.active::before {
            content: '';
            position: absolute;
            left: -2px;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            background: var(--sky);
            border-radius: 0 3px 3px 0;
        }

        .sb-link-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .06);
            transition: all .18s;
        }

        .sb-link:hover .sb-link-icon,
        .sb-link.active .sb-link-icon {
            background: rgba(100, 153, 233, .28);
        }

        /* Footer CTA */
        .sb-footer {
            padding: 14px;
            border-top: 1px solid rgba(255, 255, 255, .07);
            position: relative;
            z-index: 1;
            flex-shrink: 0;
        }

        .sb-trx-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 16px;
            background: var(--primary);
            color: white;
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all .2s;
            box-shadow: 0 4px 14px rgba(100, 153, 233, .3);
        }

        .sb-trx-btn:hover {
            background: #4f84d9;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(100, 153, 233, .4);
        }

        /* ─── MAIN AREA ───────────────────────────────── */
        .main-wrap {
            flex: 1;
            /* ← ambil sisa lebar */
            display: flex;
            flex-direction: column;
            min-width: 0;
            /* ← cegah overflow */
            height: 100%;
            /* ← ikut app-shell */
            overflow: hidden;
        }

        /* ─── TOPBAR ──────────────────────────────────── */
        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 28px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
            /* ← jangan ikut scroll */
            position: relative;
            z-index: 30;
        }

        /* Search */
        .search-wrap {
            position: relative;
        }

        .search-wrap svg {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--sky);
            pointer-events: none;
        }

        .search-input {
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 13px;
            color: var(--navy);
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 8px 14px 8px 34px;
            width: 260px;
            outline: none;
            transition: all .18s;
        }

        .search-input::placeholder {
            color: #b8c8e0;
        }

        .search-input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(100, 153, 233, .12);
        }

        /* Topbar right */
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .notif-btn {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            background: var(--surface);
            border: 1.5px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all .18s;
            position: relative;
        }

        .notif-btn:hover {
            border-color: var(--primary);
            background: #eef4ff;
        }

        .notif-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 16px;
            height: 16px;
            background: #ef4444;
            border-radius: 50%;
            border: 2px solid white;
            font-size: 9px;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-btn {
            display: flex;
            align-items: center;
            gap: 9px;
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 5px 12px 5px 5px;
            cursor: pointer;
            transition: all .18s;
        }

        .profile-btn:hover {
            border-color: var(--primary);
            background: #eef4ff;
        }

        .profile-avatar {
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, var(--primary), var(--sky));
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--navy);
        }

        .profile-chevron {
            color: var(--muted);
        }

        /* Dropdown */
        .profile-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            width: 260px;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 16px 48px rgba(26, 39, 68, .12);
            overflow: hidden;
            z-index: 50;
        }

        .profile-dropdown.open {
            display: block;
        }

        .dd-head {
            padding: 16px;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .dd-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--sky));
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .dd-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--navy);
        }

        .dd-email {
            font-size: 11.5px;
            color: var(--muted);
            margin-top: 1px;
        }

        .dd-info {
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
        }

        .dd-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 4px 0;
        }

        .dd-key {
            font-size: 11.5px;
            color: var(--muted);
            font-weight: 500;
        }

        .dd-val {
            font-size: 11.5px;
            color: var(--navy);
            font-weight: 600;
        }

        .dd-badge {
            font-size: 10px;
            font-weight: 700;
            padding: 2px 9px;
            border-radius: 100px;
            background: rgba(100, 153, 233, .1);
            color: var(--primary);
            letter-spacing: .04em;
        }

        .dd-footer {
            padding: 12px;
        }

        .logout-btn {
            width: 100%;
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 13px;
            font-weight: 600;
            padding: 9px;
            background: #fef2f2;
            color: #dc2626;
            border: 1.5px solid #fecaca;
            border-radius: 9px;
            cursor: pointer;
            transition: all .18s;
        }

        .logout-btn:hover {
            background: #dc2626;
            color: white;
            border-color: #dc2626;
        }

        /* ─── PAGE CONTENT ────────────────────────────── */
        .page-content {
            flex: 1;
            /* ← isi sisa tinggi */
            overflow-y: auto;
            /* ← scroll di sini, bukan body */
            padding: 28px;
            background: var(--surface);
        }

        /* ─── RESPONSIVE ──────────────────────────────── */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -252px;
                transition: left .25s;
            }

            .sidebar.open {
                left: 0;
            }

            .main-wrap {
                margin-left: 0;
            }

            .search-input {
                width: 180px;
            }
        }
    </style>
</head>

<body>
    <div class="app-shell">

        {{-- ════ SIDEBAR ════ --}}
        <aside class="sidebar">

            <div class="sidebar-top-bar"></div>

            {{-- Brand --}}
            <div class="sb-brand">
                @if (auth()->user()->usaha && auth()->user()->usaha->logo)
                    <img src="{{ asset('storage/logo_usaha/' . auth()->user()->usaha->logo) }}" class="sb-logo-img">
                @else
                    <div class="sb-brand-icon">⚡</div>
                @endif
                <a href="{{ route('welcome') }}" class="sb-brand-name">Uni<span>POS</span></a>
            </div>

            {{-- Usaha chip --}}
            @if (auth()->user()->usaha)
                <div class="sb-usaha">
                    <div class="sb-usaha-label">Usaha Aktif</div>
                    <div class="sb-usaha-name">{{ auth()->user()->usaha->nama_usaha ?? 'Nama Usaha' }}</div>
                </div>
            @endif

            {{-- Navigation --}}
            <nav class="sb-nav">

                <div class="sb-section-label">Menu Utama</div>

                <a href="{{ route('dashboard') }}"
                    class="sb-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <div class="sb-link-icon">📊</div> Dashboard
                </a>

                {{-- 💰 TRANSAKSI (POS / KASIR) --}}
                <a href="{{ route('transaksi.index') }}"
                    class="sb-link {{ request()->routeIs('transaksi.index') ? 'active' : '' }}">
                    <div class="sb-link-icon">💰</div> Transaksi
                </a>

                {{-- ⏳ PESANAN PENDING --}}
                <a href="{{ route('transaksi.pesanan') }}"
                    class="sb-link {{ request()->routeIs('transaksi.pesanan') ? 'active' : '' }}">
                    <div class="sb-link-icon">⏳</div> Pesanan Pending
                </a>

                {{-- 🧾 RIWAYAT LUNAS --}}
                <a href="{{ route('transaksi.riwayat') }}"
                    class="sb-link {{ request()->routeIs('transaksi.riwayat') ? 'active' : '' }}">
                    <div class="sb-link-icon">🧾</div> Riwayat Transaksi
                </a>

                <div class="sb-section-label">Data Master</div>

                <a href="{{ route('kategori.index') }}"
                    class="sb-link {{ request()->routeIs('kategori*') ? 'active' : '' }}">
                    <div class="sb-link-icon">📁</div> Kategori
                </a>

                <a href="{{ route('produk.index') }}"
                    class="sb-link {{ request()->routeIs('produk*') ? 'active' : '' }}">
                    <div class="sb-link-icon">📦</div> Produk
                </a>

                <a href="{{ route('barcode.index') }}"
                    class="sb-link {{ request()->routeIs('barcode*') ? 'active' : '' }}">
                    <div class="sb-link-icon">📁</div> Barcode
                </a>

                <div class="sb-section-label">Laporan & Sistem</div>

                <a href="{{ route('laporan') }}" class="sb-link {{ request()->routeIs('laporan') ? 'active' : '' }}">
                    <div class="sb-link-icon">📑</div> Laporan
                </a>
                <a href="{{ route('absensi.index') }}"
                    class="sb-link {{ request()->routeIs('absensi.*') ? 'active' : '' }}">

                    <div class="sb-link-icon">🕒</div>

                    Absensi

                </a>
                <a href="{{ route('karyawan.index') }}"
                    class="sb-link {{ request()->routeIs('karyawan.*') ? 'active' : '' }}">

                    <div class="sb-link-icon">👥</div>

                    Karyawan

                </a>

            </nav>

            {{-- CTA --}}
            <div class="sb-footer">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="sb-trx-btn">

                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">

                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />

                        </svg>

                        Keluar dari Akun

                    </button>

                </form>

            </div>

        </aside>

        {{-- ════ MAIN ════ --}}
        <div class="main-wrap">

            {{-- TOPBAR --}}
            <header class="topbar">

                <div class="search-wrap">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                    </svg>
                    <input type="text" placeholder="Cari produk, transaksi..." class="search-input">
                </div>

                <div class="topbar-right">



                    <div style="position:relative;">
                        <div class="profile-btn" onclick="toggleProfile()">
                            <div class="profile-avatar">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="profile-name">{{ auth()->user()->name }}</span>
                            <svg class="profile-chevron" width="12" height="12" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </div>

                        <div class="profile-dropdown" id="profileMenu">
                            <div class="dd-head">
                                <div class="dd-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                                <div>
                                    <div class="dd-name">{{ auth()->user()->name }}</div>
                                    <div class="dd-email">{{ auth()->user()->email }}</div>
                                </div>
                            </div>

                            <div class="dd-info">
                                <div class="dd-row">
                                    <span class="dd-key">Role</span>
                                    <span class="dd-badge">{{ ucfirst(auth()->user()->role) }}</span>
                                </div>
                                <div class="dd-row">
                                    <span class="dd-key">ID Usaha</span>
                                    <span class="dd-val">{{ auth()->user()->usaha_id }}</span>
                                </div>
                                <div class="dd-row">
                                    <span class="dd-key">Status</span>
                                    <span class="dd-val" style="color:#16a34a;">●
                                        {{ ucfirst(auth()->user()->status ?? 'aktif') }}</span>
                                </div>
                            </div>

                            <div class="dd-footer">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="logout-btn">Keluar dari Akun</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </header>

            {{-- PAGE CONTENT --}}
            <main class="page-content">
                {{ $slot }}
            </main>

        </div>

    </div>

    <script>
        function toggleProfile() {
            document.getElementById('profileMenu').classList.toggle('open');
        }
        document.addEventListener('click', function(e) {
            const menu = document.getElementById('profileMenu');
            if (!e.target.closest('.profile-btn') && !e.target.closest('#profileMenu')) {
                menu.classList.remove('open');
            }
        });
    </script>

</body>

</html>
