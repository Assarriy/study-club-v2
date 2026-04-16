@extends('layouts.portal')
@section('title', 'Galeri ' . $club->name . ' - Study Club Portal')

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
                <span class="inline-block px-4 py-1.5 bg-secondary-container text-on-secondary-container text-[10px] uppercase tracking-widest font-extrabold rounded-full w-fit mb-6 shadow-lg">DOKUMENTASI VISUAL</span>
                <h1 class="font-headline text-white text-5xl md:text-6xl font-extrabold leading-tight tracking-tight max-w-2xl">Galeri {{ $club->name }}</h1>
            </div>
        </section>

        <!-- Sub-Nav Bar -->
        <div class="flex items-center gap-10 border-b-2 border-surface-container-high overflow-x-auto hide-scroll pb-2">
            <a class="relative pb-3 text-outline hover:text-primary nav-tab-underline font-semibold whitespace-nowrap" href="{{ route('club.show', $club->slug) }}">Beranda</a>
            <a class="relative pb-3 text-outline hover:text-primary nav-tab-underline font-semibold whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}">Berita &amp; Prestasi</a>
            <a class="relative pb-3 text-primary nav-tab-active font-bold whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}">Galeri</a>
            <a class="relative pb-3 text-outline hover:text-primary nav-tab-underline font-semibold whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}">Akademik</a>
        </div>

        <!-- Section Galeri -->
        <div class="space-y-8 md:editorial-offset">
            <div class="flex items-center gap-4 mb-8">
                <div class="h-8 w-1.5 bg-secondary rounded-full"></div>
                <h2 class="text-2xl font-bold text-primary uppercase tracking-widest font-headline">Galeri Kegiatan</h2>
                <div class="h-[1px] flex-grow bg-outline-variant/30 ml-4"></div>
            </div>

            @if($club->galleries->isEmpty())
                <div class="p-8 text-center text-outline bg-surface-container-low rounded-xl border border-dashed border-outline-variant">
                    <span class="material-symbols-outlined text-4xl mb-2">image_not_supported</span>
                    <p>Belum ada foto kegiatan di klub ini.</p>
                </div>
            @else
                <div class="masonry">
                    @foreach($club->galleries as $gallery)
                    <!-- Masonry Item -->
                    <div class="masonry-item group cursor-pointer">
                        <div class="bg-surface-container-low rounded-xl overflow-hidden border border-outline-variant/10 hover:border-secondary transition-all duration-500 shadow-sm hover:shadow-lg">
                            <div class="relative overflow-hidden">
                                <img alt="{{ $gallery->title ?? 'Galeri Kegiatan' }}" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700 ease-out" src="{{ Storage::url($gallery->image) }}"/>
                                <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/10 transition-colors duration-500"></div>
                            </div>
                            <div class="p-5 bg-white">
                                <span class="text-on-surface-variant/40 font-label text-[9px] font-bold tracking-[0.2em] uppercase mb-1.5 block">{{ $gallery->created_at->format('d M Y') }}</span>
                                <h3 class="font-headline font-bold text-base text-primary group-hover:text-secondary transition-colors duration-300">{{ $gallery->title ?? 'Kegiatan '.$club->name }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
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
