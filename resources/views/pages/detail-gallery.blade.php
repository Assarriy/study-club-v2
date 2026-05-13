@extends('layouts.portal')
@section('title', 'GALERI ' . strtoupper($club->name) . ' — STUDY CLUB PORTAL')

@section('content')
<div style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    @include('pages.partials.club-header', ['activeTab' => 'gallery'])

<div style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    @include('pages.partials.club-header', ['activeTab' => 'gallery'])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                @if($galleries->isEmpty())
                    <div class="bg-white rounded-3xl border-2 border-dashed border-slate-200 py-20 text-center reveal">
                        <div class="w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center bg-slate-100">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-slate-400">Belum ada foto kegiatan.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        @foreach($galleries as $i => $gallery)
                        @php
                            $isYoutube = false;
                            $ytId = '';
                            if (Str::contains($gallery->media_path, ['youtube.com', 'youtu.be'])) {
                                $isYoutube = true;
                                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $gallery->media_path, $matches);
                                $ytId = $matches[1] ?? '';
                            }
                        @endphp

                        @if($isYoutube && $ytId)
                        {{-- YouTube Card — klik untuk embed modal --}}
                        <div class="card-lift group bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal reveal-delay-{{ $i % 2 + 1 }} cursor-pointer"
                             onclick="openYoutubeModal('{{ $ytId }}', '{{ addslashes($gallery->title ?? 'Video Kegiatan') }}')"
                             title="Tonton: {{ $gallery->title ?? 'Video Kegiatan' }}">
                            <div class="relative h-48 sm:h-56 overflow-hidden bg-slate-900">
                                <img alt="{{ $gallery->title ?? 'Video Galeri' }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out opacity-80"
                                     src="https://img.youtube.com/vi/{{ $ytId }}/hqdefault.jpg"
                                     loading="lazy"/>
                                {{-- Play Button Overlay --}}
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-7 h-7 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                {{-- YouTube badge --}}
                                <div class="absolute top-3 left-3">
                                    <span class="inline-flex items-center gap-1 bg-red-600 text-white text-[10px] font-bold px-2 py-1 rounded-lg">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-2.75 12.65 12.65 0 00-5.64 0A4.83 4.83 0 016.41 6.69a12.17 12.17 0 000 10.62 4.83 4.83 0 013.77 2.75 12.65 12.65 0 005.64 0 4.83 4.83 0 013.77-2.75 12.17 12.17 0 000-10.62zM12 15.5a3.5 3.5 0 110-7 3.5 3.5 0 010 7z"/></svg>
                                        YouTube
                                    </span>
                                </div>
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                            </div>
                            <div class="px-4 py-3 flex items-center justify-between">
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-sm font-semibold text-slate-800 truncate">{{ $gallery->title ?? 'Video Kegiatan' }}</h3>
                                    <span class="text-[10px] text-slate-400">{{ $gallery->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0 ml-2 bg-red-50">
                                    <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="border-t border-zinc-100 px-6 flex items-center gap-1 overflow-x-auto">
            <a href="{{ route('club.show', $club->slug) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Beranda</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Berita & Prestasi</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap transition-colors no-underline" style="color: var(--accent); box-shadow: inset 0 -2px 0 var(--accent);">Galeri</a>
            <a href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}" class="relative px-4 py-3 text-xs font-semibold whitespace-nowrap text-zinc-400 hover:text-zinc-700 transition-colors no-underline">Akademik</a>
        </div>
    </div>
<div style="--accent:#2563EB; --accent-light:#EFF6FF; --accent-medium:#DBEAFE; --accent-text:#1e40af; --accent-dark:#1d4ed8;">

    @include('pages.partials.club-header', ['activeTab' => 'gallery'])

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                @if($club->galleries->isEmpty())
                    <div class="bg-white rounded-3xl border-2 border-dashed border-slate-200 py-20 text-center reveal">
                        <div class="w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center bg-slate-100">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-slate-400">Belum ada foto kegiatan.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        @foreach($club->galleries as $i => $gallery)
                        <div class="card-lift group bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden reveal reveal-delay-{{ $i % 2 + 1 }}">
                            <div class="relative h-48 sm:h-56 overflow-hidden bg-slate-100">
                                <img alt="{{ $gallery->title ?? 'Galeri' }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                                     src="{{ asset('storage/' . $gallery->media_path) }}"
                                     loading="lazy"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-3 left-3 right-3 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                    <p class="text-white text-xs font-semibold truncate">{{ $gallery->title ?? 'Kegiatan '.$club->name }}</p>
                                </div>
                            </div>
                            <div class="px-4 py-3 flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-800 truncate">{{ $gallery->title ?? 'Kegiatan '.$club->name }}</h3>
                                    <span class="text-[10px] text-slate-400">{{ $gallery->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0" style="background: var(--accent-light);">
                                    <svg class="w-3.5 h-3.5" style="color: var(--accent);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="space-y-4 reveal reveal-delay-2 self-start">
                @include('pages.partials.sidebar')
            </div>
        </div>
    </div>
</div>

{{-- ── YouTube Embed Modal ── --}}
<div id="ytModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4"
     style="background: rgba(0,0,0,0.85); backdrop-filter: blur(6px);"
     onclick="closeYoutubeModal(event)">
    <div class="relative w-full max-w-3xl" onclick="event.stopPropagation()">
        {{-- Close button --}}
        <button onclick="closeYoutubeModal()"
                class="absolute -top-10 right-0 text-white/70 hover:text-white transition-colors text-sm font-semibold flex items-center gap-1.5"
                style="border:none; background:none; cursor:pointer;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            Tutup
        </button>

        {{-- Video title --}}
        <p id="ytTitle" class="text-white font-semibold text-sm mb-3 truncate"></p>

        {{-- Responsive 16:9 iframe --}}
        <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl" style="padding-top: 56.25%;">
            <iframe id="ytFrame"
                    class="absolute inset-0 w-full h-full"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
        </div>

        {{-- Open in YouTube link --}}
        <div class="mt-3 flex justify-end">
            <a id="ytLink" href="#" target="_blank"
               class="inline-flex items-center gap-1.5 text-xs font-semibold text-white/70 hover:text-white no-underline transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Buka di YouTube
            </a>
        </div>
    </div>
</div>

<script>
function openYoutubeModal(ytId, title) {
    const modal = document.getElementById('ytModal');
    const frame = document.getElementById('ytFrame');
    const titleEl = document.getElementById('ytTitle');
    const linkEl = document.getElementById('ytLink');

    frame.src = `https://www.youtube.com/embed/${ytId}?autoplay=1&rel=0`;
    titleEl.textContent = title;
    linkEl.href = `https://www.youtube.com/watch?v=${ytId}`;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeYoutubeModal(event) {
    if (event && event.target !== document.getElementById('ytModal') && event.type !== 'click') return;
    const modal = document.getElementById('ytModal');
    const frame = document.getElementById('ytFrame');

    frame.src = ''; // stop video
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
}

// Close with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeYoutubeModal();
});
</script>
@endsection
