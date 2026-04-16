<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .produk-wrap * { box-sizing: border-box; }
        .produk-wrap { font-family: 'DM Sans', system-ui, sans-serif; }

        /* ── HEADER ── */
        .produk-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 22px;
        }
        .produk-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 24px;
            color: #1E3A8A;
            letter-spacing: -0.6px;
        }
        .produk-title span { font-style: italic; color: #3B82F6; }

        .header-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

        .btn-primary {
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
            white-space: nowrap;
        }
        .btn-primary:hover { background: #1E40AF; transform: translateY(-1px); }

        /* ── TOOLBAR: SEARCH + FILTER ── */
        .produk-toolbar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .search-wrap {
            flex: 1;
            min-width: 200px;
            position: relative;
        }
        .search-wrap svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            color: #93A3B8;
            pointer-events: none;
        }
        .search-inp {
            width: 100%;
            padding: 10px 14px 10px 36px;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            font-size: 13px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            outline: none;
            background: white;
            transition: border .15s;
        }
        .search-inp:focus { border-color: #3B82F6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }

        .filter-select {
            padding: 10px 14px;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            font-size: 13px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            background: white;
            outline: none;
            cursor: pointer;
            transition: border .15s;
        }
        .filter-select:focus { border-color: #3B82F6; }

        /* ── STATS BAR ── */
        .stats-bar {
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
            box-shadow: 0 1px 4px rgba(37,99,235,0.05);
        }
        .stat-pill strong { color: #1E3A8A; font-size: 14px; font-weight: 600; }
        .stat-pill-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* ── PRODUCT GRID ── */
        .produk-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(175px, 1fr));
            gap: 14px;
        }

        .produk-card {
            background: white;
            border: 1px solid #DBEAFE;
            border-radius: 16px;
            overflow: hidden;
            transition: all .2s;
            box-shadow: 0 2px 8px rgba(37,99,235,0.05);
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .produk-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(37,99,235,0.13);
            border-color: #93C5FD;
        }

        /* status badge top-right */
        .card-status {
            position: absolute;
            top: 8px;
            right: 8px;
            font-size: 10px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 99px;
            z-index: 1;
        }
        .status-aktif { background: #ECFDF5; color: #059669; }
        .status-nonaktif { background: #FEF2F2; color: #DC2626; }

        /* stok warning */
        .card-stok-warn {
            position: absolute;
            top: 8px;
            left: 8px;
            font-size: 10px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 99px;
            background: #FEF9C3;
            color: #92400E;
            z-index: 1;
        }

        .card-img {
            height: 130px;
            background: #F0F6FF;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .card-img-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }
        .card-img-placeholder svg { width: 32px; height: 32px; color: #BFDBFE; }
        .card-img-placeholder span { font-size: 10px; color: #BFDBFE; }

        .card-body { padding: 12px 12px 8px; flex: 1; display: flex; flex-direction: column; }

        .card-kategori {
            font-size: 10px;
            font-weight: 600;
            color: #3B82F6;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 4px;
        }
        .card-nama {
            font-size: 13px;
            font-weight: 600;
            color: #1E3A8A;
            margin-bottom: 2px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.4;
        }
        .card-kode { font-size: 10px; color: #93A3B8; margin-bottom: 8px; }

        .card-price-row {
            display: flex;
            align-items: baseline;
            gap: 6px;
            margin-bottom: 6px;
        }
        .card-harga-jual {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 16px;
            color: #1D4ED8;
            letter-spacing: -0.4px;
        }
        .card-harga-beli {
            font-size: 10px;
            color: #93A3B8;
            text-decoration: line-through;
        }

        .card-stok-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 11px;
            color: #64748B;
            margin-bottom: 10px;
        }
        .stok-num { font-weight: 600; color: #1E3A8A; }
        .stok-low { color: #DC2626 !important; }

        /* jasa badge */
        .card-jasa-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #EEF2FF;
            color: #4F46E5;
            font-size: 10px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 99px;
            margin-bottom: 8px;
        }

        /* ── CARD ACTIONS ── */
        .card-actions {
            display: flex;
            gap: 6px;
            padding: 8px 12px 12px;
            border-top: 1px solid #EFF6FF;
            margin-top: auto;
        }
        .card-btn {
            flex: 1;
            padding: 7px 0;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 600;
            font-family: 'DM Sans', system-ui, sans-serif;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: all .15s;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }
        .card-btn-edit {
            background: #EFF6FF;
            color: #1D4ED8;
            border: 1px solid #BFDBFE;
        }
        .card-btn-edit:hover { background: #DBEAFE; }
        .card-btn-del {
            background: #FEF2F2;
            color: #DC2626;
            border: 1px solid #FCA5A5;
        }
        .card-btn-del:hover { background: #FEE2E2; }

        /* ── EMPTY STATE ── */
        .produk-empty {
            grid-column: 1/-1;
            text-align: center;
            padding: 60px 20px;
            color: #93A3B8;
        }
        .produk-empty svg { width: 56px; height: 56px; margin: 0 auto 16px; display: block; color: #BFDBFE; }
        .produk-empty h3 { font-family: 'DM Serif Display', Georgia, serif; font-size: 18px; color: #1E3A8A; margin-bottom: 6px; }

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
        .flash-success { background: #ECFDF5; color: #065F46; border: 1px solid #6EE7B7; }
        .flash-error { background: #FEF2F2; color: #991B1B; border: 1px solid #FCA5A5; }

        /* ── PAGINATION ── */
        .pagination-wrap { margin-top: 24px; }

        @media (max-width: 600px) {
            .produk-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>

    <div class="produk-wrap">

        {{-- FLASH --}}
        @if(session('success'))
            <div class="flash flash-success">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="flash flash-error">✕ {{ session('error') }}</div>
        @endif

        {{-- HEADER --}}
        <div class="produk-header">
            <div class="produk-title">Data <span>Produk</span></div>
            <div class="header-actions">
                <a href="{{ route('produk.create') }}" class="btn-primary">
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14">
                        <path d="M8 3v10M3 8h10"/>
                    </svg>
                    Tambah Produk
                </a>
            </div>
        </div>

        {{-- STATS BAR --}}
        <div class="stats-bar">
            <div class="stat-pill">
                <div class="stat-pill-dot" style="background:#3B82F6;"></div>
                Total Produk <strong>{{ $totalProduk }}</strong>
            </div>
            <div class="stat-pill">
                <div class="stat-pill-dot" style="background:#059669;"></div>
                Aktif <strong>{{ $totalAktif }}</strong>
            </div>
            <div class="stat-pill">
                <div class="stat-pill-dot" style="background:#DC2626;"></div>
                Stok Menipis <strong>{{ $stokMenipis }}</strong>
            </div>
            <div class="stat-pill">
                <div class="stat-pill-dot" style="background:#6366F1;"></div>
                Kategori <strong>{{ $totalKategori }}</strong>
            </div>
        </div>

        {{-- TOOLBAR --}}
        <div class="produk-toolbar">
            <div class="search-wrap">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="7" cy="7" r="4.5"/><path d="M10.5 10.5L14 14"/>
                </svg>
                <input
                    class="search-inp"
                    type="text"
                    id="search-inp"
                    placeholder="Cari nama, kode, atau barcode..."
                    oninput="filterProduk()"
                >
            </div>

            <select class="filter-select" id="filter-status" onchange="filterProduk()">
                <option value="">Semua Status</option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>

            <select class="filter-select" id="filter-kategori" onchange="filterProduk()">
                <option value="">Semua Kategori</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        {{-- PRODUCT GRID --}}
        <div class="produk-grid" id="produk-grid">

            @forelse($produk as $item)
                <div class="produk-card"
                     data-nama="{{ strtolower($item->nama_produk) }}"
                     data-kode="{{ strtolower($item->kode_produk ?? '') }}"
                     data-barcode="{{ strtolower($item->barcode ?? '') }}"
                     data-status="{{ $item->status }}"
                     data-kategori="{{ $item->kategori_id }}"
                >
                    {{-- STATUS BADGE --}}
                    <span class="card-status status-{{ $item->status }}">
                        {{ $item->status === 'aktif' ? 'Aktif' : 'Nonaktif' }}
                    </span>

                    {{-- STOK WARNING --}}
                    @if($item->stok <= $item->stok_minimal && !$item->is_jasa)
                        <span class="card-stok-warn">⚠ Stok Tipis</span>
                    @endif

                    {{-- GAMBAR --}}
                    <div class="card-img">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_produk }}">
                        @else
                            <div class="card-img-placeholder">
                                <svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="4" y="4" width="24" height="24" rx="3"/>
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M4 22l7-7 5 5 4-4 8 8"/>
                                </svg>
                                <span>No Image</span>
                            </div>
                        @endif
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">
                        <div class="card-kategori">{{ $item->kategori->nama_kategori ?? '—' }}</div>
                        <div class="card-nama">{{ $item->nama_produk }}</div>
                        <div class="card-kode">
                            {{ $item->kode_produk ? '#'.$item->kode_produk : '' }}
                            {{ $item->barcode ? '· ' . $item->barcode : '' }}
                        </div>

                        @if($item->is_jasa)
                            <div class="card-jasa-badge">
                                <svg width="10" height="10" viewBox="0 0 12 12" fill="currentColor"><circle cx="6" cy="6" r="5"/></svg>
                                Jasa
                            </div>
                        @endif

                        <div class="card-price-row">
                            <div class="card-harga-jual">
                                Rp {{ number_format($item->harga_jual, 0, ',', '.') }}
                            </div>
                            @if($item->harga_beli > 0)
                                <div class="card-harga-beli">
                                    Rp {{ number_format($item->harga_beli, 0, ',', '.') }}
                                </div>
                            @endif
                        </div>

                        @if(!$item->is_jasa)
                            <div class="card-stok-row">
                                <span>Stok</span>
                                <span class="stok-num {{ $item->stok <= $item->stok_minimal ? 'stok-low' : '' }}">
                                    {{ $item->stok }} {{ $item->satuan }}
                                </span>
                            </div>
                        @endif
                    </div>

                    {{-- ACTIONS --}}
                    <div class="card-actions">
                        <a href="{{ route('produk.edit', $item->id) }}" class="card-btn card-btn-edit">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M8.5 1.5l2 2L4 10H2V8L8.5 1.5z"/>
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST" style="flex:1;">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="card-btn card-btn-del"
                                style="width:100%;"
                                onclick="return confirm('Hapus produk {{ addslashes($item->nama_produk) }}?')"
                            >
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M2 3h8M5 3V2h2v1M4 3v6h4V3"/>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="produk-empty">
                    <svg viewBox="0 0 56 56" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="8" y="8" width="40" height="40" rx="6"/>
                        <path d="M20 28h16M28 20v16"/>
                    </svg>
                    <h3>Belum Ada Produk</h3>
                    <p>Klik "Tambah Produk" untuk mulai menambahkan produk</p>
                </div>
            @endforelse

        </div>

        {{-- PAGINATION --}}
        @if($produk->hasPages())
            <div class="pagination-wrap">
                {{ $produk->links() }}
            </div>
        @endif

    </div>

    <script>
        function filterProduk() {
            const q        = document.getElementById('search-inp').value.toLowerCase().trim();
            const status   = document.getElementById('filter-status').value;
            const kategori = document.getElementById('filter-kategori').value;

            document.querySelectorAll('#produk-grid .produk-card').forEach(card => {
                const matchQ = !q
                    || card.dataset.nama.includes(q)
                    || card.dataset.kode.includes(q)
                    || card.dataset.barcode.includes(q);

                const matchStatus   = !status   || card.dataset.status   === status;
                const matchKategori = !kategori || card.dataset.kategori === kategori;

                card.style.display = (matchQ && matchStatus && matchKategori) ? '' : 'none';
            });
        }
    </script>

</x-layout.sidebar>