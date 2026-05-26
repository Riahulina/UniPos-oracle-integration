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
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&family=Figtree:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #6499E9;
            --sky: #9EDDFF;
            --aqua: #A6F6FF;
            --mint: #BEFFF7;
            --navy: #1a2c5e;
            --muted: #6b7a99;
            --surface: #f0f5ff;
            --white: #ffffff;
            --border: #e2eaf6;

            /* Sidebar biru muda terang — sesuai gambar */
            --sb-from: #8ab4f8;
            --sb-to: #6499E9;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Figtree', system-ui, sans-serif;
            background: var(--surface);
            -webkit-font-smoothing: antialiased;
        }

        /* ── SHELL ─────────────────────────── */
        .app-shell {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* ══════════════════════════════════════
           SIDEBAR
        ══════════════════════════════════════ */
        .sidebar {
            width: 260px;
            flex-shrink: 0;
            /* Biru muda terang persis seperti di gambar */
            background: linear-gradient(170deg, #92baf9 0%, #7aabf5 35%, #6499E9 100%);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
            overflow: hidden;
            z-index: 40;
            box-shadow: 4px 0 20px rgba(100, 153, 233, .2);
        }

        /* Subtle dot texture */
        .sidebar::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(255, 255, 255, .06) 1px, transparent 1px);
            background-size: 18px 18px;
            pointer-events: none;
        }

        /* Top accent strip */
        .sidebar-top-bar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, rgba(255, 255, 255, .9), var(--aqua), var(--mint));
            z-index: 2;
        }

        /* ── Brand ─────────────────────────── */
        .sb-brand {
            padding: 22px 18px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, .2);
            position: relative;
            z-index: 1;
            flex-shrink: 0;
            margin-top: 3px;
        }

        .sb-brand-icon {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .12);
        }

        .sb-logo-img {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            object-fit: cover;
            flex-shrink: 0;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .12);
        }

        .sb-brand-text {
            display: flex;
            flex-direction: column;
        }

        .sb-brand-name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 20px;
            font-weight: 800;
            color: white;
            letter-spacing: -.4px;
            line-height: 1;
            text-decoration: none;
            text-shadow: 0 1px 6px rgba(0, 0, 0, .1);
        }

        .sb-brand-tag {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .65);
            margin-top: 3px;
        }

        /* ── Usaha chip ────────────────────── */
        .sb-usaha {
            margin: 12px 14px 0;
            background: rgba(255, 255, 255, .18);
            border: 1px solid rgba(255, 255, 255, .3);
            border-radius: 12px;
            padding: 10px 13px;
            position: relative;
            z-index: 1;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sb-usaha-dot {
            width: 8px;
            height: 8px;
            background: #4ade80;
            border-radius: 50%;
            flex-shrink: 0;
            box-shadow: 0 0 0 3px rgba(74, 222, 128, .25);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                box-shadow: 0 0 0 3px rgba(74, 222, 128, .25);
            }

            50% {
                box-shadow: 0 0 0 6px rgba(74, 222, 128, .08);
            }
        }

        .sb-usaha-info {
            min-width: 0;
        }

        .sb-usaha-label {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .6);
            margin-bottom: 2px;
        }

        .sb-usaha-name {
            font-size: 13px;
            font-weight: 700;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ── Nav ───────────────────────────── */
        .sb-nav {
            flex: 1;
            padding: 12px 10px;
            overflow-y: auto;
            position: relative;
            z-index: 1;
        }

        .sb-nav::-webkit-scrollbar {
            width: 0;
        }

        .sb-section-label {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .13em;
            text-transform: uppercase;
            /* Putih cukup terang agar terbaca di atas biru muda */
            color: rgba(255, 255, 255, .55);
            padding: 0 10px;
            margin: 18px 0 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sb-section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, .18);
        }

        .sb-section-label:first-child {
            margin-top: 6px;
        }

        .sb-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 9px 11px;
            border-radius: 11px;
            font-size: 13.5px;
            font-weight: 500;
            /* Putih agak redup untuk non-active */
            color: rgba(255, 255, 255, 0.763);
            text-decoration: none;
            transition: all .18s ease;
            margin-bottom: 2px;
            border: 1px solid transparent;
            position: relative;
        }

        .sb-link:hover {
            background: rgba(255, 255, 255, .22);
            border-color: rgba(255, 255, 255, .25);
            color: rgba(255, 255, 255, 0.655);
        }

        /* Active — putih solid seperti gambar referensi */
        .sb-link.active {
            background: rgba(255, 255, 255, 0.578);
            border-color: rgba(255, 255, 255, .5);
            color: var(--navy);
            font-weight: 700;
            box-shadow: 0 2px 14px rgba(100, 153, 233, .2);
        }

        /* Left accent */
        .sb-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            background: var(--primary);
            border-radius: 0 3px 3px 0;
        }

        .sb-link-icon {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .15);
            transition: all .18s;
        }

        .sb-link:hover .sb-link-icon {
            background: rgba(255, 255, 255, .28);
        }

        /* Active icon — mint bg agar beda dan jelas */
        .sb-link.active .sb-link-icon {
            background: var(--mint);
        }

        /* Active dot kanan */
        .sb-link.active::after {
            content: '';
            position: absolute;
            right: 11px;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            background: var(--primary);
            border-radius: 50%;
            opacity: .7;
        }

        /* ── Footer ────────────────────────── */
        .sb-footer {
            padding: 12px 14px 14px;
            border-top: 1px solid rgba(255, 255, 255, .18);
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
            background: rgba(239, 68, 68, .14);
            color: #fca5a5;
            font-family: 'Figtree', sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            border: 1px solid rgba(239, 68, 68, .25);
            border-radius: 11px;
            cursor: pointer;
            transition: all .2s;
        }

        .sb-trx-btn:hover {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
            box-shadow: 0 4px 16px rgba(239, 68, 68, .3);
        }

        /* ══════════════════════════════════════
           MAIN AREA
        ══════════════════════════════════════ */
        .main-wrap {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: 100%;
            overflow: hidden;
        }

        /* ── TOPBAR ────────────────────────── */
        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 24px;
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
            position: relative;
            z-index: 30;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Page title di topbar */
        .topbar-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: var(--navy);
            letter-spacing: -.3px;
        }

        .topbar-divider {
            width: 1px;
            height: 20px;
            background: var(--border);
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
            color: #b0c4de;
            pointer-events: none;
        }

        .search-input {
            font-family: 'Figtree', sans-serif;
            font-size: 13px;
            color: var(--navy);
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: 11px;
            padding: 8px 14px 8px 34px;
            width: 240px;
            outline: none;
            transition: all .2s;
        }

        .search-input::placeholder {
            color: #c4d4e8;
        }

        .search-input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(100, 153, 233, .1);
            width: 280px;
        }

        /* Topbar right */
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tb-icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: var(--surface);
            border: 1.5px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all .2s;
            position: relative;
            color: var(--muted);
        }

        .tb-icon-btn:hover {
            border-color: var(--primary);
            background: #eef4ff;
            color: var(--primary);
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
            font-size: 8.5px;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Profile button */
        .profile-btn {
            display: flex;
            align-items: center;
            gap: 9px;
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            padding: 5px 11px 5px 5px;
            cursor: pointer;
            transition: all .2s;
        }

        .profile-btn:hover {
            border-color: var(--primary);
            background: #eef4ff;
        }

        .profile-avatar {
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, var(--primary), var(--sky));
            color: white;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12.5px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--navy);
            line-height: 1.1;
        }

        .profile-role {
            font-size: 10px;
            color: var(--primary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .06em;
        }

        .profile-chevron {
            color: #c4d4e8;
            transition: transform .2s;
        }

        .profile-btn.open .profile-chevron {
            transform: rotate(180deg);
        }

        /* Dropdown */
        .profile-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            width: 270px;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(26, 44, 78, .12), 0 4px 16px rgba(100, 153, 233, .08);
            overflow: hidden;
            z-index: 50;
            animation: dropIn .18s cubic-bezier(.4, 0, .2, 1);
        }

        @keyframes dropIn {
            from {
                opacity: 0;
                transform: translateY(-8px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .profile-dropdown.open {
            display: block;
        }

        .dd-head {
            padding: 16px;
            background: linear-gradient(135deg, #f0f6ff, #f8fbff);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .dd-avatar {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--primary), var(--sky));
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(100, 153, 233, .3);
        }

        .dd-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--navy);
        }

        .dd-email {
            font-size: 11.5px;
            color: var(--muted);
            margin-top: 2px;
        }

        .dd-info {
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
        }

        .dd-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
        }

        .dd-key {
            font-size: 11.5px;
            color: var(--muted);
            font-weight: 500;
        }

        .dd-val {
            font-size: 12px;
            color: var(--navy);
            font-weight: 600;
        }

        .dd-badge {
            font-size: 10px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 100px;
            background: rgba(100, 153, 233, .1);
            color: var(--primary);
            letter-spacing: .05em;
        }

        .dd-footer {
            padding: 12px;
        }

        .logout-btn {
            width: 100%;
            font-family: 'Figtree', sans-serif;
            font-size: 13px;
            font-weight: 600;
            padding: 9px;
            background: #fff5f5;
            color: #dc2626;
            border: 1.5px solid #fecaca;
            border-radius: 10px;
            cursor: pointer;
            transition: all .18s;
        }

        .logout-btn:hover {
            background: #dc2626;
            color: rgb(230, 226, 226);
            border-color: #dc2626;
            box-shadow: 0 4px 12px rgba(220, 38, 38, .25);
        }

        /* ── PAGE CONTENT ──────────────────── */
        .page-content {
            flex: 1;
            overflow-y: auto;
            padding: 28px;
            background: var(--surface);
        }

        .page-content::-webkit-scrollbar {
            width: 5px;
        }

        .page-content::-webkit-scrollbar-track {
            background: transparent;
        }

        .page-content::-webkit-scrollbar-thumb {
            background: rgba(100, 153, 233, .2);
            border-radius: 10px;
        }

        .page-content::-webkit-scrollbar-thumb:hover {
            background: rgba(100, 153, 233, .4);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -260px;
                transition: left .25s;
            }

            .sidebar.open {
                left: 0;
            }

            .main-wrap {
                margin-left: 0;
            }

            .search-input {
                width: 160px;
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
                    <div class="sb-brand-icon">🛒</div>
                @endif
                <div class="sb-brand-text">
                    <a href="{{ route('welcome') }}" class="sb-brand-name">UniPOS</a>
                    <span class="sb-brand-tag">Point of Sale</span>
                </div>
            </div>

            {{-- Usaha chip --}}
            @if (auth()->user()->usaha)
                <div class="sb-usaha">
                    <div class="sb-usaha-dot"></div>
                    <div class="sb-usaha-info">
                        <div class="sb-usaha-label">Usaha Aktif</div>
                        <div class="sb-usaha-name">{{ auth()->user()->usaha->nama_usaha ?? 'Nama Usaha' }}</div>
                    </div>
                </div>
            @endif

            {{-- Navigation --}}
            <nav class="sb-nav">

                <div class="sb-section-label">Menu Utama</div>

                <a href="{{ route('dashboard') }}"
                    class="sb-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <div class="sb-link-icon">📊</div> Dashboard
                </a>

                <a href="{{ route('transaksi.index') }}"
                    class="sb-link {{ request()->routeIs('transaksi.index') ? 'active' : '' }}">
                    <div class="sb-link-icon">💰</div> Transaksi
                </a>

                <a href="{{ route('transaksi.pesanan') }}"
                    class="sb-link {{ request()->routeIs('transaksi.pesanan') ? 'active' : '' }}">
                    <div class="sb-link-icon">⏳</div> Pesanan Pending
                </a>

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
                    <div class="sb-link-icon">🔖</div> Barcode
                </a>

                <div class="sb-section-label">Laporan & Sistem</div>

                <a href="{{ route('laporan') }}" class="sb-link {{ request()->routeIs('laporan') ? 'active' : '' }}">
                    <div class="sb-link-icon">📑</div> Laporan
                </a>

                <a href="{{ route('absensi.index') }}"
                    class="sb-link {{ request()->routeIs('absensi.*') ? 'active' : '' }}">
                    <div class="sb-link-icon">🕒</div> Absensi
                </a>

                <a href="{{ route('karyawan.index') }}"
                    class="sb-link {{ request()->routeIs('karyawan.*') ? 'active' : '' }}">
                    <div class="sb-link-icon">👥</div> Karyawan
                </a>

            </nav>

            {{-- Footer logout --}}
            <div class="sb-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sb-trx-btn">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.2"
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

                <div class="topbar-left">
                    <div class="topbar-title">Dashboard</div>
                    <div class="topbar-divider"></div>

                    <div class="search-wrap">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input type="text" placeholder="Cari produk, transaksi..." class="search-input">
                    </div>
                </div>

                <div class="topbar-right">

                    {{-- Notif --}}
                    <div class="tb-icon-btn">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                        </svg>
                        <span class="notif-badge">3</span>
                    </div>

                    {{-- Profile --}}
                    <div style="position:relative;">
                        <div class="profile-btn" id="profileBtn" onclick="toggleProfile()">
                            <div class="profile-avatar">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div class="profile-info">
                                <span class="profile-name">{{ auth()->user()->name }}</span>
                                <span class="profile-role">{{ auth()->user()->role ?? 'User' }}</span>
                            </div>
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
                                        {{ ucfirst(auth()->user()->status ?? 'Aktif') }}</span>
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
            const btn = document.getElementById('profileBtn');
            const menu = document.getElementById('profileMenu');
            btn.classList.toggle('open');
            menu.classList.toggle('open');
        }
        document.addEventListener('click', function(e) {
            const menu = document.getElementById('profileMenu');
            const btn = document.getElementById('profileBtn');
            if (!e.target.closest('#profileBtn') && !e.target.closest('#profileMenu')) {
                menu.classList.remove('open');
                btn.classList.remove('open');
            }
        });
    </script>

</body>

</html>
