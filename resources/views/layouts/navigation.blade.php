<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&family=Inter:wght@400;500;600&display=swap');

    .nav-root {
        position: sticky;
        top: 0;
        z-index: 50;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid #e8eef8;
        font-family: 'Inter', sans-serif;
    }

    .nav-inner {
        max-width: 1160px;
        margin: 0 auto;
        padding: 0 32px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* BRAND */
    .nav-brand {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .nav-brand-icon {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #6499E9 0%, #9EDDFF 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .nav-brand-text {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: #1a2744;
        letter-spacing: -0.5px;
    }

    .nav-brand-text span {
        color: #6499E9;
    }

    /* DESKTOP LINKS */
    .nav-links {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .nav-link {
        padding: 7px 14px;
        border-radius: 8px;
        font-size: 13.5px;
        font-weight: 500;
        color: #6b7a99;
        text-decoration: none;
        transition: all 0.18s;
    }

    .nav-link:hover {
        color: #1a2744;
        background: #f0f6ff;
    }

    .nav-link.active {
        color: #6499E9;
        font-weight: 600;
    }

    /* CTA BUTTONS */
    .nav-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .nav-btn-ghost {
        padding: 8px 18px;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 600;
        color: #1a2744;
        text-decoration: none;
        border: 1.5px solid #e8eef8;
        background: transparent;
        transition: all 0.18s;
        white-space: nowrap;
    }

    .nav-btn-ghost:hover {
        border-color: #6499E9;
        color: #6499E9;
    }

    .nav-btn-primary {
        padding: 8px 18px;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 600;
        color: #fff;
        text-decoration: none;
        background: #6499E9;
        transition: all 0.18s;
        box-shadow: 0 2px 10px rgba(100, 153, 233, 0.25);
        white-space: nowrap;
    }

    .nav-btn-primary:hover {
        background: #4f84d9;
        box-shadow: 0 4px 16px rgba(100, 153, 233, 0.35);
        transform: translateY(-1px);
    }

    /* HAMBURGER */
    .nav-hamburger {
        display: none;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: transparent;
        border: 1.5px solid #e8eef8;
        cursor: pointer;
        color: #1a2744;
        transition: all 0.18s;
    }

    .nav-hamburger:hover {
        background: #f0f6ff;
        border-color: #6499E9;
        color: #6499E9;
    }

    /* MOBILE MENU */
    .nav-mobile {
        display: none;
        flex-direction: column;
        padding: 12px 20px 16px;
        border-top: 1px solid #f0f4fb;
        gap: 2px;
    }

    .nav-mobile.open {
        display: flex;
    }

    .nav-mobile-link {
        padding: 10px 12px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        color: #6b7a99;
        text-decoration: none;
        transition: all 0.15s;
    }

    .nav-mobile-link:hover,
    .nav-mobile-link.active {
        background: #f0f6ff;
        color: #1a2744;
    }

    .nav-mobile-divider {
        height: 1px;
        background: #f0f4fb;
        margin: 8px 0;
    }

    .nav-mobile-actions {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 4px 0;
    }

    .nav-mobile-btn {
        display: block;
        text-align: center;
        padding: 11px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.18s;
    }

    .nav-mobile-btn.ghost {
        border: 1.5px solid #e8eef8;
        color: #1a2744;
    }

    .nav-mobile-btn.primary {
        background: #6499E9;
        color: #fff;
        box-shadow: 0 2px 10px rgba(100, 153, 233, 0.25);
    }

    /* Responsive: hide desktop, show hamburger */
    @media (max-width: 768px) {
        .nav-links {
            display: none;
        }

        .nav-actions {
            display: none;
        }

        .nav-hamburger {
            display: flex;
        }

        .nav-inner {
            padding: 0 20px;
        }
    }
</style>

<nav x-data="{ open: false }" class="nav-root">
    <div class="nav-inner">

        <!-- BRAND -->
        <a href="{{ route('welcome') }}" class="nav-brand">
            <div class="nav-brand-icon">⚡</div>
            <div class="nav-brand-text ">Uni<span>POS</span></div>
        </a>

        <!-- LINKS DESKTOP -->
        <div class="nav-links">
            <a href="{{ route('welcome') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                Home
            </a>
            <a href="/fitur" class="nav-link {{ request()->is('fitur') ? 'active' : '' }}">
                Fitur
            </a>
            <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                Tentang
            </a>
        </div>

        <!-- CTA DESKTOP -->
        <div class="nav-actions">
            <a href="/register-usaha" class="nav-btn-primary">Daftar Gratis</a>
        </div>

        <!-- HAMBURGER MOBILE -->
        <button class="nav-hamburger" @click="open = !open" aria-label="Menu">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path :class="{ 'hidden': open }" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open }" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    </div>

    <!-- MOBILE MENU -->
    <div :class="{ 'open': open }" class="nav-mobile">
        <a href="{{ route('welcome') }}" class="nav-mobile-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
        <a href="/fitur" class="nav-mobile-link {{ request()->is('fitur') ? 'active' : '' }}">Fitur</a>
        <a href="/about" class="nav-mobile-link {{ request()->is('about') ? 'active' : '' }}">Tentang</a>


        <div class="nav-mobile-divider"></div>

        <div class="nav-mobile-actions">

            <a href="/register-usaha" class="nav-mobile-btn primary">Daftar Gratis</a>
        </div>
    </div>
</nav>
