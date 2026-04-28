<!DOCTYPE html>
<html lang="id" class="antialiased">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Study Club — Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        .hero-glow {
            background: radial-gradient(ellipse 60% 50% at 50% 40%, rgba(124, 58, 237, 0.12) 0%, transparent 70%);
        }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-300 font-sans selection:bg-violet-500/30 selection:text-white">

    {{-- ── Navigation ── --}}
    <nav class="sticky top-0 z-50 border-b border-zinc-800/80 bg-zinc-950/80 backdrop-blur-xl">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between h-14">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-violet-600 flex items-center justify-center">
                        <span class="text-white text-xs font-bold">SC</span>
                    </div>
                    <span class="text-white font-semibold text-sm tracking-tight">Study Club</span>
                </a>

                <form action="{{ route('home') }}" method="GET" class="hidden md:flex items-center">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-zinc-500 text-base">search</span>
                        <input name="search" value="{{ request('search') }}"
                            class="w-64 pl-9 pr-4 py-1.5 bg-zinc-900 border border-zinc-800 rounded-lg text-sm text-zinc-300 placeholder-zinc-600 focus:outline-none focus:border-zinc-700 focus:ring-1 focus:ring-zinc-700 transition-colors"
                            placeholder="Cari klub..." type="text"/>
                    </div>
                </form>

                <div class="flex items-center gap-2">
                    @guest
                        <a href="{{ url('/admin/login') }}" class="px-3.5 py-1.5 text-zinc-400 hover:text-white text-sm font-medium transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="px-3.5 py-1.5 bg-violet-600 hover:bg-violet-500 text-white text-sm font-medium rounded-lg transition-colors">Daftar</a>
                    @else
                        <span class="text-sm text-zinc-400 hidden md:block">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout.frontend') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-3.5 py-1.5 text-zinc-500 hover:text-red-400 text-sm font-medium transition-colors">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    {{-- ── Hero ── --}}
    <section class="relative pt-24 pb-20 overflow-hidden">
        <div class="hero-glow absolute inset-0 pointer-events-none"></div>
        <div class="max-w-3xl mx-auto px-6 text-center relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-zinc-800 text-xs font-medium text-zinc-500 mb-8">
                <span class="w-1.5 h-1.5 rounded-full bg-violet-500 animate-pulse"></span>
                Portal Eksklusif
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white tracking-tight leading-[1.1] mb-6">
                Temukan dan<br>
                <span class="text-violet-400">Kembangkan Potensimu</span>
            </h1>
            <p class="text-base md:text-lg text-zinc-500 max-w-xl mx-auto leading-relaxed mb-10">
                Bergabunglah dengan komunitas akademik dan kreatif terbaik. Tingkatkan kompetensi melalui kurikulum berbasis riset dan praktik langsung.
            </p>
        </div>
    </section>

    {{-- ── Club Grid ── --}}
    <section class="pb-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-lg font-semibold text-white">Klub Pilihan</h2>
                    <p class="text-sm text-zinc-500 mt-1">Eksplorasi minatmu dengan dukungan fasilitas modern.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($clubs as $club)
                <a href="{{ route('club.show', $club->slug) }}"
                   class="group bg-zinc-900/50 border border-zinc-800/80 rounded-xl overflow-hidden hover:border-zinc-700 hover:bg-zinc-900 transition-all duration-200 flex flex-col">
                    <div class="h-48 relative overflow-hidden bg-zinc-900">
                        @if($club->banner_image)
                            <img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300"
                                 alt="{{ $club->name }}" src="{{ Storage::url($club->banner_image) }}"/>
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-5xl font-bold text-zinc-800">{{ substr($club->name, 0, 2) }}</span>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3 px-2 py-0.5 bg-zinc-950/80 backdrop-blur-sm border border-zinc-800 rounded-md text-[10px] font-semibold text-zinc-400 uppercase tracking-wider">
                            {{ $club->category->name ?? 'Umum' }}
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-base font-semibold text-white mb-1.5 group-hover:text-violet-400 transition-colors">
                            {{ $club->name }}
                        </h3>
                        <p class="text-sm text-zinc-500 line-clamp-2 leading-relaxed mb-4 flex-grow">
                            {{ e($club->description ?? 'Wadah pengembangan kreativitas dan inovasi.') }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-zinc-800/60">
                            <span class="text-xs text-zinc-600">@{{ $club->slug }}</span>
                            <span class="text-xs text-violet-400 font-medium opacity-0 group-hover:opacity-100 transition-opacity flex items-center gap-1">
                                Lihat Detail
                                <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full py-16 text-center">
                    <span class="material-symbols-outlined text-4xl text-zinc-700 mb-3 block">search_off</span>
                    <p class="text-zinc-500 text-sm">Belum ada klub yang tersedia saat ini.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ── Footer ── --}}
    <footer class="border-t border-zinc-800/80">
        <div class="max-w-6xl mx-auto px-6 py-12">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-10">
                <div class="max-w-sm">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-6 h-6 rounded-md bg-violet-600 flex items-center justify-center">
                            <span class="text-white text-[10px] font-bold">SC</span>
                        </div>
                        <span class="text-white font-semibold text-sm">Study Club</span>
                    </div>
                    <p class="text-xs text-zinc-600 leading-relaxed">
                        Membangun ekosistem pendidikan yang inklusif dan progresif untuk mencetak talenta masa depan.
                    </p>
                </div>
                <div class="flex gap-12 text-sm">
                    <div>
                        <h4 class="text-zinc-400 font-medium mb-3">Menu</h4>
                        <ul class="space-y-2 text-zinc-600">
                            <li><a href="{{ route('home') }}" class="hover:text-zinc-300 transition-colors">Beranda</a></li>
                            <li><a href="#" class="hover:text-zinc-300 transition-colors">Akademik</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-zinc-400 font-medium mb-3">Legal</h4>
                        <ul class="space-y-2 text-zinc-600">
                            <li><a href="#" class="hover:text-zinc-300 transition-colors">Privasi</a></li>
                            <li><a href="#" class="hover:text-zinc-300 transition-colors">Ketentuan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-6 border-t border-zinc-800/60 flex flex-col md:flex-row justify-between items-center gap-3">
                <p class="text-[11px] text-zinc-700">© {{ date('Y') }} Study Club. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- ── Mobile Bottom Nav ── --}}
    <nav class="fixed bottom-0 w-full flex justify-around items-center h-14 md:hidden bg-zinc-950/90 backdrop-blur-xl border-t border-zinc-800/80 z-50">
        <a class="flex flex-col items-center text-violet-400" href="{{ route('home') }}">
            <span class="material-symbols-outlined text-xl">home</span>
            <span class="text-[10px] font-medium mt-0.5">Beranda</span>
        </a>
        <a class="flex flex-col items-center text-zinc-600 hover:text-zinc-400 transition-colors" href="#">
            <span class="material-symbols-outlined text-xl">school</span>
            <span class="text-[10px] font-medium mt-0.5">Akademik</span>
        </a>
        <a class="flex flex-col items-center text-zinc-600 hover:text-zinc-400 transition-colors" href="#">
            <span class="material-symbols-outlined text-xl">photo_library</span>
            <span class="text-[10px] font-medium mt-0.5">Galeri</span>
        </a>
    </nav>

</body>
</html>
