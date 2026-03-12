
<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-500 via-blue-600 to-blue-800">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-blue-700">Daftar User</h2>
            <p class="text-gray-500 text-sm mt-1">
                Buat akun untuk menggunakan sistem UniPOS
            </p>
        </div>

        {{-- ALERT KODE USAHA --}}
        @if(session('kode_usaha'))
        <div class="bg-blue-50 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg mb-4 text-sm">
            <strong>Usaha berhasil dibuat!</strong><br>
            Kode Usaha Anda:
            <b class="text-blue-800">{{ session('kode_usaha') }}</b>
            <br>
            Gunakan kode ini untuk mendaftarkan user/karyawan.
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input
                    id="password"
                    class="block mt-1 w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500"
                    type="password"
                    name="password"
                    required
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500"
                    type="password"
                    name="password_confirmation"
                    required
                />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">

                <a class="text-sm text-blue-600 hover:text-blue-800"
                   href="{{ route('login') }}">
                    Sudah punya akun?
                </a>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition">
                    Register
                </button>

            </div>

        </form>

    </div>

</div>

</x-guest-layout>
