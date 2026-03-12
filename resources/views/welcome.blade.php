<x-app-layout>

<section class="px-16 py-24 flex items-center justify-between bg-gradient-to-r from-blue-50 to-white">

    <!-- TEXT -->
    <div class="max-w-xl">

        <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-6">
            Sistem Kasir 
            <span class="text-blue-500">Multi Usaha</span>
        </h1>

        <p class="text-lg text-gray-600 mb-8">
            Kelola penjualan, stok, dan laporan dalam satu aplikasi 
            <span class="font-semibold text-blue-500">UniPOS</span>. 
            Cocok untuk toko, cafe, laundry, dan berbagai usaha lainnya.
        </p>

        <div class="flex gap-4">

            <!-- DAFTAR USAHA -->
            <a href="/register-usaha"
            class="bg-blue-500 hover:bg-blue-600 text-white px-7 py-3 rounded-xl shadow-md transition">
                Daftarkan Usaha Anda
            </a>

            <!-- LOGIN USER -->
            <a href="/login"
            class="border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white px-7 py-3 rounded-xl transition">
                Login User
            </a>

        </div>

    </div>


    <!-- IMAGE -->
    <div class="flex justify-end">
        <img src="{{ asset('img/katalog1.jpg') }}"
             class="w-[560px] object-contain">
    </div>

</section>

<!-- Mengapa Memilih UniPOS -->
<section class="py-20 bg-gradient-to-r from-blue-50 to-white">

    <div class="text-center mb-14">
        <h2 class="text-3xl font-bold text-gray-800">
            Mengapa Memilih UniPOS?
        </h2>
    </div>

    <div class="grid md:grid-cols-4 gap-8 px-12">

        <!-- Card 1 -->
        <div class="bg-blue-50 p-8 rounded-2xl shadow-sm hover:shadow-lg transition">
            
            <img src="{{ asset('img/online-shop.png') }}" class="w-16 mb-4">

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                Multi Usaha
            </h3>

            <p class="text-gray-600 mb-4">
                Kelola banyak cabang usaha dalam satu aplikasi
            </p>

            <span class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full text-sm">
                Bisnis Tumbuh
            </span>

        </div>

        <!-- Card 2 -->
        <div class="bg-orange-50 p-8 rounded-2xl shadow-sm hover:shadow-lg transition">
            
            <img src="{{ asset('img/briefcase.png') }}" class="w-16 mb-4">

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                Manajemen Produk
            </h3>

            <p class="text-gray-600 mb-4">
                Atur produk dan stok dengan mudah
            </p>

            <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm">
                Kelola Stok
            </span>

        </div>

        <!-- Card 3 -->
        <div class="bg-green-50 p-8 rounded-2xl shadow-sm hover:shadow-lg transition">
            
            <img src="{{ asset('img/business-intelligence.png') }}" class="w-16 mb-4">

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                Laporan Otomatis
            </h3>

            <p class="text-gray-600 mb-4">
                Dapatkan laporan penjualan secara instan
            </p>

            <button><span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm">
                Statistik Jelas
            </span></button>

        </div>

        <div class="bg-purple-50 p-8 rounded-2xl shadow-sm hover:shadow-lg transition">
        
        <img src="{{ asset('img/budget.png') }}" class="w-16 mb-4">

        <h3 class="text-xl font-semibold text-gray-800 mb-2">
            Transaksi Cepat
        </h3>

        <p class="text-gray-600 mb-4">
            Proses penjualan lebih cepat dengan sistem kasir yang praktis
        </p>

        <span class="bg-purple-100 text-purple-600 px-4 py-2 rounded-full text-sm">
            Pembayaran Mudah
        </span>

    </div>

    </div>

</section>

<section class="py-24 bg-gradient-to-b from-white via-blue-50 to-white relative overflow-hidden">

    <!-- background blur decoration -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-blue-200 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-200 rounded-full blur-3xl opacity-30"></div>

    <div class="relative">

        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-800">
                Cocok untuk Berbagai Jenis Usaha
            </h2>

            <p class="text-gray-600 mt-3 max-w-2xl mx-auto">
                UniPOS dirancang fleksibel untuk berbagai jenis bisnis, mulai dari usaha kecil hingga toko modern.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 px-12">    

        <!-- Restaurant -->
        <div class="bg-white p-10 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition duration-300">
            
            <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <img src="{{ asset('img/restaurant-building.png') }}" class="w-10">
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                Restaurant
            </h3>

            <p class="text-gray-600 text-sm">
                Kelola pesanan makanan, meja, dan transaksi restoran secara praktis.
            </p>

        </div>

        <!-- UMKM -->
        <div class="bg-white p-10 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition duration-300">
            
            <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <img src="{{ asset('img/umkm.png') }}" class="w-10">
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                UMKM
            </h3>

            <p class="text-gray-600 text-sm">
                Sistem kasir sederhana dan powerful untuk mendukung usaha kecil berkembang.
            </p>

        </div>

        <!-- Coffeeshop -->
        <div class="bg-white p-10 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition duration-300">
            
            <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <img src="{{ asset('img/coffee-shop.png') }}" class="w-10">
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                Coffeeshop
            </h3>

            <p class="text-gray-600 text-sm">
                Catat pesanan minuman dan transaksi dengan cepat untuk pelayanan lebih efisien.
            </p>

        </div>

        <!-- Minimarket -->
        <div class="bg-white p-10 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition duration-300">
            
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <img src="{{ asset('img/minimarket.png') }}" class="w-10">
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                Minimarket
            </h3>

            <p class="text-gray-600 text-sm">
                Kelola stok barang dan transaksi minimarket dengan sistem kasir modern.
            </p>

        </div>

        <!-- Laundry -->
        <div class="bg-white p-10 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition duration-300">
            
            <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <img src="{{ asset('img/laundry-shop.png') }}" class="w-10">
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                Laundry
            </h3>

            <p class="text-gray-600 text-sm">
                Kelola transaksi laundry dan status cucian pelanggan secara mudah.
            </p>

        </div>

        <!-- Retail -->
        <div class="bg-white p-10 rounded-2xl shadow-sm text-center hover:-translate-y-2 hover:shadow-xl transition duration-300">
            
            <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <img src="{{ asset('img/retail.png') }}" class="w-10">
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                Retail
            </h3>

            <p class="text-gray-600 text-sm">
                Sistem kasir untuk toko retail dengan manajemen stok yang efisien.
            </p>

        </div>

    </div>

</section>

</x-app-layout>