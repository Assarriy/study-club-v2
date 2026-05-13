@extends('layouts.portal')
@section('title', 'BERANDA — STUDY CLUB PORTAL')

@section('content')

{{-- ══ HERO ══ --}}
<section class="relative overflow-hidden bg-white">
    {{-- Dot grid --}}
    <div class="absolute inset-0 pointer-events-none opacity-40" style="background-image: radial-gradient(circle at 1px 1px, #CBD5E1 1px, transparent 0); background-size: 28px 28px;"></div>
    {{-- Gradient blobs --}}
    <div class="absolute top-0 right-0 w-[700px] h-[700px] rounded-full pointer-events-none" style="background: radial-gradient(circle, rgba(37,99,235,0.08) 0%, transparent 70%); transform: translate(30%, -30%);"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] rounded-full pointer-events-none" style="background: radial-gradient(circle, rgba(245,158,11,0.07) 0%, transparent 70%); transform: translate(-30%, 30%);"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-20 md:pt-24 md:pb-28 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

            {{-- Left copy --}}
            <div>
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border text-xs font-semibold mb-6 reveal"
                     style="background: rgba(37,99,235,0.06); border-color: rgba(37,99,235,0.15); color: #2563EB;">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    Tahun Ajaran Baru Telah Dimulai
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-[58px] font-extrabold text-slate-900 tracking-tight leading-[1.08] mb-6 reveal reveal-delay-1">
                    Temukan<br>
                    <span class="gradient-text">Potensimu</span>,<br>
                    Raih Prestasi.
                </h1>

                <p class="text-lg text-slate-500 mb-8 max-w-md leading-relaxed reveal reveal-delay-2">
                    Platform resmi manajemen kegiatan ekstrakurikuler. Pilih mentor, kembangkan skill, dan bangun portofolio sejak dini.
                </p>

                <div class="flex items-center gap-3 flex-wrap reveal reveal-delay-3">
                    @auth
                        <a href="/admin" class="btn-glow inline-flex items-center gap-2 px-6 py-3.5 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl no-underline shadow-lg shadow-blue-500/30">
                            Ke Dashboard
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn-glow inline-flex items-center gap-2 px-6 py-3.5 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl no-underline shadow-lg shadow-blue-500/30">
                            Mulai Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <a href="#katalog" class="inline-flex items-center gap-2 px-6 py-3.5 text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-2xl no-underline transition-all duration-200">
                            Lihat Katalog
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </a>
                    @endauth
                </div>

                {{-- Trust badges --}}
                <div class="flex items-center gap-5 mt-10 reveal reveal-delay-4">
                    <div class="flex -space-x-2">
                        @foreach(['B','A','R','D'] as $i => $l)
                        <div class="w-8 h-8 rounded-full border-2 border-white flex items-center justify-center text-[10px] font-bold text-white shadow-sm"
                             style="background: {{ ['#3B82F6','#8B5CF6','#10B981','#F59E0B'][$i] }};">{{ $l }}</div>
                        @endforeach
                    </div>
                    <div>
                        <div class="text-xs font-semibold text-slate-700">300+ siswa aktif</div>
                        <div class="flex items-center gap-0.5 mt-0.5">
                            @for($i=0;$i<5;$i++)<svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>@endfor
                            <span class="text-[10px] text-slate-400 ml-1">4.9/5</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Stats card --}}
            <div class="reveal reveal-delay-2">
                <div class="relative">
                    {{-- Floating decoration --}}
                    <div class="absolute -top-4 -right-4 w-24 h-24 rounded-2xl bg-gradient-to-br from-blue-500/10 to-purple-500/10 blur-xl float-anim"></div>
                    <div class="absolute -bottom-4 -left-4 w-20 h-20 rounded-2xl bg-gradient-to-br from-amber-500/10 to-orange-500/10 blur-xl float-anim" style="animation-delay: 2s;"></div>

                    <div class="relative bg-white rounded-3xl border border-slate-200/80 shadow-xl shadow-slate-200/60 overflow-hidden">
                        {{-- Header --}}
                        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-gradient-to-r from-slate-50 to-white">
                            <span class="text-xs font-semibold uppercase tracking-widest text-slate-400">Ringkasan Platform</span>
                            <div class="flex gap-1.5">
                                <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-amber-400"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-emerald-400"></div>
                            </div>
                        </div>

                        {{-- Stats --}}
                        <div class="p-6 grid grid-cols-2 gap-4">
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl p-4 border border-blue-100">
                                <div class="text-3xl font-extrabold text-blue-700 tabular-nums mb-1">{{ $clubs->count() }}</div>
                                <div class="text-xs font-semibold text-blue-500">Club Aktif</div>
                            </div>
                            <div class="bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl p-4 border border-purple-100">
                                <div class="text-3xl font-extrabold text-purple-700 tabular-nums mb-1">{{ $categories->count() }}</div>
                                <div class="text-xs font-semibold text-purple-500">Kategori</div>
                            </div>
                            <div class="bg-gradient-to-br from-emerald-50 to-emerald-100/50 rounded-2xl p-4 border border-emerald-100">
                                <div class="text-3xl font-extrabold text-emerald-700 tabular-nums mb-1">300+</div>
                                <div class="text-xs font-semibold text-emerald-500">Siswa</div>
                            </div>
                            <div class="bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl p-4 border border-amber-100">
                                <div class="text-sm font-extrabold text-amber-700 mb-1">GRATIS</div>
                                <div class="text-xs font-semibold text-amber-500">Tanpa Biaya</div>
                            </div>
                        </div>

                        {{-- Bottom bar --}}
                        <div class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 flex items-center justify-between">
                            <span class="text-xs font-semibold text-blue-100">Daftar sekarang, gratis!</span>
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Wave divider --}}
    <div class="absolute bottom-0 left-0 right-0 pointer-events-none">
        <svg viewBox="0 0 1440 40" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-10">
            <path d="M0 40L60 33.3C120 26.7 240 13.3 360 10C480 6.7 600 13.3 720 18.3C840 23.3 960 26.7 1080 25C1200 23.3 1320 16.7 1380 13.3L1440 10V40H0Z" fill="#F8FAFC"/>
        </svg>
    </div>
