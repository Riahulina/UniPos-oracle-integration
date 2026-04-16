<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap');

    :root {
        --primary:   #6499E9;
        --sky:       #9EDDFF;
        --aqua:      #A6F6FF;
        --mint:      #BEFFF7;
        --navy:      #1a2744;
        --muted:     #6b7a99;
        --surface:   #f8faff;
        --white:     #ffffff;
        --border:    #e8eef8;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Inter', sans-serif;
        color: var(--navy);
        background: var(--white);
        -webkit-font-smoothing: antialiased;
    }

    h1, h2, h3 { font-family: 'Plus Jakarta Sans', sans-serif; }

    /* ─── HERO ─────────────────────────────────────────────────── */
    .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #f0f6ff 0%, #fafeff 60%, #f0fffe 100%);
        position: relative;
        overflow: hidden;
        padding: 80px 0 60px;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -200px; right: -200px;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(100,153,233,.13) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: -150px; left: -100px;
        width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(190,255,247,.25) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .hero-inner {
        max-width: 1160px;
        margin: 0 auto;
        padding: 0 32px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 64px;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    /* LEFT */
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(100,153,233,.1);
        border: 1px solid rgba(100,153,233,.25);
        border-radius: 100px;
        padding: 6px 14px;
        font-size: 12px;
        font-weight: 600;
        color: var(--primary);
        letter-spacing: .4px;
        margin-bottom: 24px;
    }

    .hero-badge span { width: 6px; height: 6px; background: var(--primary); border-radius: 50%; display: inline-block; }

    .hero h1 {
        font-size: clamp(2.2rem, 4vw, 3.2rem);
        font-weight: 800;
        line-height: 1.15;
        color: var(--navy);
        margin-bottom: 20px;
        letter-spacing: -.5px;
    }

    .hero h1 em {
        font-style: normal;
        color: var(--primary);
    }

    .hero-desc {
        font-size: 16px;
        line-height: 1.7;
        color: var(--muted);
        margin-bottom: 36px;
        max-width: 440px;
    }

    .hero-cta {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 48px;
    }

    .btn-primary {
        background: var(--primary);
        color: #fff;
        padding: 13px 28px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all .2s;
        box-shadow: 0 4px 16px rgba(100,153,233,.3);
        white-space: nowrap;
    }
    .btn-primary:hover { background: #4f84d9; box-shadow: 0 6px 24px rgba(100,153,233,.4); transform: translateY(-1px); }

    .btn-outline {
        border: 1.5px solid var(--border);
        color: var(--navy);
        background: var(--white);
        padding: 13px 28px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all .2s;
        white-space: nowrap;
    }
    .btn-outline:hover { border-color: var(--primary); color: var(--primary); }

    .hero-stats {
        display: flex;
        gap: 28px;
        flex-wrap: wrap;
    }

    .stat-item {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .stat-val {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 22px;
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
    }

    .stat-lbl {
        font-size: 11px;
        color: var(--muted);
        font-weight: 500;
        letter-spacing: .3px;
    }

    .stat-divider {
        width: 1px;
        height: 36px;
        background: var(--border);
        align-self: center;
    }

    /* RIGHT — Dashboard Card */
    .hero-visual {
        position: relative;
    }

    .dash-card {
        background: var(--white);
        border-radius: 20px;
        box-shadow: 0 8px 48px rgba(26,39,68,.1), 0 1px 4px rgba(26,39,68,.04);
        overflow: hidden;
        border: 1px solid var(--border);
    }

    .dash-topbar {
        background: linear-gradient(90deg, var(--primary) 0%, #7db3f5 100%);
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dash-topbar-title { color: #fff; font-family: 'Plus Jakarta Sans',sans-serif; font-weight: 700; font-size: 14px; }
    .dash-topbar-date { color: rgba(255,255,255,.7); font-size: 11px; }

    .dash-dots { display: flex; gap: 5px; }
    .dash-dot { width: 8px; height: 8px; border-radius: 50%; background: rgba(255,255,255,.35); }

    .dash-body { padding: 18px 20px; }

    .metric-grid {
        display: grid;
        grid-template-columns: repeat(3,1fr);
        gap: 10px;
        margin-bottom: 18px;
    }

    .metric-box {
        background: var(--surface);
        border-radius: 12px;
        padding: 12px 10px;
        text-align: center;
        border: 1px solid var(--border);
    }

    .metric-lbl { font-size: 10px; color: var(--muted); font-weight: 500; margin-bottom: 4px; }
    .metric-val { font-family: 'Plus Jakarta Sans',sans-serif; font-size: 15px; font-weight: 800; color: var(--navy); line-height: 1; margin-bottom: 3px; }
    .metric-chg { font-size: 10px; color: #22c55e; font-weight: 600; }

    .chart-area { margin-bottom: 16px; }
    .chart-lbl { font-size: 11px; font-weight: 600; color: var(--muted); margin-bottom: 10px; }

    .bar-row { display: flex; align-items: flex-end; gap: 6px; height: 72px; }
    .bar-col { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 4px; }
    .bar-body { width: 100%; background: rgba(100,153,233,.18); border-radius: 4px 4px 0 0; transition: .2s; }
    .bar-body.bar-hi { background: var(--primary); }
    .bar-body.bar-gld { background: var(--sky); }
    .bar-day { font-size: 9px; color: var(--muted); font-weight: 500; }

    .trx-list { display: flex; flex-direction: column; gap: 0; }
    .trx-row {
        display: flex; align-items: center; justify-content: space-between;
        padding: 9px 0;
        border-bottom: 1px solid var(--border);
    }
    .trx-row:last-child { border-bottom: none; }
    .trx-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0; }
    .trx-name { font-size: 12px; font-weight: 600; color: var(--navy); }
    .trx-time { font-size: 10px; color: var(--muted); margin-top: 1px; }
    .trx-amount { font-size: 12px; font-weight: 700; color: var(--primary); white-space: nowrap; }

    .float-chip {
        position: absolute;
        background: var(--white);
        border-radius: 12px;
        padding: 10px 14px;
        box-shadow: 0 4px 20px rgba(26,39,68,.12);
        display: flex;
        align-items: center;
        gap: 10px;
        border: 1px solid var(--border);
        z-index: 2;
    }

    .chip-top { top: -20px; right: -20px; }
    .chip-bot { bottom: -20px; left: -16px; }
    .chip-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 16px; }
    .chip-label { font-size: 11px; font-weight: 700; color: var(--navy); line-height: 1.3; }
    .chip-sub { font-size: 10px; color: var(--muted); }
    .live-ring { width: 8px; height: 8px; border-radius: 50%; background: #22c55e; box-shadow: 0 0 0 3px rgba(34,197,94,.2); }

    /* ─── SECTION SHARED ────────────────────────────────────────── */
    .section-tag {
        display: inline-block;
        background: rgba(100,153,233,.1);
        color: var(--primary);
        border-radius: 100px;
        padding: 5px 14px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .4px;
        margin-bottom: 16px;
    }

    .section-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: clamp(1.8rem, 3vw, 2.4rem);
        font-weight: 800;
        color: var(--navy);
        line-height: 1.2;
        letter-spacing: -.3px;
        margin-bottom: 14px;
    }

    .section-sub {
        font-size: 15px;
        color: var(--muted);
        line-height: 1.6;
        max-width: 480px;
    }

    /* ─── FEATURES ──────────────────────────────────────────────── */
    .features {
        padding: 96px 0;
        background: var(--white);
    }

    .features-inner {
        max-width: 1160px;
        margin: 0 auto;
        padding: 0 32px;
    }

    .features-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 56px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .feat-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    .feat-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 18px;
        padding: 28px 24px;
        transition: all .25s;
        position: relative;
        overflow: hidden;
    }

    .feat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--sky));
        opacity: 0;
        transition: .25s;
    }

    .feat-card:hover { border-color: rgba(100,153,233,.4); box-shadow: 0 12px 40px rgba(100,153,233,.12); transform: translateY(-3px); }
    .feat-card:hover::before { opacity: 1; }

    .feat-icon-wrap {
        width: 48px; height: 48px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 18px;
        font-size: 22px;
    }

    .feat-card h3 {
        font-size: 15px; font-weight: 700; color: var(--navy);
        margin-bottom: 8px;
    }

    .feat-card p { font-size: 13px; line-height: 1.6; color: var(--muted); margin-bottom: 16px; }

    .feat-tag {
        display: inline-block;
        border-radius: 100px;
        padding: 4px 12px;
        font-size: 11px;
        font-weight: 600;
    }

    /* ─── BUSINESS TYPES ────────────────────────────────────────── */
    .biz {
        padding: 96px 0;
        background: var(--surface);
        position: relative;
        overflow: hidden;
    }

    .biz::before {
        content: '';
        position: absolute;
        top: -100px; right: -100px;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(166,246,255,.35) 0%, transparent 70%);
        border-radius: 50%;
    }

    .biz-inner {
        max-width: 1160px;
        margin: 0 auto;
        padding: 0 32px;
        position: relative;
        z-index: 1;
    }

    .biz-header { text-align: center; margin-bottom: 56px; }
    .biz-header .section-sub { margin: 0 auto; }

    .biz-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .biz-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 18px;
        padding: 32px 24px;
        text-align: center;
        transition: all .25s;
        cursor: default;
    }

    .biz-card:hover { box-shadow: 0 12px 40px rgba(100,153,233,.1); transform: translateY(-4px); border-color: rgba(100,153,233,.3); }

    .biz-icon {
        width: 60px; height: 60px;
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 18px;
        font-size: 26px;
    }

    .biz-card h3 { font-size: 15px; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .biz-card p { font-size: 13px; color: var(--muted); line-height: 1.6; }

    /* ─── CTA BOTTOM ────────────────────────────────────────────── */
    .cta-section {
        padding: 80px 32px;
        text-align: center;
        background: linear-gradient(135deg, var(--primary) 0%, #7db3f5 100%);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -80px; left: 50%;
        transform: translateX(-50%);
        width: 600px; height: 300px;
        background: rgba(255,255,255,.07);
        border-radius: 50%;
    }

    .cta-section h2 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: clamp(1.8rem, 3vw, 2.6rem);
        font-weight: 800;
        color: #fff;
        margin-bottom: 14px;
        position: relative;
    }
    .cta-section p { color: rgba(255,255,255,.8); font-size: 15px; margin-bottom: 32px; position: relative; }

    .btn-white {
        background: #fff;
        color: var(--primary);
        padding: 13px 32px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        transition: all .2s;
        box-shadow: 0 4px 20px rgba(0,0,0,.12);
        position: relative;
    }
    .btn-white:hover { transform: translateY(-2px); box-shadow: 0 8px 32px rgba(0,0,0,.15); }

    /* ─── RESPONSIVE ────────────────────────────────────────────── */
    @media (max-width: 1024px) {
        .feat-grid { grid-template-columns: repeat(2, 1fr); }
        .biz-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .hero-inner {
            grid-template-columns: 1fr;
            gap: 48px;
            padding: 0 20px;
        }
        .hero { padding: 100px 0 60px; min-height: auto; }
        .hero h1 { font-size: 2rem; }
        .chip-top { top: -14px; right: -10px; }
        .chip-bot { bottom: -14px; left: -10px; }

        .features-inner, .biz-inner { padding: 0 20px; }
        .features, .biz { padding: 64px 0; }
        .feat-grid { grid-template-columns: 1fr; }
        .biz-grid { grid-template-columns: 1fr; }
        .features-header { flex-direction: column; align-items: flex-start; }
        .hero-stats { gap: 16px; }
        .stat-val { font-size: 18px; }
    }
</style>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>