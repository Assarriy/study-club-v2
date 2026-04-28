<!DOCTYPE html>
<html lang="id" class="antialiased">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Study Club — Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        .noise-bg {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-stone-50 text-stone-500 font-sans selection:bg-amber-100 selection:text-amber-900 noise-bg">

    {{-- ── Navigation ── --}}
    <nav class="sticky top-0 z-50 border-b border-stone-200/80 bg-stone-50/80 backdrop-blur-xl">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between h-14">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-stone-900 flex items-center justify-center">
                        <span class="text-amber-400 text-xs font-bold">SC</span>
                    </div>
                    <span class="text-stone-900 font-semibold text-sm tracking-tight font-display">Study Club</span>
                </a>

                <form action="{{ route('home') }}" method="GET" class="hidden md:flex items-center">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-base">search</span>
                        <input name="search" value="{{ request('search') }}"
                            class="w-64 pl-9 pr-4 py-1.5 bg-white border border-stone-200 rounded-lg text-sm text-stone-700 placeholder-stone-400 focus:outline-none focus:border-amber-300 focus:ring-1 focus:ring-amber-200 transition-colors"
                            placeholder="Cari klub..." type="text"/>
                    </div>
                </form>

                <div class="flex items-center gap-2">
                    @guest
                        <a href="{{ url('/admin/login') }}" class="px-3.5 py-1.5 text-stone-500 hover:text-stone-900 text-sm font-medium transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="px-3.5 py-1.5 bg-stone-900 hover:bg-stone-800 text-white text-sm font-medium rounded-lg transition-colors">Daftar</a>
                    @else
                        <span class="text-sm text-stone-500 hidden md:block">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout.frontend') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-3.5 py-1.5 text-stone-400 hover:text-red-500 text-sm font-medium transition-colors">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    {{-- ── Hero ── --}}
    <section class="pt-24 pb-20">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-stone-200 text-xs font-medium text-stone-400 mb-8">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                Portal Eksklusif
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-stone-900 tracking-tight leading-[1.1] mb-6 font-display">
                Temukan dan<br>
                <span class="text-amber-500">Kembangkan Potensimu</span>
            </h1>
            <p class="text-base md:text-lg text-stone-400 max-w-xl mx-auto leading-relaxed">
                Bergabunglah dengan komunitas akademik dan kreatif terbaik. Tingkatkan kompetensi melalui kurikulum berbasis riset dan praktik langsung.
            </p>
        </div>
    </section>

    {{-- ── Club Grid ── --}}
    <section class="pb-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-lg font-semibold text-stone-900 font-display">Klub Pilihan</h2>
                    <p class="text-sm text-stone-400 mt-1">Eksplorasi minatmu dengan dukungan fasilitas modern.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($clubs as $club)
                <a href="{{ route('club.show', $club->slug) }}"
                   class="group bg-white border border-stone-200 rounded-xl overflow-hidden hover:border-stone-300 hover:shadow-xs transition-all duration-200 flex flex-col">
                    <div class="h-48 relative overflow-hidden bg-stone-100">
                        @if($club->banner_image)
                            <img class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-300"
                                 alt="{{ $club->name }}" src="{{ Storage::url($club->banner_image) }}"/>
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-stone-100">
                                <span class="text-5xl font-bold text-stone-200 font-display">{{ substr($club->name, 0, 2) }}</span>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3 px-2 py-0.5 bg-white/90 backdrop-blur-sm border border-stone-200 rounded-md text-[10px] font-semibold text-stone-500 uppercase tracking-wider">
                            {{ $club->category->name ?? 'Umum' }}
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-base font-semibold text-stone-900 mb-1.5 group-hover:text-amber-600 transition-colors font-display">
                            {{ $club->name }}
                        </h3>
                        <p class="text-sm text-stone-400 line-clamp-2 leading-relaxed mb-4 flex-grow">
                            {{ e($club->description ?? 'Wadah pengembangan kreativitas dan inovasi.') }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-stone-100">
                            <span class="text-xs text-stone-300">@{{ $club->slug }}</span>
                            <span class="flex items-center gap-1 text-xs text-stone-300 group-hover:text-amber-500 transition-colors font-medium">
                                Detail
                                <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full py-16 text-center">
                    <span class="material-symbols-outlined text-4xl text-stone-300 mb-3 block">search_off</span>
                    <p class="text-stone-400 text-sm">Belum ada klub yang tersedia saat ini.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ── Footer ── --}}
    <footer class="border-t border-stone-200">
        <div class="max-w-6xl mx-auto px-6 py-12">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-10">
                <div class="max-w-sm">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-6 h-6 rounded-md bg-stone-900 flex items-center justify-center">
                            <span class="text-amber-400 text-[10px] font-bold">SC</span>
                        </div>
                        <span class="text-stone-900 font-semibold text-sm font-display">Study Club</span>
                    </div>
                    <p class="text-xs text-stone-400 leading-relaxed">
                        Membangun ekosistem pendidikan yang inklusif dan progresif untuk mencetak talenta masa depan.
                    </p>
                </div>
                <div class="flex gap-12 text-sm">
                    <div>
                        <h4 class="text-stone-900 font-medium text-xs mb-3 font-display">Menu</h4>
                        <ul class="space-y-2 text-stone-400 text-xs">
                            <li><a href="{{ route('home') }}" class="hover:text-stone-700 transition-colors">Beranda</a></li>
                            <li><a href="#" class="hover:text-stone-700 transition-colors">Akademik</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-stone-900 font-medium text-xs mb-3 font-display">Legal</h4>
                        <ul class="space-y-2 text-stone-400 text-xs">
                            <li><a href="#" class="hover:text-stone-700 transition-colors">Privasi</a></li>
                            <li><a href="#" class="hover:text-stone-700 transition-colors">Ketentuan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-6 border-t border-stone-200 flex flex-col md:flex-row justify-between items-center gap-3">
                <p class="text-[11px] text-stone-300">© {{ date('Y') }} Study Club. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- ── Mobile Bottom Nav ── --}}
    <nav class="fixed bottom-0 w-full flex justify-around items-center h-14 md:hidden bg-stone-50/90 backdrop-blur-xl border-t border-stone-200 z-50">
        <a class="flex flex-col items-center text-amber-600" href="{{ route('home') }}">
            <span class="material-symbols-outlined text-xl">home</span>
            <span class="text-[10px] font-medium mt-0.5">Beranda</span>
        </a>
        <a class="flex flex-col items-center text-stone-400 hover:text-stone-600 transition-colors" href="#">
            <span class="material-symbols-outlined text-xl">school</span>
            <span class="text-[10px] font-medium mt-0.5">Akademik</span>
        </a>
        <a class="flex flex-col items-center text-stone-400 hover:text-stone-600 transition-colors" href="#">
            <span class="material-symbols-outlined text-xl">photo_library</span>
            <span class="text-[10px] font-medium mt-0.5">Galeri</span>
        </a>
    </nav>

</body>
</html>
