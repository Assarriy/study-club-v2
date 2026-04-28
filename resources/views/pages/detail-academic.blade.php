@extends('layouts.portal')
@section('title', 'AKADEMIK ' . strtoupper($club->name) . ' — STUDY CLUB PORTAL')



@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-10"
     style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    {{-- Back Link --}}
    <a href="{{ route('home') }}" class="group inline-flex items-center gap-1.5 text-xs font-medium text-zinc-400 hover:text-zinc-700 transition-colors mb-5 no-underline">
        <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Beranda
    </a>

    {{-- Unified Header Card --}}
    <div class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden mb-6">
        <div class="px-6 py-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            {{-- Club Identity --}}
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
            {{-- Quick Stats (desktop only) --}}
            <div class="hidden md:flex items-center gap-5">
                <div class="text-center">
                    <div class="text-lg font-bold text-zinc-900 leading-none tabular-nums">{{ $club->schedules ? $club->schedules->count() : 0 }}</div>
                    <div class="text-[9px] font-semibold uppercase tracking-wider text-zinc-400 mt-0.5">Jadwal</div>
                </div>
                <div class="w-px h-8 bg-zinc-100"></div>
                <div class="text-center">
                    <div class="text-lg font-bold text-zinc-900 leading-none tabular-nums">{{ $club->materials ? $club->materials->count() : 0 }}</div>
                    <div class="text-[9px] font-semibold uppercase tracking-wider text-zinc-400 mt-0.5">Materi</div>
                </div>
            </div>
        </div>
        {{-- Integrated Tab Navigation --}}
        <div class="border-t border-zinc-100 px-6 flex items-center gap-1 overflow-x-auto">
            <a href="{{ route('club.show', $club->slug) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Beranda</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Berita & Prestasi</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Galeri</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}" class="relative px-4 py-3 text-xs font-bold whitespace-nowrap transition-colors no-underline" style="color: var(--accent); box-shadow: inset 0 -2px 0 var(--accent);">Akademik</a>
        </div>
    </div>

    {{-- Schedule + Sidebar Bento --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-5">

        {{-- Schedule Card --}}
        <section class="lg:col-span-2 bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden transition-shadow duration-300 hover:shadow-md">
            <div class="flex items-center justify-between px-5 py-4 border-b border-zinc-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: var(--accent-light);">
                        <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h2 class="text-sm font-bold text-zinc-900 tracking-tight">Jadwal Kegiatan</h2>
                </div>
                @if($club->schedules && $club->schedules->isNotEmpty())
                    <span class="text-[10px] font-semibold px-2.5 py-1 rounded-full" style="background: var(--accent-light); color: var(--accent-text);">{{ $club->schedules->count() }} upcoming</span>
                @endif
            </div>

            @if($club->schedules && $club->schedules->isNotEmpty())
                {{-- Table header --}}
                <div class="hidden md:grid grid-cols-12 gap-4 px-5 py-2.5 text-[10px] font-semibold uppercase tracking-wider text-zinc-400 bg-zinc-50/80 border-b border-zinc-100">
                    <div class="col-span-3">Waktu</div>
                    <div class="col-span-3">Lokasi</div>
                    <div class="col-span-2">Jenis</div>
                    <div class="col-span-4">Aktivitas</div>
                </div>
                <div class="divide-y divide-zinc-50">
                    @foreach($club->schedules as $i => $schedule)
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-4 px-5 py-4 items-center hover:bg-zinc-50/50 transition-colors duration-200">
                            <div class="md:col-span-3 flex items-center gap-2.5">
                                <div class="w-2 h-2 rounded-full flex-shrink-0" style="background: var(--accent);"></div>
                                <span class="text-[13px] font-bold tabular-nums text-zinc-900">{{ \Carbon\Carbon::parse($schedule->schedule_time)->format('d M, H:i') }}</span>
                            </div>
                            <div class="md:col-span-3 text-[13px] text-zinc-600">{{ $schedule->location ?? 'TBD' }}</div>
                            <div class="md:col-span-2">
                                <span class="inline-flex text-[10px] font-semibold uppercase tracking-wider px-2 py-0.5 rounded-md" style="background: var(--accent-medium); color: var(--accent-text);">{{ ucfirst($schedule->type ?? 'Aktivitas') }}</span>
                            </div>
                            <div class="md:col-span-4 text-xs text-zinc-400">{{ $schedule->description ?? 'Rutin Mingguan' }}</div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="py-16 text-center">
                    <div class="w-12 h-12 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-zinc-100">
                        <svg class="w-5 h-5 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-xs font-medium text-zinc-400">Belum ada jadwal yang dijadwalkan</p>
                </div>
            @endif
        </section>

        {{-- Sidebar --}}
        <div class="space-y-5">
            @include('pages.partials.sidebar')
        </div>
    </div>

    {{-- Materials Card (Full-Width) --}}
    <section class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden transition-shadow duration-300 hover:shadow-md">
        <div class="flex items-center justify-between px-5 py-4 border-b border-zinc-100">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: var(--accent-light);">
                    <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h2 class="text-sm font-bold text-zinc-900 tracking-tight">Materi & Berkas</h2>
            </div>
            @if($club->materials && $club->materials->isNotEmpty())
                <span class="text-[10px] font-semibold px-2.5 py-1 rounded-full" style="background: var(--accent-light); color: var(--accent-text);">{{ $club->materials->count() }} file</span>
            @endif
        </div>

        @if($club->materials && $club->materials->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-zinc-100">
                @foreach($club->materials as $material)
                    <div class="flex items-center justify-between px-5 py-4 hover:bg-zinc-50/50 transition-colors duration-200 group {{ !$loop->last && $loop->iteration % 2 === 0 ? 'md:border-t md:border-zinc-100' : '' }}">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background: var(--accent-light);">
                                <svg class="w-4.5 h-4.5" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="text-sm font-semibold text-zinc-800 truncate group-hover:text-zinc-900 transition-colors">{{ $material->title }}</div>
                                <div class="text-[10px] text-zinc-400 mt-0.5">{{ $material->created_at->format('d M Y') }}</div>
                            </div>
                        </div>
                        @if($material->file_path)
                            <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="ml-3 inline-flex items-center gap-1.5 px-3.5 py-2 text-[10px] font-semibold uppercase tracking-wider rounded-lg transition-all duration-200 flex-shrink-0 hover:shadow-sm no-underline" style="background: var(--accent-light); color: var(--accent-text);">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Unduh
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-14 text-center">
                <div class="w-12 h-12 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-zinc-100">
                    <svg class="w-5 h-5 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <p class="text-xs font-medium text-zinc-400">Belum ada materi yang dibagikan</p>
            </div>
        @endif
    </section>

</div>
@endsection
