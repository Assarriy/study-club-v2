{{-- ══════════════════════════════════════════════════════════════════════════
     LAYOUT: Modern SaaS — Clean, Professional, Data-Forward
     ══════════════════════════════════════════════════════════════════════════ --}}
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'STUDY CLUB PORTAL')</title>
    <meta name="description" content="Platform resmi manajemen kegiatan study club.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: #FAFBFC;
            color: #111827;
            margin: 0;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* Tab navigation */
        .tab-link {
            position: relative;
            transition: color 0.2s ease;
        }
        .tab-link::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 0;
            height: 2px;
            background: #2563EB;
            transition: width 0.2s ease;
            border-radius: 1px;
        }
        .tab-link:hover::after { width: 100%; }
        .tab-link-active { color: #111827; }
        .tab-link-active::after { width: 100%; }

        /* Masonry for gallery */
        .masonry { column-count: 1; column-gap: 1rem; }
        @media (min-width: 768px) { .masonry { column-count: 2; } }
        @media (min-width: 1280px) { .masonry { column-count: 3; } }
        .masonry-item { break-inside: avoid; margin-bottom: 1rem; }

        /* Smooth entrance */
        .fade-in { animation: fadeUp 0.4s ease-out; }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    {{-- ══ NAVIGATION ══ --}}
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-zinc-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 no-underline">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-sm shadow-blue-600/20">SC</div>
                    <span class="text-[15px] font-bold text-zinc-900 tracking-tight">StudyClub</span>
                </a>

                <div class="flex items-center gap-2">
                    @if(!request()->routeIs('club.show'))
                    <form action="{{ route('home') }}" method="GET" class="hidden md:flex relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input name="search" value="{{ request('search') }}" type="text" placeholder="Cari klub..."
                            class="w-52 pl-9 pr-3 py-2 text-sm bg-zinc-100/80 border border-transparent rounded-lg text-zinc-700 placeholder-zinc-400 focus:bg-white focus:border-zinc-300 focus:outline-none transition-all duration-200">
                    </form>
                    @endif

                    @guest
                        <a href="{{ url('/admin/login') }}" class="px-4 py-2 text-sm font-medium text-zinc-600 hover:text-zinc-900 transition-colors no-underline">Login</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors no-underline shadow-sm shadow-blue-600/20">Daftar</a>
                    @else
                        <span class="hidden md:block text-sm font-medium text-zinc-500">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout.frontend') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-2 text-sm font-medium text-zinc-400 hover:text-red-500 transition-colors cursor-pointer bg-transparent border-none">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    {{-- ══ MAIN CONTENT ══ --}}
    <main class="flex-1 fade-in">
        @yield('content')
    </main>

    {{-- ══ FOOTER ══ --}}
    <footer class="border-t border-zinc-200/80 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-8">
                <div class="max-w-sm">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-7 h-7 bg-blue-600 rounded-md flex items-center justify-center text-white text-[10px] font-bold">SC</div>
                        <span class="text-sm font-bold text-zinc-900 tracking-tight">StudyClub</span>
                    </div>
                    <p class="text-sm text-zinc-500 leading-relaxed">Sistem manajemen terpadu untuk kegiatan akademik ekstrakurikuler sekolah.</p>
                </div>
                <div class="flex gap-16">
                    <div>
                        <h4 class="text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-3">Menu</h4>
                        <ul class="space-y-2.5">
                            <li><a href="/" class="text-sm text-zinc-600 hover:text-zinc-900 transition-colors no-underline">Beranda</a></li>
                            <li><a href="/admin" class="text-sm text-zinc-600 hover:text-zinc-900 transition-colors no-underline">Portal Admin</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-3">Dukungan</h4>
                        <ul class="space-y-2.5">
                            <li><a href="#" class="text-sm text-zinc-600 hover:text-zinc-900 transition-colors no-underline">Panduan</a></li>
                            <li><a href="#" class="text-sm text-zinc-600 hover:text-zinc-900 transition-colors no-underline">Hubungi Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="h-px bg-zinc-100 mb-6"></div>
            <div class="flex flex-col md:flex-row justify-between items-center gap-2">
                <p class="text-xs text-zinc-400">&copy; {{ date('Y') }} Study Club. All rights reserved.</p>
                <p class="text-xs text-zinc-400">By <span class="font-medium text-zinc-500">Wibowo Assariy</span></p>
            </div>
        </div>
    </footer>
</body>
</html>
