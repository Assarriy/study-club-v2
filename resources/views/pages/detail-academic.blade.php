
@extends('layouts.portal')
@section('title', 'AKADEMIK ' . strtoupper($club->name) . ' — STUDY CLUB PORTAL')

@section('content')
<div style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    @include('pages.partials.club-header', ['activeTab' => 'academic', 'showStats' => true])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">

        {{-- Schedule + Sidebar --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <section class="lg:col-span-2 bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal">
                <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0" style="background: var(--accent-light);">
                            <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h2 class="text-sm font-bold text-slate-900">Jadwal Kegiatan</h2>
                    </div>
                    @if($club->schedules && $club->schedules->isNotEmpty())
                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-full flex-shrink-0" style="background: var(--accent-light); color: var(--accent-text);">{{ $club->schedules->count() }} upcoming</span>
                    @endif
                </div>

                @if($club->schedules && $club->schedules->isNotEmpty())
                    <div class="hidden sm:grid grid-cols-12 gap-4 px-6 py-2.5 text-[10px] font-bold uppercase tracking-widest text-slate-400 bg-slate-50/80 border-b border-slate-100">
                        <div class="col-span-3">Waktu</div>
                        <div class="col-span-3">Lokasi</div>
                        <div class="col-span-2">Jenis</div>
                        <div class="col-span-4">Aktivitas</div>
                    </div>
                    <div class="divide-y divide-slate-50">
                        @foreach($club->schedules as $schedule)
                            {{-- Mobile --}}
                            <div class="sm:hidden px-5 py-4 hover:bg-slate-50/60 transition-colors">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-2 h-2 rounded-full flex-shrink-0" style="background: var(--accent);"></div>
                                    <span class="text-sm font-bold tabular-nums text-slate-900">{{ \Carbon\Carbon::parse($schedule->schedule_time)->format('d M, H:i') }}</span>
                                    <span class="ml-auto text-[10px] font-bold px-2 py-0.5 rounded-lg" style="background: var(--accent-medium); color: var(--accent-text);">{{ ucfirst($schedule->type ?? 'Aktivitas') }}</span>
                                </div>
                                <div class="text-xs text-slate-500 mb-1">📍 {{ $schedule->location ?? 'TBD' }}</div>
                                <div class="text-xs text-slate-400">{{ $schedule->description ?? 'Rutin Mingguan' }}</div>
                            </div>
                            {{-- Desktop --}}
                            <div class="hidden sm:grid grid-cols-12 gap-4 px-6 py-4 items-center hover:bg-slate-50/60 transition-colors group">
                                <div class="col-span-3 flex items-center gap-2.5">
                                    <div class="w-2 h-2 rounded-full flex-shrink-0" style="background: var(--accent);"></div>
                                    <span class="text-sm font-bold tabular-nums text-slate-900">{{ \Carbon\Carbon::parse($schedule->schedule_time)->format('d M, H:i') }}</span>
                                </div>
                                <div class="col-span-3 text-sm text-slate-600">{{ $schedule->location ?? 'TBD' }}</div>
                                <div class="col-span-2">
                                    <span class="inline-flex text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-lg" style="background: var(--accent-medium); color: var(--accent-text);">{{ ucfirst($schedule->type ?? 'Aktivitas') }}</span>
                                </div>
                                <div class="col-span-4 text-xs text-slate-400">{{ $schedule->description ?? 'Rutin Mingguan' }}</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-16 text-center">
                        <div class="w-14 h-14 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-slate-100">
                            <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-slate-400">Belum ada jadwal yang dijadwalkan</p>
                    </div>
                @endif
            </section>

            <div class="space-y-4 reveal reveal-delay-1">
                @include('pages.partials.sidebar')
            </div>
        </div>

        {{-- Materials --}}
        <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal reveal-delay-2">
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0" style="background: var(--accent-light);">
                        <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h2 class="text-sm font-bold text-slate-900">Materi & Berkas</h2>
                </div>
                @if($club->materials && $club->materials->isNotEmpty())
                    <span class="text-[10px] font-bold px-2.5 py-1 rounded-full flex-shrink-0" style="background: var(--accent-light); color: var(--accent-text);">{{ $club->materials->count() }} file</span>
                @endif
            </div>

            @if($club->materials && $club->materials->isNotEmpty())
                <div class="divide-y divide-slate-50">
                    @foreach($club->materials as $material)
                        <div class="flex items-center justify-between px-5 sm:px-6 py-4 hover:bg-slate-50/60 transition-colors group">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <div class="w-10 h-10 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-sm" style="background: var(--accent-light);">
                                    <svg class="w-4 h-4" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="text-sm font-semibold text-slate-800 truncate group-hover:text-slate-900 transition-colors">{{ $material->title }}</div>
                                    <div class="text-[10px] text-slate-400 mt-0.5">{{ $material->created_at->format('d M Y') }}</div>
                                </div>
                            </div>
                            @if($material->file_path)
                                <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank"
                                   class="ml-3 inline-flex items-center gap-1.5 px-3.5 py-2 text-[10px] font-bold uppercase tracking-wider rounded-xl transition-all flex-shrink-0 hover:shadow-md no-underline group-hover:scale-105 duration-200"
                                   style="background: var(--accent-light); color: var(--accent-text);">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    <span class="hidden sm:inline">Unduh</span>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="py-14 text-center">
                    <div class="w-14 h-14 rounded-2xl mx-auto mb-3 flex items-center justify-center bg-slate-100">
                        <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <p class="text-sm font-medium text-slate-400">Belum ada materi yang dibagikan</p>
                </div>
            @endif
        </section>
    </div>
</div>
@endsection
