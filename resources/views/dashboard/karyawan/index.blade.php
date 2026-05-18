<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&display=swap');

        .karyawan-page * {
            box-sizing: border-box;
        }

        .karyawan-page {
            font-family: 'DM Sans', sans-serif;
        }

        /* HEADER */
        .kp-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .kp-title {
            font-family: 'DM Serif Display', serif;
            font-size: 28px;
            color: #1E3A8A;
            letter-spacing: -.5px;
            margin-bottom: 4px;
        }

        .kp-title span {
            color: #3B82F6;
            font-style: italic;
        }

        .kp-sub {
            font-size: 13px;
            color: #94A3B8;
        }

        .kp-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .kp-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
            cursor: pointer;
        }

        .kp-btn-primary {
            background: linear-gradient(135deg, #2563EB, #1D4ED8);
            color: white;
            border: none;
            box-shadow: 0 10px 25px rgba(37, 99, 235, .20);
        }

        .kp-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(37, 99, 235, .25);
        }

        .kp-btn-outline {
            border: 1.5px solid #BFDBFE;
            color: #2563EB;
            background: white;
        }

        .kp-btn-outline:hover {
            background: #EFF6FF;
        }

        /* STATS */
        .kp-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .kp-stat {
            background: white;
            border-radius: 18px;
            padding: 18px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.07);
            transition: .2s;
        }

        .kp-stat:hover {
            transform: translateY(-3px);
        }

        .kp-stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .kp-stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .kp-stat-num {
            font-family: 'DM Serif Display', serif;
            font-size: 28px;
            color: #1E3A8A;
            line-height: 1;
        }

        .kp-stat-label {
            font-size: 12px;
            color: #94A3B8;
            margin-top: 5px;
            font-weight: 500;
        }

        /* CARD */
        .kp-card {
            background: white;
            border-radius: 22px;
            border: 1px solid #DBEAFE;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(37, 99, 235, .08);
        }

        .kp-card-head {
            padding: 18px 22px;
            border-bottom: 1px solid #EFF6FF;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }

        .kp-card-title {
            font-family: 'DM Serif Display', serif;
            font-size: 18px;
            color: #1E3A8A;
        }

        .kp-search {
            border: 1.5px solid #BFDBFE;
            border-radius: 12px;
            padding: 10px 14px;
            width: 240px;
            outline: none;
            font-size: 13px;
            color: #1E3A8A;
        }

        .kp-search:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, .10);
        }

        /* TABLE */
        .kp-table-wrap {
            overflow-x: auto;
        }

        .kp-table {
            width: 100%;
            border-collapse: collapse;
        }

        .kp-table thead th {
            background: #F8FBFF;
            padding: 14px 18px;
            font-size: 11px;
            color: #64748B;
            text-transform: uppercase;
            letter-spacing: .05em;
            text-align: left;
            border-bottom: 1px solid #E2E8F0;
            white-space: nowrap;
        }

        .kp-table tbody td {
            padding: 16px 18px;
            border-bottom: 1px solid #F1F5F9;
            vertical-align: middle;
        }

        .kp-table tbody tr:hover td {
            background: #FAFCFF;
        }

        /* USER */
        .kp-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .kp-avatar {
            width: 46px;
            height: 46px;
            border-radius: 15px;
            background: linear-gradient(135deg, #DBEAFE, #E0E7FF);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #3730A3;
            font-size: 18px;
            flex-shrink: 0;
        }

        .kp-name {
            font-size: 14px;
            font-weight: 700;
            color: #1E3A8A;
            margin-bottom: 2px;
        }

        .kp-email {
            font-size: 12px;
            color: #94A3B8;
        }

        /* BADGES */
        .kp-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-owner {
            background: #EEF2FF;
            color: #4338CA;
        }

        .badge-kasir {
            background: #ECFDF5;
            color: #059669;
        }

        .badge-aktif {
            background: #ECFDF5;
            color: #059669;
        }

        .badge-nonaktif {
            background: #FEF2F2;
            color: #DC2626;
        }

        /* ACTION */
        .kp-action {
            display: flex;
            gap: 8px;
        }

        .kp-icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: .2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-edit {
            background: #EFF6FF;
            color: #2563EB;
        }

        .btn-delete {
            background: #FEF2F2;
            color: #DC2626;
        }

        .kp-icon-btn:hover {
            transform: translateY(-2px);
        }

        /* EMPTY */
        .kp-empty {
            padding: 70px 20px;
            text-align: center;
        }

        .kp-empty-icon {
            width: 70px;
            height: 70px;
            border-radius: 24px;
            margin: 0 auto 18px;
            background: linear-gradient(135deg, #DBEAFE, #E0E7FF);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .kp-empty h3 {
            font-family: 'DM Serif Display', serif;
            color: #1E3A8A;
            font-size: 22px;
            margin-bottom: 6px;
        }

        .kp-empty p {
            color: #94A3B8;
            font-size: 13px;
        }

        /* FLASH */
        .kp-flash {
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .kp-flash-success {
            background: #ECFDF5;
            border: 1px solid #6EE7B7;
            color: #065F46;
        }

        @media(max-width:768px) {

            .kp-table thead th,
            .kp-table tbody td {
                padding: 12px;
            }

            .kp-search {
                width: 100%;
            }
        }
    </style>

    <div class="karyawan-page">

        @if (session('success'))
            <div class="kp-flash kp-flash-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        {{-- HEADER --}}
        <div class="kp-header">

            <div>
                <div class="kp-title">
                    Data <span>Karyawan</span>
                </div>

                <div class="kp-sub">
                    Kelola seluruh karyawan usaha kamu dalam satu dashboard
                </div>
            </div>

            <div class="kp-actions">

                <a href="{{ route('karyawan.create') }}" class="kp-btn kp-btn-primary">
                    ➕ Tambah Karyawan
                </a>

                <a href="{{ route('absensi.index') }}" class="kp-btn kp-btn-outline">
                    🕒 Absensi
                </a>

            </div>

        </div>

        {{-- STATS --}}
        <div class="kp-stats">

            <div class="kp-stat">
                <div class="kp-stat-top">
                    <div>
                        <div class="kp-stat-num">
                            {{ $karyawan->count() }}
                        </div>

                        <div class="kp-stat-label">
                            Total Karyawan
                        </div>
                    </div>

                    <div class="kp-stat-icon" style="background:#DBEAFE;">
                        👥
                    </div>
                </div>
            </div>

            <div class="kp-stat">
                <div class="kp-stat-top">
                    <div>
                        <div class="kp-stat-num">
                            {{ $karyawan->where('status', 'aktif')->count() }}
                        </div>

                        <div class="kp-stat-label">
                            Karyawan Aktif
                        </div>
                    </div>

                    <div class="kp-stat-icon" style="background:#DCFCE7;">
                        ✅
                    </div>
                </div>
            </div>

            <div class="kp-stat">
                <div class="kp-stat-top">
                    <div>
                        <div class="kp-stat-num">
                            {{ $karyawan->where('role', 'kasir')->count() }}
                        </div>

                        <div class="kp-stat-label">
                            Kasir
                        </div>
                    </div>

                    <div class="kp-stat-icon" style="background:#EDE9FE;">
                        🛒
                    </div>
                </div>
            </div>

        </div>

        {{-- TABLE --}}
        <div class="kp-card">

            <div class="kp-card-head">

                <div class="kp-card-title">
                    Daftar Karyawan
                </div>

                <input type="text" id="searchKaryawan" class="kp-search" placeholder="Cari karyawan...">

            </div>

            @if ($karyawan->isEmpty())

                <div class="kp-empty">

                    <div class="kp-empty-icon">
                        👥
                    </div>

                    <h3>Belum Ada Karyawan</h3>

                    <p>
                        Tambahkan karyawan pertama untuk mulai menggunakan sistem.
                    </p>

                </div>
            @else
                <div class="kp-table-wrap">

                    <table class="kp-table">

                        <thead>
                            <tr>
                                <th>Karyawan</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Tanggal Gabung</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody id="tableKaryawan">

                            @foreach ($karyawan as $k)
                                <tr>

                                    {{-- USER --}}
                                    <td>

                                        <div class="kp-user">

                                            <div class="kp-avatar">
                                                {{ strtoupper(substr($k->name, 0, 1)) }}
                                            </div>

                                            <div>
                                                <div class="kp-name">
                                                    {{ $k->name }}
                                                </div>

                                                <div class="kp-email">
                                                    {{ $k->email }}
                                                </div>
                                            </div>

                                        </div>

                                    </td>

                                    {{-- ROLE --}}
                                    <td>

                                        @if ($k->role == 'owner')
                                            <span class="kp-badge badge-owner">
                                                👑 Owner
                                            </span>
                                        @else
                                            <span class="kp-badge badge-kasir">
                                                🛒 Kasir
                                            </span>
                                        @endif

                                    </td>

                                    {{-- STATUS --}}
                                    <td>

                                        @if ($k->status == 'aktif')
                                            <span class="kp-badge badge-aktif">
                                                ● Aktif
                                            </span>
                                        @else
                                            <span class="kp-badge badge-nonaktif">
                                                ● Nonaktif
                                            </span>
                                        @endif

                                    </td>

                                    {{-- CREATED --}}
                                    <td style="font-size:13px; color:#64748B;">
                                        {{ $k->created_at->translatedFormat('d M Y') }}
                                    </td>

                                    {{-- ACTION --}}
                                    <td>

                                        <div class="kp-action">

                                            <a href="{{ route('karyawan.edit', $k->id) }}"
                                                class="kp-icon-btn btn-edit">

                                                ✏️

                                            </a>

                                            @if ($k->role !== 'owner')
                                                <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST"
                                                    onsubmit="return confirm('Hapus karyawan ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="kp-icon-btn btn-delete">
                                                        🗑️
                                                    </button>

                                                </form>
                                            @endif

                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            @endif

        </div>

    </div>

    <script>
        // SEARCH TABLE
        const searchInput = document.getElementById('searchKaryawan');

        searchInput?.addEventListener('keyup', function() {

            const keyword = this.value.toLowerCase();

            document.querySelectorAll('#tableKaryawan tr').forEach(row => {

                const text = row.innerText.toLowerCase();

                row.style.display = text.includes(keyword) ?
                    '' :
                    'none';

            });

        });
    </script>

</x-layout.sidebar>
