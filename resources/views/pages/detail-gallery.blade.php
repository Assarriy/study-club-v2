@extends('layouts.portal')
@section('title', 'GALERI ' . strtoupper($club->name) . ' — STUDY CLUB PORTAL')



@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10"
     style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    <a href="{{ route('home') }}" class="group inline-flex items-center gap-1.5 text-xs font-medium text-zinc-400 hover:text-zinc-700 transition-colors mb-5 no-underline">
        <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Beranda
    </a>

    {{-- Header --}}
    <div class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden mb-6">
        <div class="px-6 py-5 flex items-center gap-4">
            @if($club->banner_image)
                <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}" class="w-20 h-20 rounded-xl object-cover ring-2 ring-zinc-100">
            @else
                <div class="w-12 h-12 rounded-xl flex items-center justify-center text-sm font-bold text-white" style="background: var(--accent);">{{ substr($club->name, 0, 2) }}</div>
            @endif
            <div>
                <h1 class="text-xl font-bold text-zinc-900 leading-tight tracking-tight">{{ $club->name }}</h1>
                <span class="text-[10px] font-semibold uppercase tracking-wider text-zinc-400">{{ $club->category->name }}</span>
            </div>
        </div>
        <div class="border-t border-zinc-100 px-6 flex items-center gap-1 overflow-x-auto">
            <a href="{{ route('club.show', $club->slug) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Beranda</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Berita & Prestasi</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap transition-colors no-underline" style="color: var(--accent); box-shadow: inset 0 -2px 0 var(--accent);">Galeri</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Akademik</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">

            @if($club->galleries->isEmpty())
                <div class="bg-white rounded-2xl border-2 border-dashed border-zinc-200 py-14 text-center">
                    <div class="w-12 h-12 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-zinc-100">
                        <svg class="w-5 h-5 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-xs font-medium text-zinc-400">Belum ada foto kegiatan.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach($club->galleries as $gallery)
                    <div class="group bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <div class="h-52 overflow-hidden bg-zinc-100">
                            <img alt="{{ $gallery->title ?? 'Galeri' }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                 src="{{ asset('storage/' . $gallery->media_path) }}"
                                 loading="lazy"/>
                        </div>
                        <div class="p-4">
                            <span class="text-[10px] font-medium text-zinc-400">{{ $gallery->created_at->format('d M Y') }}</span>
                            <h3 class="text-sm font-semibold text-zinc-800 mt-0.5">{{ $gallery->title ?? 'Kegiatan '.$club->name }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="space-y-5">
            @include('pages.partials.sidebar')
        </div>
    </div>
</div>
@endsection
