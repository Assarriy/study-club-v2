@extends('layouts.portal')
@section('title', $post->title . ' — ' . strtoupper($club->name) . ' — STUDY CLUB PORTAL')

@section('content')
<div style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    {{-- ── Hero Banner ── --}}
    <div class="relative h-48 sm:h-64 overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800">
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                 class="w-full h-full object-cover opacity-40">
        @elseif($club->banner_image)
            <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}"
                 class="w-full h-full object-cover opacity-30">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
        <div class="absolute inset-0 pointer-events-none opacity-20" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;"></div>

        {{-- Back button --}}
        <div class="absolute top-4 left-4 sm:left-6 lg:left-8">
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}"
               class="group inline-flex items-center gap-1.5 text-xs font-semibold text-white/80 hover:text-white transition-colors no-underline bg-white/10 hover:bg-white/20 backdrop-blur-sm px-3 py-2 rounded-xl border border-white/20">
                <svg class="w-3.5 h-3.5 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Berita &amp; Prestasi
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ── Club Identity Card (overlapping banner) ── --}}
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl shadow-slate-200/60 overflow-hidden -mt-10 sm:-mt-14 relative z-10 mb-6">
            <div class="px-5 sm:px-7 py-4 flex flex-col sm:flex-row sm:items-center gap-3">
                <div class="flex items-center gap-3 flex-1 min-w-0">
                    @if($club->banner_image)
                        <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}"
                             class="w-10 h-10 rounded-xl object-cover ring-2 ring-white shadow flex-shrink-0">
                    @else
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-extrabold text-white flex-shrink-0 shadow"
                             style="background: linear-gradient(135deg, var(--accent), var(--accent-dark));">
                            {{ substr($club->name, 0, 2) }}
                        </div>
                    @endif
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <a href="{{ route('club.show', $club->slug) }}" class="text-sm font-bold text-slate-900 hover:text-blue-600 transition-colors no-underline">{{ $club->name }}</a>
                            <span class="text-slate-300 text-xs hidden sm:inline">›</span>
                            <span class="text-xs text-slate-400 hidden sm:inline">Berita &amp; Artikel</span>
                        </div>
                        <div class="flex items-center gap-2 mt-0.5">
                            <span class="inline-flex text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full"
                                  style="background: var(--accent-light); color: var(--accent-text);">{{ $club->category->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Main Content Grid ── --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 pb-12">

            {{-- Article Content --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Article Card --}}
                <article class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal">

                    {{-- Cover Image --}}
                    @if($post->image)
                        <div class="w-full h-56 sm:h-72 overflow-hidden bg-slate-100">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                 class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div class="px-5 sm:px-8 py-6 sm:py-8">

                        {{-- Meta --}}
                        <div class="flex items-center gap-2 flex-wrap mb-4">
                            <span class="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full"
                                  style="background: var(--accent-light); color: var(--accent-text);">Artikel</span>
                            <span class="text-xs text-slate-400">{{ $post->created_at->translatedFormat('d F Y') }}</span>
                            @if($post->updated_at && $post->updated_at->ne($post->created_at))
                                <span class="text-xs text-slate-300">· Diperbarui {{ $post->updated_at->translatedFormat('d F Y') }}</span>
                            @endif
                        </div>

                        {{-- Title --}}
                        <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-slate-900 leading-tight tracking-tight mb-6">
                            {{ $post->title }}
                        </h1>

                        {{-- Divider --}}
                        <div class="h-px bg-slate-100 mb-6"></div>

                        {{-- Body --}}
                        <div class="prose prose-sm sm:prose max-w-none text-slate-600 leading-[1.85]
                                    prose-headings:font-bold prose-headings:text-slate-900
                                    prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                                    prose-img:rounded-2xl prose-img:shadow-md
                                    prose-blockquote:border-l-blue-500 prose-blockquote:bg-blue-50/50 prose-blockquote:rounded-r-xl prose-blockquote:py-1 prose-blockquote:pr-4
                                    prose-code:bg-slate-100 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded-md prose-code:text-slate-700">
                            {!! $post->content !!}
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="px-5 sm:px-8 py-4 border-t border-slate-100 bg-slate-50/50 flex items-center justify-between flex-wrap gap-3">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                                 style="background: var(--accent-light);">
                                <svg class="w-3.5 h-3.5" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <span class="text-xs text-slate-500 font-medium">{{ $club->name }}</span>
                        </div>
                        <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}"
                           class="inline-flex items-center gap-1.5 text-xs font-semibold no-underline transition-colors px-3 py-1.5 rounded-xl"
                           style="background: var(--accent-light); color: var(--accent-text);">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Lihat Semua Berita
                        </a>
                    </div>
                </article>

            </div>

            {{-- Sidebar --}}
            <div class="space-y-4 reveal reveal-delay-2">
                @include('pages.partials.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection
