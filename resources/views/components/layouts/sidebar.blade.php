<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniPOS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body { font-family: 'DM Sans', system-ui, sans-serif; background: #EBF3FD; margin: 0; }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 248px; flex-shrink: 0;
            background: #87aff8;
            display: flex; flex-direction: column;
            height: 100vh; position: fixed; left: 0; top: 0;
            z-index: 40;
            overflow: hidden;
        }

        /* blob decorations */
        .sidebar::before {
            content: ''; position: absolute;
            top: -80px; right: -60px;
            width: 200px; height: 200px;
            background: rgba(59,130,246,0.12); border-radius: 50%;
            pointer-events: none;
        }
        .sidebar::after {
            content: ''; position: absolute;
            bottom: 60px; left: -60px;
            width: 160px; height: 160px;
            background: rgba(59,130,246,0.08); border-radius: 50%;
            pointer-events: none;
        }

        /* brand */
        .sb-brand {
            padding: 24px 22px 20px;
            display: flex; align-items: center; gap: 11px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            position: relative; z-index: 1; flex-shrink: 0;
        }
        .sb-logo-img { width: 36px; height: 36px; border-radius: 9px; object-fit: cover; }
        .sb-logo-mark {
            width: 36px; height: 36px; background: #1D4ED8;
            border-radius: 9px; position: relative; overflow: hidden; flex-shrink: 0;
        }
        .sb-logo-mark::before { content:''; position:absolute; width:11px; height:11px; background:#FCD34D; border-radius:3px; top:7px; left:7px; }
        .sb-logo-mark::after  { content:''; position:absolute; width:7px; height:7px; background:#93C5FD; border-radius:2px; bottom:6px; right:6px; }
        .sb-brand-name {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 20px; color: white; letter-spacing: -0.4px;
            text-decoration: none;
        }

        /* usaha info chip */
        .sb-usaha {
            margin: 14px 16px 0;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.10);
            border-radius: 10px; padding: 9px 12px;
            position: relative; z-index: 1;
        }
        .sb-usaha-label { font-size: 9.5px; font-weight: 600; letter-spacing:.07em; text-transform:uppercase; color:rgba(255,255,255,0.35); margin-bottom:2px; }
        .sb-usaha-name  { font-size: 13px; font-weight: 600; color: rgba(255,255,255,0.80); }

        /* nav */
        .sb-nav { flex: 1; padding: 16px 12px; overflow-y: auto; position: relative; z-index: 1; }
        .sb-nav::-webkit-scrollbar { width: 0; }

        .sb-section-label {
            font-size: 9.5px; font-weight: 600; letter-spacing: .10em;
            text-transform: uppercase; color: rgba(255,255,255,0.28);
            padding: 0 10px; margin: 16px 0 6px;
        }
        .sb-section-label:first-child { margin-top: 4px; }

        .sb-link {
            display: flex; align-items: center; gap: 11px;
            padding: 10px 12px; border-radius: 10px;
            font-size: 13.5px; font-weight: 500;
            color: rgba(255,255,255,0.55);
            text-decoration: none; transition: all .18s;
            margin-bottom: 2px;
        }
        .sb-link:hover {
            background: rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.90);
        }
        .sb-link.active {
            background: rgba(59,130,246,0.25);
            color: white;
            font-weight: 600;
        }
        .sb-link.active .sb-link-icon { opacity: 1; }

        .sb-link-icon {
            width: 32px; height: 32px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; flex-shrink: 0;
            background: rgba(255,255,255,0.06);
            opacity: 0.7;
            transition: all .18s;
        }
        .sb-link:hover .sb-link-icon,
        .sb-link.active .sb-link-icon { background: rgba(59,130,246,0.30); opacity: 1; }

        /* active indicator */
        .sb-link.active { position: relative; }
        .sb-link.active::before {
            content: ''; position: absolute;
            left: -4px; top: 50%; transform: translateY(-50%);
            width: 3px; height: 20px;
            background: #3B82F6; border-radius: 0 3px 3px 0;
        }

        /* new transaction btn */
        .sb-footer {
            padding: 16px; border-top: 1px solid rgba(255,255,255,0.07);
            position: relative; z-index: 1; flex-shrink: 0;
        }
        .sb-trx-btn {
            width: 100%;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            padding: 11px 16px;
            background: #2563EB; color: white;
            font-family: 'DM Sans', system-ui, sans-serif;
            font-size: 13.5px; font-weight: 600;
            border: none; border-radius: 11px; cursor: pointer;
            transition: all .2s; letter-spacing: -0.01em;
        }
        .sb-trx-btn:hover { background: #1D4ED8; transform: translateY(-1px); box-shadow: 0 6px 18px rgba(37,99,235,.35); }
        .sb-trx-btn:active { transform: translateY(0); }

        /* ── MAIN ── */
        .main-wrap {
            margin-left: 248px;
            display: flex; flex-direction: column;
            min-height: 100vh;
        }

        /* ── TOPBAR ── */
        .topbar {
            background: white;
            border-bottom: 1px solid #DBEAFE;
            padding: 0 28px;
            height: 60px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 30;
            flex-shrink: 0;
        }

        /* search */
        .search-wrap { position: relative; }
        .search-wrap svg {
            position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
            color: #93C5FD; pointer-events: none;
        }
        .search-input {
            font-family: 'DM Sans', system-ui, sans-serif;
            font-size: 13px; color: #1E3A8A;
            background: #F0F7FF;
            border: 1.5px solid #DBEAFE; border-radius: 9px;
            padding: 8px 14px 8px 36px;
            width: 260px; outline: none; transition: all .18s;
        }
        .search-input::placeholder { color: #BFDBFE; }
        .search-input:focus { border-color: #3B82F6; background: white; box-shadow: 0 0 0 3px rgba(59,130,246,.10); }

        /* topbar right */
        .topbar-right { display: flex; align-items: center; gap: 12px; }

        /* notif bell */
        .notif-btn {
            width: 36px; height: 36px; border-radius: 9px;
            background: #F0F7FF; border: 1.5px solid #DBEAFE;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: all .18s; position: relative;
        }
        .notif-btn:hover { background: #DBEAFE; border-color: #93C5FD; }
        .notif-badge {
            position: absolute; top: -4px; right: -4px;
            width: 16px; height: 16px; background: #EF4444;
            border-radius: 50%; border: 2px solid white;
            font-size: 9px; font-weight: 700; color: white;
            display: flex; align-items: center; justify-content: center;
        }

        /* profile btn */
        .profile-btn {
            display: flex; align-items: center; gap: 9px;
            background: #F0F7FF; border: 1.5px solid #DBEAFE;
            border-radius: 10px; padding: 6px 12px 6px 6px;
            cursor: pointer; transition: all .18s;
        }
        .profile-btn:hover { background: #DBEAFE; border-color: #93C5FD; }
        .profile-avatar {
            width: 30px; height: 30px; background: #1D4ED8;
            color: white; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700; flex-shrink: 0;
        }
        .profile-name { font-size: 13px; font-weight: 600; color: #1E3A8A; }
        .profile-chevron { color: #93C5FD; }

        /* dropdown */
        .profile-dropdown {
            display: none; position: absolute; right: 0; top: calc(100% + 10px);
            width: 260px; background: white;
            border: 1px solid #DBEAFE; border-radius: 14px;
            box-shadow: 0 12px 40px rgba(37,99,235,0.14);
            overflow: hidden; z-index: 50;
        }
        .profile-dropdown.open { display: block; }

        .dd-head {
            padding: 16px; background: #F0F7FF;
            border-bottom: 1px solid #DBEAFE;
            display: flex; align-items: center; gap: 12px;
        }
        .dd-avatar {
            width: 40px; height: 40px; background: #1D4ED8;
            color: white; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; font-weight: 700; flex-shrink: 0;
        }
        .dd-name  { font-size: 14px; font-weight: 600; color: #1E3A8A; }
        .dd-email { font-size: 11.5px; color: #93A3B8; }

        .dd-info { padding: 12px 16px; border-bottom: 1px solid #DBEAFE; }
        .dd-row  { display:flex; justify-content:space-between; align-items:center; padding:4px 0; }
        .dd-key  { font-size:11.5px; color:#93A3B8; font-weight:500; }
        .dd-val  { font-size:11.5px; color:#1E3A8A; font-weight:600; }
        .dd-badge {
            font-size:10px; font-weight:700; padding:2px 8px; border-radius:99px;
            background:#EFF6FF; color:#1D4ED8; letter-spacing:.04em;
        }

        .dd-footer { padding: 12px; }
        .logout-btn {
            width:100%; font-family:'DM Sans',system-ui,sans-serif;
            font-size:13px; font-weight:600;
            padding:9px; background:#FEF2F2; color:#DC2626;
            border:1.5px solid #FECACA; border-radius:9px;
            cursor:pointer; transition:all .18s;
        }
        .logout-btn:hover { background:#DC2626; color:white; border-color:#DC2626; }

        /* ── PAGE CONTENT ── */
        .page-content { flex:1; padding: 28px; overflow-y: auto; }
    </style>
</head>

<body>
<div style="display:flex;">

    {{-- ════ SIDEBAR ════ --}}
    <aside class="sidebar">

        {{-- Brand --}}
        <div class="sb-brand">
            @if(auth()->user()->usaha && auth()->user()->usaha->logo)
                <img src="{{ asset('storage/logo_usaha/'.auth()->user()->usaha->logo) }}" class="sb-logo-img">
            @else
                <div class="sb-logo-mark"></div>
            @endif
            <a href="{{ route('welcome') }}" class="sb-brand-name">UniPOS</a>
        </div>

        {{-- Usaha chip --}}
        @if(auth()->user()->usaha)
        <div class="sb-usaha">
            <div class="sb-usaha-label">Usaha Aktif</div>
            <div class="sb-usaha-name">{{ auth()->user()->usaha->nama_usaha ?? 'Nama Usaha' }}</div>
        </div>
        @endif

        {{-- Navigation --}}
        <nav class="sb-nav">

            <div class="sb-section-label">Menu Utama</div>

            <a href="{{ route('dashboard') }}" class="sb-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <div class="sb-link-icon">📊</div> Dashboard
            </a>

            <a href="#" class="sb-link {{ request()->routeIs('transaksi*') ? 'active' : '' }}">
                <div class="sb-link-icon">💰</div> Transaksi
            </a>

            <a href="#" class="sb-link {{ request()->routeIs('produk*') ? 'active' : '' }}">
                <div class="sb-link-icon">📦</div> Produk
            </a>

            <a href="#" class="sb-link {{ request()->routeIs('kategori*') ? 'active' : '' }}">
                <div class="sb-link-icon">📁</div> Kategori
            </a>

            <a href="#" class="sb-link {{ request()->routeIs('pelanggan*') ? 'active' : '' }}">
                <div class="sb-link-icon">👥</div> Pelanggan
            </a>

            <div class="sb-section-label">Laporan & Sistem</div>

            <a href="#" class="sb-link {{ request()->routeIs('laporan*') ? 'active' : '' }}">
                <div class="sb-link-icon">📑</div> Laporan
            </a>

            <a href="#" class="sb-link {{ request()->routeIs('pengaturan*') ? 'active' : '' }}">
                <div class="sb-link-icon">⚙️</div> Pengaturan
            </a>

        </nav>

        {{-- CTA --}}
        <div class="sb-footer">
            <button class="sb-trx-btn">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Transaksi Baru
            </button>
        </div>

    </aside>

    {{-- ════ MAIN ════ --}}
    <div class="main-wrap">

        {{-- TOPBAR --}}
        <header class="topbar">

            {{-- Search --}}
            <div class="search-wrap">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text" placeholder="Cari produk, transaksi..." class="search-input">
            </div>

            {{-- Right --}}
            <div class="topbar-right">

                {{-- Notification --}}
                <div class="notif-btn">
                    <svg width="16" height="16" fill="none" stroke="#3B82F6" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                    </svg>
                    <div class="notif-badge">3</div>
                </div>

                {{-- Profile --}}
                <div style="position:relative;">
                    <div class="profile-btn" onclick="toggleProfile()">
                        <div class="profile-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="profile-name">{{ auth()->user()->name }}</span>
                        <svg class="profile-chevron" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                    </div>

                    {{-- Dropdown --}}
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
                                <span class="dd-val" style="color:#059669;">● {{ ucfirst(auth()->user()->status ?? 'aktif') }}</span>
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
    // close on outside click
    document.addEventListener('click', function(e) {
        const menu = document.getElementById('profileMenu');
        if (!e.target.closest('.profile-btn') && !e.target.closest('#profileMenu')) {
            menu.classList.remove('open');
        }
    });
</script>

</body>
</html>