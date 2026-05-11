<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'STUDY CLUB PORTAL')</title>
    <meta name="description" content="Platform resmi manajemen kegiatan study club.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700;0,14..32,800;1,14..32,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --blue: #2563EB;
            --blue-dark: #1d4ed8;
            --blue-light: #EFF6FF;
            --amber: #F59E0B;
        }
        * { box-sizing: border-box; }
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: #F8FAFC;
            color: #0F172A;
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: #94A3B8; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

        /* ── Navbar ── */
        .nav-scrolled { box-shadow: 0 1px 20px rgba(0,0,0,0.06); }

        /* ── Mobile menu ── */
        #mobile-menu {
            transition: max-height 0.35s cubic-bezier(0.4,0,0.2,1), opacity 0.25s ease;
            max-height: 0; opacity: 0; overflow: hidden;
        }
        #mobile-menu.open { max-height: 500px; opacity: 1; }

        /* ── Scroll reveal ── */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.6s cubic-bezier(0.4,0,0.2,1), transform 0.6s cubic-bezier(0.4,0,0.2,1);
        }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        /* ── Page entrance ── */
        .page-enter {
            animation: pageEnter 0.5s cubic-bezier(0.4,0,0.2,1) both;
        }
        @keyframes pageEnter {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Shimmer on hover ── */
        .shimmer-hover {
            position: relative; overflow: hidden;
        }
        .shimmer-hover::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(105deg, transparent 40%, rgba(255,255,255,0.5) 50%, transparent 60%);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }
        .shimmer-hover:hover::after { transform: translateX(100%); }

        /* ── Glow button ── */
        .btn-glow {
            position: relative;
            transition: all 0.25s ease;
        }
        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37,99,235,0.35);
        }
        .btn-glow:active { transform: translateY(0); }

        /* ── Card hover lift ── */
        .card-lift {
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }
        .card-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.08);
        }

        /* ── Gradient text ── */
        .gradient-text {
            background: linear-gradient(135deg, #2563EB 0%, #7C3AED 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── Floating animation ── */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .float-anim { animation: float 4s ease-in-out infinite; }

        /* ── Pulse ring ── */
        @keyframes pulseRing {
            0% { transform: scale(1); opacity: 0.6; }
            100% { transform: scale(1.6); opacity: 0; }
        }

        /* ── Masonry ── */
        .masonry { column-count: 1; column-gap: 1rem; }
        @media (min-width: 768px) { .masonry { column-count: 2; } }
        @media (min-width: 1280px) { .masonry { column-count: 3; } }
        .masonry-item { break-inside: avoid; margin-bottom: 1rem; }

        /* ── Prose override ── */
        .prose { color: #475569; }
        .prose p { margin-bottom: 0.75rem; }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    {{-- ══ NAVIGATION ══ --}}
    <nav id="main-nav" class="sticky top-0 z-50 bg-white/80 backdrop-blur-2xl border-b border-slate-200/60 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 no-underline group">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center text-white text-xs font-bold shadow-md shadow-blue-500/30 group-hover:shadow-blue-500/50 transition-all duration-300 group-hover:scale-110">SC</div>
                    <span class="text-[15px] font-bold text-slate-900 tracking-tight">Study<span class="text-blue-600">Club</span></span>
                </a>

                {{-- Desktop --}}
                <div class="hidden md:flex items-center gap-2">
                    @if(!request()->routeIs('club.show'))
                    <form action="{{ route('home') }}" method="GET" class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input name="search" value="{{ request('search') }}" type="text" placeholder="Cari klub..."
                            class="w-48 pl-8 pr-3 py-2 text-sm bg-slate-100 border border-transparent rounded-xl text-slate-700 placeholder-slate-400 focus:bg-white focus:border-blue-300 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all duration-200">
                    </form>
                    @endif

                    @guest
                        <a href="{{ url('/admin/login') }}" class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors no-underline rounded-xl hover:bg-slate-100">Login</a>
                        <a href="{{ route('register') }}" class="btn-glow px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl no-underline shadow-md shadow-blue-500/25">Daftar</a>
                    @else
                        <div class="flex items-center gap-2 px-3 py-1.5 bg-slate-100 rounded-xl">
                            <div class="w-6 h-6 rounded-lg bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-[10px] font-bold">{{ substr(Auth::user()->name, 0, 1) }}</div>
                            <span class="text-sm font-medium text-slate-600 max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout.frontend') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-2 text-sm font-medium text-slate-400 hover:text-red-500 transition-colors cursor-pointer bg-transparent border-none rounded-xl hover:bg-red-50">Logout</button>
                        </form>
                    @endguest
                </div>

                {{-- Mobile hamburger --}}
                <button id="nav-toggle" class="md:hidden p-2 rounded-xl text-slate-500 hover:bg-slate-100 transition-colors" aria-label="Menu">
                    <svg id="icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg id="icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div id="mobile-menu" class="md:hidden border-t border-slate-100 bg-white/95 backdrop-blur-xl">
            <div class="px-4 py-4 space-y-2">
                @if(!request()->routeIs('club.show'))
                <form action="{{ route('home') }}" method="GET" class="relative mb-3">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input name="search" value="{{ request('search') }}" type="text" placeholder="Cari klub..."
                        class="w-full pl-9 pr-3 py-3 text-sm bg-slate-100 border border-transparent rounded-2xl text-slate-700 placeholder-slate-400 focus:bg-white focus:border-blue-300 focus:outline-none transition-all">
                </form>
                @endif
                @guest
                    <a href="{{ url('/admin/login') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded-2xl no-underline transition-colors">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center justify-center gap-2 px-4 py-3 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl no-underline transition-all shadow-md shadow-blue-500/25">
                        Daftar Sekarang
                    </a>
                @else
                    <div class="flex items-center gap-3 px-4 py-3 bg-slate-50 rounded-2xl">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-xs font-bold">{{ substr(Auth::user()->name, 0, 1) }}</div>
                        <span class="text-sm font-medium text-slate-700 truncate">{{ Auth::user()->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout.frontend') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm font-medium text-red-500 hover:bg-red-50 rounded-2xl cursor-pointer bg-transparent border-none transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Logout
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    {{-- ══ MAIN ══ --}}
    <main class="flex-1 page-enter">
        @yield('content')
    </main>

    {{-- ══ FOOTER ══ --}}
    <footer class="relative bg-slate-900 text-slate-400 overflow-hidden">
        <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.03) 1px, transparent 0); background-size: 28px 28px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-px bg-gradient-to-r from-transparent via-blue-500/40 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 relative z-10">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 mb-10">
                {{-- Brand --}}
                <div class="sm:col-span-1">
                    <div class="flex items-center gap-2.5 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center text-white text-xs font-bold shadow-lg shadow-blue-500/30">SC</div>
                        <span class="text-sm font-bold text-white tracking-tight">Study<span class="text-blue-400">Club</span></span>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed">Platform manajemen terpadu untuk kegiatan akademik ekstrakurikuler sekolah.</p>
                </div>

                {{-- Links --}}
                <div>
                    <h4 class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-4">Navigasi</h4>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-sm text-slate-400 hover:text-white transition-colors no-underline hover:translate-x-1 inline-block transition-transform duration-200">Beranda</a></li>
                        <li><a href="#katalog" class="text-sm text-slate-400 hover:text-white transition-colors no-underline hover:translate-x-1 inline-block transition-transform duration-200">Katalog Club</a></li>
                        <li><a href="/admin" class="text-sm text-slate-400 hover:text-white transition-colors no-underline hover:translate-x-1 inline-block transition-transform duration-200">Portal Admin</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-4">Akun</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/admin/login') }}" class="text-sm text-slate-400 hover:text-white transition-colors no-underline hover:translate-x-1 inline-block transition-transform duration-200">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-sm text-slate-400 hover:text-white transition-colors no-underline hover:translate-x-1 inline-block transition-transform duration-200">Daftar Akun</a></li>
                    </ul>
                </div>
            </div>

            <div class="h-px bg-slate-800 mb-6"></div>
            <div class="flex flex-col sm:flex-row justify-between items-center gap-2">
                <p class="text-xs text-slate-600">&copy; {{ date('Y') }} StudyClub. All rights reserved.</p>
                <p class="text-xs text-slate-600">Crafted by <span class="text-slate-400 font-medium">Wibowo Assariy</span></p>
            </div>
        </div>
    </footer>

    <script>
        // ── Mobile nav ──
        const toggle = document.getElementById('nav-toggle');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');
        if (toggle) {
            toggle.addEventListener('click', () => {
                menu.classList.toggle('open');
                iconOpen.classList.toggle('hidden');
                iconClose.classList.toggle('hidden');
            });
        }

        // ── Navbar scroll shadow ──
        const nav = document.getElementById('main-nav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('nav-scrolled', window.scrollY > 10);
        }, { passive: true });

        // ── Scroll reveal ──
        const revealEls = document.querySelectorAll('.reveal');
        if (revealEls.length) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('visible');
                        observer.unobserve(e.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
            revealEls.forEach(el => observer.observe(el));
        }
    </script>
    @stack('scripts')
</body>
</html>
