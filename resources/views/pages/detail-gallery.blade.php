
@extends('layouts.portal')
@section('title', 'GALERI ' . strtoupper($club->name) . ' — STUDY CLUB PORTAL')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                @if($club->galleries->isEmpty())
                    <div class="bg-white rounded-3xl border-2 border-dashed border-slate-200 py-20 text-center reveal">
                        <div class="w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center bg-slate-100">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-slate-400">Belum ada foto kegiatan.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        @foreach($club->galleries as $i => $gallery)
                        @php
                            $isYoutube = false;
                            $ytId = '';
                            if (Str::contains($gallery->media_path, ['youtube.com', 'youtu.be'])) {
                                $isYoutube = true;
                                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $gallery->media_path, $matches);
                                $ytId = $matches[1] ?? '';
                            }
                        @endphp
                        <div class="card-lift group bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal reveal-delay-{{ $i % 2 + 1 }}">
                            <div class="relative h-48 sm:h-56 overflow-hidden bg-slate-100">
                                @if($isYoutube && $ytId)
                                    <img alt="{{ $gallery->title ?? 'Video Galeri' }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                                         src="https://img.youtube.com/vi/{{ $ytId }}/hqdefault.jpg"
                                         loading="lazy"/>
                                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-10">
                                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </div>
                                @else
                                    <img alt="{{ $gallery->title ?? 'Galeri' }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                                         src="{{ asset('storage/' . $gallery->media_path) }}"
                                         loading="lazy"/>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-3 left-3 right-3 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                    <p class="text-white text-xs font-semibold truncate">{{ $gallery->title ?? 'Kegiatan '.$club->name }}</p>
                                </div>
                            </div>
                            <div class="px-4 py-3 flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-800 truncate">{{ $gallery->title ?? 'Kegiatan '.$club->name }}</h3>
                                    <span class="text-[10px] text-slate-400">{{ $gallery->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0" style="background: var(--accent-light);">
                                    <svg class="w-3.5 h-3.5" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="border-t border-zinc-100 px-6 flex items-center gap-1 overflow-x-auto">
            <a href="{{ route('club.show', $club->slug) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Beranda</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Berita & Prestasi</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap transition-colors no-underline" style="color: var(--accent); box-shadow: inset 0 -2px 0 var(--accent);">Galeri</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Akademik</a>
        </div>
    </div>
<div style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    @include('pages.partials.club-header', ['activeTab' => 'gallery'])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                @if($club->galleries->isEmpty())
                    <div class="bg-white rounded-3xl border-2 border-dashed border-slate-200 py-20 text-center reveal">
                        <div class="w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center bg-slate-100">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-slate-400">Belum ada foto kegiatan.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        @foreach($club->galleries as $i => $gallery)
                        <div class="card-lift group bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal reveal-delay-{{ $i % 2 + 1 }}">
                            <div class="relative h-48 sm:h-56 overflow-hidden bg-slate-100">
                                <img alt="{{ $gallery->title ?? 'Galeri' }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                                     src="{{ asset('storage/' . $gallery->media_path) }}"
                                     loading="lazy"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-3 left-3 right-3 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                    <p class="text-white text-xs font-semibold truncate">{{ $gallery->title ?? 'Kegiatan '.$club->name }}</p>
                                </div>
                            </div>
                            <div class="px-4 py-3 flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-800 truncate">{{ $gallery->title ?? 'Kegiatan '.$club->name }}</h3>
                                    <span class="text-[10px] text-slate-400">{{ $gallery->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0" style="background: var(--accent-light);">
                                    <svg class="w-3.5 h-3.5" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="space-y-4 reveal reveal-delay-2">
                @include('pages.partials.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection
