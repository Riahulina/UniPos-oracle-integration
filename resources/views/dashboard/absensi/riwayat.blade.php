<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .rw * {
            box-sizing: border-box;
        }

        .rw {
            font-family: 'DM Sans', system-ui, sans-serif;
        }

        /* HEADER */
        .rw-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 22px;
        }

        .rw-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 24px;
            color: #1E3A8A;
            letter-spacing: -0.6px;
            margin-bottom: 3px;
        }

        .rw-title span {
            font-style: italic;
            color: #3B82F6;
        }

        .rw-sub {
            font-size: 13px;
            color: #94A3B8;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'DM Sans', system-ui, sans-serif;
            cursor: pointer;
            text-decoration: none;
            border: 1.5px solid #BFDBFE;
            background: white;
            color: #64748B;
            transition: all .15s;
        }

        .btn-back:hover {
            background: #EFF6FF;
            color: #1D4ED8;
        }

        .btn-back svg {
            width: 14px;
            height: 14px;
        }

        /* FILTER */
        .filter-card {
            background: white;
            border: 1px solid #DBEAFE;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.06);
            padding: 18px 22px;
            margin-bottom: 20px;
        }

        .filter-grid {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            flex-wrap: wrap;
        }

        .filter-field {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .filter-lbl {
            font-size: 11px;
            font-weight: 600;
            color: #64748B;
            letter-spacing: .02em;
            text-transform: uppercase;
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
            background: white;
        }

        .filter-inp:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

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
            height: 38px;
        }

        .btn-filter:hover {
            background: #1E40AF;
        }

        .btn-filter svg {
            width: 13px;
            height: 13px;
        }

        .btn-reset {
            padding: 9px 14px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            border: 1.5px solid #E2E8F0;
            background: white;
            color: #64748B;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .15s;
            height: 38px;
            display: flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }

        .btn-reset:hover {
            background: #F1F5F9;
        }

        /* REKAP */
        .rekap-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 18px;
        }

        .rekap-card {
            background: white;
            border-radius: 14px;
            border: 1px solid #DBEAFE;
            padding: 14px 16px;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.05);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .rekap-icon {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .rekap-info {}

        .rekap-num {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 20px;
            letter-spacing: -0.4px;
            line-height: 1;
        }

        .rekap-lbl {
            font-size: 11px;
            color: #94A3B8;
            margin-top: 2px;
        }

        /* TABLE */
        .rw-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.06);
            overflow: hidden;
        }

        .rw-card-head {
            padding: 16px 22px;
            border-bottom: 1px solid #EFF6FF;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .rw-card-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 16px;
            color: #1E3A8A;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            padding: 10px 14px;
            font-size: 11px;
            font-weight: 600;
            color: #64748B;
            text-align: left;
            background: #F8FBFF;
            border-bottom: 1.5px solid #EFF6FF;
            white-space: nowrap;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        tbody td {
            padding: 11px 14px;
            border-bottom: 1px solid #F1F5F9;
            font-size: 13px;
            color: #1E3A8A;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: #FAFCFF;
        }

        .kry-cell {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .kry-av {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 13px;
            color: #4F46E5;
            font-weight: 700;
            flex-shrink: 0;
        }

        .kry-n {
            font-size: 12.5px;
            font-weight: 600;
            color: #1E3A8A;
        }

        .kry-r {
            font-size: 11px;
            color: #94A3B8;
        }

        .st-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 99px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .st-hadir {
            background: #ECFDF5;
            color: #059669;
        }

        .st-izin {
            background: #FFFBEB;
            color: #D97706;
        }

        .st-sakit {
            background: #EFF6FF;
            color: #1D4ED8;
        }

        .st-alpha {
            background: #FEF2F2;
            color: #DC2626;
        }

        .td-time {
            font-size: 12px;
            color: #64748B;
            white-space: nowrap;
        }

        .td-dur {
            font-size: 12px;
            font-weight: 500;
            color: #1E3A8A;
        }

        .td-cat {
            font-size: 12px;
            color: #64748B;
            font-style: italic;
        }

        .del-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: #FCA5A5;
            font-size: 13px;
            padding: 4px 6px;
            border-radius: 6px;
            transition: color .12s;
        }

        .del-btn:hover {
            color: #DC2626;
            background: #FEF2F2;
        }

        .empty-row td {
            text-align: center;
            padding: 48px;
            color: #94A3B8;
        }

        .empty-icon {
            width: 44px;
            height: 44px;
            margin: 0 auto 10px;
            display: block;
            color: #BFDBFE;
        }

        .table-foot {
            padding: 14px 22px;
            border-top: 1px solid #EFF6FF;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #64748B;
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

        @media (max-width:800px) {
            .rekap-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width:500px) {
            .rekap-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media print {

            .filter-card,
            .del-btn,
            .btn-back {
                display: none !important;
            }

            .rw-card {
                box-shadow: none !important;
            }

            @page {
                margin: 1cm;
            }
        }
    </style>

    <div class="rw">

        @if(session('success'))
        <div class="flash flash-s">&#10003; {{ session('success') }}</div>
        @endif

        {{-- HEADER --}}
        <div class="rw-header">
            <div>
                <div class="rw-title">Riwayat <span>Absensi</span></div>
                <div class="rw-sub">
                    {{ $start->translatedFormat('d F Y') }} &mdash; {{ $end->translatedFormat('d F Y') }}
                </div>
            </div>
            <div style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
                <button onclick="window.print()" type="button"
                    style="display:inline-flex;align-items:center;gap:6px;padding:9px 14px;border-radius:10px;font-size:13px;font-weight:600;font-family:'DM Sans',sans-serif;border:1.5px solid #BFDBFE;background:white;color:#1D4ED8;cursor:pointer;transition:all .15s;">
                    <svg width="13" height="13" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="1" width="8" height="5" rx="1" />
                        <path d="M3 6H1a1 1 0 00-1 1v4a1 1 0 001 1h1v-2h10v2h1a1 1 0 001-1V7a1 1 0 00-1-1h-2" />
                        <rect x="3" y="9" width="8" height="4" rx="1" />
                    </svg>
                    Cetak
                </button>
                <a href="{{ route('absensi.index') }}" class="btn-back">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 2L4 7l5 5" />
                    </svg>
                    Absensi Hari Ini
                </a>
            </div>
        </div>

        {{-- FILTER --}}
        <div class="filter-card">
            <form method="GET" action="{{ route('absensi.riwayat') }}">
                <div class="filter-grid">
                    <div class="filter-field">
                        <span class="filter-lbl">Dari</span>
                        <input type="date" name="start_date" class="filter-inp"
                            value="{{ request('start_date', $start->format('Y-m-d')) }}">
                    </div>
                    <div class="filter-field">
                        <span class="filter-lbl">Sampai</span>
                        <input type="date" name="end_date" class="filter-inp"
                            value="{{ request('end_date', $end->format('Y-m-d')) }}">
                    </div>
                    <div class="filter-field">
                        <span class="filter-lbl">Karyawan</span>
                        <select name="user_id" class="filter-inp">
                            <option value="">Semua Karyawan</option>
                            @foreach($karyawan as $k)
                            <option value="{{ $k->id }}" {{ request('user_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-field">
                        <span class="filter-lbl">Status</span>
                        <select name="status" class="filter-inp">
                            <option value="">Semua Status</option>
                            <option value="hadir" {{ request('status') === 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="izin" {{ request('status') === 'izin'  ? 'selected' : '' }}>Izin</option>
                            <option value="sakit" {{ request('status') === 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="alpha" {{ request('status') === 'alpha' ? 'selected' : '' }}>Alpha</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-filter">
                        <svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="5.5" cy="5.5" r="4" />
                            <path d="M9.5 9.5l3 3" />
                        </svg>
                        Filter
                    </button>
                    <a href="{{ route('absensi.riwayat') }}" class="btn-reset">
                        &#8635; Reset
                    </a>
                </div>
            </form>
        </div>

        {{-- REKAP STAT --}}
        <div class="rekap-grid">
            <div class="rekap-card">
                <div class="rekap-icon" style="background:#ECFDF5;">✓</div>
                <div class="rekap-info">
                    <div class="rekap-num" style="color:#059669;">{{ $rekap['hadir'] }}</div>
                    <div class="rekap-lbl">Hadir</div>
                </div>
            </div>
            <div class="rekap-card">
                <div class="rekap-icon" style="background:#FFFBEB;">📋</div>
                <div class="rekap-info">
                    <div class="rekap-num" style="color:#D97706;">{{ $rekap['izin'] }}</div>
                    <div class="rekap-lbl">Izin</div>
                </div>
            </div>
            <div class="rekap-card">
                <div class="rekap-icon" style="background:#EFF6FF;">🤒</div>
                <div class="rekap-info">
                    <div class="rekap-num" style="color:#1D4ED8;">{{ $rekap['sakit'] }}</div>
                    <div class="rekap-lbl">Sakit</div>
                </div>
            </div>
            <div class="rekap-card">
                <div class="rekap-icon" style="background:#FEF2F2;">✕</div>
                <div class="rekap-info">
                    <div class="rekap-num" style="color:#DC2626;">{{ $rekap['alpha'] }}</div>
                    <div class="rekap-lbl">Alpha</div>
                </div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="rw-card">
            <div class="rw-card-head">
                <span class="rw-card-title">Detail Riwayat</span>
                <span style="font-size:12px; color:#94A3B8;">{{ $riwayat->count() }} data ditemukan</span>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Karyawan</th>
                            <th>Status</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Durasi</th>
                            <th>Catatan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $i => $r)
                        <tr>
                            <td style="font-size:11px; color:#94A3B8;">{{ $i + 1 }}</td>
                            <td>
                                <div style="font-size:12.5px; font-weight:600; color:#1E3A8A;">
                                    {{ $r->tanggal->translatedFormat('d M Y') }}
                                </div>
                                <div style="font-size:11px; color:#94A3B8;">
                                    {{ $r->tanggal->translatedFormat('l') }}
                                </div>
                            </td>
                            <td>
                                <div class="kry-cell">
                                    <div class="kry-av">
                                        {{ mb_strtoupper(mb_substr($r->user->name ?? '?', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="kry-n">{{ $r->user->name ?? '—' }}</div>
                                        <div class="kry-r">{{ ucfirst($r->user->role ?? 'karyawan') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="st-badge st-{{ $r->status }}">
                                    {{ match($r->status) {
                                        'hadir' => '✓ Hadir',
                                        'izin'  => 'Izin',
                                        'sakit' => '🤒 Sakit',
                                        'alpha' => '✕ Alpha',
                                        default => $r->status,
                                    } }}
                                </span>
                            </td>
                            <td class="td-time">{{ $r->jam_masuk  ? substr($r->jam_masuk, 0, 5)  : '—' }}</td>
                            <td class="td-time">{{ $r->jam_keluar ? substr($r->jam_keluar, 0, 5) : '—' }}</td>
                            <td class="td-dur">{{ $r->durasi }}</td>
                            <td class="td-cat">{{ $r->catatan ?: '—' }}</td>
                            <td>
                                <form action="{{ route('absensi.destroy', $r->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus data absensi ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="del-btn" title="Hapus">&#10005;</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="empty-row">
                            <td colspan="9">
                                <svg class="empty-icon" viewBox="0 0 44 44" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="6" y="6" width="32" height="32" rx="4" />
                                    <path d="M15 20h14M15 26h8" />
                                </svg>
                                Tidak ada data absensi pada periode ini
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($riwayat->count() > 0)
            <div class="table-foot">
                <span>Total: <strong style="color:#1E3A8A;">{{ $riwayat->count() }} record</strong></span>
                <span>
                    Tingkat kehadiran:
                    <strong style="color:#059669;">
                        {{ $riwayat->count() > 0 ? round(($rekap['hadir'] / $riwayat->count()) * 100) : 0 }}%
                    </strong>
                </span>
            </div>
            @endif
        </div>

    </div>

</x-layout.sidebar>