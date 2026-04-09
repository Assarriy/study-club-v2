<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Study Club Terpadu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-slate-800 antialiased selection:bg-brand-yellow selection:text-brand-blue">

    <nav class="fixed w-full z-50 top-0 transition-all duration-300 glass-card shadow-sm shadow-slate-200/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3 cursor-pointer">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-brand-blue to-blue-600 rounded-xl flex items-center justify-center text-white font-extrabold text-2xl shadow-lg shadow-blue-500/30 transform hover:rotate-6 transition">
                        SC
                    </div>
                    <div>
                        <div class="font-extrabold text-2xl tracking-tight text-brand-blue leading-none">
                            Study<span class="text-brand-yellow">Club</span>
                        </div>
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Sistem Terpadu
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <a href="#katalog"
                        class="hidden md:block text-slate-600 hover:text-brand-blue font-semibold transition">Katalog
                        Club</a>
                    <a href="#benefit"
                        class="hidden md:block text-slate-600 hover:text-brand-blue font-semibold transition">Benefit</a>
                    <div class="h-6 w-px bg-slate-300 hidden md:block"></div>
                    <a href="/admin"
                        class="group relative px-6 py-2.5 font-bold text-white rounded-full overflow-hidden bg-brand-blue hover:shadow-lg hover:shadow-blue-500/30 transition-all">
                        <span class="relative z-10 group-hover:text-white">Masuk Portal</span>
                        <div
                            class="absolute inset-0 h-full w-0 bg-brand-yellow transition-all duration-300 ease-out group-hover:w-full z-0">
                        </div>
                        <span
                            class="absolute inset-0 flex items-center justify-center z-10 text-brand-blue opacity-0 group-hover:opacity-100 transition-opacity duration-300">Masuk
                            Portal</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div
                class="absolute -top-[10%] -right-[5%] w-[500px] h-[500px] rounded-full bg-gradient-to-br from-brand-yellow/20 to-brand-blue/5 blur-3xl mix-blend-multiply">
            </div>
            <div
                class="absolute top-[20%] -left-[10%] w-[600px] h-[600px] rounded-full bg-gradient-to-tr from-blue-400/10 to-transparent blur-3xl mix-blend-multiply">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-slate-200 shadow-sm text-slate-600 font-semibold text-sm mb-8 animate-bounce"
                style="animation-duration: 3s;">
                <span class="flex h-3 w-3 relative">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-yellow opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-brand-yellow"></span>
                </span>
                Tahun Ajaran Baru Telah Dimulai!
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-slate-900 tracking-tight mb-8">
                Temukan <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-brand-blue to-blue-500">Potensimu</span>,<br>
                Raih Prestasimu.
            </h1>

            <p class="text-lg md:text-xl text-slate-500 max-w-3xl mx-auto mb-12 leading-relaxed">
                Platform resmi manajemen kegiatan ekstrakurikuler dan study club. Pilih mentor terbaikmu, kembangkan
                *skill* spesifik, dan bangun portofolio sejak dini.
            </p>

            <div
                class="max-w-3xl mx-auto bg-white p-2 rounded-full shadow-xl shadow-slate-200/50 border border-slate-100 flex items-center mb-16 transform transition hover:scale-[1.02]">
                <div class="pl-6 text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" placeholder="Cari club matematika, bahasa, atau IT..."
                    class="w-full py-4 px-4 outline-none text-slate-700 bg-transparent placeholder-slate-400 font-medium">
                <button
                    class="bg-brand-blue text-white px-8 py-4 rounded-full font-bold hover:bg-blue-800 transition shadow-md">
                    Cari Club
                </button>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto border-t border-slate-200 pt-10">
                <div>
                    <div class="text-4xl font-black text-brand-blue">{{ $clubs->count() }}</div>
                    <div class="text-sm font-semibold text-slate-500 mt-1">Club Aktif</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-brand-blue">15+</div>
                    <div class="text-sm font-semibold text-slate-500 mt-1">Mentor Ahli</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-brand-blue">300+</div>
                    <div class="text-sm font-semibold text-slate-500 mt-1">Siswa Bergabung</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-brand-yellow">100%</div>
                    <div class="text-sm font-semibold text-slate-500 mt-1">Gratis</div>
                </div>
            </div>
        </div>
    </div>

    <div id="katalog" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 mt-10">
        <div class="flex flex-wrap items-center justify-center gap-3">
            <button class="px-6 py-2.5 rounded-full bg-brand-blue text-white font-bold shadow-md">Semua Club</button>
            @foreach($categories as $cat)
                <button
                    class="px-6 py-2.5 rounded-full bg-white border border-slate-200 text-slate-600 font-semibold hover:border-brand-blue hover:text-brand-blue transition shadow-sm">
                    {{ $cat->name }}
                </button>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($clubs as $club)
                <a href="{{ route('club.show', $club->slug) }}"
                    class="bg-white rounded-3xl shadow-lg shadow-slate-200/40 border border-slate-100 overflow-hidden group hover:-translate-y-2 transition-all duration-300 flex flex-col h-full relative block">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-brand-yellow/20 to-transparent rounded-bl-full z-0">
                    </div>

                    <div class="h-56 relative overflow-hidden bg-slate-50 m-2 rounded-2xl">
                        @if($club->banner_image)
                            <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="absolute inset-0 opacity-10"
                                style="background-color: {{ $club->category->color_theme ?? '#1E3A8A' }}; background-image: radial-gradient(circle at 2px 2px, black 1px, transparent 0); background-size: 16px 16px;">
                            </div>
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-7xl font-black opacity-10"
                                    style="color: {{ $club->category->color_theme ?? '#1E3A8A' }}">
                                    {{ substr($club->name, 0, 2) }}
                                </span>
                            </div>
                        @endif

                        <div class="absolute top-4 left-4 px-4 py-1.5 glass-card rounded-full text-xs font-bold shadow-sm flex items-center gap-2"
                            style="color: {{ $club->category->color_theme ?? '#1E3A8A' }}">
                            <div class="w-2 h-2 rounded-full"
                                style="background-color: {{ $club->category->color_theme ?? '#1E3A8A' }}"></div>
                            {{ $club->category->name }}
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-grow z-10">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-brand-blue transition-colors">
                            {{ $club->name }}</h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-3 flex-grow leading-relaxed">
                            {!! strip_tags($club->description) ?? 'Eksplorasi ilmu dan kembangkan potensimu bersama kami di club ini.' !!}
                        </p>

                        <div class="pt-5 border-t border-slate-100 flex items-center justify-between mt-auto">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-blue to-blue-400 text-white flex items-center justify-center font-bold border-2 border-white shadow-md">
                                        {{ substr($club->coach->name, 0, 1) }}
                                    </div>
                                    <div
                                        class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full">
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Mentor</p>
                                    <p class="font-bold text-slate-800 text-sm">{{ $club->coach->name }}</p>
                                </div>
                            </div>

                            <button
                                class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-brand-blue group-hover:text-white transition-colors border border-slate-200 group-hover:border-transparent">
                                <svg class="w-5 h-5 transform -rotate-45 group-hover:rotate-0 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Kelas Aktif</h3>
                    <p class="text-slate-500">Silakan hubungi administrator untuk membuka pendaftaran club baru.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div
            class="bg-gradient-to-br from-brand-blue to-blue-900 rounded-3xl p-10 lg:p-16 text-center relative overflow-hidden shadow-2xl">
            <div
                class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-brand-yellow rounded-full opacity-20 blur-2xl">
            </div>
            <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white rounded-full opacity-10 blur-2xl">
            </div>

            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 relative z-10">Siap Mengembangkan Bakatmu?
            </h2>
            <p class="text-blue-100 mb-10 max-w-2xl mx-auto text-lg relative z-10">
                Jangan lewatkan kesempatan untuk belajar hal baru, bertemu teman sehobi, dan dibimbing oleh
                mentor-mentor hebat.
            </p>
            <a href="/admin"
                class="inline-block bg-brand-yellow text-brand-blue font-black px-10 py-4 rounded-full text-lg hover:bg-white transition-colors shadow-xl shadow-yellow-500/20 relative z-10">
                Daftar Sekarang
            </a>
        </div>
    </div>

    <footer class="bg-white border-t border-slate-200 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div
                            class="w-8 h-8 bg-brand-blue rounded-lg flex items-center justify-center text-white font-bold text-sm">
                            SC</div>
                        <div class="font-extrabold text-xl text-brand-blue">
                            Study<span class="text-brand-yellow">Club</span>
                        </div>
                    </div>
                    <p class="text-slate-500 max-w-sm mb-6">
                        Sistem manajemen terpadu untuk mendata, mengelola, dan memonitoring kegiatan akademik
                        ekstrakurikuler sekolah secara efisien.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-4">Menu Cepat</h4>
                    <ul class="space-y-3 text-slate-500">
                        <li><a href="#" class="hover:text-brand-blue transition">Beranda</a></li>
                        <li><a href="#katalog" class="hover:text-brand-blue transition">Katalog Club</a></li>
                        <li><a href="/admin" class="hover:text-brand-blue transition">Portal Login</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-4">Dukungan</h4>
                    <ul class="space-y-3 text-slate-500">
                        <li><a href="#" class="hover:text-brand-blue transition">Panduan Pengguna</a></li>
                        <li><a href="#" class="hover:text-brand-blue transition">Hubungi Admin</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-100 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-400 text-sm font-medium">
                    &copy; {{ date('Y') }} Sistem Study Club. All rights reserved.
                </p>
                <p class="text-slate-400 text-sm font-medium">
                    Developed with 💻 by <span class="text-brand-blue font-bold">Wibowo Assariy</span>
                </p>
            </div>
        </div>
    </footer>

</body>

</html>