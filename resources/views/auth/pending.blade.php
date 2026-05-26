<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menunggu Aktivasi Akun - UniPOS</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', 'Figtree', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .waiting-body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            background-image:
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(37, 99, 235, 0.08) 0px, transparent 50%);
            padding: 24px 16px;
        }

        .premium-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }

        .status-ring {
            position: relative;
            width: 84px;
            height: 84px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .status-ring::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 3px solid #3b82f6;
            border-top-color: transparent;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .step-item {
            position: relative;
            padding-left: 36px;
        }

        .step-item::before {
            content: "";
            position: absolute;
            left: 10px;
            top: 24px;
            bottom: -16px;
            width: 1.5px;
            background: #cbd5e1;
        }

        .step-item:last-child::before {
            display: none;
        }

        .step-number {
            position: absolute;
            left: 0;
            top: 1px;
            width: 22px;
            height: 22px;
            background: #eff6ff;
            border: 2px solid #3b82f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            color: #3b82f6;
            z-index: 1;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900">

    <div class="waiting-body">
        <div class="w-full max-w-[450px] premium-card rounded-[28px] p-8 sm:p-10 transition-all">

            {{-- Status Visual --}}
            <div class="mb-8">
                <div class="status-ring mb-6">
                    <span class="text-3xl">⏳</span>
                </div>
                <div class="text-center">
                    <h1 class="text-[26px] font-bold text-slate-900 tracking-tight leading-tight mb-3">
                        Hampir <span class="text-blue-600">Selesai.</span>
                    </h1>
                    <p class="text-slate-500 text-sm leading-relaxed px-1">
                        Pendaftaran akun <span class="font-semibold text-slate-800">UniPOS</span> Anda telah berhasil
                        dan kini masuk ke antrean peninjauan.
                    </p>
                </div>
            </div>

            {{-- Alur Informasi Minimalis --}}
            <div class="space-y-6 mb-9">
                <div class="step-item">
                    <div class="step-number">1</div>
                    <h3 class="text-[12px] font-bold text-slate-400 uppercase tracking-wider mb-1">
                        Tahap 1: Verifikasi Data
                    </h3>
                    <p class="text-[13px] text-slate-600 leading-relaxed">
                        Super Admin akan memeriksa kesesuaian data usaha Anda untuk menjaga validitas sistem.
                    </p>
                </div>

                <div class="step-item">
                    <div class="step-number">2</div>
                    <h3 class="text-[12px] font-bold text-slate-400 uppercase tracking-wider mb-1">
                        Tahap 2: Aktivasi WhatsApp
                    </h3>
                    <p class="text-[13px] text-slate-600 leading-relaxed">
                        Kunci enkripsi akses masuk dan tautan resmi akan langsung dikirimkan ke nomor Anda.
                    </p>
                </div>
            </div>

            {{-- Tombol Aksi Mandiri --}}
            <div class="space-y-3.5">
                {{-- Tombol Utama WA (Lebih Besar & Bold) --}}
                <a href="https://wa.me/6283837974029" target="_blank"
                    class="w-full flex items-center justify-center gap-2.5 px-6 py-4 bg-slate-900 hover:bg-emerald-600 text-white font-bold rounded-2xl text-[14px] tracking-wide transition-all duration-300 shadow-lg shadow-slate-900/10 active:scale-[0.98]">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.87 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .015 5.398.012 12.035c0 2.123.554 4.197 1.606 6.023L0 24l6.135-1.61a11.751 11.85 0 005.911 1.603h.005c6.634 0 12.032-5.401 12.035-12.041a11.776 11.776 0 00-3.541-8.515z" />
                    </svg>
                    Akselerasi Hubungi Admin
                </a>

                {{-- Tombol Beranda --}}
                <a href="{{ route('welcome') }}"
                    class="w-full flex items-center justify-center px-6 py-4 bg-slate-50 border border-slate-200 text-slate-600 font-bold rounded-2xl text-[13px] hover:bg-slate-100 hover:text-slate-800 transition-all">
                    Kembali ke Beranda
                </a>
            </div>

            {{-- Footer Branding --}}
            <div class="mt-8 pt-2 text-center border-t border-slate-100">
                <span class="text-[10px] font-bold text-slate-400 tracking-[3px] uppercase">Unified POS System</span>
            </div>

        </div>
    </div>

</body>

</html>
