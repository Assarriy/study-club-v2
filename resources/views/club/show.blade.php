<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $club->name }} - Portal Study Club</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/"
                    class="flex items-center gap-2 text-slate-600 hover:text-brand-blue transition font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
                <div class="font-extrabold text-xl text-brand-blue">
                    Study<span class="text-brand-yellow">Club</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative h-96 bg-slate-900 overflow-hidden">
        @if($club->banner_image)
            <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}"
                class="absolute inset-0 w-full h-full object-cover opacity-50">
        @else
            <div class="absolute inset-0 opacity-30"
                style="background-color: {{ $club->category->color_theme ?? '#1E3A8A' }}; background-image: radial-gradient(circle at 2px 2px, black 1px, transparent 0); background-size: 20px 20px;">
            </div>
        @endif

        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>

        <div class="absolute bottom-0 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold text-white shadow-sm"
                        style="background-color: {{ $club->category->color_theme ?? '#1E3A8A' }}">
                        {{ $club->category->name }}
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-md">{{ $club->name }}</h1>
                <div class="flex items-center gap-4 text-slate-300">
                    <div
                        class="flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm border border-white/20">
                        <div
                            class="w-6 h-6 rounded-full bg-brand-yellow flex items-center justify-center text-brand-blue font-bold text-xs">
                            {{ substr($club->coach->name, 0, 1) }}
                        </div>
                        <span class="text-sm">Mentor: <strong
                                class="text-white">{{ $club->coach->name }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <div class="lg:col-span-2 space-y-12">

                <section class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2"
                        style="color: {{ $club->category->color_theme ?? '#1E3A8A' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Profil & Sejarah
                    </h2>
                    <div class="prose max-w-none text-slate-600 mb-8 leading-relaxed">
                        @if($club->about)
                            {!! $club->about !!}
                        @else
                            {!! $club->description !!}
                        @endif
                    </div>

                    @if($club->vision || $club->mission)
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 p-6 bg-slate-50 rounded-2xl border border-slate-100">
                            <div>
                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-brand-blue/10 text-brand-blue font-bold text-sm mb-3">
                                    Visi</div>
                                <div class="text-sm text-slate-600 prose">{!! $club->vision ?? '-' !!}</div>
                            </div>
                            <div>
                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-brand-yellow/20 text-yellow-700 font-bold text-sm mb-3">
                                    Misi</div>
                                <div class="text-sm text-slate-600 prose">{!! $club->mission ?? '-' !!}</div>
                            </div>
                        </div>
                    @endif
                </section>

                @if($club->schedules->count() > 0)
                    <section>
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Agenda & Jadwal Terdekat
                        </h2>
                        <div class="space-y-4">
                            @foreach($club->schedules as $schedule)
                                <div
                                    class="flex items-center justify-between p-5 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition">
                                    <div class="flex items-center gap-5">
                                        <div
                                            class="bg-brand-blue text-white rounded-xl text-center overflow-hidden min-w-[70px] shadow-sm">
                                            <div class="text-[10px] font-bold uppercase bg-blue-800 py-1">
                                                {{ $schedule->schedule_time->format('M') }}</div>
                                            <div class="text-2xl font-black py-2">{{ $schedule->schedule_time->format('d') }}
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-900 text-lg mb-1">{{ $schedule->title }}</h4>
                                            <div class="flex items-center gap-3 text-sm text-slate-500">
                                                <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg> {{ $schedule->schedule_time->format('H:i') }} WIB</span>
                                                <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg> {{ $schedule->location ?? 'Lokasi belum ditentukan' }}</span>
                                            </div>
                                            @if($schedule->description)
                                                <p class="text-xs text-slate-400 mt-2 line-clamp-1">{{ $schedule->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <span
                                        class="px-4 py-1 text-[10px] font-bold rounded-full uppercase tracking-widest shadow-sm hidden md:block
                                        {{ $schedule->type == 'rutin' ? 'bg-blue-50 text-brand-blue border border-blue-100' : ($schedule->type == 'lomba' ? 'bg-red-50 text-red-600 border border-red-100' : 'bg-green-50 text-green-600 border border-green-100') }}">
                                        {{ $schedule->type }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if($club->materials->count() > 0)
                    <section>
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                            Bank Materi & Unduhan
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($club->materials as $material)
                                <div
                                    class="flex items-start gap-4 p-5 bg-white border border-slate-100 rounded-2xl shadow-sm hover:border-brand-blue hover:shadow-md transition group">
                                    <div
                                        class="p-3 bg-slate-50 text-slate-400 rounded-xl group-hover:text-brand-blue group-hover:bg-brand-blue/10 transition border border-slate-100">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-bold text-slate-900 text-sm mb-1 line-clamp-1">{{ $material->title }}
                                        </h4>
                                        <p class="text-xs text-slate-500 mb-3 line-clamp-2">
                                            {{ $material->description ?? 'Modul pembelajaran' }}</p>
                                        <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-50 text-xs font-bold text-brand-blue hover:bg-brand-blue hover:text-white transition border border-slate-100">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                            </svg>
                                            Unduh File
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if($club->posts->count() > 0)
                    <section>
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                            Berita & Artikel
                        </h2>
                        <div class="space-y-4">
                            @foreach($club->posts as $post)
                                <div
                                    class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 flex gap-6 hover:shadow-md transition">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Thumbnail"
                                            class="w-32 h-32 object-cover rounded-xl flex-shrink-0">
                                    @endif
                                    <div>
                                        <p class="text-[10px] font-bold text-brand-blue mb-2 uppercase tracking-wider">
                                            {{ $post->created_at->format('d M Y') }}</p>
                                        <h3 class="text-lg font-bold text-slate-900 mb-2 leading-tight">{{ $post->title }}</h3>
                                        <div class="text-sm text-slate-500 line-clamp-2 prose">
                                            {!! strip_tags($post->content) !!}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>

            <div class="space-y-8">

                @if($club->social_links)
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
                        <h3 class="font-bold text-slate-900 mb-4">Tautan Penting</h3>
                        <div class="space-y-3">
                            @foreach($club->social_links as $platform => $url)
                                <a href="{{ $url }}" target="_blank"
                                    class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 hover:bg-slate-100 hover:text-brand-blue transition text-slate-700 text-sm font-semibold border border-slate-100">
                                    <svg class="w-5 h-5 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                        </path>
                                    </svg>
                                    {{ $platform }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($club->achievements->count() > 0)
                    <div
                        class="bg-gradient-to-br from-brand-blue to-blue-800 rounded-3xl p-6 shadow-lg text-white relative overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full blur-2xl -mr-10 -mt-10">
                        </div>
                        <div class="flex items-center gap-2 mb-6 relative z-10">
                            <svg class="w-6 h-6 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                            <h3 class="font-bold text-xl">Papan Prestasi</h3>
                        </div>
                        <div class="space-y-4 relative z-10">
                            @foreach($club->achievements as $achievement)
                                <div
                                    class="bg-white/10 rounded-xl p-4 backdrop-blur-sm border border-white/10 hover:bg-white/20 transition">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-xs font-black text-brand-yellow">{{ $achievement->year }}</span>
                                        <span
                                            class="text-[10px] font-bold px-2 py-0.5 rounded bg-green-500 text-white shadow-sm">{{ $achievement->rank }}</span>
                                    </div>
                                    <h4 class="font-bold text-sm leading-tight">{{ $achievement->title }}</h4>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($club->galleries->count() > 0)
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
                        <h3 class="font-bold text-slate-900 mb-4">Galeri Kegiatan</h3>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach($club->galleries->take(4) as $item)
                                @if($item->type === 'photo')
                                    <div class="aspect-square rounded-xl overflow-hidden bg-slate-100 shadow-inner group">
                                        <img src="{{ asset('storage/' . $item->media_path) }}" alt="Galeri"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</body>

</html>