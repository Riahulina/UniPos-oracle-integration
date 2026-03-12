<nav x-data="{ open: false }" class="bg-white border-b shadow">

<div class="max-w-7xl mx-auto px-6 lg:px-10">

<div class="flex justify-between h-16 items-center">

    <!-- LOGO -->
    <div class="flex items-center gap-12">

        <a href="{{ route('welcome') }}" class="text-2xl font-bold text-blue-600">
            UniPOS
        </a>

        <!-- MENU -->
        <div class="hidden sm:flex space-x-8 ml-10">

            <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                Home
            </x-nav-link>

            <a href="#" class="text-gray-600 hover:text-blue-600">
                Fitur
            </a>

            <a href="#" class="text-gray-600 hover:text-blue-600">
                Tentang
            </a>

        </div>

    </div>


    <!-- RIGHT SIDE -->
    <div class="hidden sm:flex items-center space-x-4">

        <!-- LOGIN BUTTON (jika belum login) -->
        @guest
        <a href="{{ route('login') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            Login
        </a>
        @endguest


        <!-- DROPDOWN USER -->
        @auth

        <x-dropdown align="right" width="48">

            <x-slot name="trigger">

                <button class="flex items-center text-gray-700 hover:text-blue-600">

                    {{ auth()->user()->name }}

                    <svg class="ml-2 h-4 w-4 fill-current" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"/>
                    </svg>

                </button>

            </x-slot>

            <x-slot name="content">

                <x-dropdown-link :href="route('profile.edit')">
                    Profile
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">

                        Log Out

                    </x-dropdown-link>

                </form>

            </x-slot>

        </x-dropdown>

        @endauth

    </div>


    <!-- HAMBURGER -->
    <div class="sm:hidden">

        <button @click="open = ! open" class="text-gray-600">

            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                <path :class="{'hidden': open, 'inline-flex': ! open}"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>

                <path :class="{'hidden': ! open, 'inline-flex': open}"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12"/>

            </svg>

        </button>

    </div>

</div>

</div>


<!-- MOBILE MENU -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden px-6 pb-4">

    <a href="#" class="block py-2 text-gray-600">Fitur</a>
    <a href="#" class="block py-2 text-gray-600">Harga</a>
    <a href="#" class="block py-2 text-gray-600">Tentang</a>

    @guest
    <a href="{{ route('login') }}" class="block py-2 text-blue-600">
        Login
    </a>
    @endguest

    @auth

    <a href="{{ route('profile.edit') }}" class="block py-2 text-gray-600">
        Profile
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="block py-2 text-red-500">
            Logout
        </button>

    </form>

    @endauth

</div>

</nav>