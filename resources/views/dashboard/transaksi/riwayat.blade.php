<x-layout.sidebar>

    <style>
        .wrap {
            font-family: 'DM Sans', sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 22px;
            font-weight: 700;
            color: #1E3A8A;
        }

        .summary {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .summary-box {
            background: #fff;
            border: 1px solid #DBEAFE;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 13px;
            color: #334155;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 16px;
        }

        .card {
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            padding: 16px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
            transition: .2s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .trx-id {
            font-weight: 700;
            color: #1D4ED8;
            font-size: 14px;
        }

        .badge {
            padding: 4px 10px;
            font-size: 11px;
            border-radius: 999px;
            font-weight: 600;
        }

        .badge.lunas {
            background: #DCFCE7;
            color: #16A34A;
        }

        .badge.pending {
            background: #FEF3C7;
            color: #D97706;
        }

        .meta {
            font-size: 12px;
            color: #64748B;
            margin-bottom: 6px;
        }

        .total {
            font-size: 16px;
            font-weight: 700;
            color: #1E3A8A;
            margin-top: 10px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 12px;
        }

        .btn {
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-detail {
            background: #1D4ED8;
            color: white;
        }

        .btn-detail:hover {
            background: #1E40AF;
        }
    </style>

    <div class="wrap">

        {{-- HEADER --}}
        <div class="header">
            <div class="title">Riwayat Transaksi</div>
        </div>

        {{-- SUMMARY --}}
        <div class="summary">
            <div class="summary-box">
                📦 Total Transaksi: <b>{{ $transaksi->count() }}</b>
            </div>
            <div class="summary-box">
                💰 Total Pendapatan:
                <b>Rp {{ number_format($transaksi->sum('total'), 0, ',', '.') }}</b>
            </div>
        </div>

        {{-- GRID --}}
        <div class="grid">

            @foreach($transaksi as $t)
            <div class="card">

                <div class="top">
                    <div class="trx-id">
                        TRX-{{ str_pad($t->id, 6, '0', STR_PAD_LEFT) }}
                    </div>

                    <div class="badge {{ $t->status == 'lunas' ? 'lunas' : 'pending' }}">
                        {{ strtoupper($t->status ?? 'LUNAS') }}
                    </div>
                </div>

                <div class="meta">
                    👤 {{ $t->nama_pelanggan ?? 'Umum' }} <br>
                    🧑‍💼 {{ $t->user->name ?? 'Kasir' }} <br>
                    📅 {{ $t->created_at->format('d M Y, H:i') }}
                </div>

                <div class="meta">
                    🛒 {{ $t->items->sum('qty') }} item
                </div>

                <div class="total">
                    Rp {{ number_format($t->total, 0, ',', '.') }}
                </div>

                <div class="actions">
                    <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-detail">
                        Lihat Struk
                    </a>
                </div>

            </div>
            @endforeach

        </div>

        <div style="margin-top:20px;">
            {{ $transaksi->links() }}
        </div>

    </div>

</x-layout.sidebar>