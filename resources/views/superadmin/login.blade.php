<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Super Admin UniPOS</title>
    @vite(['resources/css/app.css'])

    <style>
        .log-body {
            font-family: 'DM Sans', system-ui, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #E2E8F0;
            background-image:
                radial-gradient(ellipse at 20% 50%, #CBD5E1 0%, transparent 60%),
                radial-gradient(ellipse at 80% 20%, #F1F5F9 0%, transparent 50%);
            padding: 24px 16px;
            -webkit-font-smoothing: antialiased;
        }

        .log-card {
            width: 100%;
            max-width: 440px;
            background: white;
            border-radius: 20px;
            border: 1px solid #CBD5E1;
            box-shadow: 0 8px 40px rgba(135, 167, 241, 0.12), 0 1px 3px rgba(154, 183, 249, 0.06);
            overflow: hidden;
        }

        /* ── TOP BANNER (Tema Dark Slate Khusus Super Admin) ── */
        .log-banner {
            background: linear-gradient(135deg, #95bcfa 0%, #6a95f8 60%, #8fa1f1 100%);
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
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .log-banner::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: -40px;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.03);
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
            background: #F59E0B;
            border-radius: 2px;
            top: 5px;
            left: 5px;
        }

        .log-logo::after {
            content: '';
            position: absolute;
            width: 6px;
            height: 6px;
            background: #64748B;
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
            color: #F59E0B;
        }

        .log-banner-sub {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.6);
            position: relative;
            z-index: 1;
        }

        /* ── FORM BODY ── */
        .log-body-inner {
            padding: 28px 36px 32px;
        }

        .log-sep {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 10px 0 20px;
        }

        .log-sep::before,
        .log-sep::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #E2E8F0;
        }

        .log-sep span {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #94A3B8;
            white-space: nowrap;
        }

        .log-field {
            margin-bottom: 18px;
        }

        .log-body-inner label {
            font-size: 11.5px !important;
            font-weight: 600 !important;
            color: #334155 !important;
            margin-bottom: 6px;
            display: block;
        }

        .log-body-inner input[type="email"],
        .log-body-inner input[type="password"] {
            font-family: 'DM Sans', system-ui, sans-serif !important;
            font-size: 13px !important;
            color: #0F172A !important;
            background: #F8FAFC !important;
            border: 1.5px solid #E2E8F0 !important;
            border-radius: 8px !important;
            padding: 9.5px 12px !important;
            width: 100% !important;
            outline: none !important;
            box-shadow: none !important;
            transition: all .18s !important;
            margin-top: 0 !important;
        }

        .log-body-inner input::placeholder {
            color: #94A3B8 !important;
        }

        .log-body-inner input:focus {
            border-color: #64748B !important;
            background: white !important;
            box-shadow: 0 0 0 3px rgba(100, 116, 139, 0.12) !important;
        }

        /* Error message style */
        .log-error-msg {
            font-size: 11px !important;
            margin-top: 5px !important;
            color: #EF4444 !important;
            font-weight: 500;
        }

        /* Tombol Submit */
        .log-btn {
            width: 100%;
            margin-top: 10px;
            font-family: 'DM Sans', system-ui, sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            padding: 11px 20px;
            background: #5d9bf8;
            color: white;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            transition: all .2s;
        }

        .log-btn:hover {
            background: #2569d6;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(15, 23, 42, .25);
        }

        .log-btn:active {
            transform: translateY(0);
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
</head>

<body class="log-body">

    <div class="log-card">

        {{-- ── TOP BANNER ── --}}
        <div class="log-banner">
            <div class="log-brand">
                <div class="log-logo"></div>
                <span class="log-brand-name">UniPOS</span>
            </div>
            <h1 class="log-greeting">Super <em>Admin</em></h1>
            <p class="log-banner-sub">Panel Otentikasi Khusus Pengelola Pusat Sistem UniPOS.</p>
        </div>

        {{-- ── FORM BODY ── --}}
        <div class="log-body-inner">

            {{-- Session Status ganti jika ada alert flash --}}
            @if (session('status'))
                <div class="mb-4 font-medium text-xs text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('superadmin.login.store') }}">
                @csrf

                <div class="log-sep"><span>Otentikasi Root</span></div>

                {{-- Email Address --}}
                <div class="log-field">
                    <label for="email">Email Admin</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        placeholder="Masukkan email super admin" />

                    @if ($errors->get('email'))
                        <div class="log-error-msg">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                {{-- Password --}}
                <div class="log-field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required
                        placeholder="Masukkan password rahasia" />

                    @if ($errors->get('password'))
                        <div class="log-error-msg">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="log-btn">Masuk Konsol Utama →</button>

            </form>

        </div>

    </div>

</body>

</html>
