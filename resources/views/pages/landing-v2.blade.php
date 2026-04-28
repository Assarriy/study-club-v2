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
    </style>
</head>
<body class="bg-white text-gray-600 font-sans selection:bg-indigo-100 selection:text-indigo-900">

    {{-- ── Navigation ── --}}
    <nav class="sticky top-0 z-50 border-b border-gray-200 bg-white/80 backdrop-blur-xl">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between h-14">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-indigo-600 flex items-center justify-center">
                        <span class="text-white text-xs font-bold">SC</span>
                    </div>
                    <span class="text-gray-900 font-semibold text-sm tracking-tight">Study Club</span>
                </a>

                <form action="{{ route('home') }}" method="GET" class="hidden md:flex items-center">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-base">search</span>
                        <input name="search" value="{{ request('search') }}"
                            class="w-64 pl-9 pr-4 py-1.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:border-indigo-300 focus:ring-1 focus:ring-indigo-200 transition-colors"
                            placeholder="Cari klub..." type="text"/>
                    </div>
                </form>

                <div class="flex items-center gap-2">
                    @guest
                        <a href="{{ url('/admin/login') }}" class="px-3.5 py-1.5 text-gray-500 hover:text-gray-900 text-sm font-medium transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="px-3.5 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">Daftar</a>
                    @else
                        <span class="text-sm text-gray-500 hidden md:block">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout.frontend') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-3.5 py-1.5 text-gray-400 hover:text-red-500 text-sm font-medium transition-colors">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    {{-- ── Hero ── --}}
    <section class="pt-24 pb-20 border-b border-gray-100">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-gray-200 text-xs font-medium text-gray-400 mb-8">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                Portal Eksklusif
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 tracking-tight leading-[1.1] mb-6">
                Temukan dan<br>
                <span class="text-indigo-600">Kembangkan Potensimu</span>
            </h1>
            <p class="text-base md:text-lg text-gray-400 max-w-xl mx-auto leading-relaxed">
                Bergabunglah dengan komunitas akademik dan kreatif terbaik. Tingkatkan kompetensi melalui kurikulum berbasis riset dan praktik langsung.
            </p>
        </div>
    </section>

    {{-- ── Club Grid ── --}}
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Klub Pilihan</h2>
                    <p class="text-sm text-gray-400 mt-1">Eksplorasi minatmu dengan dukungan fasilitas modern.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px bg-gray-200 border border-gray-200 rounded-xl overflow-hidden">
                @forelse($clubs as $club)
                <a href="{{ route('club.show', $club->slug) }}"
                   class="group bg-white hover:bg-gray-50/80 transition-colors duration-150 flex flex-col">
                    <div class="h-44 relative overflow-hidden bg-gray-50">
                        @if($club->banner_image)
                            <img class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-300"
                                 alt="{{ $club->name }}" src="{{ Storage::url($club->banner_image) }}"/>
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-50">
                                <span class="text-4xl font-bold text-gray-200">{{ substr($club->name, 0, 2) }}</span>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3 px-2 py-0.5 bg-white/90 backdrop-blur-sm border border-gray-200 rounded-md text-[10px] font-semibold text-gray-500 uppercase tracking-wider">
                            {{ $club->category->name ?? 'Umum' }}
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-sm font-semibold text-gray-900 mb-1.5 group-hover:text-indigo-600 transition-colors">
                            {{ $club->name }}
                        </h3>
                        <p class="text-xs text-gray-400 line-clamp-2 leading-relaxed mb-4 flex-grow">
                            {{ e($club->description ?? 'Wadah pengembangan kreativitas dan inovasi.') }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-[11px] text-gray-300">@{{ $club->slug }}</span>
                            <span class="material-symbols-outlined text-sm text-gray-300 group-hover:text-indigo-500 transition-colors">arrow_forward</span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full py-16 text-center bg-white">
                    <span class="material-symbols-outlined text-4xl text-gray-300 mb-3 block">search_off</span>
                    <p class="text-gray-400 text-sm">Belum ada klub yang tersedia saat ini.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ── Footer ── --}}
    <footer class="border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6 py-12">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-10">
                <div class="max-w-sm">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-6 h-6 rounded-md bg-indigo-600 flex items-center justify-center">
                            <span class="text-white text-[10px] font-bold">SC</span>
                        </div>
                        <span class="text-gray-900 font-semibold text-sm">Study Club</span>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed">
                        Membangun ekosistem pendidikan yang inklusif dan progresif untuk mencetak talenta masa depan.
                    </p>
                </div>
                <div class="flex gap-12 text-sm">
                    <div>
                        <h4 class="text-gray-900 font-medium text-xs mb-3">Menu</h4>
                        <ul class="space-y-2 text-gray-400 text-xs">
                            <li><a href="{{ route('home') }}" class="hover:text-gray-700 transition-colors">Beranda</a></li>
                            <li><a href="#" class="hover:text-gray-700 transition-colors">Akademik</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-gray-900 font-medium text-xs mb-3">Legal</h4>
                        <ul class="space-y-2 text-gray-400 text-xs">
                            <li><a href="#" class="hover:text-gray-700 transition-colors">Privasi</a></li>
                            <li><a href="#" class="hover:text-gray-700 transition-colors">Ketentuan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-6 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-3">
                <p class="text-[11px] text-gray-300">© {{ date('Y') }} Study Club. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- ── Mobile Bottom Nav ── --}}
    <nav class="fixed bottom-0 w-full flex justify-around items-center h-14 md:hidden bg-white/90 backdrop-blur-xl border-t border-gray-200 z-50">
        <a class="flex flex-col items-center text-indigo-600" href="{{ route('home') }}">
            <span class="material-symbols-outlined text-xl">home</span>
            <span class="text-[10px] font-medium mt-0.5">Beranda</span>
        </a>
        <a class="flex flex-col items-center text-gray-400 hover:text-gray-600 transition-colors" href="#">
            <span class="material-symbols-outlined text-xl">school</span>
            <span class="text-[10px] font-medium mt-0.5">Akademik</span>
        </a>
        <a class="flex flex-col items-center text-gray-400 hover:text-gray-600 transition-colors" href="#">
            <span class="material-symbols-outlined text-xl">photo_library</span>
            <span class="text-[10px] font-medium mt-0.5">Galeri</span>
        </a>
    </nav>

</body>
</html>
