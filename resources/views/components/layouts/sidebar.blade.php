<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UniPOS</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        <!-- SIDEBAR -->
        <div class="w-64 bg-white shadow-lg flex flex-col justify-between">

            <!-- LOGO & MENU -->
            <div>

                <!-- Logo -->
                <div class="p-6 text-2xl font-bold text-blue-600">
                    UniPOS
                </div>

                <!-- Navigation Menu -->
                <nav class="mt-4 space-y-2">

                    <a href="{{ route('dashboard') }}"
                       class="block px-6 py-3 hover:bg-blue-50">
                        📊 Dashboard
                    </a>

                    <a href="#"
                       class="block px-6 py-3 hover:bg-blue-50">
                        💰 Transaksi
                    </a>

                    <a href="#"
                       class="block px-6 py-3 hover:bg-blue-50">
                        📦 Produk
                    </a>

                    <a href="#"
                       class="block px-6 py-3 hover:bg-blue-50">
                        📁 Kategori
                    </a>

                    <a href="#"
                       class="block px-6 py-3 hover:bg-blue-50">
                        👥 Pelanggan
                    </a>

                    <a href="#"
                       class="block px-6 py-3 hover:bg-blue-50">
                        📑 Laporan
                    </a>

                    <a href="#"
                       class="block px-6 py-3 hover:bg-blue-50">
                        ⚙️ Pengaturan
                    </a>

                </nav>

            </div>


            <!-- Button Transaksi -->
            <div class="p-6">

                <button
                    class="w-full bg-blue-500 text-white py-3 rounded-xl shadow hover:bg-blue-600">
                    💳 Transaksi Baru
                </button>

            </div>

        </div>


        <!-- CONTENT AREA -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            <div class="bg-white shadow px-6 py-4 flex justify-between items-center">

                <!-- Search -->
                <input type="text"
                       placeholder="Cari produk..."
                       class="border rounded-lg px-4 py-2 w-72">

                <!-- User -->
                <div class="flex items-center gap-4">

                    <span class="text-gray-600">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST"
                          action="{{ route('logout') }}">

                        @csrf

                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded-lg">
                            Logout
                        </button>

                    </form>

                </div>

            </div>


            <!-- PAGE CONTENT -->
            <div class="p-8 overflow-y-auto">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>
</html>