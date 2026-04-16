@extends('layouts.portal')
@section('title', 'Beranda - Study Club Portal')

@section('content')
<main>
    <!-- Hero Section -->
    <section class="relative bg-primary-container min-h-[520px] flex items-center overflow-hidden">
        <div class="absolute inset-0 hero-pattern"></div>
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-black/20 to-transparent"></div>
        <div class="container mx-auto px-4 md:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center flex flex-col items-center relative">
                <span class="text-secondary font-headline font-bold tracking-[0.2em] text-xs uppercase mb-6 block">PORTAL EKSKLUSIF</span>
                <h1 class="text-white font-headline font-extrabold text-5xl md:text-7xl leading-[1.1] mb-8 relative z-10">
                    Temukan dan <br/> <span class="text-secondary">Kembangkan Potensimu</span>
                </h1>
                <div class="absolute -right-8 top-0 hidden lg:block z-0">
                    <div class="w-32 h-32 bg-secondary/10 rounded-full blur-3xl animate-float-gentle"></div>
                    <div class="absolute inset-0 flex items-center justify-center animate-float-gentle" style="animation-delay: -1s;">
                        <div class="w-12 h-12 border-2 border-secondary/20 rounded-xl rotate-45"></div>
                    </div>
                </div>
                <p class="text-white/80 text-lg max-w-xl mx-auto mb-12 font-body leading-relaxed relative z-10">
                    Bergabunglah dengan komunitas akademik dan kreatif terbaik. Tingkatkan kompetensi melalui kurikulum berbasis riset dan praktik langsung.
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-24 bg-surface">
        <div class="container mx-auto px-4 md:px-8">
            <div class="flex flex-col items-center text-center mb-16 gap-3">
                <h2 class="text-primary font-headline font-bold text-4xl">Klub Pilihan</h2>
                <p class="text-on-surface-variant font-body text-lg">Eksplorasi minatmu dengan dukungan fasilitas modern.</p>
            </div>

            <!-- Club Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($clubs as $club)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-figma hover:shadow-figma-hover hover:translate-y-[-12px] smooth-transition flex flex-col h-full">
                    <div class="relative h-64 overflow-hidden">
                        @if($club->banner_image)
                            <img class="w-full h-full object-cover smooth-transition group-hover:scale-105" alt="{{ $club->name }}" src="{{ Storage::url($club->banner_image) }}"/>
                        @else
                            <div class="w-full h-full bg-primary-fixed flex items-center justify-center smooth-transition group-hover:scale-105">
                                <span class="material-symbols-outlined text-border-primary text-6xl opacity-50">science</span>
                            </div>
                        @endif
                        <div class="absolute top-5 right-5 px-3 py-1.5 bg-green-500/90 backdrop-blur-md text-white text-[10px] font-extrabold uppercase tracking-widest rounded-lg flex items-center gap-1.5 shadow-sm">
                            <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span> Aktif
                        </div>
                    </div>
                    
                    <div class="p-8 flex-1 flex flex-col">
                        <span class="text-secondary font-label text-[10px] font-extrabold tracking-[0.2em] uppercase mb-2 block">{{ $club->category->name ?? 'UMUM' }}</span>
                        <h3 class="text-primary font-headline font-bold text-2xl mb-1">{{ $club->name }}</h3>
                        <p class="text-outline font-label text-sm mb-6">{{ '@' . $club->slug }}</p>
                        
                        <p class="text-on-surface-variant font-body text-sm mb-10 leading-relaxed line-clamp-3">
                            {{ e($club->description ?? 'Wadah pengembangan kreativitas dan inovasi di bidang '.$club->name) }}
                        </p>
                        
                        <a href="{{ route('club.show', $club->slug) }}" class="mt-auto w-full py-3.5 border-2 border-primary text-primary text-center block font-headline font-bold rounded-xl hover:bg-primary hover:text-white smooth-transition active:scale-95">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-12 text-center text-outline">
                    <span class="material-symbols-outlined text-6xl mb-4">search_off</span>
                    <p class="font-body text-lg">Belum ada klub yang tersedia/aktif saat ini.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection
