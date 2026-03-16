<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Usaha — UniPOS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
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

        /* ── CARD WRAPPER ── */
        .card {
            width: 100%;
            max-width: 860px;
            min-height: 560px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(37,99,235,0.14), 0 2px 8px rgba(37,99,235,0.06);
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            position: relative;
        }

        /* ── LEFT — FORM SIDE ── */
        .form-side {
            padding: 44px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-row {
            display: flex; align-items: center; gap: 9px;
            margin-bottom: 28px;
        }
        .logo-mark {
            width: 32px; height: 32px; background: #1D4ED8;
            border-radius: 7px; position: relative; overflow: hidden; flex-shrink: 0;
        }
        .logo-mark::before { content:''; position:absolute; width:10px; height:10px; background:#FCD34D; border-radius:2px; top:6px; left:6px; }
        .logo-mark::after  { content:''; position:absolute; width:7px;  height:7px;  background:#93C5FD; border-radius:2px; bottom:5px; right:5px; }
        .brand-name {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 18px; color: #1E3A8A; letter-spacing: -0.4px;
        }

        .form-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 26px; color: #1E3A8A;
            letter-spacing: -0.7px; line-height: 1.2;
            margin-bottom: 4px;
        }
        .form-sub { font-size: 12.5px; color: #93A3B8; margin-bottom: 24px; }

        /* section label */
        .sep {
            display: flex; align-items: center; gap: 8px;
            margin: 18px 0 14px;
        }
        .sep::before, .sep::after { content:''; flex:1; height:1px; background:#DBEAFE; }
        .sep span { font-size: 10px; font-weight: 600; letter-spacing:.08em; text-transform:uppercase; color:#BFDBFE; }

        /* fields */
        .field { margin-bottom: 11px; }
        .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }

        .field label {
            display: block; font-size: 11.5px; font-weight: 600;
            color: #1E40AF; margin-bottom: 4px;
        }
        .field label .req { color: #60A5FA; }

        .field input[type="text"],
        .field input[type="email"],
        .field input[type="password"],
        .field textarea {
            width: 100%;
            font-family: 'DM Sans', system-ui, sans-serif;
            font-size: 13px; color: #1E3A8A;
            background: #F0F7FF;
            border: 1.5px solid #DBEAFE;
            border-radius: 8px;
            padding: 9px 12px;
            outline: none; transition: all .18s;
        }
        .field input::placeholder,
        .field textarea::placeholder { color: #BFDBFE; }
        .field input:focus,
        .field textarea:focus {
            border-color: #3B82F6; background: white;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.12);
        }
        .field textarea { resize: none; height: 60px; }

        /* password */
        .pw-wrap { position: relative; }
        .pw-wrap input { padding-right: 36px; }
        .pw-btn {
            position:absolute; right:10px; top:50%; transform:translateY(-50%);
            background:none; border:none; cursor:pointer; color:#BFDBFE; transition:color .15s;
            display:flex; align-items:center;
        }
        .pw-btn:hover { color: #3B82F6; }

        /* file */
        .file-wrap {
            display: flex; align-items: center; gap: 8px;
            background: #F0F7FF; border: 1.5px dashed #BFDBFE;
            border-radius: 8px; padding: 8px 12px; cursor: pointer;
            transition: all .18s;
        }
        .file-wrap:hover { border-color: #3B82F6; background: white; }
        .file-wrap input { display: none; }
        .file-wrap span  { font-size: 12px; color: #93C5FD; }
        .file-wrap strong{ color: #3B82F6; }

        #filePreview {
            display: none; align-items: center; gap: 7px;
            margin-top: 6px; padding: 6px 10px;
            background: #EFF6FF; border-radius: 7px; border: 1px solid #DBEAFE;
        }
        #previewImg { width: 28px; height: 28px; border-radius: 5px; object-fit: cover; }
        #fileName   { font-size: 11px; color: #3B82F6; font-weight: 500; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 140px; }

        /* submit */
        .btn-submit {
            width: 100%; margin-top: 18px;
            font-family: 'DM Sans', system-ui, sans-serif;
            font-size: 13.5px; font-weight: 600;
            padding: 11px 20px;
            background: #1D4ED8; color: white;
            border: none; border-radius: 9px;
            cursor: pointer; transition: all .2s;
        }
        .btn-submit:hover { background: #1E40AF; transform: translateY(-1px); box-shadow: 0 6px 18px rgba(29,78,216,.28); }

        /* ── RIGHT — INFO SIDE ── */
        .info-side {
            background: linear-gradient(145deg, #1D4ED8 0%, #1E40AF 50%, #1E3A8A 100%);
            border-radius: 0 20px 20px 0;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            padding: 48px 40px;
            text-align: center;
            position: relative; overflow: hidden;
        }

        /* blob decorations */
        .info-side::before {
            content: '';
            position: absolute; top: -80px; right: -80px;
            width: 240px; height: 240px;
            background: rgba(255,255,255,0.07);
            border-radius: 50%;
        }
        .info-side::after {
            content: '';
            position: absolute; bottom: -60px; left: -60px;
            width: 180px; height: 180px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }

        .info-icon {
            width: 72px; height: 72px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.20);
            border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: 30px; margin-bottom: 28px;
            position: relative; z-index: 1;
        }

        .info-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 28px; color: white;
            letter-spacing: -0.8px; line-height: 1.2;
            margin-bottom: 14px;
            position: relative; z-index: 1;
        }
        .info-title em { font-style: italic; color: #FCD34D; }

        .info-desc {
            font-size: 13.5px; color: rgba(255,255,255,0.60);
            line-height: 1.7; max-width: 240px;
            margin-bottom: 32px;
            position: relative; z-index: 1;
        }

        /* feature bullets */
        .info-features { display: flex; flex-direction: column; gap: 10px; width: 100%; position: relative; z-index: 1; }
        .info-feat {
            display: flex; align-items: center; gap: 10px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 10px; padding: 9px 14px; text-align: left;
        }
        .info-feat-dot { width: 7px; height: 7px; background: #FCD34D; border-radius: 50%; flex-shrink: 0; }
        .info-feat-text { font-size: 12.5px; color: rgba(255,255,255,0.80); font-weight: 500; }

        .info-login {
            margin-top: 28px; font-size: 12px;
            color: rgba(255,255,255,0.45);
            position: relative; z-index: 1;
        }
        .info-login a {
            color: #93C5FD; font-weight: 600; text-decoration: none;
            border-bottom: 1px solid rgba(147,197,253,0.40);
        }
        .info-login a:hover { color: white; border-color: white; }

        /* ── RESPONSIVE ── */
        @media (max-width: 700px) {
            .card { grid-template-columns: 1fr; max-width: 440px; }
            .info-side { border-radius: 0 0 20px 20px; padding: 36px 28px; }
            .info-features { display: none; }
            .form-side { padding: 36px 28px; }
        }
        @media (max-width: 420px) {
            .field-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="card">

    {{-- ════ LEFT: FORM ════ --}}
    <div class="form-side">

        <div class="brand-row">
            <!-- <div class="logo-mark"></div> -->
            <span class="brand-name">UniPOS</span>
        </div>

        <h1 class="form-title">Daftar Usaha</h1>
        <p class="form-sub">Buat akun dan mulai kelola usaha Anda.</p>

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
                        <svg id="eyeOn" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="eyeOff" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-submit">Daftarkan Usaha →</button>

        </form>

    </div>

    {{-- ════ RIGHT: INFO ════ --}}
    <div class="info-side">

        <div class="info-icon">🏪</div>

        <h2 class="info-title">Selamat<br><em>Bergabung!</em></h2>

        <p class="info-desc">
            Ribuan pemilik usaha telah mempercayakan pengelolaan bisnis mereka kepada UniPOS.
        </p>

        <div class="info-features">
            <div class="info-feat">
                <div class="info-feat-dot"></div>
                <span class="info-feat-text">Kelola multi usaha dalam satu akun</span>
            </div>
            <div class="info-feat">
                <div class="info-feat-dot"></div>
                <span class="info-feat-text">Laporan penjualan real-time & otomatis</span>
            </div>
            <div class="info-feat">
                <div class="info-feat-dot"></div>
                <span class="info-feat-text">Transaksi cepat & mudah digunakan</span>
            </div>
            <div class="info-feat">
                <div class="info-feat-dot"></div>
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
        document.getElementById('eyeOn').style.display  = isHidden ? 'none'  : 'block';
        document.getElementById('eyeOff').style.display = isHidden ? 'block' : 'none';
    });
</script>

</body>
</html>