<x-app-layout>



    <!-- ════════════════════════════════════════
     HERO
════════════════════════════════════════ -->
    <section class="hero">
        <div class="hero-inner">

            <!-- LEFT: Copy -->
            <div class="hero-copy">
                <div class="hero-badge">
                    <span></span> Sistem Kasir Modern
                </div>

                <h1>
                    Kelola Bisnis Anda<br>
                    dengan <em>UniPOS</em>
                </h1>

                <p class="hero-desc">
                    Platform kasir multi-usaha yang membantu Anda mengelola penjualan,
                    stok, dan laporan dalam satu tempat. Mudah, cepat, dan andal.
                </p>

                <div class="hero-cta">
                    <a href="/register-usaha" class="btn-primary">Daftarkan Usaha</a>

                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-val">500+</div>
                        <div class="stat-lbl">Bisnis bergabung</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <div class="stat-val">10K+</div>
                        <div class="stat-lbl">Transaksi / hari</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <div class="stat-val">99%</div>
                        <div class="stat-lbl">Uptime sistem</div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Dashboard Preview -->
            <div class="hero-visual">
                <!-- Floating chips -->
                <div class="float-chip chip-top">
                    <div class="chip-icon" style="background:#eff6ff;">📈</div>
                    <div>
                        <div class="chip-label">Penjualan Naik</div>
                        <div class="chip-sub">+24% bulan ini</div>
                    </div>
                </div>

                <div class="dash-card">
                    <div class="dash-topbar">
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="dash-dots">
                                <div class="dash-dot"></div>
                                <div class="dash-dot"></div>
                                <div class="dash-dot"></div>
                            </div>
                            <div class="dash-topbar-title">Dashboard UniPOS</div>
                        </div>
                        <div class="dash-topbar-date">Maret 2026</div>
                    </div>

                    <div class="dash-body">
                        <!-- Metrics -->
                        <div class="metric-grid">
                            <div class="metric-box">
                                <div class="metric-lbl">Pendapatan</div>
                                <div class="metric-val">24,8 Jt</div>
                                <div class="metric-chg">↑ 12%</div>
                            </div>
                            <div class="metric-box">
                                <div class="metric-lbl">Transaksi</div>
                                <div class="metric-val">1.240</div>
                                <div class="metric-chg">↑ 8%</div>
                            </div>
                            <div class="metric-box">
                                <div class="metric-lbl">Produk</div>
                                <div class="metric-val">312</div>
                                <div class="metric-chg">↑ 3%</div>
                            </div>
                        </div>

                        <!-- Mini bar chart -->
                        <div class="chart-area">
                            <div class="chart-lbl">Penjualan Mingguan</div>
                            <div class="bar-row">
                                <div class="bar-col">
                                    <div class="bar-body" style="height:38px"></div>
                                    <div class="bar-day">Sen</div>
                                </div>
                                <div class="bar-col">
                                    <div class="bar-body" style="height:50px"></div>
                                    <div class="bar-day">Sel</div>
                                </div>
                                <div class="bar-col">
                                    <div class="bar-body bar-hi" style="height:64px"></div>
                                    <div class="bar-day">Rab</div>
                                </div>
                                <div class="bar-col">
                                    <div class="bar-body" style="height:42px"></div>
                                    <div class="bar-day">Kam</div>
                                </div>
                                <div class="bar-col">
                                    <div class="bar-body bar-gld" style="height:56px"></div>
                                    <div class="bar-day">Jum</div>
                                </div>
                                <div class="bar-col">
                                    <div class="bar-body" style="height:34px"></div>
                                    <div class="bar-day">Sab</div>
                                </div>
                                <div class="bar-col">
                                    <div class="bar-body" style="height:26px"></div>
                                    <div class="bar-day">Min</div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent transactions -->
                        <div class="trx-list">
                            <div class="trx-row">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div class="trx-icon" style="background:#EFF6FF;">☕</div>
                                    <div>
                                        <div class="trx-name">Kopi Susu Gula Aren</div>
                                        <div class="trx-time">14:22 · Coffeeshop A</div>
                                    </div>
                                </div>
                                <div class="trx-amount">Rp 28.000</div>
                            </div>
                            <div class="trx-row">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div class="trx-icon" style="background:#FFFBEB;">🛒</div>
                                    <div>
                                        <div class="trx-name">Belanja Minimarket</div>
                                        <div class="trx-time">13:47 · Toko Maju</div>
                                    </div>
                                </div>
                                <div class="trx-amount">Rp 127.500</div>
                            </div>
                            <div class="trx-row">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div class="trx-icon" style="background:#ECFDF5;">👕</div>
                                    <div>
                                        <div class="trx-name">Laundry Kiloan 3kg</div>
                                        <div class="trx-time">12:15 · Fresh Laundry</div>
                                    </div>
                                </div>
                                <div class="trx-amount">Rp 18.000</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-chip chip-bot">
                    <div class="live-ring"></div>
                    <div>
                        <div class="chip-label">Sistem Aktif</div>
                        <div class="chip-sub">Real-time sync</div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- ════════════════════════════════════════
     FEATURES
