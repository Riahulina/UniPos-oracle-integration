<x-guest-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .log-body {
            font-family: 'DM Sans', system-ui, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #DBEAFE;
            background-image:
                radial-gradient(ellipse at 20% 50%, #BFDBFE 0%, transparent 60%),
                radial-gradient(ellipse at 80% 20%, #EFF6FF 0%, transparent 50%);
            padding: 24px 16px;
            -webkit-font-smoothing: antialiased;
        }

        .log-card {
            width: 100%;
            max-width: 440px;
            background: white;
            border-radius: 20px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 8px 40px rgba(37, 99, 235, 0.12), 0 1px 3px rgba(37, 99, 235, 0.06);
            overflow: hidden;
        }

        /* ── TOP BANNER (Senada dengan Register) ── */
        .log-banner {
            background: linear-gradient(135deg, #1D4ED8 0%, #1E40AF 60%, #1E3A8A 100%);
            padding: 28px 36px 24px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .log-banner::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 180px;
            height: 180px;
            background: rgba(255, 255, 255, 0.07);
            border-radius: 50%;
        }

        .log-banner::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: -40px;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .log-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .log-logo {
            width: 30px;
            height: 30px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 7px;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }

        .log-logo::before {
            content: '';
            position: absolute;
            width: 9px;
            height: 9px;
            background: #FCD34D;
            border-radius: 2px;
            top: 5px;
            left: 5px;
        }

        .log-logo::after {
            content: '';
            position: absolute;
            width: 6px;
            height: 6px;
            background: #93C5FD;
            border-radius: 2px;
            bottom: 5px;
            right: 5px;
        }

        .log-brand-name {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 17px;
            color: white;
            letter-spacing: -0.3px;
        }

        .log-greeting {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 22px;
            color: white;
            letter-spacing: -0.5px;
            line-height: 1.2;
            margin-bottom: 6px;
            position: relative;
            z-index: 1;
        }

        .log-greeting em {
            font-style: italic;
            color: #FCD34D;
        }

        .log-banner-sub {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.55);
            position: relative;
            z-index: 1;
        }

        /* ── FORM BODY ── */
        .log-body-inner {
            padding: 28px 36px 32px;
        }

        /* section sep */
        .log-sep {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 10px 0 16px;
        }

        .log-sep::before,
        .log-sep::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #DBEAFE;
        }

        .log-sep span {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #BFDBFE;
            white-space: nowrap;
        }

        /* fields */
        .log-field {
            margin-bottom: 15px;
        }

        .log-body-inner label {
            font-size: 11.5px !important;
            font-weight: 600 !important;
            color: #1E40AF !important;
            margin-bottom: 5px;
            display: block;
        }

        .log-body-inner input[type="text"],
        .log-body-inner input[type="email"],
        .log-body-inner input[type="password"] {
            font-family: 'DM Sans', system-ui, sans-serif !important;
            font-size: 13px !important;
            color: #1E3A8A !important;
            background: #F0F7FF !important;
            border: 1.5px solid #DBEAFE !important;
            border-radius: 8px !important;
            padding: 9.5px 12px !important;
            width: 100% !important;
            outline: none !important;
            box-shadow: none !important;
            transition: all .18s !important;
            margin-top: 0 !important;
        }

        .log-body-inner input::placeholder {
            color: #BFDBFE !important;
        }

        .log-body-inner input:focus {
            border-color: #3B82F6 !important;
            background: white !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12) !important;
        }

        .log-hint {
            font-size: 11px;
            color: #93C5FD;
            margin-top: 4px;
            font-weight: 500;
        }

        .log-body-inner .text-sm.text-red-600,
        .log-body-inner [class*="text-red"] {
            font-size: 11px !important;
            margin-top: 4px !important;
            color: #EF4444 !important;
        }

        /* submit button */
        .log-btn {
            width: 100%;
            margin-top: 18px;
            font-family: 'DM Sans', system-ui, sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            padding: 11px 20px;
            background: #1D4ED8;
            color: white;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            transition: all .2s;
        }

        .log-btn:hover {
            background: #1E40AF;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(29, 78, 216, .28);
        }

        .log-btn:active {
            transform: translateY(0);
        }

        .log-footer-links {
            text-align: center;
            font-size: 12px;
            color: #9CA3AF;
            margin-top: 16px;
        }

        .log-footer-links a {
            color: #3B82F6;
            font-weight: 600;
            text-decoration: none;
        }

        .log-footer-links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 420px) {
            .log-body-inner {
                padding: 24px 22px 28px;
            }

            .log-banner {
                padding: 24px 22px 20px;
            }
        }
    </style>

    <div class="log-body">
        <div class="log-card">

            {{-- ── TOP BANNER ── --}}
            <div class="log-banner">
                <div class="log-brand">
                    <div class="log-logo"></div>
                    <span class="log-brand-name">UniPOS</span>
                </div>
                <h1 class="log-greeting">Masuk <em>Sistem</em></h1>
                <p class="log-banner-sub">Gunakan hak akses resmi Anda untuk mengelola UniPOS.</p>
            </div>

            {{-- ── FORM BODY ── --}}
            <div class="log-body-inner">

                {{-- Alert Notifikasi Registrasi Berhasil --}}
                @if (session('registration_pending'))
                    <div
                        class="mb-4 p-3 rounded-lg bg-green-50 border border-green-200 text-green-700 text-xs font-semibold">
                        {{ session('registration_pending') }}
                    </div>
                @endif

                {{-- Session Status bawaan Breeze --}}
                @if (session('status'))
                    <div class="mb-4 font-medium text-xs text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Bagian Validasi Akses --}}
                    <div class="log-sep"><span>Otentikasi Pengguna</span></div>

                    {{-- Email Address --}}
                    <div class="log-field">
                        <x-input-label for="email" :value="__('Email Pengguna')" />
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                            placeholder="Masukkan email Anda" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    {{-- Password --}}
                    <div class="log-field">
                        <div class="flex items-center justify-between">
                            <x-input-label for="password" :value="__('Password')" />
                            @if (Route::has('password.request'))
                                <a class="text-[11px] text-blue-500 hover:underline"
                                    href="{{ route('password.request') }}" style="margin-bottom: 5px;">
                                    Lupa Password?
                                </a>
                            @endif
                        </div>
                        <x-text-input id="password" type="password" name="password" required
                            placeholder="Masukkan password Anda" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    {{-- Input Tambahan: otomatis dari URL --}}
                    @php
                        $kodeUsaha = request()->route('kode');
                    @endphp

                    @if ($kodeUsaha)
                        <div class="log-sep">
                            <span>Otorisasi Lisensi</span>
                        </div>

                        <div class="log-field">
                            <x-input-label for="kode_usaha" :value="__('Kode Usaha')" />

                            <x-text-input id="kode_usaha" type="text" name="kode_usaha" :value="$kodeUsaha" readonly />

                            <p class="log-hint">
                                Kode usaha terdeteksi otomatis dari link login.
                            </p>

                            <x-input-error :messages="$errors->get('kode_usaha')" class="mt-1" />
                        </div>
                    @endif

                    {{-- Remember Me --}}
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-blue-200 text-blue-600 shadow-sm focus:ring-blue-500"
                                name="remember">
                            <span class="ms-2 text-xs text-slate-500 font-medium">Ingat perangkat saya</span>
                        </label>
                    </div>

                    <button type="submit" class="log-btn">Masuk ke Dashboard →</button>

                </form>

                <div class="log-footer-links">
                    Belum mendaftarkan usaha Anda? <a href="{{ route('register') }}">Daftar di sini</a>
                </div>

            </div>

        </div>
    </div>

</x-guest-layout>
