<x-guest-layout>

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

    .reg-body {
        font-family: 'DM Sans', system-ui, sans-serif;
        min-height: 100vh;
        display: flex; align-items: center; justify-content: center;
        background: #DBEAFE;
        background-image:
            radial-gradient(ellipse at 20% 50%, #BFDBFE 0%, transparent 60%),
            radial-gradient(ellipse at 80% 20%, #EFF6FF 0%, transparent 50%);
        padding: 24px 16px;
        -webkit-font-smoothing: antialiased;
    }

    .reg-card {
        width: 100%; max-width: 460px;
        background: white;
        border-radius: 20px;
        border: 1px solid #DBEAFE;
        box-shadow: 0 8px 40px rgba(37,99,235,0.12), 0 1px 3px rgba(37,99,235,0.06);
        overflow: hidden;
    }

    /* ── TOP BANNER ── */
    .reg-banner {
        background: linear-gradient(135deg, #1D4ED8 0%, #1E40AF 60%, #1E3A8A 100%);
        padding: 28px 36px 24px;
        text-align: center;
        position: relative; overflow: hidden;
    }
    .reg-banner::before {
        content: ''; position: absolute;
        top: -60px; right: -60px;
        width: 180px; height: 180px;
        background: rgba(255,255,255,0.07); border-radius: 50%;
    }
    .reg-banner::after {
        content: ''; position: absolute;
        bottom: -40px; left: -40px;
        width: 120px; height: 120px;
        background: rgba(255,255,255,0.05); border-radius: 50%;
    }

    .reg-brand {
        display: flex; align-items: center; justify-content: center; gap: 9px;
        margin-bottom: 16px; position: relative; z-index: 1;
    }
    .reg-logo {
        width: 30px; height: 30px; background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 7px; position: relative; overflow: hidden; flex-shrink: 0;
    }
    .reg-logo::before { content:''; position:absolute; width:9px; height:9px; background:#FCD34D; border-radius:2px; top:5px; left:5px; }
    .reg-logo::after  { content:''; position:absolute; width:6px; height:6px; background:#93C5FD; border-radius:2px; bottom:5px; right:5px; }
    .reg-brand-name {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 17px; color: white; letter-spacing: -0.3px;
    }

    .reg-greeting {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 22px; color: white; letter-spacing: -0.5px;
        line-height: 1.2; margin-bottom: 6px;
        position: relative; z-index: 1;
    }
    .reg-greeting em { font-style: italic; color: #FCD34D; }
    .reg-banner-sub {
        font-size: 12.5px; color: rgba(255,255,255,0.55);
        position: relative; z-index: 1;
    }

    /* ── FORM BODY ── */
    .reg-body-inner { padding: 28px 36px 32px; }

    /* alert */
    .reg-alert {
        background: #EFF6FF; border: 1px solid #BFDBFE;
        border-radius: 10px; padding: 11px 14px; margin-bottom: 18px;
    }
    .reg-alert-title { font-size: 12.5px; font-weight: 600; color: #1D4ED8; margin-bottom: 4px; }
    .reg-alert-kode  { font-size: 17px; font-weight: 700; color: #1E3A8A; letter-spacing: 2px; }
    .reg-alert-hint  { font-size: 11px; color: #60A5FA; margin-top: 3px; }

    /* section sep */
    .reg-sep {
        display: flex; align-items: center; gap: 8px;
        margin: 18px 0 13px;
    }
    .reg-sep::before, .reg-sep::after { content:''; flex:1; height:1px; background:#DBEAFE; }
    .reg-sep span { font-size: 10px; font-weight: 600; letter-spacing:.08em; text-transform:uppercase; color:#BFDBFE; white-space:nowrap; }

    /* fields */
    .reg-field { margin-bottom: 12px; }
    .reg-field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }

    .reg-body-inner label {
        font-size: 11.5px !important; font-weight: 600 !important;
        color: #1E40AF !important; margin-bottom: 4px; display: block;
    }
    .reg-body-inner input[type="text"],
    .reg-body-inner input[type="email"],
    .reg-body-inner input[type="password"] {
        font-family: 'DM Sans', system-ui, sans-serif !important;
        font-size: 13px !important; color: #1E3A8A !important;
        background: #F0F7FF !important;
        border: 1.5px solid #DBEAFE !important;
        border-radius: 8px !important;
        padding: 9px 12px !important;
        width: 100% !important;
        outline: none !important;
        box-shadow: none !important;
        transition: all .18s !important;
        margin-top: 0 !important;
    }
    .reg-body-inner input::placeholder { color: #BFDBFE !important; }
    .reg-body-inner input:focus {
        border-color: #3B82F6 !important;
        background: white !important;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.12) !important;
    }

    .reg-hint { font-size: 11px; color: #BFDBFE; margin-top: 3px; }

    .reg-body-inner .text-sm.text-red-600,
    .reg-body-inner [class*="text-red"] {
        font-size: 11px !important; margin-top: 3px !important; color: #EF4444 !important;
    }

    /* submit */
    .reg-btn {
        width: 100%; margin-top: 20px;
        font-family: 'DM Sans', system-ui, sans-serif;
        font-size: 13.5px; font-weight: 600;
        padding: 11px 20px;
        background: #1D4ED8; color: white;
        border: none; border-radius: 9px;
        cursor: pointer; transition: all .2s;
    }
    .reg-btn:hover { background: #1E40AF; transform: translateY(-1px); box-shadow: 0 6px 18px rgba(29,78,216,.28); }
    .reg-btn:active { transform: translateY(0); }

    .reg-login {
        text-align: center; font-size: 12px;
        color: #9CA3AF; margin-top: 14px;
    }
    .reg-login a { color: #3B82F6; font-weight: 600; text-decoration: none; }
    .reg-login a:hover { text-decoration: underline; }

    @media (max-width: 420px) {
        .reg-body-inner { padding: 24px 22px 28px; }
        .reg-banner     { padding: 24px 22px 20px; }
        .reg-field-row  { grid-template-columns: 1fr; }
    }
</style>

<div class="reg-body">
<div class="reg-card">

    {{-- ── TOP BANNER ── --}}
    <div class="reg-banner">
        <div class="reg-brand">
            <div class="reg-logo"></div>
            <span class="reg-brand-name">UniPOS</span>
        </div>
        <h1 class="reg-greeting">Halo, <em>Selamat Datang!</em></h1>
        <p class="reg-banner-sub">Daftarkan diri Anda untuk mulai menggunakan UniPOS.</p>
    </div>

    {{-- ── FORM ── --}}
    <div class="reg-body-inner">

        {{-- Alert kode usaha --}}
        @if(session('kode_usaha'))
        <div class="reg-alert">
            <div class="reg-alert-title">🎉 Usaha berhasil dibuat!</div>
            <div>Kode Usaha: <span class="reg-alert-kode">{{ session('kode_usaha') }}</span></div>
            <div class="reg-alert-hint">Bagikan kode ini kepada karyawan untuk mendaftar.</div>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Data Akun --}}
            <div class="reg-sep"><span>Data Akun</span></div>

            <div class="reg-field">
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus placeholder="Nama lengkap Anda" />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <div class="reg-field">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required placeholder="email@usaha.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div class="reg-field-row">
                <div class="reg-field">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required placeholder="Min. 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>
                <div class="reg-field">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Ulangi password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>
            </div>

            {{-- Kode Usaha --}}
            <div class="reg-sep"><span>Kode Usaha</span></div>

            <div class="reg-field">
                <x-input-label for="kode_usaha" :value="__('Kode Usaha')" />
                <x-text-input
                    id="kode_usaha" type="text" name="kode_usaha"
                    value="{{ session('kode_usaha') }}"
                    placeholder="Masukkan kode dari owner"
                    required
                />
                <p class="reg-hint">Minta kode ini kepada pemilik usaha Anda.</p>
                <x-input-error :messages="$errors->get('kode_usaha')" class="mt-1" />
            </div>

            <button type="submit" class="reg-btn">Buat Akun →</button>

        </form>

        <div class="reg-login">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>

    </div>

</div>
</div>

</x-guest-layout>
