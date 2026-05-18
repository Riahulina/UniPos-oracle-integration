<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .trx-wrap * {
            box-sizing: border-box;
        }

        .trx-wrap {
            font-family: 'DM Sans', system-ui, sans-serif;
        }

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

        .trx-body {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 20px;
            align-items: start;
        }

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

        .panel-dot {
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

        /* search */
        .search-row {
            display: flex;
            gap: 8px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }

        .search-wrap {
            flex: 1;
            min-width: 160px;
            position: relative;
        }

        .search-wrap svg {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 14px;
            height: 14px;
            color: #93A3B8;
            pointer-events: none;
        }

        .s-inp {
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

        .s-inp:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .f-sel {
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

        /* product grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(125px, 1fr));
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
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.13);
        }

        .prod-card.stok-habis {
            opacity: .5;
            pointer-events: none;
        }

        .prod-img {
            height: 72px;
            background: #EFF6FF;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-size: 26px;
        }

        .prod-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .prod-body {
            padding: 8px 10px 4px;
            flex: 1;
        }

        .prod-kat {
            font-size: 9px;
            font-weight: 600;
            color: #3B82F6;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 2px;
        }

        .prod-name {
            font-size: 11.5px;
            font-weight: 600;
            color: #1E3A8A;
            margin-bottom: 2px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            line-height: 1.35;
        }

        .prod-price {
            font-size: 11px;
            color: #1D4ED8;
            font-weight: 600;
        }

        .prod-stok {
            font-size: 10px;
            color: #93A3B8;
        }

        .prod-stok.low {
            color: #DC2626;
        }

        .prod-footer {
            padding: 6px 10px 10px;
        }

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

        .prod-add-btn:hover {
            background: #1E40AF;
        }

        .prod-add-btn:disabled {
            background: #BFDBFE;
            cursor: not-allowed;
        }

        .prod-empty {
            grid-column: 1/-1;
            text-align: center;
            padding: 40px 16px;
            color: #93A3B8;
            font-size: 13px;
        }

        /* scan */
        .scan-area {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

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

        /* Video yang di-inject Quagga */
        .scan-viewfinder video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Canvas overlay Quagga */
        .scan-viewfinder canvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .corner {
            position: absolute;
            width: 36px;
            height: 36px;
            z-index: 10;
        }

        .c-tl {
            top: 14px;
            left: 14px;
            border-top: 3px solid #3B82F6;
            border-left: 3px solid #3B82F6;
            border-radius: 4px 0 0 0;
        }

        .c-tr {
            top: 14px;
            right: 14px;
            border-top: 3px solid #3B82F6;
            border-right: 3px solid #3B82F6;
            border-radius: 0 4px 0 0;
        }

        .c-bl {
            bottom: 14px;
            left: 14px;
            border-bottom: 3px solid #3B82F6;
            border-left: 3px solid #3B82F6;
            border-radius: 0 0 0 4px;
        }

        .c-br {
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
            animation: scanline 2s ease-in-out infinite;
            display: none;
            z-index: 10;
        }

        @keyframes scanline {

            0%,
            100% {
                top: 25%;
                opacity: 1
            }

            50% {
                top: 75%;
                opacity: .6
            }
        }

        .scan-ph {
            color: #475569;
            font-size: 13px;
            text-align: center;
            z-index: 10;
            position: relative;
        }

        .scan-ph svg {
            width: 44px;
            height: 44px;
            margin: 0 auto 10px;
            display: block;
            opacity: .45;
        }

        .scan-stat {
            width: 100%;
            max-width: 480px;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 12px;
            text-align: center;
            background: #F0F9FF;
            color: #0369A1;
            border: 1.5px solid #BAE6FD;
            transition: all .25s;
        }

        .scan-stat.ok {
            background: #ECFDF5;
            color: #065F46;
            border-color: #6EE7B7;
        }

        .scan-stat.err {
            background: #FEF2F2;
            color: #991B1B;
            border-color: #FCA5A5;
        }

        .scan-row {
            display: flex;
            gap: 8px;
            width: 100%;
            max-width: 480px;
            margin-bottom: 10px;
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
        }

        .scan-inp:focus {
            border-color: #3B82F6;
        }

        .scan-add {
            background: #1D4ED8;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
        }

        .cam-btns {
            display: flex;
            gap: 10px;
            width: 100%;
            max-width: 480px;
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

        .cam-start {
            border: 1.5px solid #BFDBFE;
            background: #F0F6FF;
            color: #1D4ED8;
        }

        .cam-stop {
            border: 1.5px solid #FCA5A5;
            background: #FEF2F2;
            color: #DC2626;
        }

        /* cart panel */
        .cart-panel {
            background: white;
            border-radius: 18px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 2px 12px rgba(37, 99, 235, 0.07);
            padding: 22px;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 16px;
        }

        .cart-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
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

        /* order mode toggle */
        .omt {
            display: flex;
            background: #F0F6FF;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 14px;
        }

        .omt-btn {
            flex: 1;
            padding: 9px 8px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            background: transparent;
            color: #93A3B8;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .omt-btn svg {
            width: 13px;
            height: 13px;
            flex-shrink: 0;
        }

        .omt-btn.active.is-order {
            background: #6366F1;
            color: white;
        }

        .omt-btn.active.is-pay {
            background: #1D4ED8;
            color: white;
        }

        .omt-div {
            width: 1px;
            background: #BFDBFE;
        }

        /* mode info banner */
        .mode-info {
            border-radius: 9px;
            padding: 8px 12px;
            font-size: 11.5px;
            font-weight: 500;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .mode-info.order {
            background: #EEF2FF;
            color: #4F46E5;
            border: 1px solid #C7D2FE;
        }

        .mode-info.pay {
            background: #EFF6FF;
            color: #1D4ED8;
            border: 1px solid #BFDBFE;
        }

        .mode-info svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        /* nama pelanggan */
        .field {
            margin-bottom: 12px;
        }

        .field-lbl {
            font-size: 11px;
            font-weight: 600;
            color: #64748B;
            margin-bottom: 5px;
            letter-spacing: .01em;
            display: block;
        }

        .field-inp {
            width: 100%;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            padding: 9px 13px;
            font-size: 13px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            outline: none;
            transition: border .15s;
        }

        .field-inp:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* cart items */
        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-height: 120px;
            max-height: 240px;
            overflow-y: auto;
            margin-bottom: 14px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 10px;
            border-radius: 10px;
            background: #F8FBFF;
            border: 1px solid #DBEAFE;
        }

        .c-img {
            width: 32px;
            height: 32px;
            border-radius: 7px;
            background: #EFF6FF;
            flex-shrink: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .c-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .c-info {
            flex: 1;
            min-width: 0;
        }

        .c-name {
            font-size: 12px;
            font-weight: 600;
            color: #1E3A8A;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .c-unit {
            font-size: 11px;
            color: #64748B;
        }

        .c-qty {
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
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .12s;
        }

        .qty-btn:hover {
            background: #EFF6FF;
        }

        .qty-n {
            font-size: 12px;
            font-weight: 600;
            color: #1E3A8A;
            min-width: 20px;
            text-align: center;
        }

        .c-sub {
            font-size: 12px;
            font-weight: 600;
            color: #1D4ED8;
            white-space: nowrap;
        }

        .c-rm {
            background: none;
            border: none;
            cursor: pointer;
            color: #FCA5A5;
            font-size: 13px;
            padding: 2px 4px;
            border-radius: 4px;
            transition: color .12s;
        }

        .c-rm:hover {
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

        .divider {
            height: 1px;
            background: #EFF6FF;
            margin-bottom: 12px;
        }

        .sum-row {
            display: flex;
            justify-content: space-between;
            font-size: 12.5px;
            margin-bottom: 6px;
        }

        .sum-row .lbl {
            color: #64748B;
        }

        .sum-row .val {
            color: #1E3A8A;
            font-weight: 600;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 14px;
            margin-top: 4px;
        }

        .total-lbl {
            font-size: 13px;
            font-weight: 600;
            color: #1E3A8A;
        }

        .total-val {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 24px;
            color: #1D4ED8;
            letter-spacing: -0.5px;
        }

        /* pay section */
        .pay-section {
            display: none;
        }

        .pay-lbl {
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

        .checkout-btn.is-order {
            background: #6366F1;
            color: white;
        }

        .checkout-btn.is-order:hover:not(:disabled) {
            background: #4F46E5;
            transform: translateY(-1px);
        }

        .checkout-btn.is-pay {
            background: #1D4ED8;
            color: white;
        }

        .checkout-btn.is-pay:hover:not(:disabled) {
            background: #1E40AF;
            transform: translateY(-1px);
        }

        .checkout-btn:disabled {
            opacity: .4;
            cursor: not-allowed;
            transform: none !important;
        }

        .flash {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 18px;
        }

        .flash-s {
            background: #ECFDF5;
            color: #065F46;
            border: 1px solid #6EE7B7;
        }

        .flash-e {
            background: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FCA5A5;
        }

        @media (max-width:960px) {
            .trx-body {
                grid-template-columns: 1fr;
            }

            .cart-panel {
                position: static;
            }
        }
    </style>

    <div class="trx-wrap">

        @if(session('success'))
        <div class="flash flash-s">&#10003; {{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="flash flash-e">&#10005; {{ session('error') }}</div>
        @endif

        <div class="trx-header">
            <div class="trx-title">Transaksi <span>Baru</span></div>
            <div class="mode-switcher">
                <button class="mode-btn active" id="btn-manual" onclick="switchInputMode('manual')">
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="2" y="2" width="12" height="12" rx="2" />
                        <path d="M5 8h6M8 5v6" />
                    </svg>
                    Input Manual
                </button>
                <div class="mode-divider"></div>
                <button class="mode-btn" id="btn-scan" onclick="switchInputMode('scan')">
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M1 5V3a2 2 0 012-2h2M1 11v2a2 2 0 002 2h2M15 5V3a2 2 0 00-2-2h-2M15 11v2a2 2 0 01-2 2h-2" />
                        <line x1="4" y1="8" x2="12" y2="8" />
                    </svg>
                    Scan Barcode
                </button>
            </div>
        </div>

        <div class="trx-body">
            <div>
                {{-- MANUAL --}}
                <div class="panel mode-panel show" id="panel-manual">
                    <div class="panel-title">
                        <div class="panel-dot"></div> Pilih Produk
                    </div>
                    <div class="search-row">
                        <div class="search-wrap">
                            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="7" cy="7" r="4.5" />
                                <path d="M10.5 10.5L14 14" />
                            </svg>
                            <input class="s-inp" type="text" id="search-inp" placeholder="Cari nama, kode, barcode..." oninput="filterProds()">
                        </div>
                        <select class="f-sel" id="filter-kat" onchange="filterProds()">
                            <option value="">Semua Kategori</option>
                            @foreach($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="product-grid" id="prod-grid">
                        @forelse($produk as $p)
                        <div class="prod-card {{ $p->stok <= 0 && !$p->is_jasa ? 'stok-habis' : '' }}"
                            data-id="{{ $p->id }}" data-nama="{{ strtolower($p->nama_produk) }}"
                            data-kode="{{ strtolower($p->kode_produk ?? '') }}"
                            data-barcode="{{ strtolower($p->barcode ?? '') }}"
                            data-kat="{{ $p->kategori_id }}"
                            onclick="addToCart({{ $p->id }},'{{ addslashes($p->nama_produk) }}',{{ $p->harga_jual }},{{ $p->stok }},'{{ $p->satuan }}',{{ $p->is_jasa ? 'true' : 'false' }},'{{ $p->gambar ? asset('storage/'.$p->gambar) : '' }}')">
                            <div class="prod-img">
                                @if($p->gambar)<img src="{{ asset('storage/'.$p->gambar) }}" alt="">@else 📦 @endif
                            </div>
                            <div class="prod-body">
                                <div class="prod-kat">{{ $p->kategori->nama_kategori ?? '—' }}</div>
                                <div class="prod-name">{{ $p->nama_produk }}</div>
                                <div class="prod-price">Rp {{ number_format($p->harga_jual,0,',','.') }}</div>
                                <div class="prod-stok {{ $p->stok <= $p->stok_minimal && !$p->is_jasa ? 'low' : '' }}">
                                    {{ $p->is_jasa ? 'Jasa' : 'Stok: '.$p->stok.' '.$p->satuan }}
                                </div>
                            </div>
                            <div class="prod-footer">
                                <button class="prod-add-btn"
                                    onclick="event.stopPropagation(); addToCart({{ $p->id }},'{{ addslashes($p->nama_produk) }}',{{ $p->harga_jual }},{{ $p->stok }},'{{ $p->satuan }}',{{ $p->is_jasa ? 'true' : 'false' }},'{{ $p->gambar ? asset('storage/'.$p->gambar) : '' }}')"
                                    {{ $p->stok <= 0 && !$p->is_jasa ? 'disabled' : '' }}>
                                    {{ $p->stok <= 0 && !$p->is_jasa ? 'Stok Habis' : '+ Tambah' }}
                                </button>
                            </div>
                        </div>
                        @empty
                        <div class="prod-empty">Belum ada produk aktif</div>
                        @endforelse
                    </div>
                </div>

                {{-- SCAN --}}
                <div class="panel mode-panel" id="panel-scan">
                    <div class="panel-title">
                        <div class="panel-dot" style="background:#6366F1;"></div> Scan Barcode Produk
                    </div>
                    <div class="scan-area">
                        <div class="scan-viewfinder" id="scan-viewfinder">
                            {{-- HAPUS tag video, Quagga inject sendiri --}}
                            <div class="corner c-tl"></div>
                            <div class="corner c-tr"></div>
                            <div class="corner c-bl"></div>
                            <div class="corner c-br"></div>
                            <div class="scan-line" id="scan-line"></div>
                            <div class="scan-ph" id="scan-ph">
                                <svg viewBox="0 0 44 44" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="4" y="12" width="36" height="20" rx="2" />
                                    <line x1="11" y1="12" x2="11" y2="32" />
                                    <line x1="15" y1="12" x2="15" y2="32" />
                                    <line x1="19" y1="12" x2="19" y2="32" stroke-width="3" />
                                    <line x1="24" y1="12" x2="24" y2="32" />
                                    <line x1="28" y1="12" x2="28" y2="32" />
                                    <line x1="32" y1="12" x2="32" y2="32" stroke-width="3" />
                                </svg>
                                Arahkan kamera ke barcode produk
                            </div>
                        </div>
                        <div class="scan-stat" id="scan-status">Kamera belum aktif &middot; Klik "Aktifkan Kamera"</div>
                        <div class="scan-row">
                            <input class="scan-inp" id="barcode-inp" type="text" placeholder="Atau ketik kode barcode manual..."
                                onkeydown="if(event.key==='Enter'){ processBarcode(this.value); this.value=''; }">
                            <button class="scan-add" onclick="processBarcode(document.getElementById('barcode-inp').value); document.getElementById('barcode-inp').value='';">Tambah</button>
                        </div>
                        <div class="cam-btns">
                            <button class="cam-btn cam-start" onclick="startCamera()">Aktifkan Kamera</button>
                            <button class="cam-btn cam-stop" onclick="stopCamera()">Hentikan Kamera</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CART --}}
            <div class="cart-panel">
                <div class="cart-head">
                    <div class="cart-title">Keranjang</div>
                    <div class="cart-badge" id="cart-count">0 item</div>
                </div>

                {{-- ORDER MODE TOGGLE --}}
                <div class="omt">
                    <button class="omt-btn is-order active" id="omt-order" onclick="setOrderMode('order')">
                        <svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="1" y="1" width="11" height="11" rx="2" />
                            <path d="M4 6.5h5M6.5 4v5" />
                        </svg>
                        Pesan Saja
                    </button>
                    <div class="omt-div"></div>
                    <button class="omt-btn is-pay" id="omt-pay" onclick="setOrderMode('pay')">
                        <svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="1" y="3" width="11" height="8" rx="1.5" />
                            <path d="M1 6h11" />
                        </svg>
                        Bayar Langsung
                    </button>
                </div>

                {{-- MODE INFO BANNER --}}
                <div class="mode-info order" id="mode-info">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="7" cy="7" r="6" />
                        <path d="M7 4v3.5l2 2" />
                    </svg>
                    <span id="mode-info-text">Pesanan akan disimpan &amp; bisa dibayar nanti</span>
                </div>

                {{-- NAMA PELANGGAN — selalu tampil --}}
                <div class="field">
                    <label class="field-lbl">NAMA PELANGGAN / MEJA</label>
                    <input class="field-inp" type="text" id="nama-inp"
                        placeholder="Contoh: Budi, Meja 3, Take Away...">
                </div>

                <div class="cart-items" id="cart-items">
                    <div class="cart-empty">Belum ada produk<br>ditambahkan</div>
                </div>

                <div class="divider"></div>
                <div class="sum-row"><span class="lbl">Subtotal</span><span class="val" id="c-sub">Rp 0</span></div>
                <div class="sum-row"><span class="lbl">Diskon</span><span class="val" style="color:#059669;">&mdash; Rp 0</span></div>
                <div class="total-row">
                    <span class="total-lbl">Total</span>
                    <span class="total-val" id="c-total">Rp 0</span>
                </div>

                <form id="checkout-form" action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="items" id="f-items">
                    <input type="hidden" name="total" id="f-total">
                    <input type="hidden" name="bayar" id="f-bayar" value="0">
                    <input type="hidden" name="kembalian" id="f-kembalian" value="0">
                    <input type="hidden" name="mode" id="f-mode" value="order">
                    <input type="hidden" name="nama_pelanggan_baru" id="f-nama">

                    <div class="pay-section" id="pay-section">
                        <div class="pay-lbl">Nominal Bayar</div>
                        <input class="pay-inp" type="number" id="pay-inp" placeholder="Masukkan nominal..." oninput="calcChange()" min="0">
                        <div class="change-box">
                            <span class="change-lbl">Kembalian</span>
                            <span class="change-val" id="c-change">Rp 0</span>
                        </div>
                    </div>

                    <button type="button" class="checkout-btn is-order" id="checkout-btn" disabled onclick="doCheckout()">
                        Simpan Pesanan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>

    <script>
        const PRODUK_DB = @json($produk);
        let cart = [];
        let orderMode = 'order';

        function fmt(n) {
            return 'Rp ' + Math.round(n).toLocaleString('id-ID');
        }

        /* ─── INPUT MODE (manual/scan) ─── */
        function switchInputMode(mode) {
            ['manual', 'scan'].forEach(m => {
                document.getElementById('panel-' + m).classList.toggle('show', m === mode);
                document.getElementById('btn-' + m).classList.toggle('active', m === mode);
            });
            if (mode === 'manual') stopCamera();
        }

        /* ─── ORDER MODE (pesan/pay) ─── */
        function setOrderMode(mode) {
            orderMode = mode;

            document.getElementById('omt-order').classList.toggle('active', mode === 'order');
            document.getElementById('omt-pay').classList.toggle('active', mode === 'pay');
            document.getElementById('f-mode').value = mode;

            const paySection = document.getElementById('pay-section');
            paySection.style.display = mode === 'pay' ? 'block' : 'none';

            const infoEl = document.getElementById('mode-info');
            const infoText = document.getElementById('mode-info-text');
            if (mode === 'order') {
                infoEl.className = 'mode-info order';
                infoText.textContent = 'Pesanan akan disimpan & bisa dibayar nanti';
            } else {
                infoEl.className = 'mode-info pay';
                infoText.textContent = 'Bayar langsung, struk otomatis keluar';
            }

            const btn = document.getElementById('checkout-btn');
            btn.className = 'checkout-btn ' + (mode === 'order' ? 'is-order' : 'is-pay');
            btn.textContent = mode === 'order' ? 'Simpan Pesanan' : 'Proses Transaksi';

            updateBtn();
        }

        /* ─── FILTER PRODUK ─── */
        function filterProds() {
            const q = document.getElementById('search-inp').value.toLowerCase().trim();
            const kat = document.getElementById('filter-kat').value;
            let n = 0;
            document.querySelectorAll('#prod-grid .prod-card').forEach(c => {
                const ok = (!q || c.dataset.nama.includes(q) || c.dataset.kode.includes(q) || c.dataset.barcode.includes(q)) &&
                    (!kat || c.dataset.kat === kat);
                c.style.display = ok ? '' : 'none';
                if (ok) n++;
            });
            const emp = document.querySelector('#prod-grid .prod-empty');
            if (emp) emp.style.display = n === 0 ? '' : 'none';
        }

        /* ─── CART ─── */
        function addToCart(id, nama, harga, stok, satuan, isJasa, gambar) {
            if (!isJasa && stok <= 0) return;
            const ex = cart.find(c => c.id === id);
            if (ex) {
                if (!isJasa && ex.qty >= stok) {
                    alert('Stok tidak cukup!');
                    return;
                }
                ex.qty++;
            } else {
                cart.push({
                    id,
                    nama,
                    harga,
                    stok,
                    satuan,
                    isJasa,
                    gambar,
                    qty: 1
                });
            }
            renderCart();
        }

        function changeQty(id, d) {
            const i = cart.findIndex(c => c.id === id);
            if (i < 0) return;
            cart[i].qty += d;
            if (cart[i].qty <= 0) cart.splice(i, 1);
            renderCart();
        }

        function removeCart(id) {
            cart = cart.filter(c => c.id !== id);
            renderCart();
        }

        function renderCart() {
            const el = document.getElementById('cart-items');
            el.innerHTML = cart.length ?
                cart.map(c => `
                    <div class="cart-item">
                        <div class="c-img">${c.gambar ? `<img src="${c.gambar}" alt="">` : '📦'}</div>
                        <div class="c-info">
                            <div class="c-name">${c.nama}</div>
                            <div class="c-unit">${fmt(c.harga)} / ${c.satuan||'pcs'}</div>
                        </div>
                        <div class="c-qty">
                            <button class="qty-btn" onclick="changeQty(${c.id},-1)">−</button>
                            <span class="qty-n">${c.qty}</span>
                            <button class="qty-btn" onclick="changeQty(${c.id},1)">+</button>
                        </div>
                        <div class="c-sub">${fmt(c.harga*c.qty)}</div>
                        <button class="c-rm" onclick="removeCart(${c.id})">&#10005;</button>
                    </div>`)
                .join('') :
                '<div class="cart-empty">Belum ada produk<br>ditambahkan</div>';

            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const qty = cart.reduce((s, c) => s + c.qty, 0);
            document.getElementById('c-sub').textContent = fmt(total);
            document.getElementById('c-total').textContent = fmt(total);
            document.getElementById('cart-count').textContent = qty + ' item';
            calcChange();
        }

        function calcChange() {
            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const bayar = parseInt(document.getElementById('pay-inp').value) || 0;
            document.getElementById('c-change').textContent = fmt(Math.max(0, bayar - total));
            updateBtn();
        }

        function updateBtn() {
            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const bayar = parseInt(document.getElementById('pay-inp').value) || 0;
            let ok = cart.length > 0;
            if (orderMode === 'pay') ok = ok && bayar >= total;
            document.getElementById('checkout-btn').disabled = !ok;
        }

        function doCheckout() {
            const total = cart.reduce((s, c) => s + c.harga * c.qty, 0);
            const bayar = parseInt(document.getElementById('pay-inp').value) || 0;
            document.getElementById('f-items').value = JSON.stringify(cart.map(c => ({
                id: c.id,
                nama: c.nama,
                harga: c.harga,
                qty: c.qty
            })));
            document.getElementById('f-total').value = total;
            document.getElementById('f-bayar').value = orderMode === 'pay' ? bayar : 0;
            document.getElementById('f-kembalian').value = orderMode === 'pay' ? Math.max(0, bayar - total) : 0;
            document.getElementById('f-nama').value = document.getElementById('nama-inp').value.trim();
            document.getElementById('checkout-form').submit();
        }

        /* ─── BARCODE ─── */
        function processBarcode(code) {
            code = (code || '').trim();
            if (!code) return;

            const p = PRODUK_DB.find(p =>
                (p.barcode && p.barcode.toLowerCase() === code.toLowerCase()) ||
                (p.kode_produk && p.kode_produk.toLowerCase() === code.toLowerCase())
            );

            if (p) {
                addToCart(
                    p.id,
                    p.nama_produk,
                    p.harga_jual,
                    p.stok,
                    p.satuan,
                    p.is_jasa,
                    p.gambar ? `/storage/${p.gambar}` : ''
                );

                setStat('ok', '&#10003; Ditemukan: ' + p.nama_produk);
            } else {
                setStat('err', '&#10005; Kode tidak ditemukan: ' + code);
            }

            setTimeout(() => setStat('', 'Kamera aktif &middot; Siap scan'), 2500);
        }

        function setStat(type, msg) {
            const el = document.getElementById('scan-status');
            el.className = 'scan-stat' + (type ? ' ' + type : '');
            el.innerHTML = msg;
        }

        /* ─── CAMERA ─── */
        let qrScanner;

        function startCamera() {
            const reader = document.getElementById('scan-viewfinder');

            reader.innerHTML = ""; // reset isi

            qrScanner = new Html5Qrcode("scan-viewfinder");

            qrScanner.start({
                    facingMode: "environment"
                }, {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                },
                (decodedText) => {
                    processBarcode(decodedText);

                    qrScanner.stop().then(() => {
                        setTimeout(() => startCamera(), 2000);
                    });
                },
                (errorMessage) => {
                    // ignore error scan
                }
            ).catch(err => {
                setStat('err', 'Kamera error: ' + err);
            });

            setStat('ok', 'Kamera aktif · Scan QR Code');
        }
        Quagga.onDetected(function(result) {
            const code = result.codeResult.code;
            if (!code) return;

            processBarcode(code);

            Quagga.stop();
            scanning = false;

            setTimeout(() => {
                if (document.getElementById('panel-scan').classList.contains('show')) {
                    startCamera();
                }
            }, 2000);
        });


        function stopCamera() {
            if (qrScanner) {
                qrScanner.stop().catch(() => {});
            }
            setStat('', 'Kamera dihentikan');
        }

        // init
        setOrderMode('order');
    </script>

</x-layout.sidebar>