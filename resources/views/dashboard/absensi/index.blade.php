<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .abs * {
            box-sizing: border-box;
        }

        .abs {
            font-family: 'DM Sans', system-ui, sans-serif;
        }

        /* ── HEADER ── */
        .abs-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 22px;
        }

        .abs-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 24px;
            color: #1E3A8A;
            letter-spacing: -0.6px;
            margin-bottom: 3px;
        }

        .abs-title span {
            font-style: italic;
            color: #3B82F6;
        }

        .abs-sub {
            font-size: 13px;
            color: #94A3B8;
        }

        .abs-actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-riwayat {
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
            color: #1D4ED8;
            transition: all .15s;
        }

        .btn-riwayat:hover {
            background: #EFF6FF;
        }

        .btn-riwayat svg {
            width: 14px;
            height: 14px;
        }

        .btn-simpan {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'DM Sans', system-ui, sans-serif;
            cursor: pointer;
            background: #1D4ED8;
            color: white;
            border: none;
            transition: all .15s;
        }

        .btn-simpan:hover {
            background: #1E40AF;
            transform: translateY(-1px);
        }

        .btn-simpan svg {
            width: 14px;
            height: 14px;
        }

        /* ── STAT PILLS ── */
        .stat-row {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .stat-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid #DBEAFE;
            border-radius: 12px;
            padding: 10px 16px;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.06);
            flex: 1;
            min-width: 120px;
            transition: all .15s;
        }

        .stat-pill:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.10);
        }

        .sp-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .sp-info {}

        .sp-num {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 22px;
            color: #1E3A8A;
            letter-spacing: -0.5px;
            line-height: 1;
        }

        .sp-lbl {
            font-size: 11px;
            color: #94A3B8;
            font-weight: 500;
            margin-top: 1px;
        }

        /* ── ABSENSI TABLE CARD ── */
        .abs-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 2px 12px rgba(37, 99, 235, 0.07);
            overflow: hidden;
        }

        .abs-card-head {
            padding: 16px 22px;
            border-bottom: 1px solid #EFF6FF;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .abs-card-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 16px;
            color: #1E3A8A;
        }

        /* quick all buttons */
        .quick-all {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .qa-btn {
            padding: 5px 12px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
            border: 1.5px solid;
            cursor: pointer;
            font-family: 'DM Sans', system-ui, sans-serif;
            transition: all .12s;
        }

        .qa-hadir {
            border-color: #6EE7B7;
            color: #059669;
            background: #ECFDF5;
        }

        .qa-hadir:hover {
            background: #D1FAE5;
        }

        .qa-alpha {
            border-color: #FCA5A5;
            color: #DC2626;
            background: #FEF2F2;
        }

        .qa-alpha:hover {
            background: #FEE2E2;
        }

        /* table */
        .abs-table {
            width: 100%;
            border-collapse: collapse;
        }

        .abs-table thead th {
            padding: 10px 16px;
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

        .abs-table tbody td {
            padding: 12px 16px;
            border-bottom: 1px solid #F1F5F9;
            vertical-align: middle;
        }

        .abs-table tbody tr:last-child td {
            border-bottom: none;
        }

        .abs-table tbody tr:hover td {
            background: #FAFCFF;
        }

        /* karyawan cell */
        .kry-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .kry-avatar {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 14px;
            color: #4F46E5;
            font-weight: 700;
            flex-shrink: 0;
        }

        .kry-name {
            font-size: 13px;
            font-weight: 600;
            color: #1E3A8A;
        }

        .kry-role {
            font-size: 11px;
            color: #94A3B8;
        }

        /* status radio group */
        .status-group {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .status-radio {
            display: none;
        }

        .status-lbl {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 5px 10px;
            border-radius: 7px;
            font-size: 11.5px;
            font-weight: 600;
            border: 1.5px solid #E2E8F0;
            cursor: pointer;
            transition: all .12s;
            color: #94A3B8;
            background: white;
            white-space: nowrap;
            user-select: none;
        }

        .status-radio:checked+.status-lbl {
            border-width: 1.5px;
        }

        .status-radio.s-hadir:checked+.status-lbl {
            background: #ECFDF5;
            color: #059669;
            border-color: #6EE7B7;
        }

        .status-radio.s-izin:checked+.status-lbl {
            background: #FFFBEB;
            color: #D97706;
            border-color: #FCD34D;
        }

        .status-radio.s-sakit:checked+.status-lbl {
            background: #EFF6FF;
            color: #1D4ED8;
            border-color: #93C5FD;
        }

        .status-radio.s-alpha:checked+.status-lbl {
            background: #FEF2F2;
            color: #DC2626;
            border-color: #FCA5A5;
        }

        /* time inputs */
        .time-inp {
            border: 1.5px solid #BFDBFE;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 12px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            outline: none;
            width: 88px;
            transition: border .15s;
        }

        .time-inp:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .time-sep {
            color: #CBD5E1;
            font-size: 11px;
            margin: 0 2px;
        }

        /* catatan */
        .cat-inp {
            border: 1.5px solid #BFDBFE;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 12px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            outline: none;
            width: 140px;
            transition: border .15s;
        }

        .cat-inp:focus {
            border-color: #3B82F6;
        }

        /* sudah absen badge */
        .saved-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 99px;
            font-size: 11px;
            font-weight: 600;
        }

        .saved-hadir {
            background: #ECFDF5;
            color: #059669;
        }

        .saved-izin {
            background: #FFFBEB;
            color: #D97706;
        }

        .saved-sakit {
            background: #EFF6FF;
            color: #1D4ED8;
        }

        .saved-alpha {
            background: #FEF2F2;
            color: #DC2626;
        }

        /* empty */
        .abs-empty {
            text-align: center;
            padding: 48px 20px;
            color: #94A3B8;
        }

        .abs-empty svg {
            width: 48px;
            height: 48px;
            margin: 0 auto 14px;
            display: block;
            color: #BFDBFE;
        }

        .abs-empty h3 {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 17px;
            color: #1E3A8A;
            margin-bottom: 5px;
        }

        /* flash */
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

        @media (max-width:768px) {
            .abs-table {
                font-size: 12px;
            }

            .abs-table thead th,
            .abs-table tbody td {
                padding: 10px 10px;
            }

            .cat-inp {
                width: 100px;
            }
        }
    </style>

    <div class="abs">

        @if(session('success'))
        <div class="flash flash-s">&#10003; {{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="flash flash-e">&#10005; {{ session('error') }}</div>
        @endif

        {{-- ── HEADER ── --}}
        <div class="abs-header">
            <div>
                <div class="abs-title">Absensi <span>Karyawan</span></div>
                <div class="abs-sub">
                    {{ $today->translatedFormat('l, d F Y') }}
                    &nbsp;&middot;&nbsp;
                    {{ $karyawan->count() }} karyawan terdaftar
                </div>
            </div>
            <div class="abs-actions">
                <a href="{{ route('absensi.riwayat') }}" class="btn-riwayat">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="1" y="2" width="12" height="10" rx="1.5" />
                        <path d="M4 5h6M4 7.5h4" />
                    </svg>
                    Riwayat
                </a>
                <button type="submit" form="form-bulk" class="btn-simpan">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M2 7l4 4 6-6" />
                    </svg>
                    Simpan Absensi
                </button>
            </div>
        </div>

        {{-- ── STAT PILLS ── --}}
        <div class="stat-row">
            <div class="stat-pill">
                <div class="sp-dot" style="background:#059669;"></div>
                <div class="sp-info">
                    <div class="sp-num">{{ $statHadir }}</div>
                    <div class="sp-lbl">Hadir</div>
                </div>
            </div>
            <div class="stat-pill">
                <div class="sp-dot" style="background:#D97706;"></div>
                <div class="sp-info">
                    <div class="sp-num">{{ $statIzin }}</div>
                    <div class="sp-lbl">Izin</div>
                </div>
            </div>
            <div class="stat-pill">
                <div class="sp-dot" style="background:#2563EB;"></div>
                <div class="sp-info">
                    <div class="sp-num">{{ $statSakit }}</div>
                    <div class="sp-lbl">Sakit</div>
                </div>
            </div>
            <div class="stat-pill">
                <div class="sp-dot" style="background:#DC2626;"></div>
                <div class="sp-info">
                    <div class="sp-num">{{ $statAlpha }}</div>
                    <div class="sp-lbl">Alpha</div>
                </div>
            </div>
            <div class="stat-pill">
                <div class="sp-dot" style="background:#94A3B8;"></div>
                <div class="sp-info">
                    <div class="sp-num">{{ $belumAbsen }}</div>
                    <div class="sp-lbl">Belum Absen</div>
                </div>
            </div>
        </div>

        {{-- ── FORM BULK ABSENSI ── --}}
        <form id="form-bulk" action="{{ route('absensi.storeBulk') }}" method="POST">
            @csrf

            <div class="abs-card">
                <div class="abs-card-head">
                    <span class="abs-card-title">Daftar Karyawan Hari Ini</span>
                    {{-- Tombol set semua cepat --}}
                    <div class="quick-all">
                        <button type="button" class="qa-btn qa-hadir" onclick="setAllStatus('hadir')">
                            ✓ Semua Hadir
                        </button>
                        <button type="button" class="qa-btn qa-alpha" onclick="setAllStatus('alpha')">
                            ✕ Semua Alpha
                        </button>
                    </div>
                </div>

                @if($karyawan->isEmpty())
                <div class="abs-empty">
                    <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="24" cy="16" r="8" />
                        <path d="M8 40c0-8.837 7.163-16 16-16s16 7.163 16 16" />
                    </svg>
                    <h3>Belum Ada Karyawan</h3>
                    <p>Tambahkan karyawan ke usaha ini terlebih dahulu</p>
                </div>
                @else
                <table class="abs-table">
                    <thead>
                        <tr>
                            <th>Karyawan</th>
                            <th>Status</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Durasi</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($karyawan as $idx => $k)
                        @php
                        $absen = $absensiHariIni->get($k->id);
                        $savedStatus = $absen?->status ?? 'hadir';
                        $savedMasuk = $absen?->jam_masuk ?? '';
                        $savedKeluar = $absen?->jam_keluar ?? '';
                        $savedCat = $absen?->catatan ?? '';
                        @endphp
                        <tr id="row-{{ $k->id }}">
                            {{-- Karyawan --}}
                            <td>
                                <div class="kry-cell">
                                    <div class="kry-avatar">
                                        {{ mb_strtoupper(mb_substr($k->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="kry-name">{{ $k->name }}</div>
                                        <div class="kry-role">{{ ucfirst($k->role ?? 'karyawan') }}</div>
                                    </div>
                                </div>
                                <input type="hidden" name="absen[{{ $idx }}][user_id]" value="{{ $k->id }}">
                            </td>

                            {{-- Status radio --}}
                            <td>
                                <div class="status-group">
                                    @foreach(['hadir','izin','sakit','alpha'] as $st)
                                    <input
                                        type="radio"
                                        class="status-radio s-{{ $st }}"
                                        name="absen[{{ $idx }}][status]"
                                        id="st-{{ $k->id }}-{{ $st }}"
                                        value="{{ $st }}"
                                        {{ $savedStatus === $st ? 'checked' : '' }}
                                        data-uid="{{ $k->id }}"
                                        onchange="onStatusChange({{ $k->id }}, '{{ $st }}')">
                                    <label class="status-lbl" for="st-{{ $k->id }}-{{ $st }}">
                                        {{ match($st) { 'hadir'=>'✓ Hadir','izin'=>'Izin','sakit'=>'🤒 Sakit','alpha'=>'✕ Alpha' } }}
                                    </label>
                                    @endforeach
                                </div>
                            </td>

                            {{-- Jam masuk --}}
                            <td>
                                <input
                                    type="time"
                                    name="absen[{{ $idx }}][jam_masuk]"
                                    class="time-inp"
                                    value="{{ $savedMasuk }}"
                                    id="masuk-{{ $k->id }}"
                                    onchange="calcDurasi({{ $k->id }})">
                            </td>

                            {{-- Jam keluar --}}
                            <td>
                                <input
                                    type="time"
                                    name="absen[{{ $idx }}][jam_keluar]"
                                    class="time-inp"
                                    value="{{ $savedKeluar }}"
                                    id="keluar-{{ $k->id }}"
                                    onchange="calcDurasi({{ $k->id }})">
                            </td>

                            {{-- Durasi --}}
                            <td>
                                <span id="durasi-{{ $k->id }}" style="font-size:12px; color:#64748B; font-weight:500;">
                                    @if($absen && $absen->jam_masuk && $absen->jam_keluar)
                                    {{ $absen->durasi }}
                                    @else
                                    —
                                    @endif
                                </span>
                            </td>

                            {{-- Catatan --}}
                            <td>
                                <input
                                    type="text"
                                    name="absen[{{ $idx }}][catatan]"
                                    class="cat-inp"
                                    value="{{ $savedCat }}"
                                    placeholder="Keterangan...">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            {{-- Sticky submit bar --}}
            <div style="position:sticky; bottom:16px; display:flex; justify-content:flex-end; margin-top:16px; pointer-events:none;">
                <button type="submit" class="btn-simpan" style="pointer-events:all; box-shadow:0 4px 20px rgba(29,78,216,0.35);">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8" width="14" height="14">
                        <path d="M2 7l4 4 6-6" />
                    </svg>
                    Simpan Semua Absensi
                </button>
            </div>

        </form>

    </div>

    <script>
        // ── STATUS CHANGE ──
        function onStatusChange(uid, status) {
            // Kalau alpha/izin, kosongkan jam
            const masuk = document.getElementById('masuk-' + uid);
            const keluar = document.getElementById('keluar-' + uid);
            if (status === 'alpha') {
                masuk.value = '';
                keluar.value = '';
                document.getElementById('durasi-' + uid).textContent = '—';
            }
        }

        // ── SET SEMUA STATUS ──
        function setAllStatus(status) {
            document.querySelectorAll('.status-radio').forEach(radio => {
                if (radio.value === status) {
                    radio.checked = true;
                    const uid = radio.dataset.uid;
                    onStatusChange(uid, status);
                }
            });
        }

        // ── HITUNG DURASI ──
        function calcDurasi(uid) {
            const masuk = document.getElementById('masuk-' + uid).value;
            const keluar = document.getElementById('keluar-' + uid).value;
            const el = document.getElementById('durasi-' + uid);

            if (!masuk || !keluar) {
                el.textContent = '—';
                return;
            }

            const [mH, mM] = masuk.split(':').map(Number);
            const [kH, kM] = keluar.split(':').map(Number);
            const diffMin = (kH * 60 + kM) - (mH * 60 + mM);

            if (diffMin <= 0) {
                el.textContent = '—';
                return;
            }

            const jam = Math.floor(diffMin / 60);
            const min = diffMin % 60;
            el.textContent = (jam > 0 ? jam + 'j ' : '') + min + 'm';
        }

        // ── AUTO JAM MASUK untuk status Hadir jika belum ada nilai ──
        document.querySelectorAll('.status-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'hadir') {
                    const uid = this.dataset.uid;
                    const masuk = document.getElementById('masuk-' + uid);
                    if (!masuk.value) {
                        const now = new Date();
                        masuk.value = String(now.getHours()).padStart(2, '0') +
                            ':' + String(now.getMinutes()).padStart(2, '0');
                    }
                }
            });
        });
    </script>

</x-layout.sidebar>