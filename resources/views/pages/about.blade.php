<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&family=Inter:wght@300;400;500;600&display=swap');

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

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--navy);
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* ── SHARED ─────────────────────────────────────────── */
        .section-tag {
            display: inline-block;
            background: rgba(100, 153, 233, .1);
            color: var(--primary);
            border-radius: 100px;
            padding: 5px 14px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .4px;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: clamp(1.9rem, 3vw, 2.5rem);
            font-weight: 800;
            color: var(--navy);
            line-height: 1.2;
            letter-spacing: -.4px;
            margin-bottom: 14px;
        }

        .section-sub {
            font-size: 15px;
            color: var(--muted);
            line-height: 1.7;
            max-width: 520px;
        }

        /* ── HERO ─────────────────────────────────────────────── */
        .ab-hero {
            background: linear-gradient(135deg, #f0f6ff 0%, #fafeff 55%, #f0fffe 100%);
            padding: 80px 32px 72px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .ab-hero::before {
            content: '';
            position: absolute;
            top: -160px;
            right: -160px;
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(100, 153, 233, .12) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .ab-hero::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -80px;
            width: 360px;
            height: 360px;
            background: radial-gradient(circle, rgba(190, 255, 247, .22) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .ab-hero-inner {
            max-width: 640px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .ab-hero .section-sub {
            margin: 0 auto;
        }

        /* ── DEVELOPER SECTION ───────────────────────────────── */
        .dev-section {
            padding: 100px 32px;
            background: var(--white);
            position: relative;
            overflow: hidden;
        }

        /* Subtle grid pattern background */
        .dev-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(100, 153, 233, .04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(100, 153, 233, .04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        .dev-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        /* ── PHOTO BLOCK ──────────────────────────────────────── */
        .dev-photo-wrap {
            position: relative;
            display: flex;
            justify-content: center;
        }

        /* Background card / stage */
        .dev-photo-stage {
            position: relative;
            width: 320px;
        }

        /* Abstract blob behind */
        .dev-blob {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 280px;
            height: 280px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--sky) 50%, var(--mint) 100%);
            border-radius: 50% 50% 48% 52% / 50% 50% 52% 48%;
            opacity: .18;
            filter: blur(2px);
        }

        /* Decorative ring */
        .dev-ring {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 260px;
            height: 260px;
            border-radius: 50%;
            border: 1.5px dashed rgba(100, 153, 233, .3);
            animation: spin-slow 18s linear infinite;
        }

        .dev-ring::before {
            content: '';
            position: absolute;
            top: -5px;
            left: 50%;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--primary);
            transform: translateX(-50%);
        }

        @keyframes spin-slow {
            to {
                transform: translateX(-50%) rotate(360deg);
            }
        }

        /* Card base */
        .dev-card-base {
            position: relative;
            width: 100%;
            background: linear-gradient(160deg, #f0f7ff 0%, #e8f4ff 40%, #edfffe 100%);
            border-radius: 28px;
            border: 1.5px solid var(--border);
            padding: 28px 28px 0;
            box-shadow:
                0 0 0 6px rgba(100, 153, 233, .05),
                0 24px 64px rgba(26, 39, 68, .1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Corner accents */
        .dev-card-base::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--sky), var(--mint));
            border-radius: 28px 28px 0 0;
        }

        /* Sheen overlay */
        .dev-card-base::after {
            content: '';
            position: absolute;
            top: 0;
            left: -60%;
            width: 40%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .5), transparent);
            transform: skewX(-15deg);
            animation: sheen 6s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes sheen {

            0%,
            100% {
                left: -60%;
                opacity: 0;
            }

            40% {
                opacity: 1;
            }

            60% {
                left: 120%;
                opacity: 0;
            }
        }

        .dev-photo {
            width: 240px;
            height: 300px;
            object-fit: contain;
            object-position: bottom;
            position: relative;
            z-index: 2;
            filter: drop-shadow(0 16px 32px rgba(26, 39, 68, .18));
            margin-bottom: 0;
        }

        /* Name plate at bottom of card */
        .dev-nameplate {
            width: calc(100% + 56px);
            margin: 0 -28px;
            background: var(--navy);
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .dev-nameplate-name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -.2px;
        }

        .dev-nameplate-role {
            font-size: 11px;
            font-weight: 500;
            color: var(--sky);
            margin-top: 2px;
            letter-spacing: .3px;
        }

        .dev-nameplate-badge {
            background: rgba(100, 153, 233, .2);
            border: 1px solid rgba(158, 221, 255, .3);
            border-radius: 8px;
            padding: 4px 10px;
            font-size: 10px;
            font-weight: 600;
            color: var(--sky);
            letter-spacing: .3px;
        }

        /* Floating chips around photo */
        .dev-chip {
            position: absolute;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            padding: 8px 14px;
            box-shadow: 0 4px 20px rgba(26, 39, 68, .1);
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 3;
        }

        .chip-tl {
            top: 16px;
            left: -24px;
        }

        .chip-br {
            bottom: 72px;
            right: -24px;
        }

        .dev-chip-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .dev-chip-lbl {
            font-size: 11px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.3;
        }

        .dev-chip-sub {
            font-size: 10px;
            color: var(--muted);
        }

        /* ── TEXT BLOCK ───────────────────────────────────────── */
        .dev-text {}

        .dev-text .section-sub {
            margin-bottom: 28px;
        }

        .dev-bio {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 28px;
        }

        .dev-socials {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .dev-social-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all .18s;
            border: 1.5px solid var(--border);
            color: var(--navy);
            background: var(--white);
        }

        .dev-social-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
            box-shadow: 0 4px 14px rgba(100, 153, 233, .15);
            transform: translateY(-1px);
        }

        .dev-skill-row {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 24px;
        }

        .dev-skill-tag {
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
        }

        /* ── VISI MISI ───────────────────────────────────────── */
        .vm-section {
            padding: 88px 32px;
            background: var(--surface);
            position: relative;
            overflow: hidden;
        }

        .vm-section::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(166, 246, 255, .3) 0%, transparent 70%);
            border-radius: 50%;
        }

        .vm-inner {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .vm-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .vm-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .vm-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 20px;
            padding: 36px 32px;
            position: relative;
            overflow: hidden;
            transition: all .22s;
        }

        .vm-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(100, 153, 233, .1);
        }

        .vm-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: 20px 20px 0 0;
        }

        .vm-card.visi::before {
            background: linear-gradient(90deg, var(--primary), var(--sky));
        }

        .vm-card.misi::before {
            background: linear-gradient(90deg, var(--mint), var(--aqua));
        }

        .vm-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .vm-card h3 {
            font-size: 18px;
            font-weight: 800;
            color: var(--navy);
            margin-bottom: 10px;
        }

        .vm-card p {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.7;
        }

        /* ── CONTACT ─────────────────────────────────────────── */
        .ct-section {
            padding: 88px 32px;
            background: var(--white);
        }

        .ct-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 72px;
            align-items: start;
        }

        .ct-info-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 0;
            border-bottom: 1px solid var(--border);
        }

        .ct-info-item:last-child {
            border-bottom: none;
        }

        .ct-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--surface);
            border: 1.5px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .ct-info-lbl {
            font-size: 11px;
            color: var(--muted);
            font-weight: 500;
            margin-bottom: 2px;
        }

        .ct-info-val {
            font-size: 14px;
            font-weight: 600;
            color: var(--navy);
        }

        /* Form */
        .ct-form-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 20px;
            padding: 36px 32px;
            box-shadow: 0 8px 40px rgba(26, 39, 68, .06);
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--navy);
            margin-bottom: 7px;
            letter-spacing: .2px;
        }

        .form-input {
            width: 100%;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 11px 14px;
            font-size: 13.5px;
            font-family: 'Inter', sans-serif;
            color: var(--navy);
            background: var(--surface);
            transition: all .18s;
            outline: none;
        }

        .form-input:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(100, 153, 233, .12);
        }

        .form-input::placeholder {
            color: #b0bcd0;
        }

        textarea.form-input {
            resize: none;
        }

        .form-submit {
            width: 100%;
            padding: 13px;
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all .2s;
            box-shadow: 0 4px 16px rgba(100, 153, 233, .3);
        }

        .form-submit:hover {
            background: #4f84d9;
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(100, 153, 233, .4);
        }

        /* ── CTA ─────────────────────────────────────────────── */
        .fp-cta {
            padding: 80px 32px;
            text-align: center;
            background: linear-gradient(135deg, var(--primary) 0%, #7db3f5 100%);
            position: relative;
            overflow: hidden;
        }

        .fp-cta::before {
            content: '';
            position: absolute;
            top: -80px;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 300px;
            background: rgba(255, 255, 255, .06);
            border-radius: 50%;
        }

        .fp-cta h2 {
            font-size: clamp(1.8rem, 3vw, 2.4rem);
            font-weight: 800;
            color: #fff;
            margin-bottom: 14px;
            position: relative;
        }

        .fp-cta p {
            color: rgba(255, 255, 255, .8);
            font-size: 15px;
            margin-bottom: 32px;
            position: relative;
        }

        .btn-white {
            display: inline-block;
            background: #fff;
            color: var(--primary);
            padding: 13px 32px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            position: relative;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .12);
            transition: all .2s;
        }

        .btn-white:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, .15);
        }

        /* ── RESPONSIVE ──────────────────────────────────────── */
        @media (max-width: 900px) {
            .dev-inner {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .dev-photo-wrap {
                margin-bottom: 16px;
            }

            .chip-tl {
                left: 0;
            }

            .chip-br {
                right: 0;
            }

            .vm-grid {
                grid-template-columns: 1fr;
            }

            .ct-inner {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        @media (max-width: 640px) {

            .ab-hero,
            .dev-section,
            .vm-section,
            .ct-section,
            .fp-cta {
                padding-left: 20px;
                padding-right: 20px;
            }

            .dev-section {
                padding-top: 64px;
                padding-bottom: 64px;
            }

            .dev-photo-stage {
                width: 280px;
            }

            .dev-photo {
                width: 200px;
                height: 260px;
            }

            .ct-form-card {
                padding: 24px 20px;
            }
        }
    </style>


    <!-- ════════════════════
     HERO
════════════════════ -->
    <section class="ab-hero">
        <div class="ab-hero-inner">
            <div class="section-tag">Tentang UniPOS</div>
            <h1 class="section-title">Solusi Kasir Modern<br>untuk Semua Usaha</h1>
            <p class="section-sub">
                UniPOS dibuat untuk membantu pelaku usaha mengelola bisnis dengan lebih mudah,
                cepat, dan efisien dalam satu platform yang andal.
            </p>
        </div>
    </section>


    <!-- ════════════════════
     DEVELOPER
════════════════════ -->
    <section class="dev-section">
        <div class="dev-inner">

            <!-- PHOTO -->
            <div class="dev-photo-wrap">

                <!-- Floating chip TL -->
                <div class="dev-chip chip-tl">
                    <div class="dev-chip-icon" style="background:#EFF6FF;">💻</div>
                    <div>
                        <div class="dev-chip-lbl">Fullstack Dev</div>
                        <div class="dev-chip-sub">Laravel · Vue</div>
                    </div>
                </div>

                <div class="dev-photo-stage">
                    <!-- Decorative blob -->
                    <div class="dev-blob"></div>
                    <!-- Spinning ring -->
                    <div class="dev-ring"></div>

                    <!-- Card -->
                    <div class="dev-card-base">
                        <img src="/img/riah.png" class="dev-photo" alt="Riah Ulina">

                        <div class="dev-nameplate">
                            <div>
                                <div class="dev-nameplate-name">Riah Ulina</div>
                                <div class="dev-nameplate-role">Fullstack Developer</div>
                            </div>
                            <div class="dev-nameplate-badge">Laravel</div>
                        </div>
                    </div>
                </div>

                <!-- Floating chip BR -->
                <div class="dev-chip chip-br">
                    <div class="dev-chip-icon" style="background:#F0FDF4;">⚡</div>
                    <div>
                        <div class="dev-chip-lbl">UniPOS Creator</div>
                        <div class="dev-chip-sub">2024 – sekarang</div>
                    </div>
                </div>

            </div>

            <!-- TEXT -->
            <div class="dev-text">
                <div class="section-tag">Pengembang</div>
                <h2 class="section-title">Dibangun dengan<br>sepenuh hati</h2>

                <p class="section-sub" style="margin-bottom:20px;">
                    UniPOS dikembangkan sebagai solusi sistem kasir modern yang berfokus
                    pada kemudahan penggunaan dan efisiensi operasional bisnis.
                </p>

                <p class="dev-bio">
                    Berpengalaman dalam pengembangan aplikasi berbasis web menggunakan Laravel,
                    dengan fokus pada sistem yang terstruktur, scalable, dan user-friendly.
                    UniPOS adalah wujud nyata dari semangat membantu para pelaku usaha
                    mengelola bisnis mereka dengan teknologi yang tepat guna.
                </p>

                <div class="dev-skill-row">
                    <span class="dev-skill-tag">Laravel</span>
                    <span class="dev-skill-tag">PHP</span>
                    <span class="dev-skill-tag">MySQL</span>
                    <span class="dev-skill-tag">Tailwind CSS</span>
                </div>

                <div class="dev-socials">
                    <a href="https://github.com/Riahulina" class="dev-social-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 21.795 24 17.295 24 12c0-6.63-5.37-12-12-12" />
                        </svg>
                        GitHub
                    </a>
                    <a href="https://www.linkedin.com/in/riah-ulina-17b92032b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="dev-social-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                        LinkedIn
                    </a>
                </div>
            </div>

        </div>
    </section>


    <!-- ════════════════════
     VISI MISI
════════════════════ -->
    <section class="vm-section">
        <div class="vm-inner">
            <div class="vm-header">
                <div class="section-tag">Nilai Kami</div>
                <h2 class="section-title">Visi & Misi</h2>
            </div>

            <div class="vm-grid">
                <div class="vm-card visi">
                    <div class="vm-icon" style="background:#EFF6FF;">🎯</div>
                    <h3>Visi</h3>
                    <p>
                        Membantu setiap pelaku bisnis berkembang melalui teknologi kasir
                        yang modern, terjangkau, dan mudah digunakan oleh siapa pun.
                    </p>
                </div>

                <div class="vm-card misi">
                    <div class="vm-icon" style="background:#F0FFFE;">🚀</div>
                    <h3>Misi</h3>
                    <p>
                        Menyediakan sistem yang cepat, efisien, dan dapat diandalkan
                        untuk semua jenis usaha — dari warung hingga minimarket.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- ════════════════════
     KONTAK
════════════════════ -->
    <section class="ct-section">
        <div class="ct-inner">

            <!-- INFO -->
            <div>
                <div class="section-tag">Hubungi Kami</div>
                <h2 class="section-title">Ada pertanyaan?<br>Kami siap membantu</h2>
                <p class="section-sub" style="margin-bottom:32px;">
                    Silakan hubungi kami melalui informasi di bawah, atau isi form kontak
                    dan kami akan segera merespons.
                </p>

                <div>
                    <div class="ct-info-item">
                        <div class="ct-icon">✉️</div>
                        <div>
                            <div class="ct-info-lbl">Email</div>
                            <div class="ct-info-val">riah@email.com</div>
                        </div>
                    </div>
                    <div class="ct-info-item">
                        <div class="ct-icon">📍</div>
                        <div>
                            <div class="ct-info-lbl">Lokasi</div>
                            <div class="ct-info-val">Indonesia</div>
                        </div>
                    </div>
                    <div class="ct-info-item">
                        <div class="ct-icon">⏰</div>
                        <div>
                            <div class="ct-info-lbl">Jam Respons</div>
                            <div class="ct-info-val">Senin – Jumat, 08.00 – 17.00</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORM -->
            <div class="ct-form-card">
                <h3 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:16px;font-weight:800;color:var(--navy);margin-bottom:22px;">
                    Kirim Pesan
                </h3>

                <form>
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-input" placeholder="Nama Anda">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-input" placeholder="email@contoh.com">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pesan</label>
                        <textarea rows="4" class="form-input" placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <button type="submit" class="form-submit">
                        Kirim Pesan →
                    </button>
                </form>
            </div>

        </div>
    </section>


    <!-- ════════════════════
     CTA
════════════════════ -->
    <section class="fp-cta">
        <h2>Yuk Gunakan UniPOS</h2>
        <p>Gabung sekarang dan mulai kelola bisnis dengan cara yang lebih modern.</p>
        <a href="/register-usaha" class="btn-white">Daftar Sekarang →</a>
    </section>

</x-app-layout>