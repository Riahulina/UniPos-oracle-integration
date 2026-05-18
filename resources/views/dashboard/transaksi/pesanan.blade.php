<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .pso-wrap * {
            box-sizing: border-box;
        }

        .pso-wrap {
            font-family: 'DM Sans', system-ui, sans-serif;
        }

        /* ── HEADER ── */
        .pso-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 22px;
        }

        .pso-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 24px;
            color: #1E3A8A;
            letter-spacing: -0.6px;
        }

        .pso-title span {
            font-style: italic;
            color: #6366F1;
        }

        .btn-new {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #1D4ED8;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'DM Sans', system-ui, sans-serif;
            cursor: pointer;
            text-decoration: none;
            transition: all .15s;
        }

        .btn-new:hover {
            background: #1E40AF;
            transform: translateY(-1px);
        }

        /* ── STATS ── */
        .pso-stats {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .stat-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid #DBEAFE;
            border-radius: 10px;
            padding: 8px 14px;
            font-size: 12px;
            color: #64748B;
            box-shadow: 0 1px 4px rgba(37, 99, 235, 0.05);
        }

        .stat-pill strong {
            color: #1E3A8A;
            font-size: 14px;
            font-weight: 600;
        }

        .s-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* ── GRID ── */
        .pso-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 14px;
        }

        /* ── CARD ── */
        .pso-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 2px 10px rgba(37, 99, 235, 0.07);
            overflow: hidden;
            transition: all .15s;
        }

        .pso-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.12);
        }

        .card-top {
            padding: 16px 18px 12px;
            border-bottom: 1px dashed #EFF6FF;
        }

        .card-top-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 10px;
        }

        .card-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
            color: #6366F1;
            font-weight: 700;
            font-family: 'DM Serif Display', Georgia, serif;
        }

        .card-meta {
            flex: 1;
            min-width: 0;
        }

        .card-nama {
            font-size: 14px;
            font-weight: 600;
            color: #1E3A8A;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 2px;
        }

        .card-time {
            font-size: 11px;
            color: #93A3B8;
        }

        .badge-pending {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #FEF9C3;
            color: #92400E;
            font-size: 10px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 99px;
            white-space: nowrap;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #F59E0B;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .3
            }
        }

        /* items preview */
        .card-items {
            padding: 12px 18px 10px;
        }

        .item-line {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #475569;
            padding: 3px 0;
        }

        .item-line:not(:last-child) {
            border-bottom: 1px dashed #F1F5F9;
        }

        .item-nm {
            flex: 1;
            min-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .item-nm strong {
            color: #1E3A8A;
            font-weight: 600;
        }

        .item-sub {
            color: #1D4ED8;
            font-weight: 600;
            white-space: nowrap;
            margin-left: 8px;
        }

        .items-more {
            font-size: 11px;
            color: #93A3B8;
            margin-top: 4px;
        }

        /* total + actions */
        .card-foot {
            padding: 12px 18px 16px;
            background: #FAFCFF;
            border-top: 1px solid #EFF6FF;
        }

        .card-total-row {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .card-total-lbl {
            font-size: 12px;
            color: #64748B;
        }

        .card-total-val {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 20px;
            color: #1D4ED8;
            letter-spacing: -0.4px;
        }

        .card-actions {
            display: flex;
            gap: 8px;
        }

        .btn-bayar {
            flex: 1;
            background: #1D4ED8;
            color: white;
            border: none;
            border-radius: 9px;
            padding: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-bayar:hover {
            background: #1E40AF;
        }

        .btn-bayar svg {
            width: 14px;
            height: 14px;
        }

        .btn-detail {
            padding: 10px 14px;
            background: white;
            color: #64748B;
            border: 1.5px solid #BFDBFE;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .btn-detail:hover {
            background: #EFF6FF;
            color: #1D4ED8;
        }

        .btn-del {
            padding: 10px 12px;
            background: #FEF2F2;
            color: #DC2626;
            border: 1.5px solid #FCA5A5;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
        }

        .btn-del:hover {
            background: #FEE2E2;
        }

        /* ── EMPTY STATE ── */
        .pso-empty {
            text-align: center;
            padding: 60px 20px;
            color: #93A3B8;
        }

        .pso-empty svg {
            width: 56px;
            height: 56px;
            margin: 0 auto 16px;
            display: block;
            color: #BFDBFE;
        }

        .pso-empty h3 {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 18px;
            color: #1E3A8A;
            margin-bottom: 6px;
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

        .flash-e {
            background: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FCA5A5;
        }

        /* ════════════════════════════════════════
           MODAL BAYAR — full payment experience
           ════════════════════════════════════════ */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(3px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 16px;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-box {
            background: white;
            border-radius: 20px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: modal-in .2s ease;
        }

        @keyframes modal-in {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        /* modal header */
        .modal-head {
            background: linear-gradient(135deg, #1D4ED8, #3B82F6);
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-head-left {}

        .modal-head-label {
            font-size: 11px;
            font-weight: 600;
            color: rgba(255, 255, 255, .6);
            letter-spacing: .05em;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .modal-head-nama {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 18px;
            color: white;
            letter-spacing: -0.4px;
        }

        .modal-close {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: rgba(255, 255, 255, .15);
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .15s;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, .25);
        }

        /* modal body */
        .modal-body {
            padding: 20px 24px;
        }

        /* items list di modal */
        .modal-items {
            background: #F8FBFF;
            border: 1px solid #DBEAFE;
            border-radius: 12px;
            margin-bottom: 16px;
            overflow: hidden;
        }

        .modal-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            font-size: 12.5px;
        }

        .modal-item:not(:last-child) {
            border-bottom: 1px dashed #EFF6FF;
        }

        .mi-no {
            width: 20px;
            height: 20px;
            background: #EFF6FF;
            color: #1D4ED8;
            border-radius: 5px;
            font-size: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .mi-name {
            flex: 1;
            color: #1E3A8A;
            font-weight: 600;
        }

        .mi-qty {
            color: #64748B;
            white-space: nowrap;
        }

        .mi-sub {
            color: #1D4ED8;
            font-weight: 600;
            white-space: nowrap;
        }

        /* summary di modal */
        .modal-sum {
            margin-bottom: 16px;
        }

        .modal-sum-row {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            padding: 4px 0;
        }

        .modal-sum-row .lbl {
            color: #64748B;
        }

        .modal-sum-row .val {
            color: #1E3A8A;
            font-weight: 600;
        }

        .modal-total-box {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            background: #EFF6FF;
            border-radius: 10px;
            padding: 12px 16px;
            margin-top: 8px;
        }

        .modal-total-lbl {
            font-size: 13px;
            font-weight: 600;
            color: #1E3A8A;
        }

        .modal-total-val {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 22px;
            color: #1D4ED8;
            letter-spacing: -0.5px;
        }

        /* bayar input */
        .modal-inp-label {
            font-size: 11.5px;
            color: #64748B;
            margin-bottom: 6px;
            font-weight: 500;
        }

        .modal-inp {
            width: 100%;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            padding: 11px 14px;
            font-size: 14px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            outline: none;
            margin-bottom: 10px;
            transition: border .15s;
        }

        .modal-inp:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* kembalian */
        .modal-change {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ECFDF5;
            border: 1.5px solid #6EE7B7;
            border-radius: 10px;
            padding: 10px 14px;
            margin-bottom: 16px;
        }

        .mc-lbl {
            font-size: 12px;
            color: #065F46;
            font-weight: 500;
        }

        .mc-val {
            font-size: 15px;
            font-weight: 600;
            color: #059669;
        }

        /* quick amount btns */
        .quick-amounts {
            display: flex;
            gap: 6px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }

        .qa-btn {
            flex: 1;
            min-width: 70px;
            padding: 7px 8px;
            background: #F0F6FF;
            color: #1D4ED8;
            border: 1.5px solid #BFDBFE;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
            text-align: center;
            white-space: nowrap;
        }

        .qa-btn:hover {
            background: #DBEAFE;
        }

        .qa-btn.exact {
            background: #EEF2FF;
            color: #4F46E5;
            border-color: #C7D2FE;
        }

        /* modal actions */
        .modal-actions {
            display: flex;
            gap: 8px;
        }

        .modal-btn-batal {
            flex: 1;
            padding: 11px;
            background: white;
            color: #64748B;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
        }

        .modal-btn-batal:hover {
            background: #F1F5F9;
        }

        .modal-btn-bayar {
            flex: 2;
            padding: 11px;
            background: #1D4ED8;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .modal-btn-bayar:hover:not(:disabled) {
            background: #1E40AF;
        }

        .modal-btn-bayar:disabled {
            opacity: .4;
            cursor: not-allowed;
        }

        .modal-btn-bayar svg {
            width: 14px;
            height: 14px;
        }

        @media (max-width:600px) {
            .pso-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="pso-wrap">

        @if(session('success'))
        <div class="flash flash-s">&#10003; {{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="flash flash-e">&#10005; {{ session('error') }}</div>
        @endif

        <div class="pso-header">
            <div class="pso-title">Pesanan <span>Pending</span></div>
            <a href="{{ route('transaksi.create') }}" class="btn-new">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M7 2v10M2 7h10" />
                </svg>
                Transaksi Baru
            </a>
        </div>

        {{-- STATS --}}
        <div class="pso-stats">
            <div class="stat-pill">
                <div class="s-dot" style="background:#F59E0B;"></div>
                Menunggu Bayar <strong>{{ $pesanan->count() }}</strong>
            </div>
            <div class="stat-pill">
                <div class="s-dot" style="background:#1D4ED8;"></div>
                Total Tertunda
                <strong>Rp {{ number_format($pesanan->sum('total'), 0, ',', '.') }}</strong>
            </div>
        </div>

        {{-- GRID PESANAN --}}
        <div class="pso-grid" id="pso-grid">
            @forelse($pesanan as $p)
            <div class="pso-card">
                <div class="card-top">
                    <div class="card-top-row">
                        <div class="card-avatar">
                            {{ mb_strtoupper(mb_substr($p->nama_pelanggan ?? 'T', 0, 1)) }}
                        </div>
                        <div class="card-meta">
                            <div class="card-nama">
                                {{ $p->nama_pelanggan ?? 'Tanpa Nama' }}
                            </div>
                            <div class="card-time">
                                {{ $p->created_at->diffForHumans() }} &middot;
                                {{ $p->created_at->format('H:i') }}
                            </div>
                        </div>
                        <div class="badge-pending">
                            <div class="badge-dot"></div>
                            PENDING
                        </div>
                    </div>

                    {{-- Nomor pesanan --}}
                    <div style="font-size:11px; color:#93A3B8;">
                        #TRX-{{ str_pad($p->id, 6, '0', STR_PAD_LEFT) }}
                    </div>
                </div>

                {{-- Preview item --}}
                <div class="card-items">
                    @foreach($p->items->take(3) as $item)
                    <div class="item-line">
                        <span class="item-nm">
                            <strong>{{ $item->qty }}x</strong> {{ $item->nama_produk }}
                        </span>
                        <span class="item-sub">
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </span>
                    </div>
                    @endforeach
                    @if($p->items->count() > 3)
                    <div class="items-more">
                        +{{ $p->items->count() - 3 }} item lainnya
                    </div>
                    @endif
                </div>

                {{-- Footer --}}
                <div class="card-foot">
                    <div class="card-total-row">
                        <span class="card-total-lbl">Total Tagihan</span>
                        <span class="card-total-val">
                            Rp {{ number_format($p->total, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="card-actions">
                        <button class="btn-bayar" onclick="openModal({{ $p->id }}, {{ $p->total }}, '{{ addslashes($p->nama_pelanggan ?? 'Tanpa Nama') }}', {{ $p->items->count() }})">
                            <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="1" y="3" width="12" height="9" rx="1.5" />
                                <path d="M1 6.5h12" />
                            </svg>
                            Bayar Sekarang
                        </button>
                        <form action="{{ route('transaksi.destroy', $p->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-del"
                                onclick="return confirm('Hapus pesanan {{ addslashes($p->nama_pelanggan ?? 'ini') }}?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="pso-empty" style="grid-column:1/-1;">
                <svg viewBox="0 0 56 56" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="8" y="8" width="40" height="40" rx="6" />
                    <path d="M18 20h20M18 28h14M18 36h8" />
                </svg>
                <h3>Tidak Ada Pesanan Pending</h3>
                <p>Semua pesanan sudah dibayar atau belum ada transaksi baru</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- ═══════ MODAL BAYAR ═══════ --}}
    <div class="modal-overlay" id="modal-overlay" onclick="closeModal(event)">
        <div class="modal-box" id="modal-box">

            <div class="modal-head">
                <div class="modal-head-left">
                    <div class="modal-head-label">Pembayaran Pesanan</div>
                    <div class="modal-head-nama" id="modal-nama">—</div>
                </div>
                <button class="modal-close" onclick="closeModal()">&#10005;</button>
            </div>

            <div class="modal-body">

                {{-- Detail item di modal --}}
                <div class="modal-items" id="modal-items">
                    {{-- diisi JS --}}
                </div>

                {{-- Summary --}}
                <div class="modal-sum">
                    <div class="modal-sum-row">
                        <span class="lbl">Subtotal</span>
                        <span class="val" id="modal-subtotal">Rp 0</span>
                    </div>
                    <div class="modal-sum-row">
                        <span class="lbl">Diskon</span>
                        <span class="val" style="color:#059669;">&mdash; Rp 0</span>
                    </div>
                    <div class="modal-total-box">
                        <span class="modal-total-lbl">Total Tagihan</span>
                        <span class="modal-total-val" id="modal-total-val">Rp 0</span>
                    </div>
                </div>

                {{-- Quick amounts --}}
                <div class="quick-amounts" id="quick-amounts">
                    {{-- diisi JS --}}
                </div>

                {{-- Input bayar --}}
                <div class="modal-inp-label">Nominal Bayar</div>
                <input class="modal-inp" type="number" id="modal-bayar-inp"
                    placeholder="Masukkan nominal..." oninput="modalCalcChange()" min="0">

                {{-- Kembalian --}}
                <div class="modal-change">
                    <span class="mc-lbl">Kembalian</span>
                    <span class="mc-val" id="modal-change">Rp 0</span>
                </div>

                {{-- Actions --}}
                <div class="modal-actions">
                    <button class="modal-btn-batal" onclick="closeModal()">Batal</button>
                    <button class="modal-btn-bayar" id="modal-submit-btn" disabled onclick="submitBayar()">
                        <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M2 7l4 4 6-6" />
                        </svg>
                        Konfirmasi Bayar
                    </button>
                </div>

            </div>

            {{-- Hidden form --}}
            <form id="form-bayar" method="POST" style="display:none;">
                @csrf
                <input type="hidden" name="bayar" id="f-modal-bayar">
            </form>
        </div>
    </div>

    {{-- Pesanan data untuk lookup items di modal --}}
    <script>
        const PESANAN_DATA = @json($pesananData);
        let currentId = null;
        let currentTotal = 0;

        function fmt(n) {
            return 'Rp ' + Math.round(n).toLocaleString('id-ID');
        }

        function openModal(id, total, nama, itemCount) {
            currentId = id;
            currentTotal = total;

            // set nama
            document.getElementById('modal-nama').textContent = nama;

            // set summary
            document.getElementById('modal-subtotal').textContent = fmt(total);
            document.getElementById('modal-total-val').textContent = fmt(total);

            // render items
            const pesanan = PESANAN_DATA[id];
            const itemsEl = document.getElementById('modal-items');
            if (pesanan && pesanan.items.length) {
                itemsEl.innerHTML = pesanan.items.map((item, i) => `
                    <div class="modal-item">
                        <div class="mi-no">${i+1}</div>
                        <div class="mi-name">${item.nama_produk}</div>
                        <div class="mi-qty">${item.qty}x ${fmt(item.harga)}</div>
                        <div class="mi-sub">${fmt(item.subtotal)}</div>
                    </div>
                `).join('');
            } else {
                itemsEl.innerHTML = '<div style="padding:14px;text-align:center;color:#93A3B8;font-size:12px;">' + itemCount + ' item</div>';
            }

            // quick amounts
            const amounts = generateQuickAmounts(total);
            document.getElementById('quick-amounts').innerHTML = amounts.map(a => `
                <button class="qa-btn ${a.exact ? 'exact' : ''}" onclick="setQuickAmount(${a.value})">
                    ${a.label}
                </button>
            `).join('');

            // reset input
            document.getElementById('modal-bayar-inp').value = '';
            document.getElementById('modal-change').textContent = fmt(0);
            document.getElementById('modal-submit-btn').disabled = true;

            // form action
            document.getElementById('form-bayar').action = '/transaksi/' + id + '/bayar';

            // show modal
            document.getElementById('modal-overlay').classList.add('open');
            setTimeout(() => document.getElementById('modal-bayar-inp').focus(), 200);
        }

        function generateQuickAmounts(total) {
            const amounts = [];
            // Uang pas
            amounts.push({
                label: 'Uang Pas',
                value: total,
                exact: true
            });
            // Pembulatan ke atas
            const rounds = [1000, 2000, 5000, 10000, 20000, 50000, 100000];
            for (const r of rounds) {
                const rounded = Math.ceil(total / r) * r;
                if (rounded > total && rounded <= total + 100000) {
                    amounts.push({
                        label: fmt(rounded),
                        value: rounded,
                        exact: false
                    });
                    if (amounts.length >= 4) break;
                }
            }
            return amounts.slice(0, 4);
        }

        function setQuickAmount(val) {
            document.getElementById('modal-bayar-inp').value = val;
            modalCalcChange();
        }

        function modalCalcChange() {
            const bayar = parseInt(document.getElementById('modal-bayar-inp').value) || 0;
            const kembalian = bayar - currentTotal;
            document.getElementById('modal-change').textContent = fmt(Math.max(0, kembalian));
            document.getElementById('modal-submit-btn').disabled = bayar < currentTotal;
        }

        function closeModal(e) {
            if (e && e.target !== document.getElementById('modal-overlay')) return;
            document.getElementById('modal-overlay').classList.remove('open');
        }

        function submitBayar() {
            const bayar = parseInt(document.getElementById('modal-bayar-inp').value) || 0;
            document.getElementById('f-modal-bayar').value = bayar;
            document.getElementById('form-bayar').submit();
        }
    </script>

</x-layout.sidebar>