</section>

{{-- ══ KATALOG ══ --}}
<section id="katalog" class="py-14 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-10 reveal">
            <span class="inline-block text-xs font-semibold uppercase tracking-widest text-blue-600 bg-blue-50 px-3 py-1 rounded-full mb-3">Eksplorasi</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Katalog Study Club</h2>
            <p class="text-slate-500 text-sm max-w-md mx-auto">Temukan club yang sesuai minat dan bergabunglah bersama ratusan siswa berprestasi.</p>
        </div>

        {{-- Category filters --}}
        <div class="flex items-center gap-2 flex-wrap justify-center mb-8 reveal" id="category-filters">
            <button data-category="all"
                class="category-btn px-4 py-2 text-xs font-semibold rounded-xl cursor-pointer transition-all duration-200 shadow-sm {{ !request('category') || request('category') == 'all' ? 'text-white bg-slate-900 border-none' : 'text-slate-600 bg-white border border-slate-200 hover:border-slate-400 hover:text-slate-900' }}">
                Semua
            </button>
            @foreach($categories as $cat)
                <button data-category="{{ $cat->id }}"
                    class="category-btn px-4 py-2 text-xs font-semibold rounded-xl cursor-pointer transition-all duration-200 shadow-sm {{ request('category') == $cat->id ? 'text-white bg-slate-900 border-none' : 'text-slate-600 bg-white border border-slate-200 hover:border-slate-400 hover:text-slate-900' }}">
                    {{ $cat->name }}
                </button>
            @endforeach
        </div>

        {{-- Club Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5" id="clubs-grid">
            @forelse($clubs as $i => $club)
                <a href="{{ route('club.show', $club->slug) }}"
                   data-category="{{ $club->category_id }}"
                   class="club-card card-lift group flex flex-col bg-white rounded-3xl border border-slate-200/80 overflow-hidden shadow-sm no-underline reveal reveal-delay-{{ min($i % 3 + 1, 4) }}"
                   style="color: inherit;">

                    {{-- Banner --}}
                    <div class="h-44 overflow-hidden relative bg-slate-100 flex-shrink-0">
                        @if($club->banner_image)
                            <img src="{{ asset('storage/' . $club->banner_image) }}" alt="{{ $club->name }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                        @else
                            <div class="w-full h-full flex items-center justify-center"
                                 style="background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);">
                                <span class="text-5xl font-extrabold text-blue-200 select-none">{{ substr($club->name, 0, 2) }}</span>
                            </div>
                        @endif
                        {{-- Overlay on hover --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        {{-- Category badge --}}
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex text-[10px] font-bold px-2.5 py-1 rounded-full bg-white/95 backdrop-blur-sm text-slate-700 shadow-sm border border-white/50">
                                {{ $club->category->name }}
                            </span>
                        </div>
                        {{-- Arrow on hover --}}
                        <div class="absolute bottom-3 right-3 w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="text-base font-bold text-slate-900 mb-1.5 group-hover:text-blue-600 transition-colors duration-200 leading-snug">{{ $club->name }}</h3>
                        <p class="text-xs text-slate-500 line-clamp-2 mb-4 leading-relaxed flex-1">
                            {{ Str::limit(strip_tags($club->description), 110) ?? 'Eksplorasi ilmu dan kembangkan potensimu.' }}
                        </p>
                        <div class="h-px bg-slate-100 mb-3.5"></div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 text-white flex items-center justify-center text-[10px] font-bold flex-shrink-0 shadow-sm">
                                    {{ substr($club->coach->name, 0, 1) }}
                                </div>
                                <span class="text-xs text-slate-500 truncate max-w-[110px]">{{ $club->coach->name }}</span>
                            </div>
                            <span class="text-[10px] font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full border border-blue-100 group-hover:bg-blue-600 group-hover:text-white transition-all duration-200">
                                Lihat →
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <p class="text-sm font-medium text-slate-400">Belum ada club aktif</p>
                </div>
            @endforelse

            <div id="no-results" class="col-span-full py-20 text-center hidden">
                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"></path></svg>
                </div>
                <p class="text-sm font-medium text-slate-400">Tidak ada club di kategori ini</p>
            </div>
        </div>

        {{-- Pagination --}}
        @if($clubs->hasPages())
            <div class="mt-12 flex justify-center reveal">
                {{ $clubs->links('partials.pagination') }}
            </div>
        @endif
    </div>
</section>

{{-- ══ CTA ══ --}}
<section class="pb-16 lg:pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden reveal" style="background: linear-gradient(135deg, #1e3a8a 0%, #2563EB 50%, #7C3AED 100%);">
            {{-- Pattern --}}
            <div class="absolute inset-0 pointer-events-none opacity-10" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;"></div>
            {{-- Glow --}}
            <div class="absolute top-0 right-0 w-80 h-80 rounded-full bg-white/5 blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-60 h-60 rounded-full bg-purple-500/20 blur-3xl -ml-10 -mb-10 pointer-events-none"></div>

            <div class="relative z-10 px-8 py-14 sm:px-14 sm:py-16 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="text-center md:text-left">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white mb-3 tracking-tight">
                        Siap Mengembangkan Bakatmu?
                    </h2>
                    <p class="text-blue-200 text-sm sm:text-base max-w-lg leading-relaxed">
                        Bergabunglah dengan ratusan siswa dan mulai perjalananmu bersama mentor-mentor terbaik.
                    </p>
                </div>
                @auth
                    <a href="/admin" class="flex-shrink-0 inline-flex items-center gap-2 px-7 py-4 text-sm font-bold text-blue-700 bg-white rounded-2xl hover:bg-blue-50 transition-all no-underline shadow-xl shadow-black/20 hover:shadow-2xl hover:-translate-y-0.5 duration-200">
                        Ke Dashboard
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @else
                    <a href="{{ route('register') }}" class="flex-shrink-0 inline-flex items-center gap-2 px-7 py-4 text-sm font-bold text-blue-700 bg-white rounded-2xl hover:bg-blue-50 transition-all no-underline shadow-xl shadow-black/20 hover:shadow-2xl hover:-translate-y-0.5 duration-200">
                        Daftar Gratis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const katalogSection = document.getElementById('katalog');
        if (!katalogSection) return;

        let isFetching = false;

        const fetchContent = async (url) => {
            if (isFetching) return;
            isFetching = true;

            try {
                const grid = document.getElementById('clubs-grid');
                if(grid) grid.style.opacity = '0.5';

                const response = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                const html = await response.text();
                
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                const newKatalog = doc.getElementById('katalog');
                if (newKatalog) {
                    katalogSection.innerHTML = newKatalog.innerHTML;
                    
                    attachListeners();
                    window.history.pushState({ path: url }, '', url);

                    const revealEls = katalogSection.querySelectorAll('.reveal');
                    revealEls.forEach(el => el.classList.add('visible'));

                    // Smooth scroll to catalog top
                    const y = katalogSection.getBoundingClientRect().top + window.scrollY - 100;
                    window.scrollTo({top: y, behavior: 'smooth'});
                }
            } catch (error) {
                console.error('Error fetching content:', error);
            } finally {
                isFetching = false;
            }
        };

        const attachListeners = () => {
            const buttons = katalogSection.querySelectorAll('.category-btn');
            buttons.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const categoryId = btn.dataset.category;
                    const currentUrl = new URL(window.location.href);
                    if (categoryId === 'all') {
                        currentUrl.searchParams.delete('category');
                    } else {
                        currentUrl.searchParams.set('category', categoryId);
                    }
                    currentUrl.searchParams.delete('page');
                    fetchContent(currentUrl.toString());
                });
            });

            const paginationLinks = katalogSection.querySelectorAll('.ajax-link');
            paginationLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    fetchContent(link.href);
                });
            });
        };

        attachListeners();

        window.addEventListener('popstate', (e) => {
            if (e.state && e.state.path) {
                fetchContent(e.state.path);
            } else {
                fetchContent(window.location.href);
            }
        });
    });
</script>
@endpush
@endsection
