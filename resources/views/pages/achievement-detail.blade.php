@extends('layouts.portal')
@section('title', $achievement->title . ' — STUDY CLUB PORTAL')

@section('content')
<div style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    {{-- Hero Banner --}}
    <div class="relative h-48 sm:h-64 overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800">
        @if($club->banner_image)
            <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}"
                 class="w-full h-full object-cover opacity-40">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
        <div class="absolute inset-0 pointer-events-none opacity-20" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;"></div>

        {{-- Back button --}}
        <div class="absolute top-4 left-4 sm:left-6 lg:left-8">
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}" class="group inline-flex items-center gap-1.5 text-xs font-semibold text-white/80 hover:text-white transition-colors no-underline bg-white/10 hover:bg-white/20 backdrop-blur-sm px-3 py-2 rounded-xl border border-white/20">
                <svg class="w-3.5 h-3.5 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Jejak Prestasi
            </a>
        </div>
    </div>

    {{-- Content --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 sm:-mt-16 relative z-10 pb-20">
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl shadow-slate-200/60 overflow-hidden reveal">

            {{-- Cover Image --}}
            @if($achievement->image)
                <div class="w-full h-56 sm:h-72 lg:h-96 overflow-hidden bg-slate-100">
                    <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                         class="w-full h-full object-cover">
                </div>
            @endif

            <div class="p-6 sm:p-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="inline-flex text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full"
                          style="background: var(--accent-light); color: var(--accent-text);">Prestasi</span>
                    <span class="text-sm font-semibold text-slate-400">Tahun {{ $achievement->year }}</span>
                </div>
                
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 leading-tight tracking-tight mb-4">{{ $achievement->title }}</h1>
                
                <div class="flex flex-wrap items-center gap-3 mb-8">
                    @if($achievement->rank)
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold" style="background: var(--accent); color: white;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            Peringkat: {{ $achievement->rank }}
                        </div>
                    @endif
                    @if($achievement->level)
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold" style="background: var(--accent-light); color: var(--accent-text);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Tingkat: {{ $achievement->level }}
                        </div>
                    @endif
                </div>

                @if($achievement->description)
                    <div class="prose prose-sm sm:prose-base max-w-none text-slate-600 leading-relaxed">
                        {!! nl2br(e($achievement->description)) !!}
                    </div>
                @else
                    <div class="py-10 text-center">
                        <div class="w-14 h-14 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-slate-50">
                            <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-slate-400">Tidak ada deskripsi detail untuk prestasi ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
