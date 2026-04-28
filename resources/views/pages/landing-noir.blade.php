{{-- ══════════════════════════════════════════════════════════════════════════
     OPTION A: MIDNIGHT NOIR — Dark Mode Linear-Inspired Design
     ══════════════════════════════════════════════════════════════════════════ --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Club — Portal Eksklusif</title>
    <meta name="description" content="Platform resmi manajemen kegiatan study club. Temukan potensimu, raih prestasimu.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --bg: #09090b;
            --surface: #18181b;
            --surface-raised: #1f1f23;
            --border: #27272a;
            --border-subtle: #1f1f23;
            --text-primary: #fafafa;
            --text-secondary: #a1a1aa;
            --text-tertiary: #71717a;
            --accent: #818cf8;
            --accent-hover: #6366f1;
            --accent-subtle: rgba(129,140,248,0.1);
        }
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .fade-in { animation: fadeIn 0.5s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="min-h-screen">

    {{-- ── Navigation ── --}}
    <nav class="sticky top-0 z-50 border-b" style="background: rgba(9,9,11,0.85); backdrop-filter: blur(12px); border-color: var(--border);">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between h-14">
                <a href="/" class="flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-md flex items-center justify-center text-xs font-bold" style="background: var(--accent); color: var(--bg);">SC</div>
                    <span class="text-sm font-semibold tracking-tight" style="color: var(--text-primary);">Study Club</span>
                </a>
                <div class="flex items-center gap-2">
                    @auth
                        <a href="/admin" class="px-3.5 py-1.5 text-xs font-medium rounded-md transition-colors" style="background: var(--accent); color: var(--bg);">Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="px-3.5 py-1.5 text-xs font-medium rounded-md transition-colors" style="color: var(--text-secondary); border: 1px solid var(--border);">Daftar</a>
                        <a href="{{ route('login') }}" class="px-3.5 py-1.5 text-xs font-medium rounded-md transition-colors" style="background: var(--accent); color: var(--bg);">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- ── Hero ── --}}
    <section class="fade-in">
        <div class="max-w-6xl mx-auto px-6 pt-24 pb-20">
            <div class="max-w-2xl">
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-1.5 h-1.5 rounded-full" style="background: var(--accent);"></div>
                    <span class="text-xs font-medium tracking-wide uppercase" style="color: var(--text-tertiary);">Tahun Ajaran Baru Telah Dimulai</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-[1.1] mb-5" style="color: var(--text-primary);">
                    Temukan Potensimu,<br>Raih Prestasimu.
                </h1>
                <p class="text-base leading-relaxed mb-10" style="color: var(--text-secondary);">
                    Platform resmi manajemen kegiatan ekstrakurikuler dan study club. Pilih mentor terbaikmu, kembangkan skill spesifik, dan bangun portofolio sejak dini.
                </p>
                <div class="flex items-center gap-3">
                    @auth
                        <a href="/admin" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md transition-all" style="background: var(--accent); color: var(--bg);">
                            <span>Ke Dashboard</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md transition-all" style="background: var(--accent); color: var(--bg);">
                            <span>Daftar Sekarang</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <a href="#katalog" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-md transition-all" style="color: var(--text-secondary); border: 1px solid var(--border);">Lihat Katalog</a>
                    @endauth
                </div>
            </div>

            {{-- Stats Row --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 pt-8" style="border-top: 1px solid var(--border);">
                <div>
                    <div class="text-2xl font-bold tracking-tight" style="color: var(--accent);">{{ $clubs->count() }}</div>
                    <div class="text-xs mt-1" style="color: var(--text-tertiary);">Club Aktif</div>
                </div>
                <div>
                    <div class="text-2xl font-bold tracking-tight" style="color: var(--text-primary);">15+</div>
                    <div class="text-xs mt-1" style="color: var(--text-tertiary);">Mentor Ahli</div>
                </div>
                <div>
                    <div class="text-2xl font-bold tracking-tight" style="color: var(--text-primary);">300+</div>
                    <div class="text-xs mt-1" style="color: var(--text-tertiary);">Siswa Bergabung</div>
                </div>
                <div>
                    <div class="text-2xl font-bold tracking-tight" style="color: var(--accent);">100%</div>
                    <div class="text-xs mt-1" style="color: var(--text-tertiary);">Gratis</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Katalog ── --}}
    <section id="katalog" class="fade-in">
        <div class="max-w-6xl mx-auto px-6 pb-24">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-lg font-semibold tracking-tight" style="color: var(--text-primary);">Katalog Club</h2>
                <div class="flex items-center gap-2 flex-wrap">
                    <button class="px-3 py-1.5 text-xs font-medium rounded-md" style="background: var(--accent); color: var(--bg);">Semua</button>
                    @foreach($categories as $cat)
                        <button class="px-3 py-1.5 text-xs font-medium rounded-md transition-colors" style="color: var(--text-tertiary); border: 1px solid var(--border);">{{ $cat->name }}</button>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px rounded-lg overflow-hidden" style="background: var(--border);">
                @forelse($clubs as $club)
                    <a href="{{ route('club.show', $club->slug) }}" class="group p-5 transition-colors" style="background: var(--surface);" onmouseenter="this.style.background='var(--surface-raised)'" onmouseleave="this.style.background='var(--surface)'">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center text-sm font-bold" style="background: var(--accent-subtle); color: var(--accent);">
                                {{ substr($club->name, 0, 2) }}
                            </div>
                            <span class="text-[10px] font-medium px-2 py-0.5 rounded-full" style="color: var(--accent); border: 1px solid var(--border);">
                                {{ $club->category->name }}
                            </span>
                        </div>
                        <h3 class="text-sm font-semibold mb-1.5 transition-colors" style="color: var(--text-primary);">{{ $club->name }}</h3>
                        <p class="text-xs leading-relaxed line-clamp-2 mb-4" style="color: var(--text-tertiary);">
                            {!! strip_tags($club->description) ?? 'Eksplorasi ilmu dan kembangkan potensimu.' !!}
                        </p>
                        <div class="flex items-center gap-2 pt-3" style="border-top: 1px solid var(--border);">
                            <div class="w-5 h-5 rounded-full flex items-center justify-center text-[10px] font-bold" style="background: var(--accent-subtle); color: var(--accent);">
                                {{ substr($club->coach->name, 0, 1) }}
                            </div>
                            <span class="text-[11px]" style="color: var(--text-tertiary);">{{ $club->coach->name }}</span>
                            <svg class="w-3.5 h-3.5 ml-auto opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--accent);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full p-16 text-center" style="background: var(--surface);">
                        <p class="text-sm" style="color: var(--text-tertiary);">Belum ada club aktif saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ── CTA ── --}}
    <section class="fade-in">
        <div class="max-w-6xl mx-auto px-6 pb-24">
            <div class="rounded-lg p-10 text-center" style="background: var(--surface); border: 1px solid var(--border);">
                <h2 class="text-xl font-semibold tracking-tight mb-3" style="color: var(--text-primary);">Siap Mengembangkan Bakatmu?</h2>
                <p class="text-sm mb-6 max-w-md mx-auto" style="color: var(--text-secondary);">Bergabunglah sekarang dan mulai perjalananmu bersama mentor-mentor terbaik.</p>
                @auth
                    <a href="/admin" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium rounded-md" style="background: var(--accent); color: var(--bg);">Ke Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium rounded-md" style="background: var(--accent); color: var(--bg);">Daftar Sekarang</a>
                @endauth
            </div>
        </div>
    </section>

    {{-- ── Footer ── --}}
    <footer style="border-top: 1px solid var(--border);">
        <div class="max-w-6xl mx-auto px-6 py-10">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-8">
                <div class="max-w-sm">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-6 h-6 rounded flex items-center justify-center text-[10px] font-bold" style="background: var(--accent); color: var(--bg);">SC</div>
                        <span class="text-sm font-semibold" style="color: var(--text-primary);">Study Club</span>
                    </div>
                    <p class="text-xs leading-relaxed" style="color: var(--text-tertiary);">Sistem manajemen terpadu untuk mendata, mengelola, dan memonitoring kegiatan akademik ekstrakurikuler sekolah.</p>
                </div>
                <div class="flex gap-8">
                    <div>
                        <h4 class="text-xs font-semibold uppercase tracking-wider mb-3" style="color: var(--text-secondary);">Menu</h4>
                        <ul class="space-y-2">
                            <li><a href="/" class="text-xs transition-colors" style="color: var(--text-tertiary);">Beranda</a></li>
                            <li><a href="#katalog" class="text-xs transition-colors" style="color: var(--text-tertiary);">Katalog</a></li>
                            <li><a href="/admin" class="text-xs transition-colors" style="color: var(--text-tertiary);">Portal Admin</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xs font-semibold uppercase tracking-wider mb-3" style="color: var(--text-secondary);">Dukungan</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-xs transition-colors" style="color: var(--text-tertiary);">Panduan</a></li>
                            <li><a href="#" class="text-xs transition-colors" style="color: var(--text-tertiary);">Hubungi Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-6 flex flex-col md:flex-row justify-between items-center gap-3" style="border-top: 1px solid var(--border);">
                <p class="text-[11px]" style="color: var(--text-tertiary);">&copy; {{ date('Y') }} Study Club. All rights reserved.</p>
                <p class="text-[11px]" style="color: var(--text-tertiary);">by <span style="color: var(--accent);">Wibowo Assariy</span></p>
            </div>
        </div>
    </footer>
</body>
</html>
