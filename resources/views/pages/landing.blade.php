@extends('layouts.portal')
@section('title', 'BERANDA — STUDY CLUB PORTAL')

@section('content')

{{-- ══ HERO ══ --}}
<section class="relative overflow-hidden bg-white border-b border-zinc-100">
    {{-- Subtle background pattern --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.03) 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full bg-blue-50/60 blur-3xl -mr-48 -mt-48"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] rounded-full bg-amber-50/40 blur-3xl -ml-32 -mb-32"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-xs font-semibold mb-6">
                    <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span></span>
                    Tahun Ajaran Baru Telah Dimulai
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-[56px] font-extrabold text-zinc-900 tracking-tight leading-[1.1] mb-6">
                    Temukan <span class="text-blue-600">Potensimu</span>,<br>
                    Raih Prestasimu.
                </h1>

                <p class="text-lg text-zinc-500 mb-10 max-w-lg leading-relaxed">
                    Platform resmi manajemen kegiatan ekstrakurikuler. Pilih mentor, kembangkan skill, dan bangun portofolio sejak dini.
                </p>

                <div class="flex items-center gap-3 flex-wrap">
                    @auth
                        <a href="/admin" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition-all shadow-md shadow-blue-600/20 no-underline">
                            Ke Dashboard
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition-all shadow-md shadow-blue-600/20 no-underline">
                            Daftar Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <a href="#katalog" class="inline-flex items-center px-6 py-3 text-sm font-semibold text-zinc-700 bg-zinc-100 rounded-xl hover:bg-zinc-200 transition-all no-underline">Lihat Katalog</a>
                    @endauth
                </div>
            </div>

            {{-- Stats Panel --}}
            <div class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-zinc-100 bg-zinc-50/50">
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-zinc-400">Ringkasan Data</h3>
                </div>
                <div class="divide-y divide-zinc-100">
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-zinc-500">Club Aktif</span>
                        <span class="text-2xl font-bold text-zinc-900 tabular-nums">{{ $clubs->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-zinc-500">Mentor Ahli</span>
                        <span class="text-2xl font-bold text-zinc-900 tabular-nums">15+</span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-zinc-500">Siswa Bergabung</span>
                        <span class="text-2xl font-bold text-zinc-900 tabular-nums">300+</span>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-sm text-zinc-500">Biaya</span>
                        <span class="text-sm font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Gratis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══ KATALOG ══ --}}
<section id="katalog" class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section header --}}
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-zinc-900 tracking-tight mb-2">Katalog Club</h2>
            <p class="text-sm text-zinc-500">Pilih dan bergabung dengan club pilihanmu</p>
        </div>

        {{-- Category filters --}}
        <div class="flex items-center gap-2 flex-wrap mb-8">
            <button class="px-4 py-2 text-xs font-semibold text-white bg-zinc-900 rounded-lg cursor-pointer border-none">Semua</button>
            @foreach($categories as $cat)
                <button class="px-4 py-2 text-xs font-semibold text-zinc-600 bg-white border border-zinc-200 rounded-lg cursor-pointer hover:border-zinc-400 hover:text-zinc-900 transition-all">{{ $cat->name }}</button>
            @endforeach
        </div>

        {{-- Club Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($clubs as $club)
                <a href="{{ route('club.show', $club->slug) }}" class="group block bg-white rounded-2xl border border-zinc-200/80 overflow-hidden shadow-sm hover:shadow-md hover:border-zinc-300 transition-all duration-300 no-underline" style="color: inherit;">

                    {{-- Banner --}}
                    <div class="h-40 overflow-hidden relative bg-zinc-100">
                        @if($club->banner_image)
                            <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-50 to-zinc-100">
                                <span class="text-5xl font-bold text-blue-200">{{ substr($club->name, 0, 2) }}</span>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex text-[10px] font-semibold px-2.5 py-1 rounded-full bg-white/90 backdrop-blur text-zinc-700 shadow-sm">{{ $club->category->name }}</span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-5">
                        <h3 class="text-base font-bold text-zinc-900 mb-1.5 group-hover:text-blue-600 transition-colors leading-snug">{{ $club->name }}</h3>
                        <p class="text-xs text-zinc-500 line-clamp-2 mb-4 leading-relaxed">
                            {{ Str::limit(strip_tags($club->description), 100) ?? 'Eksplorasi ilmu dan kembangkan potensimu.' }}
                        </p>
                        <div class="h-px bg-zinc-100 mb-4"></div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2.5">
                                <div class="w-7 h-7 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-[10px] font-bold">{{ substr($club->coach->name, 0, 1) }}</div>
                                <span class="text-xs text-zinc-500">{{ $club->coach->name }}</span>
                            </div>
                            <svg class="w-4 h-4 text-zinc-300 group-hover:text-blue-500 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-16 text-center bg-white rounded-2xl border-2 border-dashed border-zinc-200">
                    <div class="w-12 h-12 bg-zinc-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <p class="text-sm font-medium text-zinc-500">Belum ada club aktif</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ══ CTA Banner ══ --}}
<section class="pb-16 lg:pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-zinc-900 rounded-2xl overflow-hidden">
            <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.05) 1px, transparent 0); background-size: 20px 20px;"></div>
            <div class="absolute top-0 right-0 w-80 h-80 rounded-full bg-blue-600/10 blur-3xl -mr-20 -mt-20"></div>

            <div class="px-8 py-14 md:px-14 md:py-16 relative z-10 text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 tracking-tight">Siap Mengembangkan Bakatmu?</h2>
                <p class="text-zinc-400 mb-8 max-w-lg text-base leading-relaxed">Bergabunglah dan mulai perjalananmu bersama mentor-mentor terbaik.</p>
                @auth
                    <a href="/admin" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-zinc-900 bg-white rounded-xl hover:bg-zinc-100 transition-all no-underline shadow-sm">Ke Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-zinc-900 bg-white rounded-xl hover:bg-zinc-100 transition-all no-underline shadow-sm">Daftar Sekarang</a>
                @endauth
            </div>
        </div>
    </div>
</section>
@endsection
