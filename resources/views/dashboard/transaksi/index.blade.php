<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .trx-wrap * {
            box-sizing: border-box;
        }

        .trx-wrap {
            font-family: 'DM Sans', system-ui, sans-serif;
        }

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

        .trx-title span {
            font-style: italic;
            color: #3B82F6;
        }

        /* ── MODE SWITCHER ── */
        .mode-switcher {
            display: flex;
            background: white;
            border: 1.5px solid #BFDBFE;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.08);
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

        .mode-btn svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .mode-btn.active {
            background: #1D4ED8;
            color: white;
        }

        .mode-btn:not(.active):hover {
            background: #EFF6FF;
            color: #1D4ED8;
        }

        .mode-divider {
            width: 1.5px;
            background: #BFDBFE;
            flex-shrink: 0;
        }

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
            box-shadow: 0 2px 12px rgba(37, 99, 235, 0.07);
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

        .panel-title-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #3B82F6;
            flex-shrink: 0;
        }

        .mode-panel {
            display: none;
        }

        .mode-panel.show {
            display: block;
        }

        /* ── SEARCH ── */
        .search-row {
            display: flex;
            gap: 10px;
            margin-bottom: 18px;
        }

        .search-inp {
            flex: 1;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            outline: none;
            transition: border .15s;
        }

        .search-inp:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .search-btn {
            background: #1D4ED8;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: background .15s;
        }

        .search-btn:hover {
            background: #1E40AF;
        }

        /* ── PRODUCT GRID ── */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 10px;
            max-height: 420px;
            overflow-y: auto;
            padding-right: 4px;
        }

        .prod-card {
            border: 1.5px solid #DBEAFE;
            border-radius: 12px;
            padding: 12px;
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
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.12);
        }

        .prod-emoji {
            font-size: 22px;
            margin-bottom: 6px;
        }

        .prod-name {
            font-size: 11.5px;
            font-weight: 600;
            color: #1E3A8A;
            margin-bottom: 3px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .prod-price {
            font-size: 11px;
            color: #3B82F6;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .prod-stock {
            font-size: 10px;
            color: #93A3B8;
            margin-bottom: 8px;
        }

        .prod-add-btn {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            background: #1D4ED8;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .15s;
            align-self: flex-start;
            line-height: 1;
        }

        .prod-add-btn:hover {
            background: #1E40AF;
        }

        .prod-empty {
            grid-column: 1/-1;
            text-align: center;
            padding: 30px;
            color: #93A3B8;
            font-size: 13px;
        }

        /* ── SCAN MODE ── */
        .scan-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 0;
        }

        .scan-viewfinder {
            width: 100%;
            max-width: 420px;
            height: 260px;
            background: #0F172A;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        /* kamera dari webcam nanti dirender disini */
        #camera-video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
            display: none;
        }

        .scan-overlay {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .corner {
            position: absolute;
            width: 36px;
            height: 36px;
        }

        .corner-tl {
            top: 14px;
            left: 14px;
            border-top: 3px solid #3B82F6;
            border-left: 3px solid #3B82F6;
            border-radius: 4px 0 0 0;
        }

        .corner-tr {
            top: 14px;
            right: 14px;
            border-top: 3px solid #3B82F6;
            border-right: 3px solid #3B82F6;
            border-radius: 0 4px 0 0;
        }

        .corner-bl {
            bottom: 14px;
            left: 14px;
            border-bottom: 3px solid #3B82F6;
            border-left: 3px solid #3B82F6;
            border-radius: 0 0 0 4px;
        }

        .corner-br {
            bottom: 14px;
            right: 14px;
            border-bottom: 3px solid #3B82F6;
            border-right: 3px solid #3B82F6;
            border-radius: 0 0 4px 0;
        }

        .scan-line {
            position: absolute;
            width: 80%;
            left: 10%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #3B82F6, transparent);
            animation: scan-anim 2s ease-in-out infinite;
        }

        @keyframes scan-anim {

            0%,
            100% {
                top: 25%;
                opacity: 1;
            }

            50% {
                top: 75%;
                opacity: 0.6;
            }
        }

        .scan-placeholder {
            color: #475569;
            font-size: 13px;
            text-align: center;
            z-index: 1;
            position: relative;
        }

        .scan-placeholder-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 10px;
            display: block;
            opacity: 0.5;
        }

        .scan-status-bar {
            width: 100%;
            max-width: 420px;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 14px;
            text-align: center;
            background: #F0F9FF;
            color: #0369A1;
            border: 1.5px solid #BAE6FD;
            transition: all .3s;
        }

        .scan-status-bar.success {
            background: #ECFDF5;
            color: #065F46;
            border-color: #6EE7B7;
        }

        .scan-status-bar.error {
            background: #FEF2F2;
            color: #991B1B;
            border-color: #FCA5A5;
        }

        .scan-manual-row {
            display: flex;
            gap: 8px;
            width: 100%;
            max-width: 420px;
        }

        .scan-inp {
            flex: 1;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            outline: none;
            transition: border .15s;
        }

        .scan-inp:focus {
            border-color: #3B82F6;
        }

        .scan-enter-btn {
            background: #1D4ED8;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            white-space: nowrap;
            transition: background .15s;
        }

        .scan-enter-btn:hover {
            background: #1E40AF;
        }

        .cam-btns {
            display: flex;
            gap: 10px;
            width: 100%;
            max-width: 420px;
            margin-top: 12px;
        }

        .cam-btn {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
        }

        .cam-btn-start {
            border: 1.5px solid #BFDBFE;
            background: #F0F6FF;
            color: #1D4ED8;
        }

        .cam-btn-start:hover {
            background: #DBEAFE;
        }

        .cam-btn-stop {
            border: 1.5px solid #FCA5A5;
            background: #FEF2F2;
            color: #DC2626;
        }

        .cam-btn-stop:hover {
            background: #FEE2E2;
        }

        /* ── CART ── */
        .cart-panel {
            background: white;
            border-radius: 18px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 2px 12px rgba(37, 99, 235, 0.07);
            padding: 22px;
            display: flex;
            flex-direction: column;
            gap: 0;
            position: sticky;
            top: 16px;
        }

        .cart-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .cart-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 17px;
            color: #1E3A8A;
        }

        .cart-badge {
            background: #EFF6FF;
            color: #1D4ED8;
            font-size: 11px;
            font-weight: 600;
            border-radius: 99px;
            padding: 3px 10px;
        }

        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-height: 160px;
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 14px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            border-radius: 10px;
            background: #F8FBFF;
            border: 1px solid #DBEAFE;
        }

        .cart-item-emoji {
            font-size: 18px;
            flex-shrink: 0;
        }

        .cart-item-info {
            flex: 1;
            min-width: 0;
        }

        .cart-item-name {
            font-size: 12px;
            font-weight: 600;
            color: #1E3A8A;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .cart-item-price {
            font-size: 11px;
            color: #64748B;
        }

        .cart-qty {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .qty-btn {
            width: 22px;
            height: 22px;
            border-radius: 6px;
            border: 1.5px solid #BFDBFE;
            background: white;
            color: #1D4ED8;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            transition: all .12s;
        }

        .qty-btn:hover {
            background: #EFF6FF;
        }

        .qty-num {
            font-size: 12px;
            font-weight: 600;
            color: #1E3A8A;
            min-width: 20px;
            text-align: center;
        }

        .cart-item-subtotal {
            font-size: 12px;
            font-weight: 600;
            color: #1D4ED8;
            white-space: nowrap;
        }

        .cart-remove {
            background: none;
            border: none;
            cursor: pointer;
            color: #FCA5A5;
            font-size: 14px;
            padding: 2px 4px;
            border-radius: 4px;
            transition: color .12s;
        }

        .cart-remove:hover {
            color: #DC2626;
        }

        .cart-empty {
            color: #CBD5E1;
            font-size: 13px;
            text-align: center;
            margin: auto;
            padding: 30px 0;
            line-height: 1.7;
        }

        .cart-divider {
            height: 1px;
            background: #EFF6FF;
            margin-bottom: 12px;
        }

        .cart-row {
            display: flex;
            justify-content: space-between;
            font-size: 12.5px;
            margin-bottom: 6px;
        }

        .cart-row .lbl {
            color: #64748B;
        }

        .cart-row .val {
            color: #1E3A8A;
            font-weight: 600;
        }

        .cart-total-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 14px;
            margin-top: 4px;
        }

        .cart-total-lbl {
            font-size: 13px;
            font-weight: 600;
            color: #1E3A8A;
        }

        .cart-total-val {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 24px;
            color: #1D4ED8;
            letter-spacing: -0.5px;
        }

        .pay-label {
            font-size: 11.5px;
            color: #93A3B8;
            margin-bottom: 6px;
        }

        .pay-inp {
            width: 100%;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            outline: none;
            margin-bottom: 10px;
            transition: border .15s;
        }

        .pay-inp:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .change-box {
            background: #ECFDF5;
            border: 1.5px solid #6EE7B7;
            border-radius: 10px;
            padding: 10px 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .change-lbl {
            font-size: 12px;
            color: #065F46;
        }

        .change-val {
            font-size: 14px;
            font-weight: 600;
            color: #059669;
        }

        .checkout-btn {
            width: 100%;
            background: #1D4ED8;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 13px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
            letter-spacing: .01em;
        }

        .checkout-btn:hover:not(:disabled) {
            background: #1E40AF;
            transform: translateY(-1px);
        }

        .checkout-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        /* ── FLASH ALERT ── */
        .flash-alert {
            padding: 12px 18px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .flash-success {
            background: #ECFDF5;
            color: #065F46;
            border: 1px solid #6EE7B7;
        }

        .flash-error {
            background: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FCA5A5;
        }

        @media (max-width: 960px) {
            .trx-body {
                grid-template-columns: 1fr;
            }

            .cart-panel {
                position: static;
            }
        }

        @media (max-width: 600px) {
            .trx-title {
                font-size: 20px;
            }

            .mode-btn {
                padding: 9px 14px;
                font-size: 12px;
            }
        }
    </style>

    <div class="trx-wrap">

        {{-- FLASH MESSAGES --}}
        @if(session('success'))
        <div class="flash-alert flash-success">
            ✓ {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="flash-alert flash-error">
            ✕ {{ session('error') }}
        </div>
        @endif

        {{-- HEADER --}}
        <div class="trx-header">
            <div class="trx-title">Transaksi <span>Baru</span></div>

            <div class="mode-switcher">
                <button class="mode-btn active" id="btn-manual" onclick="switchMode('manual')">
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="2" y="2" width="12" height="12" rx="2" />
                        <path d="M5 8h6M8 5v6" />
                    </svg>
                    Input Manual
                </button>
                <div class="mode-divider"></div>
                <button class="mode-btn" id="btn-scan" onclick="switchMode('scan')">
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M1 5V3a2 2 0 012-2h2M1 11v2a2 2 0 002 2h2M15 5V3a2 2 0 00-2-2h-2M15 11v2a2 2 0 01-2 2h-2" />
                        <line x1="4" y1="8" x2="12" y2="8" />
                    </svg>
                    Scan Barcode
                </button>
            </div>
        </div>

        {{-- BODY --}}
        <div class="trx-body">

            {{-- LEFT: INPUT PANEL --}}
            <div>
                {{-- MANUAL MODE --}}
                <div class="panel mode-panel show" id="panel-manual">
                    <div class="panel-title">
                        <div class="panel-title-dot"></div>
                        Pilih Produk
                    </div>

                    <div class="search-row">
                        <input
                            class="search-inp"
                            id="search-inp"
                            type="text"
                            placeholder="Cari nama atau kode produk..."
                            oninput="filterProducts()">
                        <button class="search-btn" onclick="filterProducts()">Cari</button>
                    </div>

                    <div class="product-grid" id="prod-grid">
                        @forelse($produk as $p)
                        <div class="prod-card"
                            data-id="{{ $p->id }}"
                            data-name="{{ $p->nama_produk }}"
                            data-price="{{ $p->harga_jual }}"
                            data-stock="{{ $p->stok }}"
                            data-code="{{ $p->kode_produk }}"
                            onclick="addFromCard(this)">

                            <div class="prod-emoji">📦</div>
                            <div class="prod-name">{{ $p->nama_produk }}</div>
                            <div class="prod-price">Rp {{ number_format($p->harga_jual, 0, ',', '.') }}</div>
                            <div class="prod-stock">Stok: {{ $p->stok }}</div>

                            <button
                                class="prod-add-btn"
                                onclick="event.stopPropagation(); addFromCard(this.parentElement)">
                                +
                            </button>
                        </div>
                        @empty
                        <div class="prod-empty">Belum ada produk tersedia</div>
                        @endforelse
                    </div>
                </div>

                {{-- SCAN MODE --}}
                <div class="panel mode-panel" id="panel-scan">
                    <div class="panel-title">
                        <div class="panel-title-dot" style="background:#6366F1;"></div>
                        Scan Barcode Produk
                    </div>

                    <div class="scan-area">

                        {{-- Viewfinder / Video --}}
                        <div class="scan-viewfinder">
                            <video id="camera-video" playsinline autoplay muted></video>
                            <canvas id="camera-canvas" style="display:none;"></canvas>

                            <div class="scan-overlay">
                                <div class="corner corner-tl"></div>
                                <div class="corner corner-tr"></div>
                                <div class="corner corner-bl"></div>
                                <div class="corner corner-br"></div>
                                <div class="scan-line" id="scan-line"></div>
                            </div>

                            <div class="scan-placeholder" id="scan-placeholder">
                                <svg class="scan-placeholder-icon" viewBox="0 0 48 48" fill="none" stroke="#64748B" stroke-width="1.5">
                                    <rect x="6" y="14" width="36" height="20" rx="2" />
                                    <line x1="14" y1="14" x2="14" y2="34" />
                                    <line x1="18" y1="14" x2="18" y2="34" />
                                    <line x1="22" y1="14" x2="22" y2="34" stroke-width="3" />
                                    <line x1="27" y1="14" x2="27" y2="34" />
                                    <line x1="31" y1="14" x2="31" y2="34" />
                                    <line x1="35" y1="14" x2="35" y2="34" stroke-width="3" />
                                </svg>
                                Arahkan kamera ke barcode produk
                            </div>
                        </div>

                        {{-- Status bar --}}
                        <div class="scan-status-bar" id="scan-status">
                            Kamera belum aktif · Klik "Aktifkan Kamera" untuk mulai
                        </div>

                        {{-- Input manual barcode --}}
                        <div class="scan-manual-row">
                            <input
                                class="scan-inp"
                                id="barcode-inp"
                                type="text"
                                placeholder="Atau ketik kode barcode manual..."
                                onkeydown="if(event.key==='Enter') processBarcode(this.value)">
                            <button class="scan-enter-btn" onclick="processBarcode(document.getElementById('barcode-inp').value)">
                                Tambah
                            </button>
                        </div>

                        {{-- Camera control buttons --}}
                        <div class="cam-btns">
                            <button class="cam-btn cam-btn-start" onclick="startCamera()">
                                Aktifkan Kamera
                            </button>
                            <button class="cam-btn cam-btn-stop" onclick="stopCamera()">
                                Hentikan Kamera
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            {{-- RIGHT: CART PANEL --}}
            <div class="cart-panel">

                {{-- Cart header --}}
                <div class="cart-head">
                    <div class="cart-title">Keranjang</div>
                    <div class="cart-badge" id="cart-count">0 item</div>
                </div>

                {{-- Cart items list --}}
                <div class="cart-items" id="cart-items">
                    <div class="cart-empty">
                        Belum ada produk<br>ditambahkan ke keranjang
                    </div>
                </div>

                <div class="cart-divider"></div>

                {{-- Summary --}}
                <div class="cart-row">
                    <span class="lbl">Subtotal</span>
                    <span class="val" id="cart-subtotal">Rp 0</span>
                </div>
                <div class="cart-row">
                    <span class="lbl">Diskon</span>
                    <span class="val" style="color:#059669;">— Rp 0</span>
                </div>

                <div class="pay-label">Pelanggan</div>

                <input
                    type="text"
                    name="nama_pelanggan_baru"
                    id="nama_pelanggan_baru"
                    class="pay-inp"
                    placeholder="Ketik nama pelanggan baru (opsional)">

                <select name="pelanggan_id" id="pelanggan_id" class="pay-inp">
                    <option value="">-- Pilih Pelanggan Lama (Opsional) --</option>

                    @foreach($pelanggan as $plg)
                    <option value="{{ $plg->id }}">
                        {{ $plg->nama }}
                        @if($plg->telepon)
                        ({{ $plg->telepon }})
                        @endif
                    </option>
                    @endforeach
                </select>

                <div class="cart-total-row">
                    <span class="cart-total-lbl">Total Bayar</span>
                    <span class="cart-total-val" id="cart-total">Rp 0</span>
                </div>

                {{-- Payment input --}}
                <form id="checkout-form" action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="items" id="items-json">
                    <input type="hidden" name="total" id="total-hidden">
                    <input type="hidden" name="bayar" id="bayar-hidden">
                    <input type="hidden" name="kembalian" id="kembalian-hidden">

                    <div class="pay-label">Nominal Bayar</div>
                    <input
                        class="pay-inp"
                        type="number"
                        id="pay-inp"
                        placeholder="Masukkan nominal pembayaran..."
                        oninput="calcChange()"
                        min="0">

                    <div class="change-box">
                        <span class="change-lbl">Kembalian</span>
                        <span class="change-val" id="change-val">Rp 0</span>
                    </div>

                    <button
                        type="button"
                        class="checkout-btn"
                        id="checkout-btn"
                        disabled
                        onclick="submitCheckout()">
                        Proses Transaksi
                    </button>
                </form>

            </div>
        </div>

    </div>

    {{-- Produk data from blade for JS --}}
    <script>
        const PRODUK_DB = @json($produk);
        let cart = [];

        function fmt(n) {
            return 'Rp ' + Math.round(n).toLocaleString('id-ID');
        }

        // ================= MODE =================
        function switchMode(mode) {
            document.getElementById('panel-manual').classList.toggle('show', mode === 'manual');
            document.getElementById('panel-scan').classList.toggle('show', mode === 'scan');
            document.getElementById('btn-manual').classList.toggle('active', mode === 'manual');
            document.getElementById('btn-scan').classList.toggle('active', mode === 'scan');

            if (mode === 'manual') stopCamera();
        }

        // ================= FILTER =================
        function filterProducts() {
            const q = document.getElementById('search-inp').value.toLowerCase();
            const cards = document.querySelectorAll('.prod-card');

            cards.forEach(card => {
                const name = card.dataset.name.toLowerCase();
                const code = card.dataset.code.toLowerCase();
                card.style.display = (!q || name.includes(q) || code.includes(q)) ? '' : 'none';
            });
        }

        // ================= TAMBAH DARI CARD =================
        function addFromCard(el) {
            addToCart(
                el.dataset.id,
                el.dataset.name,
                el.dataset.price,
                el.dataset.stock,
                el.dataset.code
            );
        }

        // ================= CART =================
        function addToCart(id, nama, harga, stok, kode) {
            id = parseInt(id);
            harga = parseInt(harga);
            stok = parseInt(stok);

            const existing = cart.find(c => c.id === id);

            if (existing) {
                if (existing.qty >= stok) {
                    alert('Stok habis!');
                    return;
                }
                existing.qty++;
            } else {
                cart.push({
                    id,
                    nama,
                    harga,
                    stok,
                    kode,
                    qty: 1
                });
            }

            renderCart();
        }

        function changeQty(id, delta) {
            const item = cart.find(c => c.id === id);
            if (!item) return;

            item.qty += delta;
            if (item.qty <= 0) {
                cart = cart.filter(c => c.id !== id);
            }

            renderCart();
        }

        function removeFromCart(id) {
            cart = cart.filter(c => c.id !== id);
            renderCart();
        }

        // ================= RENDER CART =================
        function renderCart() {
            const el = document.getElementById('cart-items');

            if (!cart.length) {
                el.innerHTML = `<div class="cart-empty">Belum ada produk</div>`;
            } else {
                el.innerHTML = cart.map(c => `
        <div class="cart-item">
            <div class="cart-item-info">
                <div class="cart-item-name">${c.nama}</div>
                <div class="cart-item-price">${fmt(c.harga)}</div>
            </div>

            <div class="cart-qty">
                <button class="qty-btn" onclick="changeQty(${c.id},-1)">-</button>
                <div class="qty-num">${c.qty}</div>
                <button class="qty-btn" onclick="changeQty(${c.id},1)">+</button>
            </div>

            <div class="cart-item-subtotal">${fmt(c.harga * c.qty)}</div>

            <button class="cart-remove" onclick="removeFromCart(${c.id})">×</button>
        </div>
        `).join('');
            }

            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);

            document.getElementById('cart-total').textContent = fmt(total);
            document.getElementById('cart-subtotal').textContent = fmt(total);
            document.getElementById('cart-count').textContent = cart.length + ' item';

            calcChange();
            toggleCheckout();
        }

        // ================= BAYAR =================
        function calcChange() {
            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const bayar = parseInt(document.getElementById('pay-inp').value) || 0;
            const kembali = bayar - total;

            document.getElementById('change-val').textContent = fmt(Math.max(0, kembali));
        }

        // ================= CHECKOUT =================
        function toggleCheckout() {
            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const bayar = parseInt(document.getElementById('pay-inp').value) || 0;

            document.getElementById('checkout-btn').disabled = !(cart.length && bayar >= total);
        }

        function submitCheckout() {
            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const bayar = parseInt(document.getElementById('pay-inp').value) || 0;
            const kembali = bayar - total;

            document.getElementById('items-json').value = JSON.stringify(cart);
            document.getElementById('total-hidden').value = total;
            document.getElementById('bayar-hidden').value = bayar;
            document.getElementById('kembalian-hidden').value = kembali;

            document.getElementById('checkout-form').submit();
        }

        // ================= BARCODE =================
        function processBarcode(code) {
            const prod = PRODUK_DB.find(p =>
                p.kode_produk.toLowerCase() === code.toLowerCase()
            );

            if (prod) {
                addToCart(prod.id, prod.nama_produk, prod.harga_jual, prod.stok, prod.kode_produk);
                alert('Produk: ' + prod.nama_produk);
            } else {
                alert('Tidak ditemukan');
            }
        }

        // ================= CAMERA =================
        let cameraStream = null;

        async function startCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
                cameraStream = stream;

                const video = document.getElementById('camera-video');
                video.srcObject = stream;
                video.style.display = 'block';

            } catch (err) {
                alert('Kamera error');
            }
        }

        function stopCamera() {
            if (cameraStream) {
                cameraStream.getTracks().forEach(t => t.stop());
            }

            const video = document.getElementById('camera-video');
            video.style.display = 'none';
        }
    </script>

</x-layout.sidebar>