<nav x-data="{ open: false }"
     class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b shadow-sm">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex justify-between items-center h-16">

            <!-- BRAND -->
            <a href="{{ route('welcome') }}"
               class="text-4xl font-bold section-h2 text-blue-600">
                UniPOS
            </a>


            <!-- MENU DESKTOP -->
            <div class="hidden sm:flex items-center gap-8 text-sm font-medium">

                <a href="{{ route('welcome') }}"
                   class="text-gray-700 hover:text-blue-600 transition">
                    Home
                </a>

                <a href="#"
                   class="text-gray-600 hover:text-blue-600 transition">
                    Fitur
                </a>

                <a href="#"
                   class="text-gray-600 hover:text-blue-600 transition">
                    Tentang
                </a>

                <a href="#"
                   class="text-gray-600 hover:text-blue-600 transition">
                    Kontak
                </a>

                

            </div>


            <!-- HAMBURGER MOBILE -->
            <div class="sm:hidden">

                <button @click="open = ! open" class="text-gray-700">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                        <path :class="{'hidden': open, 'inline-flex': ! open}"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>

                        <path :class="{'hidden': ! open, 'inline-flex': open}"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </button>

            </div>

        </div>

    </div>


    <!-- MOBILE MENU -->
    <div :class="{'block': open, 'hidden': ! open}"
         class="hidden sm:hidden px-6 pb-4 space-y-2">

        <a href="{{ route('welcome') }}"
           class="block py-2 text-gray-700">
            Home
        </a>

        <a href="#"
           class="block py-2 text-gray-600">
            Fitur
        </a>

        <a href="#"
           class="block py-2 text-gray-600">
            Tentang
        </a>

        <a href="#"
           class="block py-2 text-gray-600">
            Kontak
        </a>


    </div>

</nav>