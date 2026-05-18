<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .show-wrap * {
            box-sizing: border-box;
        }

        .show-wrap {
            font-family: 'DM Sans', system-ui, sans-serif;
        }

        /* ── PAGE HEADER ── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 24px;
        }

        .page-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 22px;
            color: #1E3A8A;
            letter-spacing: -0.5px;
        }

        .page-title span {
            font-style: italic;
            color: #3B82F6;
        }

        .action-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'DM Sans', system-ui, sans-serif;
            cursor: pointer;
            text-decoration: none;
            transition: all .15s;
            border: none;
            white-space: nowrap;
        }

        .btn-print {
            background: #1D4ED8;
            color: white;
        }

        .btn-print:hover {
            background: #1E40AF;
            transform: translateY(-1px);
        }

        .btn-back {
            background: white;
            color: #64748B;
            border: 1.5px solid #BFDBFE;
        }

        .btn-back:hover {
            background: #EFF6FF;
            color: #1D4ED8;
        }

        .btn-del {
            background: #FEF2F2;
            color: #DC2626;
            border: 1.5px solid #FCA5A5;
        }

        .btn-del:hover {
            background: #FEE2E2;
        }

        /* ── STATUS / BADGE ── */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-lunas {
            background: #ECFDF5;
            color: #059669;
            border: 1px solid #6EE7B7;
        }

        /* ── STRUK OUTER ── */
        .struk-outer {
            display: flex;
            justify-content: center;
            padding: 8px 0 32px;
        }

        .struk {
            background: white;
            width: 100%;
            max-width: 440px;
            border-radius: 20px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 4px 24px rgba(37, 99, 235, 0.10), 0 1px 4px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        /* ── STRUK HEAD ── */
        .struk-head {
            background: linear-gradient(135deg, #1D4ED8 0%, #3B82F6 60%, #0EA5E9 100%);
            padding: 28px 28px 36px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .struk-head::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            background: rgba(255, 255, 255, .06);
            border-radius: 50%;
        }

        .struk-head::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: 20%;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, .04);
            border-radius: 50%;
        }

        .struk-logo-ring {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .15);
            border: 2px solid rgba(255, 255, 255, .3);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            position: relative;
            z-index: 1;
        }

        .struk-logo-ring svg {
            width: 28px;
            height: 28px;
        }

        .struk-toko-nama {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 20px;
            color: white;
            letter-spacing: -0.4px;
            margin-bottom: 4px;
            position: relative;
            z-index: 1;
        }

        .struk-toko-info {
            font-size: 11.5px;
            color: rgba(255, 255, 255, .80);
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        /* wave */
        .struk-wave {
            background: white;
            position: relative;
            height: 20px;
            margin-top: -1px;
        }

        .struk-wave::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 0;
            right: 0;
            height: 40px;
            background: white;
            border-radius: 50% 50% 0 0 / 20px 20px 0 0;
        }

        /* ── META ── */
        .struk-meta {
            padding: 0 24px 16px;
        }

        .meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            padding: 6px 0;
            border-bottom: 1px dashed #EFF6FF;
        }

        .meta-row:last-child {
            border-bottom: none;
        }

        .meta-lbl {
            color: #64748B;
            font-weight: 500;
        }

        .meta-val {
            color: #1E3A8A;
            font-weight: 600;
            text-align: right;
        }

        .meta-val.mono {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 13px;
            color: #1D4ED8;
            letter-spacing: -0.2px;
        }

        /* ── PERFORATION ── */
        .perforation {
            position: relative;
            margin: 4px 0;
            height: 1px;
        }

        .perforation::before {
            content: '';
            position: absolute;
            top: 0;
            left: -1px;
            right: -1px;
            border-top: 2px dashed #BFDBFE;
        }

        .perf-circle-l,
        .perf-circle-r {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            background: #F0F6FF;
            border-radius: 50%;
            border: 1px solid #DBEAFE;
        }

        .perf-circle-l {
            left: -22px;
        }

        .perf-circle-r {
            right: -22px;
        }

        /* ── ITEMS ── */
        .struk-items {
            padding: 16px 24px 8px;
        }

        .items-head {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 8px;
            font-size: 10px;
            font-weight: 600;
            color: #64748B;
            text-transform: uppercase;
            letter-spacing: .06em;
            padding-bottom: 8px;
            border-bottom: 1.5px solid #E2E8F0;
            margin-bottom: 4px;
        }

        .items-head .col-price,
        .items-head .col-sub {
            text-align: right;
        }

        .item-row {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 8px;
            padding: 9px 0;
            border-bottom: 1px dashed #EFF6FF;
            align-items: start;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-col-info {
            min-width: 0;
        }

        .item-no {
            display: inline-block;
            width: 18px;
            height: 18px;
            background: #EFF6FF;
            color: #1D4ED8;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 600;
            text-align: center;
            line-height: 18px;
            margin-right: 4px;
        }

        .item-nama {
            font-size: 12.5px;
            font-weight: 600;
            color: #1E3A8A;
            margin-bottom: 2px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .item-qty-detail {
            font-size: 10.5px;
            color: #64748B;
        }

        .item-col-price {
            text-align: right;
            font-size: 11.5px;
            color: #64748B;
            white-space: nowrap;
            padding-top: 1px;
        }

        .item-col-sub {
            text-align: right;
            font-size: 12px;
            font-weight: 600;
            color: #1E3A8A;
            white-space: nowrap;
            padding-top: 1px;
        }

        /* ── SUMMARY ── */
        .struk-summary {
            padding: 12px 24px 8px;
        }

        .sum-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            padding: 5px 0;
        }

        .sum-lbl {
            color: #64748B;
        }

        .sum-val {
            color: #1E3A8A;
            font-weight: 600;
        }

        .sum-val.green {
            color: #059669;
        }

        .sum-total-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: 12px 16px;
            background: #EFF6FF;
            border-radius: 12px;
            margin-top: 8px;
        }

        .sum-total-lbl {
            font-size: 13px;
            font-weight: 600;
            color: #1E3A8A;
        }

        .sum-total-val {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 22px;
            color: #1D4ED8;
            letter-spacing: -0.5px;
        }

        .bayar-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 16px;
            margin-top: 6px;
        }

        .kembalian-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 16px;
            background: #ECFDF5;
            border-radius: 10px;
            margin-top: 4px;
        }

        .kembalian-lbl {
            font-size: 12px;
            color: #065F46;
            font-weight: 500;
        }

        .kembalian-val {
            font-size: 13px;
            font-weight: 600;
            color: #059669;
        }

        .metode-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #EFF6FF;
            color: #1D4ED8;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 99px;
            border: 1px solid #BFDBFE;
        }

        .metode-badge svg {
            width: 12px;
            height: 12px;
        }

        /* ── BARCODE ── */
        .struk-barcode {
            padding: 16px 24px 12px;
            text-align: center;
        }

        #struk-barcode-svg svg {
            display: inline-block;
        }

        .barcode-ref {
            font-size: 10px;
            color: #94A3B8;
            margin-top: 4px;
            letter-spacing: .08em;
        }

        /* ── FOOTER ── */
        .struk-footer {
            background: #F8FBFF;
            border-top: 1px dashed #BFDBFE;
            padding: 16px 24px;
            text-align: center;
        }

        .footer-thanks {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 15px;
            color: #1E3A8A;
            margin-bottom: 4px;
        }

        .footer-sub {
            font-size: 11px;
            color: #94A3B8;
            line-height: 1.6;
        }

        .footer-dots {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            margin: 10px 0;
        }

        .footer-dot {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: #BFDBFE;
        }

        /* ── FLASH ── */
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

        /* ══════════════════════════════════════════════════════════
           PRINT — Teknik: visibility:hidden semua, lalu
                   visibility:visible hanya .struk dan isinya.
                   Ini cara paling reliabel lintas browser.
           ══════════════════════════════════════════════════════════ */
        @media print {

            /* Sembunyikan seluruh halaman */
            body * {
                visibility: hidden !important;
            }

            /* Tampilkan hanya struk */
            .struk,
            .struk * {
                visibility: visible !important;
            }

            /* Posisi fixed supaya struk saja yang muncul di kertas */
            .struk {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                width: 80mm !important;
                max-width: 80mm !important;
                border: none !important;
                box-shadow: none !important;
                border-radius: 0 !important;
                overflow: visible !important;
            }

            /* PAKSA background graphics tampil saat print */
            .struk-head,
            .sum-total-row,
            .kembalian-row,
            .struk-footer,
            .item-no,
            .metode-badge,
            .status-lunas {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            /* Override warna teks — pastikan semua terbaca */
            .struk-toko-nama {
                color: #ffffff !important;
            }

            .struk-toko-info {
                color: rgba(255, 255, 255, 0.85) !important;
            }

            .meta-lbl {
                color: #475569 !important;
            }

            .meta-val {
                color: #1e3a8a !important;
            }

            .meta-val.mono {
                color: #1d4ed8 !important;
            }

            .item-nama {
                color: #1e3a8a !important;
            }

            .item-qty-detail {
                color: #475569 !important;
            }

            .item-col-price {
                color: #475569 !important;
            }

            .item-col-sub {
                color: #1e3a8a !important;
            }

            .items-head {
                color: #475569 !important;
            }

            .item-no {
                color: #1d4ed8 !important;
            }

            .sum-lbl {
                color: #475569 !important;
            }

            .sum-val {
                color: #1e3a8a !important;
            }

            .sum-val.green {
                color: #059669 !important;
            }

            .sum-total-lbl {
                color: #1e3a8a !important;
            }

            .sum-total-val {
                color: #1d4ed8 !important;
            }

            .kembalian-lbl {
                color: #065f46 !important;
            }

            .kembalian-val {
                color: #059669 !important;
            }

            .footer-thanks {
                color: #1e3a8a !important;
            }

            .footer-sub {
                color: #475569 !important;
            }

            .barcode-ref {
                color: #475569 !important;
            }

            .status-lunas {
                color: #059669 !important;
            }

            .metode-badge {
                color: #1d4ed8 !important;
            }

            /* Ukuran kertas thermal */
            @page {
                size: 80mm auto;
                margin: 0;
            }
        }
    </style>

    <div class="show-wrap">

        @if(session('success'))
        <div class="flash flash-s">&#10003; {{ session('success') }}</div>
        @endif

        <div class="page-header">
            <div class="page-title">Detail <span>Transaksi</span></div>
            <div class="action-row">
                <a href="{{ route('transaksi.index') }}" class="btn btn-back">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 2L4 7l5 5" />
                    </svg>
                    Kembali
                </a>
                <button class="btn btn-print" onclick="window.print()">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="1" width="8" height="5" rx="1" />
                        <path d="M3 6H1a1 1 0 00-1 1v4a1 1 0 001 1h1v-2h10v2h1a1 1 0 001-1V7a1 1 0 00-1-1h-2" />
                        <rect x="3" y="9" width="8" height="4" rx="1" />
                        <circle cx="11" cy="8" r=".8" fill="currentColor" />
                    </svg>
                    Cetak Struk
                </button>
                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST"
                    onsubmit="return confirm('Hapus transaksi ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-del">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M2 3.5h10M5.5 3.5V2h3v1.5M4 3.5l.7 8h4.6l.7-8" />
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        {{-- STRUK --}}
        <div class="struk-outer">
            <div class="struk">

                <div class="struk-head">
                    <div class="struk-logo-ring">
                        <svg viewBox="0 0 28 28" fill="none" stroke="white" stroke-width="1.6">
                            <path d="M4 10l10-7 10 7v14H4V10z" />
                            <rect x="10" y="16" width="8" height="8" rx="1" />
                        </svg>
                    </div>
                    <div class="struk-toko-nama">{{ $transaksi->usaha->nama_usaha ?? config('app.name', 'UniPOS') }}</div>
                    <div class="struk-toko-info">
                        {{ $transaksi->usaha->alamat ?? 'Jl. Contoh No. 123, Kota' }}<br>
                        Telp: {{ $transaksi->usaha->telepon ?? '08xx-xxxx-xxxx' }}
                        @if($transaksi->usaha->email ?? false)
                        &nbsp;&middot;&nbsp;{{ $transaksi->usaha->email }}
                        @endif
                    </div>
                </div>

                <div class="struk-wave"></div>

                <div class="struk-meta">
                    <div class="struk-toko-nama">
                        {{ $usaha->nama_usaha ?? 'Nama Usaha Belum Diisi' }}
                    </div>
                    <div class="meta-row">
                        <span class="meta-lbl">No. Transaksi</span>
                        <span class="meta-val mono">#TRX-{{ str_pad($transaksi->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="meta-row">
                        <span class="meta-lbl">Tanggal</span>
                        <span class="meta-val">{{ $transaksi->created_at->translatedFormat('d F Y, H:i') }} WIB</span>
                    </div>
                    <div class="meta-row">
                        <span class="meta-lbl">Kasir</span>
                        <span class="meta-val">
                            {{ $transaksi->user->name ?? 'Kasir' }}
                        </span>
                    </div>

                    <div class="meta-row">
                        <span class="meta-lbl">Pelanggan</span>
                        <span class="meta-val">
                            {{ $transaksi->nama_pelanggan ?? 'Umum' }}
                        </span>
                    </div>
                    <div class="meta-row">
                        <span class="meta-lbl">Metode Bayar</span>
                        <span class="meta-val">
                            <span class="metode-badge">
                                <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <rect x="1" y="3" width="10" height="7" rx="1.5" />
                                    <path d="M1 6h10" />
                                </svg>
                                {{ ucfirst($transaksi->metode_bayar ?? 'Tunai') }}
                            </span>
                        </span>
                    </div>
                    <div class="meta-row">
                        <span class="meta-lbl">Status</span>
                        <span class="meta-val">
                            <span class="status-badge status-lunas">
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="#059669">
                                    <circle cx="4" cy="4" r="4" />
                                </svg>
                                Lunas
                            </span>
                        </span>
                    </div>
                </div>

                <div class="perforation">
                    <div class="perf-circle-l"></div>
                    <div class="perf-circle-r"></div>
                </div>

                <div class="struk-items">
                    <div class="items-head">
                        <span>Produk</span>
                        <span class="col-price">Harga</span>
                        <span class="col-sub">Subtotal</span>
                    </div>
                    @foreach($transaksi->items as $i => $item)
                    <div class="item-row">
                        <div class="item-col-info">
                            <div class="item-nama">
                                <span class="item-no">{{ $i + 1 }}</span>{{ $item->nama_produk }}
                            </div>
                            <div class="item-qty-detail">{{ $item->qty }} &times; Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                        </div>
                        <div class="item-col-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                        <div class="item-col-sub">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>

                <div class="perforation">
                    <div class="perf-circle-l"></div>
                    <div class="perf-circle-r"></div>
                </div>

                <div class="struk-summary">
                    <div class="sum-row">
                        <span class="sum-lbl">Subtotal ({{ $transaksi->items->sum('qty') }} item)</span>
                        <span class="sum-val">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</span>
                    </div>
                    <div class="sum-row">
                        <span class="sum-lbl">Diskon</span>
                        <span class="sum-val green">&mdash; Rp 0</span>
                    </div>
                    <div class="sum-row">
                        <span class="sum-lbl">Pajak (0%)</span>
                        <span class="sum-val">Rp 0</span>
                    </div>
                    <div class="sum-total-row">
                        <span class="sum-total-lbl">Total Bayar</span>
                        <span class="sum-total-val">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</span>
                    </div>
                    <div class="bayar-row">
                        <span class="sum-lbl" style="font-size:12px;">Dibayar</span>
                        <span class="sum-val" style="font-size:13px;">Rp {{ number_format($transaksi->bayar, 0, ',', '.') }}</span>
                    </div>
                    <div class="kembalian-row">
                        <span class="kembalian-lbl">Kembalian</span>
                        <span class="kembalian-val">Rp {{ number_format($transaksi->kembalian, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="struk-barcode">
                    <div id="struk-barcode-svg"></div>
                    <div class="barcode-ref">TRX-{{ str_pad($transaksi->id, 6, '0', STR_PAD_LEFT) }}</div>
                </div>

                <div class="perforation">
                    <div class="perf-circle-l"></div>
                    <div class="perf-circle-r"></div>
                </div>

                <div class="struk-footer">
                    <div class="footer-dots">
                        <div class="footer-dot"></div>
                        <div class="footer-dot"></div>
                        <div class="footer-dot"></div>
                    </div>
                    <div class="footer-thanks">Terima Kasih!</div>
                    <div class="footer-sub">
                        Barang yang sudah dibeli tidak dapat dikembalikan.<br>
                        Simpan struk ini sebagai bukti pembelian Anda.
                    </div>
                    <div class="footer-dots">
                        <div class="footer-dot"></div>
                        <div class="footer-dot"></div>
                        <div class="footer-dot"></div>
                    </div>
                    <div style="font-size:10px; color:#94A3B8; margin-top:6px;">
                        Powered by UniPOS &middot; {{ now()->format('Y') }}
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- QR CODE LIBRARY -->
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>

    <script>
        const code = 'TRX{{ str_pad($transaksi->id, 6, "0", STR_PAD_LEFT) }}';

        const container = document.getElementById("struk-barcode-svg");
        container.innerHTML = ""; // reset

        new QRCode(container, {
            text: code,
            width: 90,
            height: 90,
            colorDark: "#1E3A8A",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>

</x-layout.sidebar>