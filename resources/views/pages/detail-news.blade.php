@extends('layouts.portal')
@section('title', 'BERITA ' . strtoupper($club->name) . ' — STUDY CLUB PORTAL')

@section('content')
<div style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    @include('pages.partials.club-header', ['activeTab' => 'news'])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-5">

                {{-- Achievements --}}
                <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal">
                    <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0" style="background: var(--accent-light);">
                                <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            </div>
                            <h2 class="text-sm font-bold text-slate-900">Jejak Prestasi</h2>
                        </div>
                        @if($achievements->isNotEmpty())
                            <span class="text-[10px] font-bold px-2.5 py-1 rounded-full flex-shrink-0" style="background: var(--accent-light); color: var(--accent-text);">{{ $achievements->total() }} prestasi</span>
                        @endif
                    </div>

                    @forelse($achievements as $i => $achievement)
                        <a href="{{ route('club.achievement.show', ['slug' => $club->slug, 'id' => $achievement->id]) }}" class="flex items-center gap-4 px-5 sm:px-6 py-4 border-b border-slate-50 last:border-b-0 hover:bg-slate-50/60 transition-colors group no-underline text-inherit block">
                            <div class="flex items-center gap-4 w-full">
                                <div class="w-10 h-10 rounded-2xl flex items-center justify-center flex-shrink-0 font-bold text-sm text-white shadow-sm"
                                     style="background: linear-gradient(135deg, var(--accent), var(--accent-dark));">
                                    {{ $i + 1 }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-semibold text-slate-800 group-hover:text-slate-900 transition-colors">{{ $achievement->title }}</div>
                                    <div class="text-xs text-slate-400 mt-0.5">{{ $achievement->level ?? '' }}</div>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0">
                                    <span class="text-[10px] font-bold px-2.5 py-1 rounded-lg hidden sm:inline" style="background: var(--accent-medium); color: var(--accent-text);">{{ $achievement->rank }}</span>
                                    <span class="text-xs font-bold text-slate-400 tabular-nums">{{ $achievement->year }}</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="py-14 text-center">
                            <div class="w-14 h-14 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-slate-100">
                                <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            </div>
                            <p class="text-sm font-medium text-slate-400">Belum ada prestasi yang tercatat.</p>
                        </div>
                    @endforelse

                    @if($achievements->hasPages())
                        <div class="px-5 py-4 border-t border-slate-100">
                            {{ $achievements->links() }}
                        </div>
                    @endif
                </section>

                {{-- News --}}
                <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal reveal-delay-1">
                    <div class="flex items-center gap-3 px-5 sm:px-6 py-4 border-b border-slate-100">
                        <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0" style="background: var(--accent-light);">
                            <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        </div>
                        <h2 class="text-sm font-bold text-slate-900">Berita Terbaru</h2>
                    </div>

                    @forelse($posts as $post)
                        <a href="{{ route('club.post.show', ['slug' => $club->slug, 'postSlug' => $post->slug]) }}" class="flex gap-4 px-5 sm:px-6 py-4 border-b border-slate-50 last:border-b-0 hover:bg-slate-50/60 transition-colors group no-underline text-inherit block">
                            <div class="flex gap-4 w-full">
                                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-shrink-0 overflow-hidden rounded-2xl bg-slate-100">
                                    @if($post->image)
                                        <img alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="{{ asset('storage/' . $post->image) }}"/>
                                    @else
                                        <div class="w-full h-full flex items-center justify-center" style="background: var(--accent-light);">
                                            <svg class="w-6 h-6" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0 flex-1 py-0.5">
                                    <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full" style="background: var(--accent-light); color: var(--accent-text);">Artikel</span>
                                        <span class="text-[10px] text-slate-400">{{ $post->created_at->format('d M Y') }}</span>
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-900 leading-snug mb-1 group-hover:text-blue-600 transition-colors">{{ $post->title }}</h3>
                                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-2">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="py-14 text-center">
                            <div class="w-14 h-14 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-slate-100">
                                <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                            </div>
                            <p class="text-sm font-medium text-slate-400">Belum ada berita yang dipublikasikan.</p>
                        </div>
                    @endforelse

                    @if($posts->hasPages())
                        <div class="px-5 py-4 border-t border-slate-100">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </section>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-4 reveal reveal-delay-2 self-start">
                @include('pages.partials.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection
