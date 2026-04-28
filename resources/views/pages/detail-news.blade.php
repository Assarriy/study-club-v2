@extends('layouts.portal')
@section('title', 'BERITA ' . strtoupper($club->name) . ' — STUDY CLUB PORTAL')



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
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap transition-colors no-underline" style="color: var(--accent); box-shadow: inset 0 -2px 0 var(--accent);">Berita & Prestasi</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Galeri</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Akademik</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-5">

            {{-- Achievements Section --}}
            <section class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-100">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: var(--accent-light);">
                            <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <h2 class="text-sm font-bold text-zinc-900 tracking-tight">Jejak Prestasi</h2>
                    </div>
                    @if($club->achievements->isNotEmpty())
                        <span class="text-[10px] font-semibold px-2.5 py-1 rounded-full" style="background: var(--accent-light); color: var(--accent-text);">{{ $club->achievements->count() }} prestasi</span>
                    @endif
                </div>
                @forelse($club->achievements as $achievement)
                    <div class="flex items-center gap-4 px-6 py-4 border-b border-zinc-50 last:border-b-0 hover:bg-zinc-50/50 transition-colors">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background: var(--accent-light);">
                            <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-semibold text-zinc-800">{{ $achievement->title }}</div>
                            <div class="text-xs text-zinc-400">{{ $achievement->level ?? '' }}</div>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md" style="background: var(--accent-medium); color: var(--accent-text);">{{ $achievement->rank }}</span>
                            <span class="text-xs font-bold text-zinc-400 tabular-nums">{{ $achievement->year }}</span>
                        </div>
                    </div>
                @empty
                    <div class="py-14 text-center">
                        <div class="w-12 h-12 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-zinc-100">
                            <svg class="w-5 h-5 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <p class="text-xs font-medium text-zinc-400">Belum ada prestasi yang tercatat.</p>
                    </div>
                @endforelse
            </section>

            {{-- News Section --}}
            <section class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden">
                <div class="flex items-center gap-2.5 px-6 py-4 border-b border-zinc-100">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: var(--accent-light);">
                        <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <h2 class="text-sm font-bold text-zinc-900 tracking-tight">Berita Terbaru</h2>
                </div>

                @forelse($club->posts as $post)
                    <article class="flex gap-4 px-6 py-4 border-b border-zinc-50 last:border-b-0 hover:bg-zinc-50/50 transition-colors">
                        @if($post->image)
                            <div class="w-24 h-24 flex-shrink-0 overflow-hidden rounded-xl bg-zinc-100">
                                <img alt="{{ $post->title }}" class="w-full h-full object-cover" src="{{ asset('storage/' . $post->image) }}"/>
                            </div>
                        @else
                            <div class="w-24 h-24 flex-shrink-0 rounded-xl flex items-center justify-center" style="background: var(--accent-light);">
                                <svg class="w-6 h-6" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                            </div>
                        @endif
                        <div class="min-w-0 py-0.5">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="text-[10px] font-semibold uppercase tracking-wider px-2 py-0.5 rounded-full" style="background: var(--accent-light); color: var(--accent-text);">Artikel</span>
                                <span class="text-[10px] font-medium text-zinc-400">{{ $post->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-sm font-bold text-zinc-900 leading-snug mb-1">{{ $post->title }}</h3>
                            <p class="text-xs text-zinc-500 leading-relaxed line-clamp-2">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                        </div>
                    </article>
                @empty
                    <div class="py-14 text-center">
                        <div class="w-12 h-12 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-zinc-100">
                            <svg class="w-5 h-5 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        </div>
                        <p class="text-xs font-medium text-zinc-400">Belum ada berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </section>
        </div>

        <div class="space-y-5">
            @include('pages.partials.sidebar')
        </div>
    </div>
</div>
@endsection