════════════════════════════════════════ -->
    <section class="features">
        <div class="features-inner">
            <div class="features-header">
                <div>
                    <div class="section-tag">Kenapa UniPOS?</div>
                    <h2 class="section-title">Fitur yang dirancang<br>untuk bisnis nyata</h2>
                </div>
                <p class="section-sub" style="max-width:320px;">
                    Tidak perlu keahlian teknis. Mulai dalam hitungan menit dan kelola usaha lebih efisien.
                </p>
            </div>

            <div class="feat-grid">
                <div class="feat-card">
                    <div class="feat-icon-wrap" style="background:#EFF6FF;">🏪</div>
                    <h3>Multi Usaha</h3>
                    <p>Kelola banyak cabang usaha dalam satu aplikasi dengan mudah.</p>
                    <span class="feat-tag" style="background:#FFF7ED;color:#ea8c2e;">Bisnis Tumbuh</span>
                </div>

                <div class="feat-card">
                    <div class="feat-icon-wrap" style="background:#F0FDF4;">📦</div>
                    <h3>Manajemen Produk</h3>
                    <p>Atur produk dan stok dengan tampilan yang intuitif dan cepat.</p>
                    <span class="feat-tag" style="background:#EFF6FF;color:var(--primary);">Kelola Stok</span>
                </div>

                <div class="feat-card">
                    <div class="feat-icon-wrap" style="background:#F0FDF4;">📊</div>
                    <h3>Laporan Otomatis</h3>
                    <p>Dapatkan laporan penjualan harian, mingguan, dan bulanan secara instan.</p>
                    <span class="feat-tag" style="background:#ECFDF5;color:#16a34a;">Statistik Jelas</span>
                </div>

                <div class="feat-card">
                    <div class="feat-icon-wrap" style="background:#FAF5FF;">⚡</div>
                    <h3>Transaksi Cepat</h3>
                    <p>Proses penjualan lebih cepat dengan antarmuka kasir yang praktis.</p>
                    <span class="feat-tag" style="background:#FAF5FF;color:#9333ea;">Pembayaran Mudah</span>
                </div>
            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════
     BUSINESS TYPES
════════════════════════════════════════ -->
    <section class="biz">
        <div class="biz-inner">
            <div class="biz-header">
                <div class="section-tag">Cocok untuk Semua Bisnis</div>
                <h2 class="section-title">Fleksibel untuk berbagai<br>jenis usaha Anda</h2>
                <p class="section-sub">UniPOS dirancang untuk beradaptasi dengan kebutuhan unik setiap jenis bisnis.
                </p>
            </div>

            <div class="biz-grid">
                <div class="biz-card">
                    <div class="biz-icon" style="background:#FFF7ED;">🍽️</div>
                    <h3>Restaurant</h3>
                    <p>Kelola pesanan makanan, meja, dan transaksi restoran secara praktis.</p>
                </div>
                <div class="biz-card">
                    <div class="biz-icon" style="background:#EFF6FF;">🏬</div>
                    <h3>UMKM</h3>
                    <p>Sistem kasir sederhana dan powerful untuk mendukung usaha kecil berkembang.</p>
                </div>
                <div class="biz-card">
                    <div class="biz-icon" style="background:#FFFBEB;">☕</div>
                    <h3>Coffeeshop</h3>
                    <p>Catat pesanan minuman dan transaksi dengan cepat untuk pelayanan lebih efisien.</p>
                </div>
                <div class="biz-card">
                    <div class="biz-icon" style="background:#F0FDF4;">🏪</div>
                    <h3>Minimarket</h3>
                    <p>Kelola stok barang dan transaksi minimarket dengan sistem kasir modern.</p>
                </div>
                <div class="biz-card">
                    <div class="biz-icon" style="background:#FAF5FF;">👕</div>
                    <h3>Laundry</h3>
                    <p>Kelola transaksi laundry dan status cucian pelanggan secara mudah.</p>
                </div>
                <div class="biz-card">
                    <div class="biz-icon" style="background:#FFF1F2;">🛍️</div>
                    <h3>Retail</h3>
                    <p>Sistem kasir untuk toko retail dengan manajemen stok yang efisien.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ════════════════════════════════════════
     CTA
════════════════════════════════════════ -->
    <section class="cta-section">
        <h2>Siap mulai dengan UniPOS?</h2>
        <p>Daftarkan usaha Anda sekarang dan rasakan kemudahan mengelola bisnis.</p>
        <a href="/register-usaha" class="btn-white">Daftar Gratis Sekarang →</a>
    </section>

</x-app-layout>
