<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'STUDY CLUB PORTAL')</title>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Google Fonts: Lexend & Manrope -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700;800&amp;family=Manrope:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <!-- Tailwind Script -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary": "#4b1c00",
                        "secondary-fixed": "#ffdf9f",
                        "on-secondary": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "inverse-surface": "#2f3036",
                        "surface-container-high": "#e9e7ef",
                        "on-surface": "#1a1b21",
                        "inverse-primary": "#b6c4ff",
                        "secondary-fixed-dim": "#f9bd22",
                        "surface-container-highest": "#e3e1e9",
                        "secondary": "#FBBF24",
                        "on-primary": "#ffffff",
                        "on-secondary-fixed-variant": "#5c4300",
                        "error-container": "#ffdad6",
                        "on-tertiary-fixed": "#341100",
                        "primary-fixed-dim": "#b6c4ff",
                        "outline": "#8E9199",
                        "on-primary-fixed-variant": "#264191",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed-dim": "#ffb691",
                        "tertiary-fixed": "#ffdbcb",
                        "on-primary-container": "#90a8ff",
                        "background": "#F8F9FA",
                        "primary-fixed": "#dce1ff",
                        "primary": "#1E3A8A",
                        "surface-tint": "#1E3A8A",
                        "tertiary-container": "#6e2c00",
                        "on-primary-fixed": "#00164e",
                        "surface-dim": "#dad9e1",
                        "primary-container": "#1E3A8A",
                        "surface": "#F8F9FA",
                        "secondary-container": "#FBBF24",
                        "on-secondary-fixed": "#261a00",
                        "inverse-on-surface": "#f1f0f7",
                        "outline-variant": "#E1E4E8",
                        "on-tertiary-fixed-variant": "#773205",
                        "error": "#ba1a1a",
                        "surface-bright": "#faf8ff",
                        "surface-container-low": "#f4f3fa",
                        "on-error-container": "#93000a",
                        "on-error": "#ffffff",
                        "on-surface-variant": "#585962",
                        "on-background": "#1a1b21",
                        "surface-variant": "#e3e1e9",
                        "on-tertiary-container": "#f39461",
                        "on-secondary-container": "#1a1b21",
                        "surface-container": "#eeedf4"
                    },
                    "borderRadius": {
                        "DEFAULT": "4px",
                        "lg": "8px",
                        "xl": "12px",
                        "2xl": "16px",
                        "full": "9999px"
                    },
                    "boxShadow": {
                        "figma": "0px 4px 20px rgba(0, 0, 0, 0.05)",
                        "figma-hover": "0px 10px 30px rgba(0, 0, 0, 0.08)"
                    },
                    "fontFamily": {
                        "headline": ["Lexend", "sans-serif"],
                        "body": ["Manrope", "sans-serif"],
                        "label": ["Manrope", "sans-serif"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .hero-pattern {
            background-image: radial-gradient(circle at 2px 2px, #FBBF24 1px, transparent 0);
            background-size: 40px 40px;
            opacity: 0.08;
        }
        .smooth-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        @keyframes float-gentle {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }
        .animate-float-gentle {
            animation: float-gentle 6s ease-in-out infinite;
        }
        .editorial-offset {
            margin-left: 5%;
        }
        .nav-tab-underline::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 4px;
            background-color: #FBBF24; /* Secondary Gold */
            transition: width 0.3s ease;
        }
        .nav-tab-underline:hover::after {
            width: 100%;
        }
        .nav-tab-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #FBBF24;
        }
        .hide-scroll::-webkit-scrollbar {
            display: none;
        }
        .hide-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .masonry {
            column-count: 1;
            column-gap: 2rem;
        }
        @media (min-width: 768px) { .masonry { column-count: 2; } }
        @media (min-width: 1280px) { .masonry { column-count: 3; } }
        .masonry-item {
            break-inside: avoid;
            margin-bottom: 2rem;
        }
        .table-row-hover:hover { background-color: rgba(30, 58, 138, 0.03); }
        .achievement-timeline::before {
            content: '';
            position: absolute;
            left: 64px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, transparent, #ffc329 10%, #ffc329 90%, transparent);
            opacity: 0.3;
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface antialiased selection:bg-secondary-fixed">
    
    <!-- Top Navigation Bar -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-outline-variant sticky top-0 z-50 flex justify-between items-center px-4 md:px-8 py-4 w-full">
        <div class="flex items-center gap-12 flex-1">
            <a href="{{ route('home') }}" class="text-primary font-bold tracking-tight font-headline text-xl flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary">school</span>
                STUDY CLUB
            </a>

            @if(!request()->routeIs('club.show'))
            <form action="{{ route('home') }}" method="GET" class="hidden md:flex relative w-full max-w-sm">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span>
                <input name="search" value="{{ request('search') }}" class="w-full pl-10 pr-4 py-2 bg-surface-container-low rounded-lg border-none focus:ring-2 focus:ring-primary/20 text-sm font-body smooth-transition" placeholder="Cari klub favoritmu..." type="text"/>
            </form>
            @endif
        </div>
        <div class="flex items-center gap-4">
            @if(!request()->routeIs('club.show'))
            @endif
            @guest
                <a href="{{ url('/admin/login') }}" class="px-5 py-2 border border-primary text-primary font-headline font-bold text-sm rounded-lg hover:bg-primary/5 smooth-transition active:scale-95">Login</a>
                <a href="{{ route('register') }}" class="px-5 py-2 bg-secondary text-on-secondary-container font-headline font-bold text-sm rounded-lg shadow-figma hover:brightness-105 smooth-transition active:scale-95">Daftar</a>
            @else
                <div class="flex items-center gap-4">
                    <span class="text-sm font-bold text-primary font-headline hidden md:block">Halo, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout.frontend') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-5 py-2 border border-error text-error font-headline font-bold text-sm rounded-lg hover:bg-error/10 smooth-transition active:scale-95">Logout</button>
                    </form>
                </div>
            @endguest
        </div>
    </nav>

    <!-- Main Content Injection -->
    @yield('content')

    <!-- Bottom Navigation Mobile -->
    <nav class="fixed bottom-0 w-full flex justify-around items-center px-4 h-16 md:hidden bg-white shadow-[0_-4px_20px_rgba(0,0,0,0.05)] z-50 border-t border-outline-variant">
        <a class="flex flex-col items-center text-primary pt-1" href="{{ route('home') }}">
            <span class="material-symbols-outlined text-2xl">home</span>
            <span class="font-manrope text-[10px] font-bold">Beranda</span>
        </a>
        <a class="flex flex-col items-center text-outline pt-1 hover:text-primary smooth-transition" href="#">
            <span class="material-symbols-outlined text-2xl">school</span>
            <span class="font-manrope text-[10px] font-bold">Akademik</span>
        </a>
        <a class="flex flex-col items-center text-outline pt-1 hover:text-primary smooth-transition" href="#">
            <span class="material-symbols-outlined text-2xl">photo_library</span>
            <span class="font-manrope text-[10px] font-bold">Galeri</span>
        </a>
    </nav>

    <!-- Footer -->
    <footer class="bg-primary py-16 px-4 md:px-8 border-t border-white/5 pb-24 md:pb-16 mt-20">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-12 mb-12">
                <div class="max-w-md">
                    <span class="font-headline font-extrabold text-3xl tracking-tight text-white block mb-4">STUDY CLUB</span>
                    <p class="text-white/60 text-sm leading-relaxed">Membangun ekosistem pendidikan yang inklusif dan progresif untuk mencetak talenta masa depan yang kompetitif di era digital.</p>
                </div>
                <div class="flex flex-wrap gap-x-12 gap-y-6">
                    <a class="text-secondary hover:text-white smooth-transition font-bold text-sm tracking-wide" href="#">Kebijakan Privasi</a>
                    <a class="text-secondary hover:text-white smooth-transition font-bold text-sm tracking-wide" href="#">Syarat &amp; Ketentuan</a>
                    <a class="text-secondary hover:text-white smooth-transition font-bold text-sm tracking-wide" href="#">Kontak Kami</a>
                </div>
            </div>
            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-white/40 text-xs font-label">© 2024 Study Club Intellectual Atelier. All rights reserved.</p>
                <div class="flex gap-6">
                    <span class="material-symbols-outlined text-white/40 hover:text-secondary smooth-transition cursor-pointer">language</span>
                    <span class="material-symbols-outlined text-white/40 hover:text-secondary smooth-transition cursor-pointer">share</span>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
