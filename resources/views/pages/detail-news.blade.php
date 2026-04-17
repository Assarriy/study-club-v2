@extends('layouts.portal')
@section('title', 'Berita ' . $club->name . ' - Study Club Portal')

@section('content')
<main class="max-w-[1440px] mx-auto px-4 md:px-8 py-12 flex flex-col lg:flex-row gap-12">
    <!-- Main Content Area (Left 70%) -->
    <div class="w-full lg:w-[70%] space-y-12">
        
        <!-- Hero Banner -->
        <section class="relative h-[200px] md:h-[480px] w-full rounded-2xl overflow-hidden bg-primary shadow-2xl">
            @if($club->banner_image)
                <img class="w-full h-full object-cover mix-blend-overlay opacity-40" alt="{{ $club->name }}" src="{{ Storage::url($club->banner_image) }}"/>
            @else
                <div class="w-full h-full bg-primary-container mix-blend-overlay opacity-40"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent flex flex-col justify-end p-8 md:p-12">
                <span class="inline-block px-4 py-1.5 bg-secondary-container text-on-secondary-container text-[10px] uppercase tracking-widest font-extrabold rounded-full w-fit mb-6 shadow-lg">WARTA &amp; PUBLIKASI</span>
                <h1 class="font-headline text-white text-5xl md:text-6xl font-extrabold leading-tight tracking-tight max-w-2xl">Berita {{ $club->name }}</h1>
            </div>
        </section>

        <!-- Sub-Nav Bar -->
        <div class="flex items-center gap-10 border-b-2 border-surface-container-high overflow-x-auto hide-scroll pb-2">
            <a class="relative pb-3 text-outline hover:text-primary nav-tab-underline font-semibold whitespace-nowrap" href="{{ route('club.show', $club->slug) }}">Beranda</a>
            <a class="relative pb-3 text-primary nav-tab-active font-bold whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}">Berita &amp; Prestasi</a>
            <a class="relative pb-3 text-outline hover:text-primary nav-tab-underline font-semibold whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}">Galeri</a>
            <a class="relative pb-3 text-outline hover:text-primary nav-tab-underline font-semibold whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}">Akademik</a>
        </div>

        <!-- Section Berita Utama (Dari stitch_berita) -->
        <div id="berita-utama" class="space-y-8 md:editorial-offset">
            <div class="flex items-center gap-4 mb-8">
                <div class="h-8 w-1.5 bg-secondary rounded-full"></div>
                <h2 class="text-2xl font-bold text-primary uppercase tracking-widest font-headline">Berita Utama</h2>
                <div class="h-[1px] flex-grow bg-outline-variant/30 ml-4"></div>
            </div>
            
            <div class="space-y-8">
                @forelse($club->posts as $post)
                <article class="grid md:grid-cols-[280px_1fr] gap-8 bg-surface-container-low p-6 rounded-2xl group transition-all duration-300 hover:bg-white hover:shadow-xl ring-1 ring-outline-variant/20 hover:border-secondary transition-colors">
                    <div class="overflow-hidden rounded-xl aspect-[4/3] md:aspect-square relative">
                        @if($post->image)
                            <img alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ Storage::url($post->image) }}"/>
                        @else
                            <div class="w-full h-full bg-surface-container-highest flex items-center justify-center p-4">
                                <span class="material-symbols-outlined text-outline text-5xl opacity-40">article</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-primary/10 group-hover:bg-transparent transition-colors duration-300"></div>
                    </div>
                    <div class="flex flex-col justify-center py-2">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-secondary/10 text-secondary px-2.5 py-0.5 rounded text-[10px] font-black uppercase tracking-wider">Artikel</span>
                            <span class="text-on-surface-variant/60 font-bold text-[10px] uppercase">{{ $post->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="text-2xl font-bold text-on-surface mb-4 leading-snug group-hover:text-primary transition-colors font-headline">{{ $post->title }}</h3>
                        <p class="text-on-surface-variant text-sm leading-relaxed mb-6 line-clamp-3">
                            {{ strip_tags($post->content) }}
                        </p>
                        <a class="text-primary font-bold text-xs flex items-center gap-2 group-hover:gap-4 transition-all uppercase tracking-widest" href="#">
                            Read Full Report <span class="material-symbols-outlined text-sm">east</span>
                        </a>
                    </div>
                </article>
                @empty
                <div class="p-8 text-center text-outline bg-surface-container-low rounded-xl border border-dashed border-outline-variant">
                    <span class="material-symbols-outlined text-4xl mb-2">menu_book</span>
                    <p>Belum ada warta/berita yang dipublikasikan oleh klub ini.</p>
                </div>
                @endforelse
            </div>
        </div>
        
    </div>

    <!-- Sticky Sidebar -->
    <aside class="w-full lg:w-[30%] space-y-8">
        <div class="sticky top-28 space-y-8">
            @include('pages.partials.sidebar')
        </div>
    </aside>
</main>
@endsection
