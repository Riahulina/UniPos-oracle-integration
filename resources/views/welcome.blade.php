<x-app-layout>
<section class="px-16 py-5 flex items-center justify-between bg-gradient-to-r from-blue-50 to-white">

    <!-- TEXT -->
        <!-- blur -->
        <div class="blur-bg blur1"></div>
        <div class="blur-bg blur2"></div>

        <!-- icon background -->
        <div class="absolute text-blue-300 text-8xl opacity-20 top-24 left-20">🛒</div>

        <div class="absolute text-green-300 text-8xl opacity-20 bottom-32 right-96">📊</div>

        <div class="absolute text-yellow-300 text-8xl opacity-20 top-40 left-64">💳</div>

        <div class="absolute text-purple-300 text-8xl opacity-20 top-72 left-96">📦</div>
        <!-- TEXT -->
        <div class="max-w-xl relative z-10">

            <h1 class="text-4xl  font-bold text-gray-800 leading-tight section-h2 mb-6">
                Sistem Kasir 
                <span class="section-h2 text-blue-500">Multi Usaha</span>
            </h1>

            <p class="text-lg text-gray-600 mb-8">
                Kelola penjualan, stok, dan laporan dalam satu aplikasi 
                <span class="font-semibold text-blue-500">UniPOS</span>. 
                Cocok untuk toko, cafe, laundry, dan berbagai usaha lainnya.
            </p>

            <div class="flex gap-4 mb-10">

                <a href="/register-usaha"
                   class="bg-blue-500 hover:bg-blue-600 text-white px-7 py-3 rounded-xl shadow-md transition">
                    Daftarkan Usaha Anda
                </a>

                <a href="/login"
                   class="border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white px-7 py-3 rounded-xl transition">
                    Login User
                </a>

            </div>

            <!-- statistik -->
            <div class="flex gap-6">

                <div class="hero-stat">
                    <div class="font-bold text-blue-600">500+</div>
                    <div class="text-gray-500 text-xs">Bisnis bergabung</div>
                </div>

                <div class="hero-stat">
                    <div class="font-bold text-blue-600">10K+</div>
                    <div class="text-gray-500 text-xs">Transaksi / hari</div>
                </div>

                <div class="hero-stat">
                    <div class="font-bold text-blue-600">99%</div>
                    <div class="text-gray-500 text-xs">Sistem stabil</div>
                </div>

            </div>

        </div>

   
<section class="hero-section">
        <div class="hero-inner">
            <div class="hero-visual">
                <div class="float-top">
                    <div class="float-top-icon">📈</div>
                    <div>
                        <div style="font-size:12px;font-weight:700;color:var(--navy);line-height:1.3;">Penjualan Naik</div>
                        <div style="font-size:10px;color:rgba(11,28,58,.55);">+24% bulan ini</div>
                    </div>
                </div>

                <div class="dash-card">
                    <div class="dash-head">
                        <span class="dash-title-text">Dashboard UniPOS</span>
                        <span class="dash-date">Maret 2026</span>
                    </div>
                    <div class="dash-body">
                        <div class="metric-grid">
                            <div class="metric-box"><div class="metric-lbl">Pendapatan</div><div class="metric-val">24,8 Jt</div><div class="metric-chg">↑ 12%</div></div>
                            <div class="metric-box"><div class="metric-lbl">Transaksi</div><div class="metric-val">1.240</div><div class="metric-chg">↑ 8%</div></div>
                            <div class="metric-box"><div class="metric-lbl">Produk</div><div class="metric-val">312</div><div class="metric-chg">↑ 3%</div></div>
                        </div>
                        <div class="chart-area">
                            <div class="chart-lbl">Penjualan Mingguan</div>
                            <div class="bar-row">
                                <div class="bar-col"><div class="bar-body" style="height:40px;"></div><div class="bar-day">Sen</div></div>
                                <div class="bar-col"><div class="bar-body" style="height:52px;"></div><div class="bar-day">Sel</div></div>
                                <div class="bar-col"><div class="bar-body bar-hi"  style="height:64px;"></div><div class="bar-day">Rab</div></div>
                                <div class="bar-col"><div class="bar-body" style="height:44px;"></div><div class="bar-day">Kam</div></div>
                                <div class="bar-col"><div class="bar-body bar-gld" style="height:58px;"></div><div class="bar-day">Jum</div></div>
                                <div class="bar-col"><div class="bar-body" style="height:36px;"></div><div class="bar-day">Sab</div></div>
                                <div class="bar-col"><div class="bar-body" style="height:28px;"></div><div class="bar-day">Min</div></div>
                            </div>
                        </div>
                        <div>
                            <div class="trx-row">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div class="trx-icon" style="background:#EFF6FF;">☕</div>
                                    <div><div class="trx-name">Kopi Susu Gula Aren</div><div class="trx-time">14:22 · Coffeeshop A</div></div>
                                </div>
                                <div class="trx-amount">Rp 28.000</div>
                            </div>
                            <div class="trx-row">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div class="trx-icon" style="background:#FFFBEB;">🛒</div>
                                    <div><div class="trx-name">Belanja Minimarket</div><div class="trx-time">13:47 · Toko Maju</div></div>
                                </div>
                                <div class="trx-amount">Rp 127.500</div>
                            </div>
                            <div class="trx-row">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div class="trx-icon" style="background:#ECFDF5;">👕</div>
                                    <div><div class="trx-name">Laundry Kiloan 3kg</div><div class="trx-time">12:15 · Fresh Laundry</div></div>
                                </div>
                                <div class="trx-amount">Rp 18.000</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-bot">
                    <div class="live-dot"></div>
                    <div>
                        <div style="font-size:12px;font-weight:600;color:var(--navy);">Sistem Aktif</div>
                        <div style="font-size:10px;color:var(--muted);">Real-time sync</div>
                    </div>
                </div>
            </div>

        </div>
    </section>
   

