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
    :root {
            --navy:        #0B1C3A;
            --navy-mid:    #162B52;
            --accent:      #2563EB;
            --accent-lt:   #3B82F6;
            --gold:        #F59E0B;
            --gold-lt:     #FCD34D;
            --cream:       #FAFAF7;
            --muted:       #6B7280;
            --border:      rgba(11,28,58,0.10);
            --font-display:'DM Serif Display', Georgia, serif;
            --font-body:   'DM Sans', system-ui, sans-serif;
        }

/* ── DASHBOARD MOCK ───────────────────────── */
.hero-visual { 
    position:relative; 
    padding:10px 10px 10px; 
}

.dash-card { 
    background:white; 
    border-radius:20px; 
    border:1px solid var(--border); 
    box-shadow:0 24px 64px rgba(11,28,58,.14); 
    overflow:hidden; 
}

.dash-head { 
    background:var(--navy); 
    padding:14px 20px; 
    display:flex; 
    align-items:center; 
    justify-content:space-between; 
}

.dash-title-text { 
    font-family:var(--font-display); 
    font-size:15px; 
    color:white; 
    letter-spacing:-0.3px; 
}

.dash-date { 
    font-size:11px; 
    color:rgba(255,255,255,0.50); 
}

.dash-body { 
    padding:24px 28px; 
}

.metric-grid { 
    display:grid; 
    grid-template-columns:1fr 1fr 1fr; 
    gap:8px; 
    margin-bottom:12px; 
}

.metric-box { 
    background:var(--cream); 
    border-radius:10px; 
    padding:10px 12px; 
    border:1px solid var(--border); 
}

.metric-lbl { 
    font-size:9px; 
    font-weight:600; 
    text-transform:uppercase; 
    letter-spacing:.05em; 
    color:var(--muted); 
    margin-bottom:2px; 
}

.metric-val { 
    font-family:var(--font-display); 
    font-size:18px; 
    color:var(--navy); 
    letter-spacing:-0.5px; 
}

.metric-chg { 
    font-size:9px; 
    font-weight:600; 
    color:#16A34A; 
}

.chart-area { 
    background:var(--cream); 
    border-radius:10px; 
    padding:10px; 
    border:1px solid var(--border); 
    margin-bottom:10px; 
}

.chart-lbl { 
    font-size:9px; 
    font-weight:600; 
    text-transform:uppercase; 
    letter-spacing:.05em; 
    color:var(--muted); 
    margin-bottom:8px; 
}

.bar-row { 
    display:flex; 
    align-items:flex-end; 
    gap:5px; 
    height:48px; 
}

.bar-col { 
    flex:1; 
    display:flex; 
    flex-direction:column; 
    align-items:center; 
    gap:3px; 
}

.bar-body { 
    width:100%; 
    border-radius:4px 4px 0 0; 
    background:rgba(37,99,235,.15); 
}

.bar-body.bar-hi { 
    background:var(--accent); 
}

.bar-body.bar-gld { 
    background:var(--gold); 
}

.bar-day { 
    font-size:8px; 
    font-weight:500; 
    color:var(--muted); 
}

.trx-row { 
    display:flex; 
    align-items:center; 
    justify-content:space-between; 
    padding:7px 0; 
    border-bottom:1px solid var(--border); 
}

.trx-row:last-child { 
    border-bottom:none; 
}

.trx-icon { 
    width:28px; 
    height:28px; 
    border-radius:8px; 
    display:flex; 
    align-items:center; 
    justify-content:center; 
    font-size:13px; 
}

.trx-name { 
    font-size:12px; 
    font-weight:500; 
    color:var(--navy); 
}

.trx-time { 
    font-size:10px; 
    color:var(--muted); 
}

.trx-amount { 
    font-family:var(--font-display); 
    font-size:12px; 
    font-weight:600; 
    color:var(--navy); 
}

.float-top { 
    position:absolute; 
    top:0; 
    right:0; 
    background:var(--gold); 
    border-radius:12px; 
    padding:8px 14px; 
    display:flex; 
    align-items:center; 
    gap:8px; 
    box-shadow:0 8px 24px rgba(245,158,11,.32); 
}

.float-top-icon { 
    width:26px; 
    height:26px; 
    background:rgba(0,0,0,0.12); 
    border-radius:6px; 
    display:flex; 
    align-items:center; 
    justify-content:center; 
    font-size:13px; 
}

.float-bot { 
    position:absolute; 
    bottom:0; 
    left:0; 
    background:white; 
    border:1px solid var(--border); 
    border-radius:12px; 
    padding:8px 14px; 
    display:flex; 
    align-items:center; 
    gap:8px; 
    box-shadow:0 8px 24px rgba(11,28,58,.10); 
}

.live-dot { 
    width:7px; 
    height:7px; 
    background:#16A34A; 
    border-radius:50%; 
}
        .section-header    { text-align:center; margin-bottom:64px; }
        .section-tag       { display:inline-block; font-size:11px; font-weight:600; letter-spacing:.10em; text-transform:uppercase; color:var(--accent); margin-bottom:16px; }
        .section-h2        { font-family:var(--font-display); font-size:clamp(30px,3.5vw,44px); line-height:1.1; letter-spacing:-1.2px; color:var(--navy); margin-bottom:16px; }
        .section-sub       { font-size:17px; color:var(--muted); max-width:520px; margin:0 auto; line-height:1.65; }
    
   /* background blur */
        .blur-bg{
            position:absolute;
            width:260px;
            height:260px;
            border-radius:50%;
            filter:blur(120px);
            opacity:.35;
        }

        .blur1{
            background:#60a5fa;
            top:-80px;
            left:-80px;
        }

        .blur2{
            background:#a78bfa;
            bottom:-80px;
            right:-80px;
        }

        /* background icon */
        .bg-icon{
            position:absolute;
            font-size:80px;
            opacity:.05;
            color:#2563eb;
        }


        /* statistik */
        .hero-stat{
            background:white;
            padding:12px 20px;
            border-radius:12px;
            box-shadow:0 10px 20px rgba(0,0,0,.05);
            font-size:14px;
        }

        /* feature card */
        .feature-card{
            transition:all .35s ease;
        }

        .feature-card:hover{
            transform:translateY(-8px);
            box-shadow:0 20px 40px rgba(0,0,0,.08);
        }

        /* business card */
        .business-card{
            transition:all .35s ease;
        }

        .business-card:hover{
            transform:translateY(-10px) scale(1.02);
            box-shadow:0 25px 50px rgba(0,0,0,.08);
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
