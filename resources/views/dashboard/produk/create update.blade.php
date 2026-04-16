<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .trx-wrap * { box-sizing: border-box; }
        .trx-wrap { font-family: 'DM Sans', system-ui, sans-serif; }

        /* ── HEADER ── */
        .trx-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            flex-wrap: wrap;
            gap: 12px;
        }
        .trx-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 24px;
            color: #1E3A8A;
            letter-spacing: -0.6px;
        }
        .trx-title span { font-style: italic; color: #3B82F6; }

        /* ── MODE SWITCHER ── */
        .mode-switcher {
            display: flex;
            background: white;
            border: 1.5px solid #BFDBFE;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(37,99,235,0.08);
        }
        .mode-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all .18s;
            background: transparent;
            color: #93A3B8;
            font-family: 'DM Sans', system-ui, sans-serif;
        }
        .mode-btn svg { width: 16px; height: 16px; flex-shrink: 0; }
        .mode-btn.active { background: #1D4ED8; color: white; }
        .mode-btn:not(.active):hover { background: #EFF6FF; color: #1D4ED8; }
        .mode-divider { width: 1.5px; background: #BFDBFE; flex-shrink: 0; }

        /* ── BODY GRID ── */
        .trx-body {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 20px;
            align-items: start;
        }

        /* ── PANELS ── */
        .panel {
            background: white;
            border-radius: 18px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 2px 12px rgba(37,99,235,0.07);
            padding: 24px;
        }
        .panel-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 17px;
            color: #1E3A8A;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .panel-dot { width: 8px; height: 8px; border-radius: 50%; background: #3B82F6; flex-shrink: 0; }

        .mode-panel { display: none; }
        .mode-panel.show { display: block; }

        /* ── SEARCH + FILTER ── */
        .search-row { display: flex; gap: 8px; margin-bottom: 14px; flex-wrap: wrap; }
        .search-wrap { flex: 1; min-width: 160px; position: relative; }
        .search-wrap svg { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); width: 14px; height: 14px; color: #93A3B8; pointer-events: none; }
        .search-inp {
            width: 100%;
            padding: 9px 12px 9px 30px;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            font-size: 13px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            outline: none;
            transition: border .15s;
            background: white;
        }
        .search-inp:focus { border-color: #3B82F6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
        .filter-sel {
            padding: 9px 12px;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            font-size: 12px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            background: white;
            outline: none;
            cursor: pointer;
        }

        /* ── PRODUCT GRID ── */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 10px;
            max-height: 440px;
            overflow-y: auto;
            padding-right: 2px;
        }
        .prod-card {
            border: 1.5px solid #DBEAFE;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: all .15s;
            background: #F8FBFF;
            display: flex;
            flex-direction: column;
        }
        .prod-card:hover {
            border-color: #3B82F6;
            background: #EFF6FF;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(37,99,235,0.13);
        }
        .prod-card.stok-habis { opacity: .5; cursor: not-allowed; }
        .prod-card.stok-habis:hover { transform: none; box-shadow: none; border-color: #DBEAFE; background: #F8FBFF; }

        .prod-img {
            height: 80px;
            background: #EFF6FF;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .prod-img img { width: 100%; height: 100%; object-fit: cover; }
        .prod-img-ph { font-size: 28px; }

        .prod-body { padding: 9px 10px 4px; flex: 1; }
        .prod-kategori { font-size: 9px; font-weight: 600; color: #3B82F6; text-transform: uppercase; letter-spacing: .05em; margin-bottom: 2px; }
        .prod-name { font-size: 11.5px; font-weight: 600; color: #1E3A8A; margin-bottom: 2px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; line-height: 1.35; }
        .prod-price { font-size: 11px; color: #1D4ED8; font-weight: 600; }
        .prod-stok { font-size: 10px; color: #93A3B8; }
        .prod-stok.low { color: #DC2626; }

        .prod-footer { padding: 6px 10px 10px; }
        .prod-add-btn {
            width: 100%;
            padding: 6px;
            border-radius: 7px;
            background: #1D4ED8;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 11.5px;
            font-weight: 600;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: background .15s;
        }
        .prod-add-btn:hover { background: #1E40AF; }
        .prod-add-btn:disabled { background: #BFDBFE; cursor: not-allowed; }

        .prod-empty { grid-column: 1/-1; text-align: center; padding: 40px 16px; color: #93A3B8; font-size: 13px; }

        /* ── SCAN MODE ── */
        .scan-area { display: flex; flex-direction: column; align-items: center; }
        .scan-viewfinder {
            width: 100%;
            max-width: 480px;
            height: 260px;
            background: #0F172A;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }
        #camera-video { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; display: none; }
        .corner { position: absolute; width: 36px; height: 36px; }
        .c-tl { top:14px; left:14px; border-top:3px solid #3B82F6; border-left:3px solid #3B82F6; border-radius:4px 0 0 0; }
        .c-tr { top:14px; right:14px; border-top:3px solid #3B82F6; border-right:3px solid #3B82F6; border-radius:0 4px 0 0; }
        .c-bl { bottom:14px; left:14px; border-bottom:3px solid #3B82F6; border-left:3px solid #3B82F6; border-radius:0 0 0 4px; }
        .c-br { bottom:14px; right:14px; border-bottom:3px solid #3B82F6; border-right:3px solid #3B82F6; border-radius:0 0 4px 0; }
        .scan-line { position: absolute; width: 80%; left: 10%; height: 2px; background: linear-gradient(90deg, transparent, #3B82F6, transparent); animation: scanline 2s ease-in-out infinite; }
        @keyframes scanline { 0%,100%{top:25%;opacity:1} 50%{top:75%;opacity:.6} }
        .scan-ph { color:#475569; font-size:13px; text-align:center; z-index:1; position:relative; }
        .scan-ph svg { width:44px; height:44px; margin:0 auto 10px; display:block; opacity:.45; }

        .scan-status {
            width: 100%; max-width: 480px;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 12px; font-weight: 500;
            margin-bottom: 12px;
            text-align: center;
            background: #F0F9FF; color: #0369A1; border: 1.5px solid #BAE6FD;
            transition: all .25s;
        }
        .scan-status.ok  { background:#ECFDF5; color:#065F46; border-color:#6EE7B7; }
        .scan-status.err { background:#FEF2F2; color:#991B1B; border-color:#FCA5A5; }

        .scan-inp-row { display:flex; gap:8px; width:100%; max-width:480px; margin-bottom:10px; }
        .scan-inp {
            flex:1; border:1.5px solid #BFDBFE; border-radius:10px;
            padding:10px 14px; font-size:13px;
            font-family:'DM Sans',system-ui,sans-serif;
            color:#1E3A8A; outline:none; transition:border .15s;
        }
        .scan-inp:focus { border-color:#3B82F6; }
        .scan-enter { background:#1D4ED8; color:white; border:none; border-radius:10px; padding:10px 18px; font-size:13px; font-weight:600; cursor:pointer; font-family:'DM Sans',system-ui,sans-serif; transition:background .15s; }
        .scan-enter:hover { background:#1E40AF; }

        .cam-btns { display:flex; gap:10px; width:100%; max-width:480px; }
        .cam-btn { flex:1; padding:10px; border-radius:10px; font-size:13px; font-weight:600; cursor:pointer; font-family:'DM Sans',system-ui,sans-serif; transition:all .15s; }
        .cam-start { border:1.5px solid #BFDBFE; background:#F0F6FF; color:#1D4ED8; }
        .cam-start:hover { background:#DBEAFE; }
        .cam-stop  { border:1.5px solid #FCA5A5; background:#FEF2F2; color:#DC2626; }
        .cam-stop:hover { background:#FEE2E2; }

        /* ── CART ── */
        .cart-panel {
            background: white;
            border-radius: 18px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 2px 12px rgba(37,99,235,0.07);
            padding: 22px;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 16px;
        }
        .cart-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:16px; }
        .cart-title { font-family:'DM Serif Display',Georgia,serif; font-size:17px; color:#1E3A8A; }
        .cart-badge { background:#EFF6FF; color:#1D4ED8; font-size:11px; font-weight:600; border-radius:99px; padding:3px 10px; }

        .cart-items { display:flex; flex-direction:column; gap:8px; min-height:160px; max-height:300px; overflow-y:auto; margin-bottom:14px; }
        .cart-item { display:flex; align-items:center; gap:8px; padding:9px 10px; border-radius:10px; background:#F8FBFF; border:1px solid #DBEAFE; }
        .cart-item-img { width:34px; height:34px; border-radius:7px; object-fit:cover; background:#EFF6FF; flex-shrink:0; overflow:hidden; display:flex; align-items:center; justify-content:center; font-size:16px; }
        .cart-item-img img { width:100%; height:100%; object-fit:cover; }
        .cart-info { flex:1; min-width:0; }
        .cart-name { font-size:12px; font-weight:600; color:#1E3A8A; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
        .cart-unit { font-size:11px; color:#64748B; }
        .cart-qty { display:flex; align-items:center; gap:4px; }
        .qty-btn { width:22px; height:22px; border-radius:6px; border:1.5px solid #BFDBFE; background:white; color:#1D4ED8; font-size:14px; font-weight:600; cursor:pointer; display:flex; align-items:center; justify-content:center; transition:all .12s; }
        .qty-btn:hover { background:#EFF6FF; }
        .qty-num { font-size:12px; font-weight:600; color:#1E3A8A; min-width:20px; text-align:center; }
        .cart-subtotal { font-size:12px; font-weight:600; color:#1D4ED8; white-space:nowrap; }
        .cart-rm { background:none; border:none; cursor:pointer; color:#FCA5A5; font-size:13px; padding:2px 4px; border-radius:4px; transition:color .12s; }
        .cart-rm:hover { color:#DC2626; }
        .cart-empty { color:#CBD5E1; font-size:13px; text-align:center; margin:auto; padding:30px 0; line-height:1.7; }

        .divider { height:1px; background:#EFF6FF; margin-bottom:12px; }
        .sum-row { display:flex; justify-content:space-between; font-size:12.5px; margin-bottom:6px; }
        .sum-row .lbl { color:#64748B; }
        .sum-row .val { color:#1E3A8A; font-weight:600; }
        .total-row { display:flex; justify-content:space-between; align-items:baseline; margin-bottom:14px; margin-top:4px; }
        .total-lbl { font-size:13px; font-weight:600; color:#1E3A8A; }
        .total-val { font-family:'DM Serif Display',Georgia,serif; font-size:24px; color:#1D4ED8; letter-spacing:-0.5px; }

        .pay-label { font-size:11.5px; color:#93A3B8; margin-bottom:6px; }
        .pay-inp { width:100%; border:1.5px solid #BFDBFE; border-radius:10px; padding:10px 14px; font-size:13px; font-family:'DM Sans',system-ui,sans-serif; color:#1E3A8A; outline:none; margin-bottom:10px; transition:border .15s; }
        .pay-inp:focus { border-color:#3B82F6; box-shadow:0 0 0 3px rgba(59,130,246,0.1); }
        .change-box { background:#ECFDF5; border:1.5px solid #6EE7B7; border-radius:10px; padding:10px 14px; display:flex; justify-content:space-between; align-items:center; margin-bottom:14px; }
        .change-lbl { font-size:12px; color:#065F46; }
        .change-val { font-size:14px; font-weight:600; color:#059669; }

        .checkout-btn { width:100%; background:#1D4ED8; color:white; border:none; border-radius:12px; padding:13px; font-size:14px; font-weight:600; cursor:pointer; font-family:'DM Sans',system-ui,sans-serif; transition:all .15s; letter-spacing:.01em; }
        .checkout-btn:hover:not(:disabled) { background:#1E40AF; transform:translateY(-1px); }
        .checkout-btn:disabled { opacity:.4; cursor:not-allowed; transform:none; }

        /* flash */
        .flash { display:flex; align-items:center; gap:10px; padding:12px 18px; border-radius:12px; font-size:13px; font-weight:500; margin-bottom:18px; }
        .flash-s { background:#ECFDF5; color:#065F46; border:1px solid #6EE7B7; }
        .flash-e { background:#FEF2F2; color:#991B1B; border:1px solid #FCA5A5; }

        @media (max-width:960px) { .trx-body { grid-template-columns:1fr; } .cart-panel { position:static; } }
        @media (max-width:600px) { .mode-btn { padding:9px 14px; font-size:12px; } }
    </style>

    <div class="trx-wrap">

        {{-- FLASH --}}
        @if(session('success'))
            <div class="flash flash-s">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="flash flash-e">✕ {{ session('error') }}</div>
        @endif

        {{-- HEADER --}}
        <div class="trx-header">
            <div class="trx-title">Transaksi <span>Baru</span></div>
            <div class="mode-switcher">
                <button class="mode-btn active" id="btn-manual" onclick="switchMode('manual')">
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/>
                    </svg>
                    Input Manual
                </button>
                <div class="mode-divider"></div>
                <button class="mode-btn" id="btn-scan" onclick="switchMode('scan')">
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M1 5V3a2 2 0 012-2h2M1 11v2a2 2 0 002 2h2M15 5V3a2 2 0 00-2-2h-2M15 11v2a2 2 0 01-2 2h-2"/>
                        <line x1="4" y1="8" x2="12" y2="8"/>
                    </svg>
                    Scan Barcode
                </button>
            </div>
        </div>

        {{-- BODY --}}
        <div class="trx-body">
            <div>

                {{-- ── MANUAL MODE ── --}}
                <div class="panel mode-panel show" id="panel-manual">
                    <div class="panel-title">
                        <div class="panel-dot"></div>
                        Pilih Produk
                    </div>

                    {{-- Search + filter kategori --}}
                    <div class="search-row">
                        <div class="search-wrap">
                            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="7" cy="7" r="4.5"/><path d="M10.5 10.5L14 14"/>
                            </svg>
                            <input class="search-inp" type="text" id="search-inp" placeholder="Cari nama, kode, barcode..." oninput="filterProds()">
                        </div>
                        <select class="filter-sel" id="filter-kat" onchange="filterProds()">
                            <option value="">Semua Kategori</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Product grid --}}
                    <div class="product-grid" id="prod-grid">
                        @forelse($produk as $p)
                            <div class="prod-card {{ $p->stok <= 0 && !$p->is_jasa ? 'stok-habis' : '' }}"
                                 data-id="{{ $p->id }}"
                                 data-nama="{{ strtolower($p->nama_produk) }}"
                                 data-kode="{{ strtolower($p->kode_produk ?? '') }}"
                                 data-barcode="{{ strtolower($p->barcode ?? '') }}"
                                 data-kat="{{ $p->kategori_id }}"
                                 onclick="addToCart({{ $p->id }}, '{{ addslashes($p->nama_produk) }}', {{ $p->harga_jual }}, {{ $p->stok }}, '{{ $p->satuan }}', '{{ $p->is_jasa ? '1' : '0' }}', '{{ $p->gambar ? asset('storage/'.$p->gambar) : '' }}')"
                            >
                                <div class="prod-img">
                                    @if($p->gambar)
                                        <img src="{{ asset('storage/'.$p->gambar) }}" alt="{{ $p->nama_produk }}">
                                    @else
                                        <span class="prod-img-ph">📦</span>
                                    @endif
                                </div>
                                <div class="prod-body">
                                    <div class="prod-kategori">{{ $p->kategori->nama_kategori ?? '—' }}</div>
                                    <div class="prod-name">{{ $p->nama_produk }}</div>
                                    <div class="prod-price">Rp {{ number_format($p->harga_jual, 0, ',', '.') }}</div>
                                    <div class="prod-stok {{ $p->stok <= $p->stok_minimal && !$p->is_jasa ? 'low' : '' }}">
                                        @if($p->is_jasa)
                                            Jasa
                                        @else
                                            Stok: {{ $p->stok }} {{ $p->satuan }}
                                        @endif
                                    </div>
                                </div>
                                <div class="prod-footer">
                                    <button
                                        class="prod-add-btn"
                                        onclick="event.stopPropagation(); addToCart({{ $p->id }}, '{{ addslashes($p->nama_produk) }}', {{ $p->harga_jual }}, {{ $p->stok }}, '{{ $p->satuan }}', '{{ $p->is_jasa ? '1' : '0' }}', '{{ $p->gambar ? asset('storage/'.$p->gambar) : '' }}')"
                                        {{ $p->stok <= 0 && !$p->is_jasa ? 'disabled' : '' }}
                                    >
                                        {{ $p->stok <= 0 && !$p->is_jasa ? 'Stok Habis' : '+ Tambah' }}
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="prod-empty">Belum ada produk aktif</div>
                        @endforelse
                    </div>
                </div>

                {{-- ── SCAN MODE ── --}}
                <div class="panel mode-panel" id="panel-scan">
                    <div class="panel-title">
                        <div class="panel-dot" style="background:#6366F1;"></div>
                        Scan Barcode Produk
                    </div>

                    <div class="scan-area">
                        <div class="scan-viewfinder">
                            <video id="camera-video" playsinline autoplay muted></video>
                            <div class="corner c-tl"></div>
                            <div class="corner c-tr"></div>
                            <div class="corner c-bl"></div>
                            <div class="corner c-br"></div>
                            <div class="scan-line" id="scan-line" style="display:none;"></div>
                            <div class="scan-ph" id="scan-ph">
                                <svg viewBox="0 0 44 44" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="4" y="12" width="36" height="20" rx="2"/>
                                    <line x1="11" y1="12" x2="11" y2="32"/><line x1="15" y1="12" x2="15" y2="32"/>
                                    <line x1="19" y1="12" x2="19" y2="32" stroke-width="3"/>
                                    <line x1="24" y1="12" x2="24" y2="32"/><line x1="28" y1="12" x2="28" y2="32"/>
                                    <line x1="32" y1="12" x2="32" y2="32" stroke-width="3"/>
                                </svg>
                                Arahkan kamera ke barcode produk
                            </div>
                        </div>

                        <div class="scan-status" id="scan-status">
                            Kamera belum aktif · Klik "Aktifkan Kamera" untuk mulai
                        </div>

                        <div class="scan-inp-row">
                            <input
                                class="scan-inp"
                                id="barcode-inp"
                                type="text"
                                placeholder="Atau ketik / tempel kode barcode..."
                                onkeydown="if(event.key==='Enter'){ processBarcode(this.value); this.value=''; }"
                            >
                            <button class="scan-enter" onclick="processBarcode(document.getElementById('barcode-inp').value); document.getElementById('barcode-inp').value='';">
                                Tambah
                            </button>
                        </div>

                        <div class="cam-btns">
                            <button class="cam-btn cam-start" onclick="startCamera()">Aktifkan Kamera</button>
                            <button class="cam-btn cam-stop"  onclick="stopCamera()">Hentikan Kamera</button>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ── CART PANEL ── --}}
            <div class="cart-panel">
                <div class="cart-head">
                    <div class="cart-title">Keranjang</div>
                    <div class="cart-badge" id="cart-count">0 item</div>
                </div>

                <div class="cart-items" id="cart-items">
                    <div class="cart-empty">Belum ada produk<br>ditambahkan</div>
                </div>

                <div class="divider"></div>
                <div class="sum-row"><span class="lbl">Subtotal</span><span class="val" id="c-subtotal">Rp 0</span></div>
                <div class="sum-row"><span class="lbl">Diskon</span><span class="val" style="color:#059669;">— Rp 0</span></div>
                <div class="total-row">
                    <span class="total-lbl">Total Bayar</span>
                    <span class="total-val" id="c-total">Rp 0</span>
                </div>

                <form id="checkout-form" action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="items"     id="f-items">
                    <input type="hidden" name="total"     id="f-total">
                    <input type="hidden" name="bayar"     id="f-bayar">
                    <input type="hidden" name="kembalian" id="f-kembalian">

                    <div class="pay-label">Nominal Bayar</div>
                    <input class="pay-inp" type="number" id="pay-inp" placeholder="Masukkan nominal..." oninput="calcChange()" min="0">

                    <div class="change-box">
                        <span class="change-lbl">Kembalian</span>
                        <span class="change-val" id="c-change">Rp 0</span>
                    </div>

                    <button type="button" class="checkout-btn" id="checkout-btn" disabled onclick="submitCheckout()">
                        Proses Transaksi
                    </button>
                </form>
            </div>
        </div>

    </div>

    {{-- Produk data untuk lookup scan barcode --}}
    <script>
        // Data produk dari DB — untuk lookup saat scan barcode
        // Field disesuaikan dengan skema: nama_produk, harga_jual, barcode
        const PRODUK_DB = @json($produk->map(fn($p) => [
            'id'          => $p->id,
            'nama_produk' => $p->nama_produk,
            'harga_jual'  => (float) $p->harga_jual,
            'stok'        => $p->stok,
            'satuan'      => $p->satuan,
            'is_jasa'     => (bool) $p->is_jasa,
            'barcode'     => $p->barcode,
            'kode_produk' => $p->kode_produk,
            'gambar'      => $p->gambar ? asset('storage/' . $p->gambar) : null,
        ]));

        // ── CART STATE ──────────────────────────────
        let cart = [];

        function fmt(n) {
            return 'Rp ' + Math.round(n).toLocaleString('id-ID');
        }

        // ── MODE SWITCH ──────────────────────────────
        function switchMode(mode) {
            document.getElementById('panel-manual').classList.toggle('show', mode === 'manual');
            document.getElementById('panel-scan').classList.toggle('show', mode === 'scan');
            document.getElementById('btn-manual').classList.toggle('active', mode === 'manual');
            document.getElementById('btn-scan').classList.toggle('active', mode === 'scan');
            if (mode === 'manual') stopCamera();
        }

        // ── PRODUCT FILTER ──────────────────────────
        function filterProds() {
            const q   = document.getElementById('search-inp').value.toLowerCase().trim();
            const kat = document.getElementById('filter-kat').value;
            let found = 0;
            document.querySelectorAll('#prod-grid .prod-card').forEach(c => {
                const mq = !q || c.dataset.nama.includes(q) || c.dataset.kode.includes(q) || c.dataset.barcode.includes(q);
                const mk = !kat || c.dataset.kat === kat;
                c.style.display = (mq && mk) ? '' : 'none';
                if (mq && mk) found++;
            });
            const empty = document.querySelector('#prod-grid .prod-empty');
            if (empty) empty.style.display = found === 0 ? '' : 'none';
        }

        // ── ADD TO CART ──────────────────────────────
        function addToCart(id, nama, harga, stok, satuan, isJasa, gambar) {
            isJasa = isJasa === '1' || isJasa === true;
            if (!isJasa && stok <= 0) return;

            const ex = cart.find(c => c.id === id);
            if (ex) {
                if (!isJasa && ex.qty >= ex.stok) {
                    alert('Stok tidak mencukupi!');
                    return;
                }
                ex.qty++;
            } else {
                cart.push({ id, nama, harga, stok, satuan, isJasa, gambar, qty: 1 });
            }
            renderCart();
        }

        function changeQty(id, delta) {
            const idx = cart.findIndex(c => c.id === id);
            if (idx < 0) return;
            cart[idx].qty += delta;
            if (cart[idx].qty <= 0) cart.splice(idx, 1);
            renderCart();
        }

        function removeCart(id) {
            cart = cart.filter(c => c.id !== id);
            renderCart();
        }

        // ── RENDER CART ──────────────────────────────
        function renderCart() {
            const el = document.getElementById('cart-items');
            if (!cart.length) {
                el.innerHTML = '<div class="cart-empty">Belum ada produk<br>ditambahkan</div>';
            } else {
                el.innerHTML = cart.map(c => `
                    <div class="cart-item">
                        <div class="cart-item-img">
                            ${c.gambar ? `<img src="${c.gambar}" alt="">` : '📦'}
                        </div>
                        <div class="cart-info">
                            <div class="cart-name">${c.nama}</div>
                            <div class="cart-unit">${fmt(c.harga)} / ${c.satuan || 'pcs'}</div>
                        </div>
                        <div class="cart-qty">
                            <button class="qty-btn" onclick="changeQty(${c.id},-1)">−</button>
                            <span class="qty-num">${c.qty}</span>
                            <button class="qty-btn" onclick="changeQty(${c.id},1)">+</button>
                        </div>
                        <div class="cart-subtotal">${fmt(c.harga * c.qty)}</div>
                        <button class="cart-rm" onclick="removeCart(${c.id})">✕</button>
                    </div>
                `).join('');
            }

            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const qty   = cart.reduce((s, c) => s + c.qty, 0);
            document.getElementById('c-subtotal').textContent = fmt(total);
            document.getElementById('c-total').textContent    = fmt(total);
            document.getElementById('cart-count').textContent = qty + ' item';
            calcChange();
        }

        // ── CALC CHANGE ──────────────────────────────
        function calcChange() {
            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const bayar = parseInt(document.getElementById('pay-inp').value) || 0;
            const kembalian = bayar - total;
            document.getElementById('c-change').textContent = fmt(Math.max(0, kembalian));
            document.getElementById('checkout-btn').disabled = !(cart.length > 0 && bayar >= total);
        }

        // ── SUBMIT CHECKOUT ──────────────────────────
        function submitCheckout() {
            const total     = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const bayar     = parseInt(document.getElementById('pay-inp').value) || 0;
            const kembalian = bayar - total;

            // Kirim hanya field yang dibutuhkan controller
            const items = cart.map(c => ({
                id:    c.id,
                nama:  c.nama,
                harga: c.harga,
                qty:   c.qty,
            }));

            document.getElementById('f-items').value     = JSON.stringify(items);
            document.getElementById('f-total').value     = total;
            document.getElementById('f-bayar').value     = bayar;
            document.getElementById('f-kembalian').value = kembalian;
            document.getElementById('checkout-form').submit();
        }

        // ── BARCODE LOOKUP ──────────────────────────
        function processBarcode(code) {
            code = (code || '').trim();
            if (!code) return;

            // Cari berdasarkan barcode atau kode_produk
            const prod = PRODUK_DB.find(p =>
                (p.barcode && p.barcode.toLowerCase() === code.toLowerCase()) ||
                (p.kode_produk && p.kode_produk.toLowerCase() === code.toLowerCase())
            );

            if (prod) {
                addToCart(prod.id, prod.nama_produk, prod.harga_jual, prod.stok, prod.satuan, prod.is_jasa, prod.gambar);
                setStatus('ok', '✓ Ditemukan: ' + prod.nama_produk);
            } else {
                setStatus('err', '✕ Kode tidak ditemukan: ' + code);
            }

            setTimeout(() => setStatus('', 'Kamera aktif · Siap scan berikutnya'), 2500);
        }

        function setStatus(type, msg) {
            const el = document.getElementById('scan-status');
            el.className = 'scan-status' + (type ? ' ' + type : '');
            el.textContent = msg;
        }

        // ── CAMERA ──────────────────────────────────
        let camStream = null;

        async function startCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: { facingMode: 'environment', width: { ideal: 1280 } }
                });
                camStream = stream;
                const vid = document.getElementById('camera-video');
                vid.srcObject = stream;
                vid.style.display = 'block';
                document.getElementById('scan-ph').style.display   = 'none';
                document.getElementById('scan-line').style.display = 'block';
                setStatus('ok', 'Kamera aktif · Siap scan barcode');

                /**
                 * Untuk decode otomatis dari frame video, tambahkan ZXing:
                 * <script src="https://unpkg.com/@zxing/library@latest/umd/index.min.js"><\/script>
                 *
                 * Kemudian:
                 * const reader = new ZXing.BrowserMultiFormatReader();
                 * reader.decodeFromVideoDevice(null, vid, (result, err) => {
                 *     if (result) processBarcode(result.getText());
                 * });
                 * window._zxingReader = reader;
                 */

            } catch (err) {
                setStatus('err', '✕ Kamera tidak bisa diakses: ' + err.message);
            }
        }

        function stopCamera() {
            if (window._zxingReader) { window._zxingReader.reset(); window._zxingReader = null; }
            if (camStream) { camStream.getTracks().forEach(t => t.stop()); camStream = null; }
            const vid = document.getElementById('camera-video');
            vid.style.display = 'none';
            vid.srcObject = null;
            document.getElementById('scan-ph').style.display   = '';
            document.getElementById('scan-line').style.display = 'none';
            setStatus('', 'Kamera dihentikan');
        }
    </script>

</x-layout.sidebar>