</section>

<!-- Mengapa Memilih UniPOS -->
<section class="py-16 bg-gradient-to-r from-blue-50 to-white">

    <!-- container -->
    <div class="max-w-6xl mx-auto px-6">

        <!-- header -->
        <div class="text-center mb-14">

            <div class="section-tag mb-3">
                Kenapa UniPOS?
            </div>

            <h2 class="text-4xl font-bold text-gray-800 section-h2 mb-4">
                Fitur yang dirancang <br>
                untuk bisnis nyata
            </h2>

            <p class="text-gray-600 max-w-xl mx-auto">
                Tidak perlu keahlian teknis. Mulai dalam hitungan menit 
                dan kelola usaha lebih efisien.
            </p>

        </div>


        <!-- fitur grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card 1 -->
            <div class="bg-blue-50 p-6 rounded-2xl shadow-sm hover:shadow-lg transition">

                <img src="{{ asset('img/online-shop.png') }}" class="w-14 mb-4">

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Multi Usaha
                </h3>

                <p class="text-gray-600 text-sm mb-4">
                    Kelola banyak cabang usaha dalam satu aplikasi
                </p>

                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs">
                    Bisnis Tumbuh
                </span>

            </div>


            <!-- Card 2 -->
            <div class="bg-orange-50 p-6 rounded-2xl shadow-sm hover:shadow-lg transition">

                <img src="{{ asset('img/briefcase.png') }}" class="w-14 mb-4">

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Manajemen Produk
                </h3>

                <p class="text-gray-600 text-sm mb-4">
                    Atur produk dan stok dengan mudah
                </p>

                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">
                    Kelola Stok
                </span>

            </div>


            <!-- Card 3 -->
            <div class="bg-green-50 p-6 rounded-2xl shadow-sm hover:shadow-lg transition">

                <img src="{{ asset('img/business-intelligence.png') }}" class="w-14 mb-4">

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Laporan Otomatis
                </h3>

                <p class="text-gray-600 text-sm mb-4">
                    Dapatkan laporan penjualan secara instan
                </p>

                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">
                    Statistik Jelas
                </span>

            </div>


            <!-- Card 4 -->
            <div class="bg-purple-50 p-6 rounded-2xl shadow-sm hover:shadow-lg transition">

                <img src="{{ asset('img/budget.png') }}" class="w-14 mb-4">

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Transaksi Cepat
                </h3>

                <p class="text-gray-600 text-sm mb-4">
                    Proses penjualan lebih cepat dengan sistem kasir yang praktis
                </p>

                <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs">
                    Pembayaran Mudah
                </span>

            </div>

        </div>

    </div>

</section>

 <section class="py-20 bg-gradient-to-b from-white via-blue-50 to-white relative overflow-hidden">

    <!-- background blur -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-blue-200 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-200 rounded-full blur-3xl opacity-30"></div>

    <div class="max-w-6xl mx-auto px-6 relative">

        <!-- header -->
        <div class="text-center mb-14">

            <div class="section-tag mb-3">
                Cocok untuk Semua Bisnis
            </div>

            <h2 class="text-4xl font-bold text-gray-800 section-h2 mb-4">
                Fleksibel untuk berbagai <br> jenis usaha Anda
            </h2>

            <p class="text-gray-600 max-w-xl mx-auto">
                UniPOS dirancang untuk beradaptasi dengan kebutuhan unik setiap jenis bisnis.
            </p>

        </div>

        <!-- grid bisnis -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Restaurant -->
            <div class="bg-white p-7 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition">

                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <img src="{{ asset('img/restaurant-building.png') }}" class="w-8">
                </div>

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Restaurant
                </h3>

                <p class="text-gray-600 text-sm">
                    Kelola pesanan makanan, meja, dan transaksi restoran secara praktis.
                </p>

            </div>


            <!-- UMKM -->
            <div class="bg-white p-7 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition">

                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <img src="{{ asset('img/umkm.png') }}" class="w-8">
                </div>

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    UMKM
                </h3>

                <p class="text-gray-600 text-sm">
                    Sistem kasir sederhana dan powerful untuk mendukung usaha kecil berkembang.
                </p>

            </div>


            <!-- Coffeeshop -->
            <div class="bg-white p-7 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition">

                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <img src="{{ asset('img/coffee-shop.png') }}" class="w-8">
                </div>

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Coffeeshop
                </h3>

                <p class="text-gray-600 text-sm">
                    Catat pesanan minuman dan transaksi dengan cepat untuk pelayanan lebih efisien.
                </p>

            </div>


            <!-- Minimarket -->
            <div class="bg-white p-7 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition">

                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <img src="{{ asset('img/minimarket.png') }}" class="w-8">
                </div>

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Minimarket
                </h3>

                <p class="text-gray-600 text-sm">
                    Kelola stok barang dan transaksi minimarket dengan sistem kasir modern.
                </p>

            </div>


            <!-- Laundry -->
            <div class="bg-white p-7 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition">

                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <img src="{{ asset('img/laundry-shop.png') }}" class="w-8">
                </div>

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Laundry
                </h3>

                <p class="text-gray-600 text-sm">
                    Kelola transaksi laundry dan status cucian pelanggan secara mudah.
                </p>

            </div>


            <!-- Retail -->
            <div class="bg-white p-7 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition">

                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <img src="{{ asset('img/retail.png') }}" class="w-8">
                </div>

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Retail
                </h3>

                <p class="text-gray-600 text-sm">
                    Sistem kasir untuk toko retail dengan manajemen stok yang efisien.
                </p>

            </div>

        </div>

    </div>

</section>

</x-app-layout>