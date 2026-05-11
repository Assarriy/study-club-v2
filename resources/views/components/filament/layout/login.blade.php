@php $livewire ??= null; @endphp

<x-filament-panels::layout.base :livewire="$livewire">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body.fi-body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2.5rem 1rem;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #F0F4FF 0%, #F8FAFC 50%, #FFF7ED 100%) !important;
            -webkit-font-smoothing: antialiased;
        }

        @keyframes blobMove {
            0%, 100% { transform: translate(5rem, -5rem) scale(1); }
            50% { transform: translate(4rem, -6rem) scale(1.05); }
        }
        @keyframes blobMove2 {
            0%, 100% { transform: translate(-5rem, 5rem) scale(1); }
            50% { transform: translate(-4rem, 6rem) scale(1.05); }
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .fi-login-blob-1 {
            position: fixed; top: 0; right: 0;
            width: 28rem; height: 28rem;
            background: radial-gradient(circle, rgba(37,99,235,0.12) 0%, transparent 70%);
            border-radius: 9999px;
            pointer-events: none; z-index: 0;
            animation: blobMove 8s ease-in-out infinite;
        }
        .fi-login-blob-2 {
            position: fixed; bottom: 0; left: 0;
            width: 22rem; height: 22rem;
            background: radial-gradient(circle, rgba(245,158,11,0.10) 0%, transparent 70%);
            border-radius: 9999px;
            pointer-events: none; z-index: 0;
            animation: blobMove2 10s ease-in-out infinite;
        }
        .fi-login-outer {
            position: relative; z-index: 10;
            width: 100%; max-width: 26rem;
            margin: 0 auto;
            animation: fadeUp 0.5s cubic-bezier(0.4,0,0.2,1) both;
        }
        .fi-login-logo-link {
            display: flex; justify-content: center; align-items: center;
            gap: 0.625rem; margin-bottom: 1.75rem;
            text-decoration: none; transition: transform 0.3s ease;
        }
        .fi-login-logo-link:hover { transform: scale(1.05); }
        .fi-login-logo-icon {
            width: 2.75rem; height: 2.75rem;
            background: linear-gradient(135deg, #2563EB, #1d4ed8);
            border-radius: 0.875rem;
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 800; font-size: 1.125rem;
            box-shadow: 0 8px 24px rgba(37,99,235,0.35);
        }
        .fi-login-logo-text {
            font-weight: 800; font-size: 2rem;
            color: #1e3a8a; letter-spacing: -0.03em;
        }
        .fi-login-logo-text span { color: #F59E0B; }
        .fi-login-heading {
            text-align: center; font-size: 1.5rem;
            font-weight: 800; color: #0F172A; margin-bottom: 0.375rem;
        }
        .fi-login-subheading {
            text-align: center; font-size: 0.875rem; color: #64748B;
            margin-bottom: 1.75rem;
        }
        .fi-login-card {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(20px);
            padding: 1.75rem 2rem;
            border-radius: 1.5rem;
            border: 1px solid rgba(255,255,255,0.9);
            box-shadow: 0 20px 60px rgba(15,23,42,0.10), 0 4px 16px rgba(15,23,42,0.06);
        }
        .fi-login-footer-text {
            margin-top: 1.25rem; text-align: center;
            font-size: 0.875rem; color: #64748B;
        }
        .fi-login-footer-text a {
            font-weight: 700; color: #2563EB;
            text-decoration: none; transition: color 0.2s;
        }
        .fi-login-footer-text a:hover { color: #F59E0B; }

        /* ── Filament form overrides ── */
        .fi-login-card .fi-fo-field-wrp > label,
        .fi-login-card label {
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            color: #334155 !important;
        }
        .fi-login-card input.fi-input,
        .fi-login-card .fi-input-wrp input {
            border-radius: 0.875rem !important;
            border-color: #E2E8F0 !important;
            background: #F8FAFC !important;
            padding: 0.75rem 1rem !important;
            font-size: 0.875rem !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            transition: all 0.2s !important;
        }
        .fi-login-card input.fi-input:focus,
        .fi-login-card .fi-input-wrp input:focus {
            border-color: #2563EB !important;
            background: white !important;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1) !important;
        }
        .fi-login-card .fi-btn.fi-btn-primary,
        .fi-login-card button[type="submit"] {
            width: 100% !important;
            justify-content: center !important;
            padding: 0.875rem 1rem !important;
            border-radius: 0.875rem !important;
            font-weight: 700 !important;
            font-size: 0.875rem !important;
            background: linear-gradient(135deg, #2563EB, #1d4ed8) !important;
            color: #ffffff !important;
            box-shadow: 0 8px 24px rgba(37,99,235,0.35) !important;
            transition: all 0.25s ease !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            border: none !important;
        }
        .fi-login-card .fi-btn.fi-btn-primary *,
        .fi-login-card button[type="submit"] * { color: #ffffff !important; }
        .fi-login-card .fi-btn.fi-btn-primary:hover,
        .fi-login-card button[type="submit"]:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 12px 32px rgba(37,99,235,0.45) !important;
        }
        .fi-login-card .fi-btn.fi-btn-primary:active,
        .fi-login-card button[type="submit"]:active {
            transform: translateY(0) !important;
        }
        /* Checkbox / remember me */
        .fi-login-card .fi-checkbox-input {
            border-radius: 0.375rem !important;
            border-color: #CBD5E1 !important;
        }
        .fi-login-card .fi-checkbox-input:checked {
            background-color: #2563EB !important;
            border-color: #2563EB !important;
        }
        /* Hide Filament default header inside card */
        .fi-login-card .fi-simple-page > .fi-simple-page-content > .fi-header-simple { display: none !important; }
    </style>

    <div class="fi-login-blob-1"></div>
    <div class="fi-login-blob-2"></div>

    <div class="fi-login-outer">
        <a href="/" class="fi-login-logo-link">
            <div class="fi-login-logo-icon">SC</div>
            <div class="fi-login-logo-text">Study<span>Club</span></div>
        </a>
        <p class="fi-login-heading">Masuk ke Akun Anda</p>
        <p class="fi-login-subheading">Selamat datang kembali di Portal Study Club.</p>

        <div class="fi-login-card">
            {{ $slot }}
        </div>

        <p class="fi-login-footer-text">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar di sini</a>
        </p>
    </div>
</x-filament-panels::layout.base>
