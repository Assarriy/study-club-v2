{{-- Reusable club header with banner + tabs --}}
{{-- Required: $club, $activeTab ('home'|'news'|'gallery'|'academic') --}}

{{-- ── Hero Banner ── --}}
<div class="relative h-48 sm:h-64 overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800">
    @if($club->banner_image)
        <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}"
             class="w-full h-full object-cover opacity-40">
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
    <div class="absolute inset-0 pointer-events-none opacity-20" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;"></div>

    <div class="absolute top-4 left-4 sm:left-6 lg:left-8">
        <a href="{{ route('home') }}" class="group inline-flex items-center gap-1.5 text-xs font-semibold text-white/80 hover:text-white transition-colors no-underline bg-white/10 hover:bg-white/20 backdrop-blur-sm px-3 py-2 rounded-xl border border-white/20">
            <svg class="w-3.5 h-3.5 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Beranda
        </a>
    </div>
</div>

{{-- ── Header Card ── --}}
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

            @if(isset($showStats) && $showStats)
            <div class="flex items-center gap-4 sm:gap-5">
                <div class="text-center">
                    <div class="text-2xl font-extrabold text-slate-900 tabular-nums">{{ $club->schedules ? $club->schedules->count() : 0 }}</div>
                    <div class="text-[9px] font-bold uppercase tracking-widest text-slate-400 mt-0.5">Jadwal</div>
                </div>
                <div class="w-px h-8 bg-slate-100"></div>
                <div class="text-center">
                    <div class="text-2xl font-extrabold text-slate-900 tabular-nums">{{ $club->materials ? $club->materials->count() : 0 }}</div>
                    <div class="text-[9px] font-bold uppercase tracking-widest text-slate-400 mt-0.5">Materi</div>
                </div>
            </div>
            @endif
        </div>

        {{-- Tabs --}}
        <div class="border-t border-slate-100 px-2 sm:px-7 flex items-center overflow-x-auto scrollbar-hide">
            @php
                $navTabs = [
                    ['route' => route('club.show', $club->slug), 'label' => 'Beranda', 'key' => 'home'],
                    ['route' => route('club.show', ['slug' => $club->slug, 'tab' => 'news']), 'label' => 'Berita & Prestasi', 'key' => 'news'],
                    ['route' => route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']), 'label' => 'Galeri', 'key' => 'gallery'],
                    ['route' => route('club.show', ['slug' => $club->slug, 'tab' => 'academic']), 'label' => 'Akademik', 'key' => 'academic'],
                ];
            @endphp
            @foreach($navTabs as $t)
                @php $isActive = ($activeTab ?? 'home') === $t['key']; @endphp
                <a href="{{ $t['route'] }}"
                   class="relative px-4 py-3.5 text-xs font-semibold whitespace-nowrap transition-colors no-underline flex-shrink-0 {{ $isActive ? '' : 'text-slate-400 hover:text-slate-700' }}"
                   @if($isActive) style="color: var(--accent); box-shadow: inset 0 -2px 0 var(--accent);" @endif>
                    {{ $t['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>
