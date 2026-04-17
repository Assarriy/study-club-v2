@extends('layouts.portal')
@section('title', $club->name . ' - Study Club Portal')

@section('content')
<main class="max-w-[1440px] mx-auto px-4 md:px-8 py-12 flex flex-col lg:flex-row gap-12">
    <!-- Main Content Area (Left 70%) -->
    <div class="w-full lg:w-[70%] space-y-12">
        
        <!-- Hero Banner -->
        <section class="relative h-[480px] w-full rounded-2xl overflow-hidden bg-primary shadow-2xl">
            @if($club->banner_image)
                <img class="w-full h-full object-cover mix-blend-overlay opacity-40" alt="{{ $club->name }}" src="{{ Storage::url($club->banner_image) }}"/>
            @else
                <div class="w-full h-full bg-primary-container mix-blend-overlay opacity-40"></div>
            @endif
            
            <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent flex flex-col justify-end p-8 md:p-12">
                <span class="inline-block px-4 py-1.5 bg-secondary-container text-on-secondary-container text-[10px] uppercase tracking-widest font-extrabold rounded-full w-fit mb-6 shadow-lg">
                    KLUB {{ $club->category->name ?? 'AKADEMIS' }}
                </span>
                <h1 class="font-headline text-white text-5xl md:text-6xl font-extrabold leading-tight tracking-tight max-w-2xl">
                    {{ $club->name }}
                </h1>
                <p class="text-primary-fixed text-lg md:text-xl mt-4 font-medium opacity-90 max-w-lg">
                    Membangun Masa Depan Melalui Inovasi dan Semangat Kolaborasi
                </p>
            </div>
        </section>

        <!-- Sub-Nav Bar -->
        <div class="flex items-center gap-10 border-b-2 border-surface-container-high overflow-x-auto hide-scroll pb-2">
            <a class="relative pb-3 {{ request('tab') == 'home' || !request('tab') ? 'text-primary nav-tab-active font-bold' : 'text-outline hover:text-primary nav-tab-underline font-semibold' }} whitespace-nowrap" href="{{ route('club.show', $club->slug) }}">Beranda</a>
            <a class="relative pb-3 {{ request('tab') == 'news' ? 'text-primary nav-tab-active font-bold' : 'text-outline hover:text-primary nav-tab-underline font-semibold' }} whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}">Berita &amp; Prestasi</a>
            <a class="relative pb-3 {{ request('tab') == 'gallery' ? 'text-primary nav-tab-active font-bold' : 'text-outline hover:text-primary nav-tab-underline font-semibold' }} whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}">Galeri</a>
            <a class="relative pb-3 {{ request('tab') == 'academic' ? 'text-primary nav-tab-active font-bold' : 'text-outline hover:text-primary nav-tab-underline font-semibold' }} whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}">Akademik</a>
        </div>

        <!-- Content: Tentang Kami -->
        <article class="space-y-8 md:editorial-offset">
            <h2 class="font-headline text-4xl font-bold text-primary tracking-tight">Tentang Kami</h2>
            <div class="prose prose-slate max-w-none">
                <p class="text-on-surface-variant text-xl leading-relaxed font-body opacity-90">
                    {!! nl2br(e($club->description ?? 'Belum ada deskripsi yang ditambahkan untuk klub ini.')) !!}
                </p>
            </div>
        </article>

        <!-- Visi & Misi Section -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8 md:editorial-offset">
            <!-- Visi Box -->
            <div class="bg-white p-10 rounded-2xl border border-surface-container-high shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group">
                <div class="flex items-center gap-5 mb-8">
                    <div class="p-4 bg-secondary-fixed rounded-xl text-secondary group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">visibility</span>
                    </div>
                    <h3 class="font-headline text-2xl font-bold text-primary">Visi</h3>
                </div>
                <p class="text-on-surface-variant text-lg font-body leading-relaxed">
                    Menjadi wadah pengembangan karakter, wawasan, dan prestasi siswa untuk menciptakan generasi kompeten di bidang {{ $club->name }}.
                </p>
            </div>
            
            <!-- Misi Box -->
            <div class="bg-white p-10 rounded-2xl border border-surface-container-high shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group">
                <div class="flex items-center gap-5 mb-8">
                    <div class="p-4 bg-secondary-fixed rounded-xl text-secondary group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
                    </div>
                    <h3 class="font-headline text-2xl font-bold text-primary">Misi Utama</h3>
                </div>
                <ul class="space-y-4 text-on-surface-variant text-lg font-body">
                    <li class="flex items-start gap-3">
                        <span class="text-secondary font-black text-xl">•</span>
                        <span>Membangun kompetensi teknis dan teoritis anggota.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-secondary font-black text-xl">•</span>
                        <span>Mendorong keikutsertaan aktif dalam berbagai kompetisi dan kegiatan nyata.</span>
                    </li>
                </ul>
            </div>
        </section>
        
        <!-- Jejak Prestasi (Dari backend) -->
        <section class="space-y-8 md:editorial-offset pt-12 border-t border-surface-container-high">
            <h2 class="font-headline text-3xl font-bold text-primary tracking-tight">Jejak Prestasi</h2>
            <div class="space-y-6">
                @forelse($club->achievements as $achievement)
                <div class="bg-white p-6 rounded-xl border border-surface-container shadow-sm flex flex-col md:flex-row gap-6 items-start md:items-center hover:border-secondary transition-colors">
                    <div class="bg-secondary-fixed/30 text-secondary p-4 rounded-lg flex-shrink-0">
                        <span class="material-symbols-outlined text-4xl">emoji_events</span>
                    </div>
                    <div>
                        <span class="text-xs font-bold tracking-wider text-primary mb-1 block">{{ mb_strtoupper($achievement->year) }}</span>
                        <h3 class="text-xl font-bold mb-1 text-primary">{{ $achievement->title }}</h3>
                        <p class="text-sm text-outline mb-2">{{ $achievement->level ?? 'Tingkat Nasional/Regional' }}</p>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center text-outline bg-surface-container-low rounded-xl border border-dashed border-outline-variant">
                    <span class="material-symbols-outlined text-4xl mb-2">military_tech</span>
                    <p>Klub ini sedang merintis prestasi pertamanya!</p>
                </div>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Sticky Sidebar (Right 30%) -->
    <aside class="w-full lg:w-[30%] space-y-8">
        <div class="sticky top-28 space-y-8">
            @include('pages.partials.sidebar')
        </div>
    </aside>
</main>
@endsection
