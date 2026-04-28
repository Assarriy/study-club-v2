@extends('layouts.portal')
@section('title', strtoupper($club->name) . ' — STUDY CLUB PORTAL')



@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10"
     style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    {{-- Back --}}
    <a href="{{ route('home') }}" class="group inline-flex items-center gap-1.5 text-xs font-medium text-zinc-400 hover:text-zinc-700 transition-colors mb-5 no-underline">
        <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Beranda
    </a>

    {{-- Unified Header Card --}}
    <div class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden mb-6">
        <div class="px-6 py-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                @if($club->banner_image)
                    <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}" class="w-20 h-20 rounded-xl object-cover ring-2 ring-zinc-100">
                @else
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center text-sm font-bold text-white" style="background: var(--accent);">{{ substr($club->name, 0, 2) }}</div>
                @endif
                <div>
                    <h1 class="text-xl font-bold text-zinc-900 leading-tight tracking-tight">{{ $club->name }}</h1>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="inline-flex text-[10px] font-semibold uppercase tracking-wider px-2.5 py-0.5 rounded-full" style="background: var(--accent-light); color: var(--accent-text);">{{ $club->category->name }}</span>
                        <span class="text-[10px] text-zinc-400">•</span>
                        <span class="text-[10px] font-medium text-zinc-400">Pembina: {{ $club->coach->name ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Tabs --}}
        <div class="border-t border-zinc-100 px-6 flex items-center gap-1 overflow-x-auto">
            <a href="{{ route('club.show', $club->slug) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap transition-colors no-underline" style="color: var(--accent); box-shadow: inset 0 -2px 0 var(--accent);">Beranda</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Berita & Prestasi</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Galeri</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Akademik</a>
        </div>
    </div>

    {{-- Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Main Content --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="flex items-center gap-3 px-5 py-3 text-sm font-medium bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="flex items-center gap-3 px-5 py-3 text-sm font-medium bg-red-50 border border-red-200 text-red-700 rounded-xl">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('error') }}
                </div>
            @endif

            {{-- About --}}
            <section class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden">
                <div class="flex items-center gap-2.5 px-6 py-4 border-b border-zinc-100">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: var(--accent-light);">
                        <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h2 class="text-sm font-bold text-zinc-900 tracking-tight">Tentang Kami</h2>
                </div>
                <div class="p-6 text-sm leading-[1.8] prose prose-sm max-w-none text-zinc-600">
                    @if($club->about)
                        {!! $club->about !!}
                    @else
                        {!! $club->description !!}
                    @endif
                </div>
            </section>

            {{-- Visi & Misi --}}
            @if($club->vision || $club->mission)
            <div class="space-y-5">
                @if($club->vision)
                <div class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden">
                    <div class="px-5 py-3 bg-zinc-50 border-b border-zinc-100">
                        <span class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">Visi</span>
                    </div>
                    <div class="p-5 text-sm leading-relaxed prose prose-sm max-w-none text-zinc-600">{!! $club->vision !!}</div>
                </div>
                @endif
                @if($club->mission)
                <div class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden">
                    <div class="px-5 py-3 bg-zinc-50 border-b border-zinc-100">
                        <span class="text-xs font-semibold text-zinc-500 uppercase tracking-wider">Misi</span>
                    </div>
                    <div class="p-5 text-sm leading-relaxed prose prose-sm max-w-none text-zinc-600">{!! $club->mission !!}</div>
                </div>
                @endif
            </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="space-y-5">
            @include('pages.partials.sidebar')
        </div>
    </div>
</div>
@endsection
