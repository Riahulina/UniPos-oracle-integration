<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .dash {
            font-family: 'DM Sans', system-ui, sans-serif;
        }

        /* ── GREETING ── */
        .dash-greet {
            background: linear-gradient(135deg, #adc9f8 0%, #54caed 55%, #7aa0f1 100%);
            border-radius: 20px;
            padding: 32px 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            margin-bottom: 28px;
        }

        .dash-greet::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 220px;
            height: 220px;
            background: rgba(255, 255, 255, .07);
            border-radius: 50%;
        }

        .dash-greet::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 30%;
            width: 160px;
            height: 160px;
            background: rgba(255, 255, 255, .04);
            border-radius: 50%;
        }

        .greet-left {
            position: relative;
            z-index: 1;
        }

        .greet-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 99px;
            padding: 4px 12px;
            font-size: 11px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.80);
            letter-spacing: .05em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .greet-dot {
            width: 6px;
            height: 6px;
            background: #FCD34D;
            border-radius: 50%;
            animation: blink 2s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .35
            }
        }

        .greet-name {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 28px;
            color: white;
            letter-spacing: -0.8px;
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .greet-name em {
            font-style: italic;
            color: #FCD34D;
        }

        .greet-sub {
            font-size: 13.5px;
            color: rgba(255, 255, 255, .55);
            max-width: 380px;
            line-height: 1.6;
        }

        .greet-right {
            position: relative;
            z-index: 1;
            text-align: right;
            flex-shrink: 0;
        }

        .greet-date {
            font-size: 12px;
            color: rgba(255, 255, 255, .45);
            margin-bottom: 4px;
        }

        .greet-time {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 36px;
            color: white;
            letter-spacing: -1px;
            line-height: 1;
        }

        /* ── STAT CARDS ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #EFF6FF;
            padding: 20px 22px;
            position: relative;
            overflow: hidden;
            transition: transform .2s, box-shadow .2s;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.06);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(37, 99, 235, 0.12);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: 16px 16px 0 0;
        }

        .stat-card.c-blue::before {
            background: #3B82F6;
        }

        .stat-card.c-indigo::before {
            background: #6366F1;
        }

        .stat-card.c-sky::before {
            background: #0EA5E9;
        }

        .stat-card.c-red::before {
            background: #EF4444;
        }

        .stat-card.c-amber::before {
            background: #F59E0B;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 14px;
        }

        .ic-blue {
            background: #EFF6FF;
        }

        .ic-indigo {
            background: #EEF2FF;
        }

        .ic-sky {
            background: #F0F9FF;
        }

        .ic-red {
            background: #FEF2F2;
        }

        .ic-amber {
            background: #FFFBEB;
        }

        .stat-label {
            font-size: 12px;
            font-weight: 500;
            color: #93A3B8;
            margin-bottom: 6px;
            letter-spacing: .01em;
        }

        .stat-value {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 26px;
            letter-spacing: -0.8px;
            line-height: 1;
            margin-bottom: 8px;
        }

        .sv-blue {
            color: #1D4ED8;
        }

        .sv-indigo {
            color: #4F46E5;
        }

        .sv-sky {
            color: #0284C7;
        }

        .sv-red {
            color: #DC2626;
        }

        .sv-amber {
            color: #D97706;
        }

        .stat-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 99px;
        }

        .badge-up {
            background: #ECFDF5;
            color: #059669;
        }

        .badge-down {
            background: #FEF2F2;
            color: #DC2626;
        }

        .badge-neu {
            background: #EFF6FF;
            color: #3B82F6;
        }

        .badge-warn {
            background: #FFFBEB;
            color: #D97706;
        }

        /* ── BOTTOM GRID ── */
        .dash-bottom {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 20px;
        }

        /* chart card */
        .chart-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #EFF6FF;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.06);
            padding: 24px 26px;
        }

        .card-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 18px;
            color: #1E3A8A;
            letter-spacing: -0.4px;
        }

        .chart-tabs {
            display: flex;
            gap: 4px;
        }

        .chart-tab {
            font-size: 11px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 7px;
            border: none;
            cursor: pointer;
            transition: all .15s;
            background: transparent;
            color: #93A3B8;
            font-family: 'DM Sans', system-ui, sans-serif;
        }

        .chart-tab.active {
            background: #EFF6FF;
            color: #1D4ED8;
        }

        .chart-tab:hover:not(.active) {
            background: #F8FAFF;
            color: #3B82F6;
        }

        /* bar chart */
        .bar-chart {
            display: flex;
            align-items: flex-end;
            gap: 10px;
            height: 180px;
            padding-top: 10px;
        }

        .bar-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .bar-outer {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            height: 150px;
        }

        .bar-fill {
            width: 70%;
            border-radius: 6px 6px 0 0;
            position: relative;
            transition: opacity .2s;
            cursor: pointer;
        }

        .bar-fill.dim {
            background: linear-gradient(180deg, #BFDBFE, #93C5FD);
        }

        .bar-fill.active-bar {
            background: linear-gradient(180deg, #3B82F6, #1D4ED8);
        }

        .bar-fill.gold {
            background: linear-gradient(180deg, #FCD34D, #F59E0B);
        }

        .bar-fill:hover {
            opacity: .85;
        }

        .bar-label {
            font-size: 10px;
            font-weight: 500;
            color: #93A3B8;
        }

        .bar-tooltip {
            position: absolute;
            top: -28px;
            left: 50%;
            transform: translateX(-50%);
            background: #1E3A8A;
            color: white;
            font-size: 9px;
            font-weight: 600;
            padding: 3px 6px;
            border-radius: 5px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity .15s;
        }

        .bar-fill:hover .bar-tooltip {
            opacity: 1;
        }

        /* trx card */
        .trx-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #EFF6FF;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.06);
            padding: 22px;
            display: flex;
            flex-direction: column;
        }

        .trx-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 16px;
            flex: 1;
        }

        .trx-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 10px;
            background: #F8FBFF;
            border: 1px solid #EFF6FF;
            transition: background .15s;
        }

        .trx-item:hover {
            background: #EFF6FF;
        }

        .trx-ic {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .trx-info {
            flex: 1;
            min-width: 0;
        }

        .trx-name {
            font-size: 12.5px;
            font-weight: 600;
            color: #1E3A8A;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .trx-time {
            font-size: 10.5px;
            color: #93A3B8;
        }

        .trx-amt {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 13px;
            color: #1D4ED8;
            letter-spacing: -0.3px;
            white-space: nowrap;
        }

        .view-all {
            display: block;
            text-align: center;
            margin-top: 14px;
            font-size: 12px;
            font-weight: 600;
            color: #3B82F6;
            text-decoration: none;
            padding: 8px;
            border-radius: 8px;
            background: #F0F7FF;
            border: 1px solid #DBEAFE;
            transition: all .15s;
        }

        .view-all:hover {
            background: #DBEAFE;
            color: #1D4ED8;
        }

        /* empty state */
        .trx-empty {
            text-align: center;
            padding: 30px 16px;
            color: #93A3B8;
            font-size: 13px;
        }

        /* pending banner */
        .pending-banner {
            display: flex;
            align-items: center;
            gap: 14px;
            background: white;
            border: 1px solid #FEF3C7;
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.08);
        }

        .pending-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #FFFBEB;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .pending-info {
            flex: 1;
        }

        .pending-title {
            font-size: 13px;
            font-weight: 600;
            color: #92400E;
            margin-bottom: 2px;
        }

        .pending-sub {
            font-size: 11.5px;
            color: #B45309;
        }

        .pending-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #F59E0B;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 14px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            font-family: 'DM Sans', system-ui, sans-serif;
            white-space: nowrap;
            transition: background .15s;
        }

        .pending-btn:hover {
            background: #D97706;
        }

        @media (max-width:1100px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width:900px) {
            .dash-bottom {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width:600px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .greet-right {
                display: none;
            }

            .dash-greet {
                padding: 24px 22px;
            }
        }
    </style>

    <div class="dash">

        {{-- ── GREETING BANNER ── --}}
        <div class="dash-greet">
            <div class="greet-left">
                <div class="greet-tag">
                    <div class="greet-dot"></div>
                    Dashboard UniPOS
                </div>
                <h1 class="greet-name">
                    Halo, <em>{{ auth()->user()->name }}</em> 👋
                </h1>
                <p class="greet-sub">
                    Selamat datang kembali. Semoga hari ini penuh semangat dan produktif!
                </p>
            </div>
            <div class="greet-right">
                <div class="greet-date" id="dashDate"></div>
                <div class="greet-time" id="dashTime"></div>
            </div>
        </div>

        {{-- ── BANNER PESANAN PENDING (hanya tampil kalau ada) ── --}}
        @if($totalPending > 0)
        <div class="pending-banner">
            <div class="pending-icon">🕐</div>
            <div class="pending-info">
                <div class="pending-title">
                    Ada {{ $totalPending }} pesanan menunggu pembayaran
                </div>
                <div class="pending-sub">
                    Pesanan ini belum lunas dan perlu segera diproses
                </div>
            </div>
            <a href="{{ route('transaksi.pesanan') }}" class="pending-btn">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M2 6h8M6 2l4 4-4 4" />
                </svg>
                Lihat Pesanan
            </a>
        </div>
        @endif

        {{-- ── STAT CARDS ── --}}
        <div class="stats-grid">

            {{-- Penjualan hari ini --}}
            <div class="stat-card c-blue">
                <div class="stat-icon ic-blue">💰</div>
                <div class="stat-label">Penjualan Hari Ini</div>
                <div class="stat-value sv-blue">
                    @if($penjualanHariIni >= 1000000)
                    Rp {{ number_format($penjualanHariIni / 1000000, 1) }} Jt
                    @elseif($penjualanHariIni >= 1000)
                    Rp {{ number_format($penjualanHariIni / 1000, 0) }} Rb
                    @else
                    Rp {{ number_format($penjualanHariIni, 0, ',', '.') }}
                    @endif
                </div>
                @if($penjualanPersen > 0)
                <span class="stat-badge badge-up">↑ {{ $penjualanPersen }}% vs kemarin</span>
                @elseif($penjualanPersen < 0)
                    <span class="stat-badge badge-down">↓ {{ abs($penjualanPersen) }}% vs kemarin</span>
                    @else
                    <span class="stat-badge badge-neu">Sama seperti kemarin</span>
                    @endif
            </div>

            {{-- Total transaksi --}}
            <div class="stat-card c-indigo">
                <div class="stat-icon ic-indigo">🧾</div>
                <div class="stat-label">Transaksi Hari Ini</div>
                <div class="stat-value sv-indigo">{{ $totalTrxHariIni }}</div>
                @if($trxSelisih > 0)
                <span class="stat-badge badge-up">↑ {{ $trxSelisih }} vs kemarin</span>
                @elseif($trxSelisih < 0)
                    <span class="stat-badge badge-down">↓ {{ abs($trxSelisih) }} vs kemarin</span>
                    @else
                    <span class="stat-badge badge-neu">{{ $totalTrxKemarin }} kemarin</span>
                    @endif
            </div>

            {{-- Total produk aktif --}}
            <div class="stat-card c-sky">
                <div class="stat-icon ic-sky">📦</div>
                <div class="stat-label">Produk Aktif</div>
                <div class="stat-value sv-sky">{{ $totalProduk }}</div>
                <span class="stat-badge badge-neu">Terdaftar di sistem</span>
            </div>

            {{-- Stok menipis --}}
            <div class="stat-card c-red">
                <div class="stat-icon ic-red">⚠️</div>
                <div class="stat-label">Stok Menipis</div>
                <div class="stat-value sv-red">{{ $stokMenipis }}</div>
                @if($stokMenipis > 0)
                <a href="{{ route('produk.index') }}" style="text-decoration:none;">
                    <span class="stat-badge badge-down">Perlu restok</span>
                </a>
                @else
                <span class="stat-badge badge-up">Stok aman</span>
                @endif
            </div>

        </div>

        {{-- ── BOTTOM GRID ── --}}
        <div class="dash-bottom">

            {{-- CHART PENJUALAN 7 HARI --}}
            <div class="chart-card">
                <div class="card-head">
                    <span class="card-title">Grafik Penjualan</span>
                    <div style="font-size:12px; color:#3B82F6; font-weight:600;">
                        Total minggu ini:
                        Rp {{ number_format($totalMingguIni, 0, ',', '.') }}
                    </div>
                </div>

                <div class="bar-chart">
                    @php
                    $grafikMax = $maxGrafik ?: 1;
                    @endphp

                    @foreach($grafik as $bar)
                    @php
                    $pct = $bar['total'] > 0
                    ? max(4, round(($bar['total'] / $grafikMax) * 100))
                    : 4;

                    // Tentukan class bar
                    $isMax = $bar['total'] === $grafikMax && $bar['total'] > 0;
                    $isToday = $bar['today'];
                    $barClass = $isMax ? 'gold' : ($isToday ? 'active-bar' : 'dim');

                    // Format tooltip
                    $tooltipVal = $bar['total'] >= 1000000
                    ? 'Rp '.number_format($bar['total']/1000000, 1).' Jt'
                    : ($bar['total'] >= 1000
                    ? 'Rp '.number_format($bar['total']/1000, 0).' Rb'
                    : 'Rp '.number_format($bar['total'], 0, ',', '.'));
                    @endphp
                    <div class="bar-group">
                        <div class="bar-outer">
                            <div class="bar-fill {{ $barClass }}" style="height:{{ $pct }}%;">
                                <div class="bar-tooltip">{{ $tooltipVal }}</div>
                            </div>
                        </div>
                        <div class="bar-label">{{ $bar['label'] }}</div>
                    </div>
                    @endforeach
                </div>

                <div style="display:flex;align-items:center;gap:16px;margin-top:16px;padding-top:14px;border-top:1px solid #EFF6FF;">
                    <div style="display:flex;align-items:center;gap:6px;font-size:11px;color:#93A3B8;">
                        <div style="width:10px;height:10px;border-radius:3px;background:linear-gradient(#3B82F6,#1D4ED8);"></div>
                        Penjualan
                    </div>
                    <div style="display:flex;align-items:center;gap:6px;font-size:11px;color:#93A3B8;">
                        <div style="width:10px;height:10px;border-radius:3px;background:linear-gradient(#FCD34D,#F59E0B);"></div>
                        Tertinggi
                    </div>
                    <div style="display:flex;align-items:center;gap:6px;font-size:11px;color:#93A3B8;">
                        <div style="width:10px;height:10px;border-radius:3px;background:linear-gradient(#93C5FD,#BFDBFE);"></div>
                        Hari lain
                    </div>
                </div>
            </div>

            {{-- TRANSAKSI TERBARU --}}
            <div class="trx-card">
                <div class="card-head">
                    <span class="card-title">Transaksi Terbaru</span>
                    <a href="{{ route('transaksi.index') }}"
                        style="font-size:11px;color:#3B82F6;text-decoration:none;font-weight:600;">
                        Semua →
                    </a>
                </div>

                <div class="trx-list">
                    @forelse($transaksiTerbaru as $trx)
                    @php
                    $icon = match(true) {
                    $trx->items->count() > 0 && str_contains(strtolower($trx->items->first()->nama_produk ?? ''), 'kopi') => '☕',
                    $trx->items->count() > 0 && str_contains(strtolower($trx->items->first()->nama_produk ?? ''), 'makan') => '🍱',
                    $trx->items->count() > 0 && str_contains(strtolower($trx->items->first()->nama_produk ?? ''), 'minum') => '🥤',
                    default => '🛒',
                    };
                    $bgColor = match(true) {
                    str_contains($icon, '☕') => '#FFFBEB',
                    str_contains($icon, '🍱') => '#ECFDF5',
                    str_contains($icon, '🥤') => '#FFF7ED',
                    default => '#EFF6FF',
                    };
                    $label = $trx->nama_pelanggan
                    ?? ($trx->items->first()->nama_produk ?? 'Transaksi');
                    $kasir = $trx->user->name ?? 'Admin';
                    $shortAmt = $trx->total >= 1000000
                    ? number_format($trx->total / 1000000, 1).' Jt'
                    : ($trx->total >= 1000
                    ? number_format($trx->total / 1000, 0).' Rb'
                    : number_format($trx->total, 0, ',', '.'));
                    @endphp
                    <a href="{{ route('transaksi.show', $trx->id) }}"
                        style="text-decoration:none;" class="trx-item">
                        <div class="trx-ic" style="background:{{ $bgColor }};">
                            {{ $icon }}
                        </div>
                        <div class="trx-info">
                            <div class="trx-name">{{ Str::limit($label, 24) }}</div>
                            <div class="trx-time">
                                {{ $trx->created_at->format('H:i') }} · {{ $kasir }}
                            </div>
                        </div>
                        <div class="trx-amt">{{ $shortAmt }}</div>
                    </a>
                    @empty
                    <div class="trx-empty">
                        Belum ada transaksi hari ini
                    </div>
                    @endforelse
                </div>

                <a href="{{ route('transaksi.create') }}" class="view-all">
                    + Transaksi Baru
                </a>
            </div>

        </div>

    </div>

    <script>
        // Live clock
        function updateTime() {
            const now = new Date();
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const dateEl = document.getElementById('dashDate');
            const timeEl = document.getElementById('dashTime');
            if (dateEl) dateEl.textContent = days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear();
            if (timeEl) timeEl.textContent = String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');
        }
        updateTime();
        setInterval(updateTime, 1000);
    </script>

</x-layout.sidebar>