<x-layout.sidebar>

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

    .lap * { box-sizing: border-box; }
    .lap { font-family: 'DM Sans', system-ui, sans-serif; }

    /* ── HEADER ── */
    .lap-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 24px;
    }
    .lap-title {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 24px;
        color: #1E3A8A;
        letter-spacing: -0.6px;
        margin-bottom: 4px;
    }
    .lap-title span { font-style: italic; color: #3B82F6; }
    .lap-sub { font-size: 13px; color: #94A3B8; }

    /* ── FILTER BAR ── */
    .filter-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        background: white;
        border: 1px solid #DBEAFE;
        border-radius: 14px;
        padding: 12px 16px;
        box-shadow: 0 2px 8px rgba(37,99,235,0.06);
        flex-wrap: wrap;
    }
    .filter-label {
        font-size: 11.5px;
        font-weight: 600;
        color: #64748B;
        white-space: nowrap;
    }
    .filter-inp {
        border: 1.5px solid #BFDBFE;
        border-radius: 9px;
        padding: 8px 12px;
        font-size: 13px;
        font-family: 'DM Sans', system-ui, sans-serif;
        color: #1E3A8A;
        outline: none;
        transition: border .15s;
    }
    .filter-inp:focus { border-color: #3B82F6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
    .filter-sep { color: #CBD5E1; font-size: 12px; }

    .btn-filter {
        background: #1D4ED8;
        color: white;
        border: none;
        padding: 9px 18px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        font-family: 'DM Sans', system-ui, sans-serif;
        transition: all .15s;
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }
    .btn-filter:hover { background: #1E40AF; transform: translateY(-1px); }
    .btn-filter svg { width: 14px; height: 14px; }

    .btn-export {
        background: white;
        color: #059669;
        border: 1.5px solid #6EE7B7;
        padding: 9px 16px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        font-family: 'DM Sans', system-ui, sans-serif;
        transition: all .15s;
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        white-space: nowrap;
    }
    .btn-export:hover { background: #ECFDF5; }
    .btn-export svg { width: 14px; height: 14px; }

    /* ── SUMMARY CARDS ── */
    .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 20px;
    }
    .sum-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #DBEAFE;
        padding: 18px 20px;
        box-shadow: 0 2px 8px rgba(37,99,235,0.06);
        position: relative;
        overflow: hidden;
        transition: transform .2s, box-shadow .2s;
    }
    .sum-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(37,99,235,0.12); }
    .sum-card::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; border-radius: 16px 16px 0 0;
    }
    .sum-card.blue::before   { background: #3B82F6; }
    .sum-card.indigo::before { background: #6366F1; }
    .sum-card.green::before  { background: #10B981; }
    .sum-card.amber::before  { background: #F59E0B; }

    .sum-icon {
        width: 38px; height: 38px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 17px; margin-bottom: 12px;
    }
    .ic-blue   { background: #EFF6FF; }
    .ic-indigo { background: #EEF2FF; }
    .ic-green  { background: #ECFDF5; }
    .ic-amber  { background: #FFFBEB; }

    .sum-lbl { font-size: 11.5px; font-weight: 500; color: #94A3B8; margin-bottom: 4px; letter-spacing: .01em; }
    .sum-val {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 22px; letter-spacing: -0.6px; line-height: 1; margin-bottom: 6px;
    }
    .val-blue   { color: #1D4ED8; }
    .val-indigo { color: #4F46E5; }
    .val-green  { color: #059669; }
    .val-amber  { color: #D97706; }
    .sum-sub { font-size: 11px; color: #94A3B8; }

    /* ── BOTTOM GRID ── */
    .bottom-grid { display: grid; grid-template-columns: 1fr 300px; gap: 18px; margin-bottom: 18px; }

    /* ── CHART CARD ── */
    .chart-card {
        background: white; border-radius: 16px; border: 1px solid #DBEAFE;
        box-shadow: 0 2px 8px rgba(37,99,235,0.06); padding: 22px 24px;
    }
    .card-head {
        display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;
    }
    .card-title {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 16px; color: #1E3A8A; letter-spacing: -0.3px;
    }
    .chart-area {
        display: flex; align-items: flex-end; gap: 8px;
        height: 160px; padding-bottom: 4px;
    }
    .bar-col { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 5px; }
    .bar-track { width: 100%; display: flex; justify-content: center; align-items: flex-end; height: 130px; }
    .bar-fill {
        width: 72%; border-radius: 5px 5px 0 0;
        background: linear-gradient(180deg, #93C5FD, #BFDBFE);
        position: relative; cursor: pointer; transition: opacity .2s;
        min-height: 4px;
    }
    .bar-fill.peak { background: linear-gradient(180deg, #FCD34D, #F59E0B); }
    .bar-fill.cur  { background: linear-gradient(180deg, #3B82F6, #1D4ED8); }
    .bar-fill:hover { opacity: .8; }
    .bar-tip {
        position: absolute; top: -26px; left: 50%; transform: translateX(-50%);
        background: #1E3A8A; color: white; font-size: 9px; font-weight: 600;
        padding: 3px 6px; border-radius: 5px; white-space: nowrap;
        opacity: 0; pointer-events: none; transition: opacity .15s;
    }
    .bar-fill:hover .bar-tip { opacity: 1; }
    .bar-lbl { font-size: 9.5px; color: #94A3B8; font-weight: 500; }

    /* ── PRODUK TERLARIS ── */
    .top-card {
        background: white; border-radius: 16px; border: 1px solid #DBEAFE;
        box-shadow: 0 2px 8px rgba(37,99,235,0.06); padding: 20px;
        display: flex; flex-direction: column;
    }
    .top-list { display: flex; flex-direction: column; gap: 8px; margin-top: 14px; flex: 1; }
    .top-item {
        display: flex; align-items: center; gap: 10px;
        padding: 9px 10px; border-radius: 10px; background: #F8FBFF;
        border: 1px solid #EFF6FF;
    }
    .top-rank {
        width: 22px; height: 22px; border-radius: 6px;
        background: #EFF6FF; color: #1D4ED8;
        font-size: 11px; font-weight: 700;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .top-rank.r1 { background: #FEF9C3; color: #92400E; }
    .top-rank.r2 { background: #F1F5F9; color: #475569; }
    .top-rank.r3 { background: #FEF2E4; color: #9A3412; }
    .top-info { flex: 1; min-width: 0; }
    .top-name { font-size: 12px; font-weight: 600; color: #1E3A8A; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .top-bar-wrap { height: 4px; background: #EFF6FF; border-radius: 99px; margin-top: 3px; overflow: hidden; }
    .top-bar { height: 100%; border-radius: 99px; background: linear-gradient(90deg, #3B82F6, #6366F1); }
    .top-qty { font-size: 12px; font-weight: 600; color: #1D4ED8; white-space: nowrap; }
    .top-empty { text-align: center; padding: 30px 16px; color: #94A3B8; font-size: 13px; }

    /* ── TABEL TRANSAKSI ── */
    .table-card {
        background: white; border-radius: 16px; border: 1px solid #DBEAFE;
        box-shadow: 0 2px 8px rgba(37,99,235,0.06); overflow: hidden;
    }
    .table-head { padding: 18px 22px 14px; border-bottom: 1px solid #EFF6FF; display: flex; align-items: center; justify-content: space-between; }
    .table-wrap { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; }
    thead th {
        padding: 11px 14px; font-size: 11px; font-weight: 600;
        color: #64748B; text-align: left; background: #F8FBFF;
        border-bottom: 1.5px solid #EFF6FF; white-space: nowrap;
        letter-spacing: .04em; text-transform: uppercase;
    }
    tbody td {
        padding: 11px 14px; font-size: 13px; color: #1E3A8A;
        border-bottom: 1px solid #F1F5F9;
    }
    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: #F8FBFF; }
    .td-muted { color: #64748B; }
    .td-num { font-family: 'DM Serif Display', Georgia, serif; font-size: 14px; color: #1D4ED8; letter-spacing: -0.3px; }
    .td-badge {
        display: inline-flex; align-items: center; gap: 4px;
        padding: 3px 8px; border-radius: 99px; font-size: 11px; font-weight: 600;
    }
    .badge-lunas   { background: #ECFDF5; color: #059669; }
    .badge-pending { background: #FEF9C3; color: #92400E; }

    .td-link {
        color: #3B82F6; text-decoration: none; font-size: 11.5px; font-weight: 600;
        padding: 3px 8px; border-radius: 6px; border: 1.5px solid #BFDBFE;
        transition: all .15s; display: inline-block;
    }
    .td-link:hover { background: #EFF6FF; }

    .table-foot {
        padding: 14px 22px; border-top: 1px solid #EFF6FF;
        display: flex; align-items: center; justify-content: space-between;
        font-size: 12px; color: #64748B;
    }
    .empty-row td { text-align: center; padding: 40px; color: #94A3B8; }

    /* ── FLASH ── */
    .flash { display:flex; align-items:center; gap:10px; padding:12px 18px; border-radius:12px; font-size:13px; font-weight:500; margin-bottom:18px; }
    .flash-s { background:#ECFDF5; color:#065F46; border:1px solid #6EE7B7; }

    /* ── PERIOD PILLS ── */
    .period-pills { display: flex; gap: 6px; }
    .period-pill {
        padding: 5px 12px; border-radius: 7px; font-size: 11px; font-weight: 600;
        border: 1.5px solid #BFDBFE; background: white; color: #94A3B8;
        cursor: pointer; text-decoration: none; transition: all .15s; white-space: nowrap;
    }
    .period-pill:hover { background: #EFF6FF; color: #1D4ED8; border-color: #93C5FD; }
    .period-pill.active { background: #EFF6FF; color: #1D4ED8; border-color: #93C5FD; }

    @media (max-width: 1000px) { .bottom-grid { grid-template-columns: 1fr; } }
    @media (max-width: 800px)  { .summary-grid { grid-template-columns: 1fr 1fr; } }
    @media (max-width: 500px)  { .summary-grid { grid-template-columns: 1fr 1fr; } .filter-bar { flex-direction: column; align-items: stretch; } }

    @media print {
        .lap-header .filter-bar, .btn-export, .period-pills, .td-link { display: none !important; }
        .sum-card, .chart-card, .top-card, .table-card { box-shadow: none !important; }
    }
</style>

<div class="lap">

    @if(session('success'))
        <div class="flash flash-s">&#10003; {{ session('success') }}</div>
    @endif

    {{-- ── HEADER ── --}}
    <div class="lap-header">
        <div>
            <div class="lap-title">Laporan <span>Penjualan</span></div>
            <div class="lap-sub">
                Periode:
                <strong style="color:#1E3A8A;">
                    {{ $start->translatedFormat('d F Y') }} — {{ $end->translatedFormat('d F Y') }}
                </strong>
            </div>
        </div>

        <div style="display:flex; flex-direction:column; gap:10px; align-items:flex-end;">

            {{-- Quick period pills --}}
            <div class="period-pills">
                <a href="?start_date={{ now()->startOfDay()->format('Y-m-d') }}&end_date={{ now()->format('Y-m-d') }}"
                   class="period-pill {{ request('start_date') === now()->format('Y-m-d') && request('end_date') === now()->format('Y-m-d') ? 'active' : '' }}">
                   Hari ini
                </a>
                <a href="?start_date={{ now()->startOfWeek()->format('Y-m-d') }}&end_date={{ now()->format('Y-m-d') }}"
                   class="period-pill">Minggu ini</a>
                <a href="?start_date={{ now()->startOfMonth()->format('Y-m-d') }}&end_date={{ now()->format('Y-m-d') }}"
                   class="period-pill">Bulan ini</a>
                <a href="?start_date={{ now()->subDays(29)->format('Y-m-d') }}&end_date={{ now()->format('Y-m-d') }}"
                   class="period-pill">30 hari</a>
            </div>

            {{-- Filter form --}}
            <form method="GET" class="filter-bar">
                <span class="filter-label">Dari</span>
                <input type="date" name="start_date" class="filter-inp"
                       value="{{ request('start_date', $start->format('Y-m-d')) }}">
                <span class="filter-sep">→</span>
                <input type="date" name="end_date" class="filter-inp"
                       value="{{ request('end_date', $end->format('Y-m-d')) }}">
                <button type="submit" class="btn-filter">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="6" cy="6" r="4.5"/><path d="M10 10l3 3"/>
                    </svg>
                    Filter
                </button>
                <a href="{{ route('laporan.export') }}?{{ http_build_query(request()->all()) }}"
                   class="btn-export" target="_blank">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M7 1v8M4 6l3 3 3-3M2 11h10"/>
                    </svg>
                    Export CSV
                </a>
                <button type="button" class="btn-export" onclick="window.print()"
                        style="border-color:#BFDBFE; color:#1D4ED8; background:white;">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="1" width="8" height="5" rx="1"/>
                        <path d="M3 6H1a1 1 0 00-1 1v4a1 1 0 001 1h1v-2h10v2h1a1 1 0 001-1V7a1 1 0 00-1-1h-2"/>
                        <rect x="3" y="9" width="8" height="4" rx="1"/>
                    </svg>
                    Cetak
                </button>
            </form>
        </div>
    </div>

    {{-- ── SUMMARY CARDS ── --}}
    <div class="summary-grid">

        <div class="sum-card blue">
            <div class="sum-icon ic-blue">💰</div>
            <div class="sum-lbl">Total Penjualan</div>
            <div class="sum-val val-blue">
                @if($totalPenjualan >= 1000000)
                    Rp {{ number_format($totalPenjualan / 1000000, 2, ',', '.') }} Jt
                @else
                    Rp {{ number_format($totalPenjualan, 0, ',', '.') }}
                @endif
            </div>
            <div class="sum-sub">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</div>
        </div>

        <div class="sum-card indigo">
            <div class="sum-icon ic-indigo">🧾</div>
            <div class="sum-lbl">Total Transaksi</div>
            <div class="sum-val val-indigo">{{ number_format($totalTransaksi) }}</div>
            <div class="sum-sub">
                Rata-rata Rp {{ $totalTransaksi > 0 ? number_format($totalPenjualan / $totalTransaksi, 0, ',', '.') : 0 }} / trx
            </div>
        </div>

        <div class="sum-card green">
            <div class="sum-icon ic-green">📦</div>
            <div class="sum-lbl">Item Terjual</div>
            <div class="sum-val val-green">{{ number_format($totalItem) }}</div>
            <div class="sum-sub">
                Rata-rata {{ $totalTransaksi > 0 ? number_format($totalItem / $totalTransaksi, 1) : 0 }} item / trx
            </div>
        </div>

        <div class="sum-card amber">
            <div class="sum-icon ic-amber">📅</div>
            <div class="sum-lbl">Durasi Periode</div>
            <div class="sum-val val-amber">{{ $start->diffInDays($end) + 1 }}</div>
            <div class="sum-sub">hari · rata Rp
                {{ $start->diffInDays($end) + 1 > 0
                    ? number_format($totalPenjualan / ($start->diffInDays($end) + 1), 0, ',', '.')
                    : 0 }}/hari
            </div>
        </div>

    </div>

    {{-- ── GRAFIK + PRODUK TERLARIS ── --}}
    <div class="bottom-grid">

        {{-- GRAFIK --}}
        <div class="chart-card">
            <div class="card-head">
                <span class="card-title">Grafik Penjualan</span>
                <span style="font-size:11px; color:#3B82F6; font-weight:600;">
                    {{ count($grafik) }} titik data
                </span>
            </div>

            <div class="chart-area">
                @php $peakVal = collect($grafik)->max('total') ?: 1; @endphp
                @foreach($grafik as $g)
                    @php
                        $pct = $g['total'] > 0 ? max(3, ($g['total'] / $peakVal) * 100) : 3;
                        $isPeak   = $g['total'] == $peakVal && $g['total'] > 0;
                        $isCur    = isset($g['today']) && $g['today'];
                        $cls = $isPeak ? 'peak' : ($isCur ? 'cur' : '');
                        $tip = $g['total'] >= 1000000
                            ? 'Rp '.number_format($g['total']/1000000,1).' Jt'
                            : ($g['total'] >= 1000
                                ? 'Rp '.number_format($g['total']/1000,0).' Rb'
                                : 'Rp '.number_format($g['total'],0,',','.'));
                    @endphp
                    <div class="bar-col">
                        <div class="bar-track">
                            <div class="bar-fill {{ $cls }}" style="height:{{ $pct }}%;">
                                <div class="bar-tip">{{ $tip }}</div>
                            </div>
                        </div>
                        <div class="bar-lbl">{{ $g['label'] }}</div>
                    </div>
                @endforeach
            </div>

            <div style="display:flex;align-items:center;gap:14px;margin-top:14px;padding-top:12px;border-top:1px solid #EFF6FF;">
                <div style="display:flex;align-items:center;gap:5px;font-size:11px;color:#94A3B8;">
                    <div style="width:8px;height:8px;border-radius:2px;background:linear-gradient(#FCD34D,#F59E0B);"></div>Tertinggi
                </div>
                <div style="display:flex;align-items:center;gap:5px;font-size:11px;color:#94A3B8;">
                    <div style="width:8px;height:8px;border-radius:2px;background:linear-gradient(#3B82F6,#1D4ED8);"></div>Hari ini
                </div>
                <div style="display:flex;align-items:center;gap:5px;font-size:11px;color:#94A3B8;">
                    <div style="width:8px;height:8px;border-radius:2px;background:linear-gradient(#93C5FD,#BFDBFE);"></div>Periode lain
                </div>
            </div>
        </div>

        {{-- PRODUK TERLARIS --}}
        <div class="top-card">
            <div class="card-head">
                <span class="card-title">Produk Terlaris</span>
            </div>

            @php $topMax = $produkTerlaris->max('total') ?: 1; @endphp

            <div class="top-list">
                @forelse($produkTerlaris->take(7) as $i => $p)
                    @php
                        $rankCls = match($i) { 0=>'r1', 1=>'r2', 2=>'r3', default=>'' };
                        $barW = round(($p->total / $topMax) * 100);
                    @endphp
                    <div class="top-item">
                        <div class="top-rank {{ $rankCls }}">{{ $i + 1 }}</div>
                        <div class="top-info">
                            <div class="top-name">{{ $p->nama_produk }}</div>
                            <div class="top-bar-wrap">
                                <div class="top-bar" style="width:{{ $barW }}%;"></div>
                            </div>
                        </div>
                        <div class="top-qty">{{ number_format($p->total) }}</div>
                    </div>
                @empty
                    <div class="top-empty">Belum ada data produk</div>
                @endforelse
            </div>
        </div>

    </div>

    {{-- ── TABEL TRANSAKSI ── --}}
    <div class="table-card">
        <div class="table-head">
            <span class="card-title">Detail Transaksi</span>
            <span style="font-size:12px; color:#94A3B8;">
                Menampilkan {{ $transaksi->count() }} transaksi
            </span>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No. Transaksi</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Kasir</th>
                        <th>Item</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksi as $i => $trx)
                        <tr>
                            <td class="td-muted" style="font-size:11px;">{{ $i + 1 }}</td>
                            <td style="font-size:12px; font-weight:600; color:#6366F1;">
                                #TRX-{{ str_pad($trx->id, 6, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="td-muted" style="white-space:nowrap;">
                                {{ $trx->created_at->translatedFormat('d M Y') }}<br>
                                <span style="font-size:11px;">{{ $trx->created_at->format('H:i') }}</span>
                            </td>
                            <td>{{ $trx->nama_pelanggan ?? '—' }}</td>
                            <td class="td-muted">{{ $trx->user->name ?? '—' }}</td>
                            <td class="td-muted">
                                {{ $trx->items_count ?? $trx->items->count() }} item
                            </td>
                            <td class="td-num">
                                Rp {{ number_format($trx->total, 0, ',', '.') }}
                            </td>
                            <td>
                                <span class="td-badge {{ $trx->status === 'lunas' ? 'badge-lunas' : 'badge-pending' }}">
                                    {{ $trx->status === 'lunas' ? 'Lunas' : 'Pending' }}
                                </span>
                            </td>
                            <td>
                                @if($trx->status === 'lunas')
                                    <a href="{{ route('transaksi.show', $trx->id) }}" class="td-link">
                                        Detail
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr class="empty-row">
                            <td colspan="9">
                                Tidak ada transaksi pada periode ini
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($transaksi->count() > 0)
            <div class="table-foot">
                <span>Total: <strong style="color:#1E3A8A;">{{ $transaksi->count() }} transaksi</strong></span>
                <span>Grand total:
                    <strong style="color:#1D4ED8; font-family:'DM Serif Display',Georgia,serif; font-size:15px;">
                        Rp {{ number_format($totalPenjualan, 0, ',', '.') }}
                    </strong>
                </span>
            </div>
        @endif
    </div>

</div>

</x-layout.sidebar>