<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Usaha — UniPOS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #6499E9;
            --sky: #9EDDFF;
            --aqua: #A6F6FF;
            --mint: #BEFFF7;
            --navy: #1a2744;
            --muted: #6b7a99;
            --surface: #f8faff;
            --white: #ffffff;
            --border: #e8eef8;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eef4ff;
            background-image:
                radial-gradient(ellipse at 15% 50%, rgba(100, 153, 233, .18) 0%, transparent 60%),
                radial-gradient(ellipse at 85% 15%, rgba(190, 255, 247, .25) 0%, transparent 55%),
                radial-gradient(ellipse at 60% 90%, rgba(166, 246, 255, .15) 0%, transparent 50%);
            padding: 24px 16px;
            -webkit-font-smoothing: antialiased;
        }

        /* ── CARD ─────────────────────────────────── */
        .card {
            width: 100%;
            max-width: 880px;
            background: var(--white);
            border-radius: 24px;
            box-shadow:
                0 0 0 1px var(--border),
                0 24px 64px rgba(26, 39, 68, .10),
                0 4px 12px rgba(26, 39, 68, .04);
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
        }

        /* ── LEFT: FORM ───────────────────────────── */
        .form-side {
            padding: 44px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Brand */
        .brand-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 32px;
        }

        .brand-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary), var(--sky));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .brand-name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: var(--navy);
            letter-spacing: -.4px;
        }

        .brand-name span {
            color: var(--primary);
        }

        /* Title */
        .form-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 24px;
            font-weight: 800;
            color: var(--navy);
            letter-spacing: -.4px;
            line-height: 1.2;
            margin-bottom: 6px;
        }

        .form-sub {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 28px;
            line-height: 1.5;
        }

        /* Separator */
        .sep {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0 14px;
        }

        .sep::before,
        .sep::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .sep span {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--muted);
            white-space: nowrap;
        }

        /* Fields */
        .field {
            margin-bottom: 12px;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .field label {
            display: block;
            font-size: 11.5px;
            font-weight: 600;
            color: var(--navy);
            margin-bottom: 5px;
            letter-spacing: .1px;
        }

        .field label .req {
            color: var(--primary);
        }

        .field input[type="text"],
        .field input[type="email"],
        .field input[type="password"],
        .field textarea {
            width: 100%;
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 13px;
            color: var(--navy);
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 10px 13px;
            outline: none;
            transition: all .18s;
        }

        .field input::placeholder,
        .field textarea::placeholder {
            color: #b8c8e0;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(100, 153, 233, .12);
        }

        .field textarea {
            resize: none;
            height: 62px;
        }

        /* Password toggle */
        .pw-wrap {
            position: relative;
        }

        .pw-wrap input {
            padding-right: 38px;
        }

        .pw-btn {
            position: absolute;
            right: 11px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #b8c8e0;
            transition: color .15s;
            display: flex;
            align-items: center;
            padding: 0;
        }

        .pw-btn:hover {
            color: var(--primary);
        }

        /* File upload */
        .file-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--surface);
            border: 1.5px dashed var(--border);
            border-radius: 10px;
            padding: 9px 12px;
            cursor: pointer;
            transition: all .18s;
        }

        .file-wrap:hover {
            border-color: var(--primary);
            background: var(--white);
        }

        .file-wrap input {
            display: none;
        }

        .file-wrap span {
            font-size: 12px;
            color: var(--muted);
        }

        .file-wrap strong {
            color: var(--primary);
        }

        #filePreview {
            display: none;
            align-items: center;
            gap: 8px;
            margin-top: 6px;
            padding: 7px 10px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
        }

        #previewImg {
            width: 26px;
            height: 26px;
            border-radius: 6px;
            object-fit: cover;
        }

        #fileName {
            font-size: 11px;
            color: var(--primary);
            font-weight: 600;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 140px;
        }

        /* Submit */
        .btn-submit {
            width: 100%;
            margin-top: 20px;
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            padding: 12px 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all .2s;
            box-shadow: 0 4px 16px rgba(100, 153, 233, .28);
            letter-spacing: .1px;
        }

        .btn-submit:hover {
            background: #4f84d9;
            transform: translateY(-1px);
            box-shadow: 0 6px 22px rgba(100, 153, 233, .38);
        }

        /* ── RIGHT: INFO ──────────────────────────── */
        .info-side {
            background: linear-gradient(145deg, var(--navy) 0%, #1e3166 55%, #162554 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 52px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* Decorative blobs */
        .info-side::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 280px;
            height: 280px;
            background: radial-gradient(circle, rgba(100, 153, 233, .2) 0%, transparent 70%);
            border-radius: 50%;
        }

        .info-side::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 220px;
            height: 220px;
            background: radial-gradient(circle, rgba(190, 255, 247, .12) 0%, transparent 70%);
            border-radius: 50%;
        }

        /* Top gradient line */
        .info-top-bar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--sky), var(--mint));
        }

        .info-icon {
            width: 72px;
            height: 72px;
            background: rgba(100, 153, 233, .15);
            border: 1px solid rgba(158, 221, 255, .2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 28px;
            position: relative;
            z-index: 1;
        }

        .info-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 26px;
            font-weight: 800;
            color: white;
            letter-spacing: -.5px;
            line-height: 1.2;
            margin-bottom: 14px;
            position: relative;
            z-index: 1;
        }

        .info-title em {
            font-style: normal;
            color: var(--sky);
        }

        .info-desc {
            font-size: 13px;
            color: rgba(255, 255, 255, .55);
            line-height: 1.7;
            max-width: 230px;
            margin-bottom: 32px;
            position: relative;
            z-index: 1;
        }

        /* Feature list */
        .info-features {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        .info-feat {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(158, 221, 255, .12);
            border-radius: 10px;
            padding: 10px 14px;
            text-align: left;
        }

        .feat-check {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: rgba(100, 153, 233, .25);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .feat-check svg {
            width: 10px;
            height: 10px;
            stroke: var(--sky);
        }

        .info-feat-text {
            font-size: 12.5px;
            color: rgba(255, 255, 255, .75);
            font-weight: 500;
            line-height: 1.4;
        }

        .info-login {
            margin-top: 28px;
            font-size: 12px;
            color: rgba(255, 255, 255, .4);
            position: relative;
            z-index: 1;
        }

        .info-login a {
            color: var(--sky);
            font-weight: 600;
            text-decoration: none;
            border-bottom: 1px solid rgba(158, 221, 255, .3);
            transition: all .15s;
        }

        .info-login a:hover {
            color: white;
            border-color: rgba(255, 255, 255, .5);
        }

        /* ── RESPONSIVE ───────────────────────────── */
        @media (max-width: 700px) {
            .card {
                grid-template-columns: 1fr;
                max-width: 440px;
            }

            .info-side {
                border-radius: 0;
                padding: 36px 28px;
            }

            .info-features {
                display: none;
            }

            .form-side {
                padding: 36px 28px;
            }
        }

        @media (max-width: 420px) {
            .field-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="card">
        @if (session('success'))
            <div
                style="
        background:#d1fae5;
        color:#065f46;
        padding:12px;
        border-radius:10px;
        margin-bottom:15px;
        font-size:13px;
        font-weight:600;
    ">
                {{ session('success') }}
            </div>
        @endif

        @if (session('kode_usaha'))
            <div
                style="
        background:#dbeafe;
        color:#1e3a8a;
        padding:12px;
        border-radius:10px;
        margin-bottom:15px;
        font-size:13px;
        font-weight:700;
    ">
                Kode Usaha Anda: {{ session('kode_usaha') }}
            </div>
        @endif
        {{-- ════ LEFT: FORM ════ --}}
        <div class="form-side">

            <div class="brand-row">
                <div class="brand-icon">⚡</div>
                <div class="brand-name">Uni<span>POS</span></div>
            </div>

            <h1 class="form-title">Daftarkan Usaha</h1>
            <p class="form-sub">Buat akun dan mulai kelola usaha Anda sekarang.</p>

            <form method="POST" action="/register-usaha" enctype="multipart/form-data">
                @csrf

                {{-- Usaha --}}
                <div class="sep"><span>Info Usaha</span></div>

                <div class="field">
                    <label>Nama Usaha <span class="req">*</span></label>
                    <input type="text" name="nama_usaha" placeholder="Contoh: Toko Maju Jaya" required>
                </div>

                <div class="field-row">
                    <div class="field">
                        <label>No. Telepon <span class="req">*</span></label>
                        <input type="text" name="telp" placeholder="08xxxxxxxxxx" required>
                    </div>
                    <div class="field">
                        <label>Logo Usaha</label>
                        <label class="file-wrap">
                            <input type="file" name="logo" accept="image/*" id="logoInput">
                            <span style="font-size:15px;">🖼️</span>
                            <span><strong>Upload</strong> logo</span>
                        </label>
                    </div>
                </div>

                <div id="filePreview">
                    <img id="previewImg" alt="">
                    <span id="fileName"></span>
                </div>

                <div class="field">
                    <label>Alamat</label>
                    <textarea name="alamat" placeholder="Jl. Contoh No. 123..."></textarea>
                </div>

                {{-- Owner --}}
                <div class="sep"><span>Data Pemilik</span></div>

                <div class="field">
                    <label>Nama Owner <span class="req">*</span></label>
                    <input type="text" name="nama_owner" placeholder="Nama lengkap" required>
                </div>

                <div class="field">
                    <label>Email <span class="req">*</span></label>
                    <input type="email" name="email" placeholder="email@usaha.com" required>
                </div>

                <div class="field">
                    <label>Password <span class="req">*</span></label>
                    <div class="pw-wrap">
                        <input type="password" name="password" id="pwField" placeholder="Minimal 8 karakter" required>
                        <button type="button" class="pw-btn" id="togglePw">
                            <svg id="eyeOn" width="15" height="15" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <svg id="eyeOff" width="15" height="15" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24" style="display:none;">
                                <path
                                    d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" />
                                <line x1="1" y1="1" x2="23" y2="23" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Daftarkan Usaha →</button>

            </form>

        </div>

        {{-- ════ RIGHT: INFO ════ --}}
        <div class="info-side">
            <div class="info-top-bar"></div>

            <div class="info-icon">🏪</div>

            <h2 class="info-title">Selamat<br><em>Bergabung!</em></h2>

            <p class="info-desc">
                Ribuan pemilik usaha telah mempercayakan pengelolaan bisnis mereka kepada UniPOS.
            </p>

            <div class="info-features">
                <div class="info-feat">
                    <div class="feat-check">
                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                    </div>
                    <span class="info-feat-text">Kelola multi usaha dalam satu akun</span>
                </div>
                <div class="info-feat">
                    <div class="feat-check">
                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                    </div>
                    <span class="info-feat-text">Laporan penjualan real-time & otomatis</span>
                </div>
                <div class="info-feat">
                    <div class="feat-check">
                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                    </div>
                    <span class="info-feat-text">Transaksi cepat & mudah digunakan</span>
                </div>
                <div class="info-feat">
                    <div class="feat-check">
                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                    </div>
                    <span class="info-feat-text">Cocok untuk semua jenis usaha</span>
                </div>
            </div>

            <div class="info-login">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>

    </div>

    <script>
        document.getElementById('logoInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = ev => {
                document.getElementById('previewImg').src = ev.target.result;
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('filePreview').style.display = 'flex';
            };
            reader.readAsDataURL(file);
        });

        document.getElementById('togglePw').addEventListener('click', function() {
            const pw = document.getElementById('pwField');
            const isHidden = pw.type === 'password';
            pw.type = isHidden ? 'text' : 'password';
            document.getElementById('eyeOn').style.display = isHidden ? 'none' : 'block';
            document.getElementById('eyeOff').style.display = isHidden ? 'block' : 'none';
        });
    </script>

</body>

</html>
