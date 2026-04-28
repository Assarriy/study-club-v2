@extends('layouts.portal')
@section('title', strtoupper($club->name) . ' — STUDY CLUB PORTAL')

@section('content')
<div style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    {{-- ── Hero Banner ── --}}
    <div class="relative h-48 sm:h-64 overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800">
        @if($club->banner_image)
            <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}"
                 class="w-full h-full object-cover opacity-40">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
        <div class="absolute inset-0 pointer-events-none opacity-20" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;"></div>

        {{-- Back button --}}
        <div class="absolute top-4 left-4 sm:left-6 lg:left-8">
            <a href="{{ route('home') }}" class="group inline-flex items-center gap-1.5 text-xs font-semibold text-white/80 hover:text-white transition-colors no-underline bg-white/10 hover:bg-white/20 backdrop-blur-sm px-3 py-2 rounded-xl border border-white/20">
                <svg class="w-3.5 h-3.5 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Beranda
            </a>
        </div>
    </div>

    {{-- ── Header Card (overlapping banner) ── --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl shadow-slate-200/60 overflow-hidden -mt-10 sm:-mt-14 relative z-10 mb-6">
            <div class="px-5 sm:px-7 py-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    @if($club->banner_image)
                        <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}"
                             class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl object-cover ring-4 ring-white shadow-lg flex-shrink-0">
                    @else
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl flex items-center justify-center text-lg font-extrabold text-white flex-shrink-0 shadow-lg"
                             style="background: linear-gradient(135deg, var(--accent), var(--accent-dark));">
                            {{ substr($club->name, 0, 2) }}
                        </div>
                    @endif
                    <div class="min-w-0">
                        <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight tracking-tight">{{ $club->name }}</h1>
                        <div class="flex items-center gap-2 mt-1.5 flex-wrap">
                            <span class="inline-flex text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full"
                                  style="background: var(--accent-light); color: var(--accent-text);">{{ $club->category->name }}</span>
                            <span class="text-[11px] text-slate-400 hidden sm:inline">Pembina: <span class="font-semibold text-slate-600">{{ $club->coach->name ?? '-' }}</span></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabs --}}
            <div class="border-t border-slate-100 px-2 sm:px-7 flex items-center overflow-x-auto scrollbar-hide">
                @php
                    $tabs = [
                        ['route' => route('club.show', $club->slug), 'label' => 'Beranda', 'active' => true],
                        ['route' => route('club.show', ['slug' => $club->slug, 'tab' => 'news']), 'label' => 'Berita & Prestasi', 'active' => false],
                        ['route' => route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']), 'label' => 'Galeri', 'active' => false],
                        ['route' => route('club.show', ['slug' => $club->slug, 'tab' => 'academic']), 'label' => 'Akademik', 'active' => false],
                    ];
                @endphp
                @foreach($tabs as $tab)
                    <a href="{{ $tab['route'] }}"
                       class="relative px-4 py-3.5 text-xs font-semibold whitespace-nowrap transition-colors no-underline flex-shrink-0 {{ $tab['active'] ? '' : 'text-slate-400 hover:text-slate-700' }}"
                       @if($tab['active']) style="color: var(--accent); box-shadow: inset 0 -2px 0 var(--accent);" @endif>
                        {{ $tab['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 pb-12">
            <div class="lg:col-span-2 space-y-5">

                @if(session('success'))
                    <div class="flex items-start gap-3 px-4 py-3.5 text-sm font-medium bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl reveal">
                        <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="flex items-start gap-3 px-4 py-3.5 text-sm font-medium bg-red-50 border border-red-200 text-red-700 rounded-2xl reveal">
                        <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ session('error') }}
                    </div>
                @endif

                {{-- About --}}
                <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal">
                    <div class="flex items-center gap-3 px-5 sm:px-6 py-4 border-b border-slate-100">
                        <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0"
                             style="background: var(--accent-light);">
                            <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h2 class="text-sm font-bold text-slate-900">Tentang Kami</h2>
                    </div>
                    <div class="p-5 sm:p-6 text-sm leading-[1.85] prose prose-sm max-w-none text-slate-600">
                        {!! $club->about ?? $club->description !!}
                    </div>
                </section>

                {{-- Visi & Misi --}}
                @if($club->vision || $club->mission)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 reveal reveal-delay-1">
                    @if($club->vision)
                    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                        <div class="px-5 py-3 border-b border-slate-100 flex items-center gap-2"
                             style="background: linear-gradient(to right, var(--accent-light), white);">
                            <div class="w-1.5 h-4 rounded-full" style="background: var(--accent);"></div>
                            <span class="text-xs font-bold uppercase tracking-wider" style="color: var(--accent-text);">Visi</span>
                        </div>
                        <div class="p-5 text-sm leading-relaxed prose prose-sm max-w-none text-slate-600">{!! $club->vision !!}</div>
                    </div>
                    @endif
                    @if($club->mission)
                    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                        <div class="px-5 py-3 border-b border-slate-100 flex items-center gap-2"
                             style="background: linear-gradient(to right, var(--accent-light), white);">
                            <div class="w-1.5 h-4 rounded-full" style="background: var(--accent);"></div>
                            <span class="text-xs font-bold uppercase tracking-wider" style="color: var(--accent-text);">Misi</span>
                        </div>
                        <div class="p-5 text-sm leading-relaxed prose prose-sm max-w-none text-slate-600">{!! $club->mission !!}</div>
                    </div>
                    @endif
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
