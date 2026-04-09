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

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/" class="flex items-center gap-2 text-slate-600 hover:text-brand-blue transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="font-bold">Kembali ke Katalog</span>
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
            <div class="absolute inset-0 opacity-20"
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
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4">{{ $club->name }}</h1>
                <div class="flex items-center gap-4 text-slate-300">
                    <div class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-white font-bold text-xs">
                            {{ substr($club->coach->name, 0, 1) }}
                        </div>
                        <span>Mentor: <strong class="text-white">{{ $club->coach->name }}</strong></span>
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
                        Profil Club
                    </h2>
                    <div class="prose max-w-none text-slate-600 mb-8">
                        @if($club->about)
                            {!! $club->about !!}
                        @else
                            {!! $club->description !!}
                        @endif
                    </div>

                    @if($club->vision || $club->mission)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 p-6 bg-slate-50 rounded-2xl">
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Visi</h3>
                                <div class="text-sm text-slate-600 prose">{!! $club->vision ?? '-' !!}</div>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Misi</h3>
                                <div class="text-sm text-slate-600 prose">{!! $club->mission ?? '-' !!}</div>
                            </div>
                        </div>
                    @endif
                </section>

                @if($club->posts->count() > 0)
                    <section>
                        <h2 class="text-2xl font-bold text-slate-900 mb-6">Berita & Pengumuman</h2>
                        <div class="space-y-4">
                            @foreach($club->posts as $post)
                                <div
                                    class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 flex gap-6 hover:shadow-md transition">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Thumbnail"
                                            class="w-32 h-32 object-cover rounded-xl flex-shrink-0">
                                    @endif
                                    <div>
                                        <p class="text-xs font-bold text-brand-blue mb-1">
                                            {{ $post->created_at->format('d M Y') }}</p>
                                        <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $post->title }}</h3>
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
                                    class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 hover:bg-slate-100 transition text-slate-700 text-sm font-semibold border border-slate-100">
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
                    <div class="bg-gradient-to-br from-brand-blue to-blue-800 rounded-3xl p-6 shadow-lg text-white">
                        <div class="flex items-center gap-2 mb-6">
                            <svg class="w-6 h-6 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                            <h3 class="font-bold text-xl">Papan Prestasi</h3>
                        </div>
                        <div class="space-y-4">
                            @foreach($club->achievements as $achievement)
                                <div class="bg-white/10 rounded-xl p-4 backdrop-blur-sm border border-white/10">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-xs font-black text-brand-yellow">{{ $achievement->year }}</span>
                                        <span
                                            class="text-[10px] font-bold px-2 py-0.5 rounded bg-green-500 text-white">{{ $achievement->rank }}</span>
                                    </div>
                                    <h4 class="font-bold text-sm">{{ $achievement->title }}</h4>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($club->galleries->count() > 0)
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
                        <h3 class="font-bold text-slate-900 mb-4">Galeri Kegiatan</h3>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($club->galleries->take(4) as $item)
                                @if($item->type === 'photo')
                                    <div class="aspect-square rounded-lg overflow-hidden bg-slate-100">
                                        <img src="{{ asset('storage/' . $item->media_path) }}" alt="Galeri"
                                            class="w-full h-full object-cover hover:scale-110 transition-transform">
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