<x-app-layout>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&family=Inter:wght@400;500;600&display=swap');

    :root {
        --primary:  #6499E9;
        --sky:      #9EDDFF;
        --aqua:     #A6F6FF;
        --mint:     #BEFFF7;
        --navy:     #1a2744;
        --muted:    #6b7a99;
        --surface:  #f8faff;
        --white:    #ffffff;
        --border:   #e8eef8;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Inter', sans-serif; color: var(--navy); -webkit-font-smoothing: antialiased; }
    h1, h2, h3 { font-family: 'Plus Jakarta Sans', sans-serif; }

    /* ── SHARED ─────────────────────────────────────────── */
    .section-tag {
        display: inline-block;
        background: rgba(100,153,233,.1);
        color: var(--primary);
        border-radius: 100px;
        padding: 5px 14px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .4px;
        margin-bottom: 16px;
    }

    .section-title {
        font-size: clamp(1.9rem, 3vw, 2.6rem);
        font-weight: 800;
        color: var(--navy);
        line-height: 1.2;
        letter-spacing: -.4px;
        margin-bottom: 14px;
    }

    .section-sub {
        font-size: 15px;
        color: var(--muted);
        line-height: 1.7;
        max-width: 500px;
    }

    /* ── HERO ────────────────────────────────────────────── */
    .fp-hero {
        background: linear-gradient(135deg, #f0f6ff 0%, #fafeff 55%, #f0fffe 100%);
        padding: 80px 32px 72px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .fp-hero::before {
        content: '';
        position: absolute;
        top: -160px; right: -160px;
        width: 480px; height: 480px;
        background: radial-gradient(circle, rgba(100,153,233,.12) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .fp-hero::after {
        content: '';
        position: absolute;
        bottom: -100px; left: -80px;
        width: 360px; height: 360px;
        background: radial-gradient(circle, rgba(190,255,247,.22) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .fp-hero-inner {
        max-width: 680px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .fp-hero .section-sub { margin: 0 auto; }

    /* ── FEATURE GRID ────────────────────────────────────── */
    .fp-grid-section {
        padding: 80px 32px;
        background: var(--white);
    }

    .fp-grid-inner { max-width: 1160px; margin: 0 auto; }

    .fp-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-top: 56px;
    }

    .fp-card {
        border: 1.5px solid var(--border);
        border-radius: 18px;
        padding: 28px 24px;
        background: var(--white);
        transition: all .22s;
        position: relative;
        overflow: hidden;
    }

    .fp-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        opacity: 0;
        transition: .22s;
        border-radius: 18px 18px 0 0;
    }

    .fp-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 48px rgba(100,153,233,.11);
        border-color: rgba(100,153,233,.35);
    }

    .fp-card:hover::before { opacity: 1; }

    .fp-card.c-blue::before  { background: linear-gradient(90deg, #6499E9, #9EDDFF); }
    .fp-card.c-green::before { background: linear-gradient(90deg, #34d399, #a7f3d0); }
    .fp-card.c-purple::before{ background: linear-gradient(90deg, #a78bfa, #c4b5fd); }
    .fp-card.c-amber::before { background: linear-gradient(90deg, #fbbf24, #fde68a); }
    .fp-card.c-pink::before  { background: linear-gradient(90deg, #f472b6, #fbcfe8); }
    .fp-card.c-indigo::before{ background: linear-gradient(90deg, #6366f1, #a5b4fc); }

    .fp-icon {
        width: 48px; height: 48px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px;
        margin-bottom: 18px;
    }

    .fp-card h3 {
        font-size: 15px; font-weight: 700;
        color: var(--navy); margin-bottom: 8px;
    }

    .fp-card p {
        font-size: 13px; color: var(--muted); line-height: 1.65;
        margin-bottom: 18px;
    }

    .fp-pill {
        display: inline-block;
        border-radius: 100px;
        padding: 4px 12px;
        font-size: 11px; font-weight: 600;
    }

    /* ── DETAIL STRIPS ───────────────────────────────────── */
    .fp-strip {
        padding: 80px 32px;
        position: relative;
        overflow: hidden;
    }

    .fp-strip.alt { background: var(--surface); }
    .fp-strip.alt::before {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 360px; height: 360px;
        background: radial-gradient(circle, rgba(166,246,255,.3) 0%, transparent 70%);
        border-radius: 50%;
    }

    .fp-strip-inner {
        max-width: 1160px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 72px;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .fp-strip-inner.rev { direction: rtl; }
    .fp-strip-inner.rev > * { direction: ltr; }

    .strip-text .section-sub { max-width: 420px; }

    .strip-checklist {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 24px;
    }

    .strip-check {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        color: var(--navy);
        font-weight: 500;
    }

    .check-dot {
        width: 22px; height: 22px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--sky));
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; color: #fff; flex-shrink: 0;
    }

    /* Visual panels */
    .strip-visual {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 20px;
        padding: 28px;
        box-shadow: 0 8px 40px rgba(26,39,68,.07);
    }

    .visual-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--border);
    }

    .visual-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px; font-weight: 700; color: var(--navy);
    }

    .visual-badge {
        font-size: 11px; font-weight: 600;
        background: rgba(100,153,233,.1);
        color: var(--primary);
        padding: 3px 10px; border-radius: 100px;
    }

    /* Stok visual */
    .stok-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #f4f6fb;
        font-size: 13px;
    }
    .stok-row:last-child { border-bottom: none; }

    .stok-name { color: var(--navy); font-weight: 500; }
    .stok-bar-wrap { flex: 1; margin: 0 14px; height: 5px; background: var(--border); border-radius: 10px; }
    .stok-bar { height: 100%; border-radius: 10px; }
    .stok-val { font-weight: 700; font-size: 12px; white-space: nowrap; }

    /* Laporan visual */
    .lap-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #f4f6fb;
    }
    .lap-row:last-child { border-bottom: none; }
    .lap-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0; }
    .lap-lbl { font-size: 12px; color: var(--muted); }
    .lap-val { font-size: 14px; font-weight: 700; color: var(--navy); }
    .lap-chg { font-size: 11px; font-weight: 600; }
    .up { color: #22c55e; }
    .dn { color: #f87171; }

    /* Kasir visual */
    .kasir-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 9px 0;
        border-bottom: 1px solid #f4f6fb;
    }
    .kasir-item:last-child { border-bottom: none; }
    .kasir-name { font-size: 13px; font-weight: 500; color: var(--navy); }
    .kasir-sub { font-size: 11px; color: var(--muted); }
    .kasir-price { font-size: 13px; font-weight: 700; color: var(--primary); }
    .kasir-total-row {
        display: flex; justify-content: space-between;
        margin-top: 14px; padding-top: 14px;
        border-top: 2px solid var(--border);
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800; font-size: 15px; color: var(--navy);
    }
    .kasir-total-row span:last-child { color: var(--primary); }

    /* ── CTA ─────────────────────────────────────────────── */
    .fp-cta {
        padding: 80px 32px;
        text-align: center;
        background: linear-gradient(135deg, var(--primary) 0%, #7db3f5 100%);
        position: relative;
        overflow: hidden;
    }

    .fp-cta::before {
        content: '';
        position: absolute;
        top: -80px; left: 50%; transform: translateX(-50%);
        width: 600px; height: 300px;
        background: rgba(255,255,255,.06);
        border-radius: 50%;
    }

    .fp-cta h2 {
        font-size: clamp(1.8rem, 3vw, 2.4rem);
        font-weight: 800; color: #fff;
        margin-bottom: 14px; position: relative;
    }

    .fp-cta p { color: rgba(255,255,255,.8); font-size: 15px; margin-bottom: 32px; position: relative; }

    .btn-white {
        display: inline-block;
        background: #fff; color: var(--primary);
        padding: 13px 32px; border-radius: 12px;
        font-size: 14px; font-weight: 700;
        text-decoration: none; position: relative;
        box-shadow: 0 4px 20px rgba(0,0,0,.12);
        transition: all .2s;
    }
    .btn-white:hover { transform: translateY(-2px); box-shadow: 0 8px 32px rgba(0,0,0,.15); }

    /* ── RESPONSIVE ──────────────────────────────────────── */
    @media (max-width: 1024px) {
        .fp-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .fp-hero, .fp-grid-section, .fp-strip, .fp-cta { padding-left: 20px; padding-right: 20px; }
        .fp-grid { grid-template-columns: 1fr; }
        .fp-strip-inner { grid-template-columns: 1fr; gap: 32px; }
        .fp-strip-inner.rev { direction: ltr; }
    }
</style>


<!-- ════════════════════════════
     HERO
════════════════════════════ -->
<section class="fp-hero">
    <div class="fp-hero-inner">
        <div class="section-tag">Fitur UniPOS</div>
        <h1 class="section-title">Semua yang Anda Butuhkan<br>untuk Mengelola Bisnis</h1>
        <p class="section-sub">
            UniPOS menyediakan fitur lengkap agar operasional bisnis Anda berjalan
            lebih cepat, rapi, dan efisien — tanpa perlu keahlian teknis.
        </p>
    </div>
</section>


<!-- ════════════════════════════
     FEATURE GRID
════════════════════════════ -->
<section class="fp-grid-section">
    <div class="fp-grid-inner">

        <div style="text-align:center;">
            <div class="section-tag">Fitur Unggulan</div>
            <h2 class="section-title">Dirancang untuk bisnis nyata</h2>
        </div>

        <div class="fp-grid">

            <div class="fp-card c-blue">
                <div class="fp-icon" style="background:#EFF6FF;">💳</div>
                <h3>Transaksi Cepat</h3>
                <p>Proses penjualan hanya dalam hitungan detik dengan tampilan kasir yang modern dan intuitif.</p>
                <span class="fp-pill" style="background:#EFF6FF;color:#6499E9;">Kasir Modern</span>
            </div>

            <div class="fp-card c-green">
                <div class="fp-icon" style="background:#F0FDF4;">📦</div>
                <h3>Manajemen Stok</h3>
                <p>Pantau stok barang secara real-time dan hindari kehabisan produk di waktu yang tidak tepat.</p>
                <span class="fp-pill" style="background:#F0FDF4;color:#16a34a;">Real-time Sync</span>
            </div>

            <div class="fp-card c-purple">
                <div class="fp-icon" style="background:#FAF5FF;">🗂️</div>
                <h3>Kategori Produk</h3>
                <p>Kelompokkan produk agar lebih rapi dan mudah ditemukan saat proses transaksi berlangsung.</p>
                <span class="fp-pill" style="background:#FAF5FF;color:#9333ea;">Terorganisir</span>
            </div>

            <div class="fp-card c-amber">
                <div class="fp-icon" style="background:#FFFBEB;">🧾</div>
                <h3>Riwayat Transaksi</h3>
                <p>Lihat riwayat transaksi lengkap beserta informasi produk, jumlah, dan metode pembayaran.</p>
                <span class="fp-pill" style="background:#FFFBEB;color:#d97706;">Histori Lengkap</span>
            </div>

            <div class="fp-card c-pink">
                <div class="fp-icon" style="background:#FFF1F2;">🏪</div>
                <h3>Multi Usaha</h3>
                <p>Kelola banyak usaha atau cabang dalam satu akun tanpa perlu berpindah aplikasi.</p>
                <span class="fp-pill" style="background:#FFF1F2;color:#e11d48;">Satu Akun</span>
            </div>

            <div class="fp-card c-indigo">
                <div class="fp-icon" style="background:#EEF2FF;">📊</div>
                <h3>Laporan Otomatis</h3>
                <p>Dapatkan laporan penjualan harian, mingguan, dan bulanan yang siap dianalisis kapan saja.</p>
                <span class="fp-pill" style="background:#EEF2FF;color:#6366f1;">Statistik Instan</span>
            </div>

        </div>
    </div>
</section>


<!-- ════════════════════════════
     DETAIL: STOK
════════════════════════════ -->
<section class="fp-strip alt">
    <div class="fp-strip-inner">

        <div class="strip-text">
            <div class="section-tag">Manajemen Stok</div>
            <h2 class="section-title">Stok terpantau,<br>bisnis aman</h2>
            <p class="section-sub">
                Dengan sistem stok otomatis, setiap transaksi langsung mencatat perubahan stok.
                Tidak perlu lagi pencatatan manual yang memakan waktu.
            </p>
            <div class="strip-checklist">
                <div class="strip-check"><div class="check-dot">✓</div> Stok masuk & keluar tercatat otomatis</div>
                <div class="strip-check"><div class="check-dot">✓</div> Notifikasi saat stok hampir habis</div>
                <div class="strip-check"><div class="check-dot">✓</div> Tracking produk terlaris setiap periode</div>
                <div class="strip-check"><div class="check-dot">✓</div> Riwayat perubahan stok lengkap</div>
            </div>
        </div>

        <div class="strip-visual">
            <div class="visual-header">
                <div class="visual-title">📦 Status Stok</div>
                <div class="visual-badge">Real-time</div>
            </div>

            <div class="stok-row">
                <div class="stok-name">Kopi Arabika</div>
                <div class="stok-bar-wrap"><div class="stok-bar" style="width:78%;background:linear-gradient(90deg,#6499E9,#9EDDFF);"></div></div>
                <div class="stok-val" style="color:#6499E9;">78 pcs</div>
            </div>
            <div class="stok-row">
                <div class="stok-name">Gula Aren</div>
                <div class="stok-bar-wrap"><div class="stok-bar" style="width:45%;background:linear-gradient(90deg,#fbbf24,#fde68a);"></div></div>
                <div class="stok-val" style="color:#d97706;">45 pcs</div>
            </div>
            <div class="stok-row">
                <div class="stok-name">Susu Oat</div>
                <div class="stok-bar-wrap"><div class="stok-bar" style="width:12%;background:linear-gradient(90deg,#f87171,#fca5a5);"></div></div>
                <div class="stok-val" style="color:#ef4444;">12 pcs ⚠️</div>
            </div>
            <div class="stok-row">
                <div class="stok-name">Cup 16oz</div>
                <div class="stok-bar-wrap"><div class="stok-bar" style="width:91%;background:linear-gradient(90deg,#34d399,#a7f3d0);"></div></div>
                <div class="stok-val" style="color:#16a34a;">91 pcs</div>
            </div>
            <div class="stok-row">
                <div class="stok-name">Sedotan Paper</div>
                <div class="stok-bar-wrap"><div class="stok-bar" style="width:60%;background:linear-gradient(90deg,#6499E9,#9EDDFF);"></div></div>
                <div class="stok-val" style="color:#6499E9;">60 pcs</div>
            </div>
        </div>

    </div>
</section>


<!-- ════════════════════════════
     DETAIL: TRANSAKSI
════════════════════════════ -->
<section class="fp-strip">
    <div class="fp-strip-inner rev">

        <div class="strip-text">
            <div class="section-tag">Kasir Digital</div>
            <h2 class="section-title">Transaksi selesai<br>dalam detik</h2>
            <p class="section-sub">
                Antarmuka kasir UniPOS dirancang untuk kecepatan. Tambah item, pilih metode
                bayar, dan cetak struk — semua dalam satu alur yang mulus.
            </p>
            <div class="strip-checklist">
                <div class="strip-check"><div class="check-dot">✓</div> Cari produk dengan pencarian cepat</div>
                <div class="strip-check"><div class="check-dot">✓</div> Berbagai metode pembayaran didukung</div>
                <div class="strip-check"><div class="check-dot">✓</div> Cetak atau kirim struk digital</div>
                <div class="strip-check"><div class="check-dot">✓</div> Perhitungan kembalian otomatis</div>
            </div>
        </div>

        <div class="strip-visual">
            <div class="visual-header">
                <div class="visual-title">🧾 Transaksi Baru</div>
                <div class="visual-badge">Coffeeshop A</div>
            </div>

            <div class="kasir-item">
                <div><div class="kasir-name">Kopi Susu Gula Aren</div><div class="kasir-sub">x2</div></div>
                <div class="kasir-price">Rp 56.000</div>
            </div>
            <div class="kasir-item">
                <div><div class="kasir-name">Matcha Latte</div><div class="kasir-sub">x1</div></div>
                <div class="kasir-price">Rp 35.000</div>
            </div>
            <div class="kasir-item">
                <div><div class="kasir-name">Croissant</div><div class="kasir-sub">x2</div></div>
                <div class="kasir-price">Rp 48.000</div>
            </div>
            <div class="kasir-item">
                <div><div class="kasir-name">Air Mineral</div><div class="kasir-sub">x1</div></div>
                <div class="kasir-price">Rp 8.000</div>
            </div>

            <div class="kasir-total-row">
                <span>Total</span>
                <span>Rp 147.000</span>
            </div>

            <div style="margin-top:16px;display:flex;gap:8px;">
                <div style="flex:1;background:#EFF6FF;border-radius:10px;padding:10px;text-align:center;font-size:12px;font-weight:600;color:#6499E9;">💳 QRIS</div>
                <div style="flex:1;background:#F0FDF4;border-radius:10px;padding:10px;text-align:center;font-size:12px;font-weight:600;color:#16a34a;">💵 Tunai</div>
                <div style="flex:1;background:var(--border);border-radius:10px;padding:10px;text-align:center;font-size:12px;font-weight:600;color:var(--muted);">🏦 Transfer</div>
            </div>
        </div>

    </div>
</section>


<!-- ════════════════════════════
     DETAIL: LAPORAN
════════════════════════════ -->
<section class="fp-strip alt">
    <div class="fp-strip-inner">

        <div class="strip-text">
            <div class="section-tag">Laporan & Analitik</div>
            <h2 class="section-title">Keputusan cerdas<br>dari data nyata</h2>
            <p class="section-sub">
                Laporan otomatis UniPOS memberi Anda gambaran lengkap performa bisnis
                setiap hari — tanpa perlu merekap manual di spreadsheet.
            </p>
            <div class="strip-checklist">
                <div class="strip-check"><div class="check-dot">✓</div> Laporan harian, mingguan & bulanan</div>
                <div class="strip-check"><div class="check-dot">✓</div> Grafik performa penjualan visual</div>
                <div class="strip-check"><div class="check-dot">✓</div> Produk terlaris & pendapatan bersih</div>
                <div class="strip-check"><div class="check-dot">✓</div> Export laporan ke PDF </div>
            </div>
        </div>

        <div class="strip-visual">
            <div class="visual-header">
                <div class="visual-title">📊 Ringkasan Bulan Ini</div>
                <div class="visual-badge">Maret 2026</div>
            </div>

            <div class="lap-row">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div class="lap-icon" style="background:#EFF6FF;">💰</div>
                    <div><div style="font-size:13px;font-weight:600;color:var(--navy);">Total Pendapatan</div><div class="lap-lbl">vs bulan lalu</div></div>
                </div>
                <div style="text-align:right;"><div class="lap-val">Rp 24,8 Jt</div><div class="lap-chg up">↑ 12%</div></div>
            </div>

            <div class="lap-row">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div class="lap-icon" style="background:#F0FDF4;">🧾</div>
                    <div><div style="font-size:13px;font-weight:600;color:var(--navy);">Jumlah Transaksi</div><div class="lap-lbl">total bulan ini</div></div>
                </div>
                <div style="text-align:right;"><div class="lap-val">1.240</div><div class="lap-chg up">↑ 8%</div></div>
            </div>

            <div class="lap-row">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div class="lap-icon" style="background:#FFFBEB;">⭐</div>
                    <div><div style="font-size:13px;font-weight:600;color:var(--navy);">Produk Terlaris</div><div class="lap-lbl">Kopi Susu Gula Aren</div></div>
                </div>
                <div style="text-align:right;"><div class="lap-val">342 terjual</div><div class="lap-chg up">↑ 24%</div></div>
            </div>

            <div class="lap-row">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div class="lap-icon" style="background:#FFF1F2;">📉</div>
                    <div><div style="font-size:13px;font-weight:600;color:var(--navy);">Produk Terendah</div><div class="lap-lbl">Teh Tarik Spesial</div></div>
                </div>
                <div style="text-align:right;"><div class="lap-val">18 terjual</div><div class="lap-chg dn">↓ 5%</div></div>
            </div>
        </div>

    </div>
</section>


<!-- ════════════════════════════
     CTA
════════════════════════════ -->
<section class="fp-cta">
    <h2>Coba Semua Fitur UniPOS</h2>
    <p>Mulai kelola bisnis Anda dengan sistem kasir modern — gratis untuk memulai.</p>
    <a href="/register-usaha" class="btn-white">Mulai Sekarang →</a>
</section>

</x-app-layout>