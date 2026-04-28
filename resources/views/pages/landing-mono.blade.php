{{-- ══════════════════════════════════════════════════════════════════════════
     OPTION B: MONOCHROME LIGHT — Clean Linear-Inspired Light Mode
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
            --bg: #fafafa;
            --surface: #ffffff;
            --surface-raised: #f4f4f5;
            --border: #e4e4e7;
            --border-subtle: #f4f4f5;
            --text-primary: #09090b;
            --text-secondary: #71717a;
            --text-tertiary: #a1a1aa;
            --accent: #5b5bd6;
            --accent-hover: #4c4cc4;
            --accent-subtle: #f0f0ff;
        }
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
        }
        .fade-in { animation: fadeIn 0.6s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .club-row { transition: background 0.15s ease; }
        .club-row:hover { background: var(--surface-raised); }
    </style>
</head>
<body class="min-h-screen">

    {{-- ── Navigation ── --}}
    <nav class="sticky top-0 z-50" style="background: rgba(250,250,250,0.88); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border-bottom: 1px solid var(--border);">
        <div class="max-w-5xl mx-auto px-6">
            <div class="flex items-center justify-between h-14">
                <div class="flex items-center gap-8">
                    <a href="/" class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded flex items-center justify-center text-[10px] font-bold" style="background: var(--text-primary); color: var(--bg);">SC</div>
                        <span class="text-[13px] font-semibold tracking-tight" style="color: var(--text-primary);">Study Club</span>
                    </a>
                    <a href="#katalog" class="hidden md:block text-[13px] transition-colors" style="color: var(--text-tertiary);" onmouseenter="this.style.color='var(--text-primary)'" onmouseleave="this.style.color='var(--text-tertiary)'">Katalog</a>
                </div>
                <div class="flex items-center gap-2">
                    @auth
                        <a href="/admin" class="px-3 py-1.5 text-[12px] font-medium rounded-md transition-all" style="background: var(--text-primary); color: var(--bg);">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-1.5 text-[12px] font-medium rounded-md transition-colors" style="color: var(--text-secondary);" onmouseenter="this.style.color='var(--text-primary)'" onmouseleave="this.style.color='var(--text-secondary)'">Login</a>
                        <a href="{{ route('register') }}" class="px-3 py-1.5 text-[12px] font-medium rounded-md transition-all" style="background: var(--text-primary); color: var(--bg);">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- ── Hero ── --}}
    <section class="fade-in">
        <div class="max-w-5xl mx-auto px-6 pt-20 pb-16">
            <div class="max-w-xl">
                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full mb-6" style="background: var(--accent-subtle); border: 1px solid rgba(91,91,214,0.15);">
                    <div class="w-1.5 h-1.5 rounded-full" style="background: var(--accent);"></div>
                    <span class="text-[11px] font-medium" style="color: var(--accent);">Pendaftaran Dibuka</span>
                </div>
                <h1 class="text-[40px] md:text-[48px] font-bold tracking-[-0.03em] leading-[1.08] mb-4" style="color: var(--text-primary);">
                    Temukan Potensimu,<br>Raih Prestasimu.
                </h1>
                <p class="text-[15px] leading-relaxed mb-8" style="color: var(--text-secondary);">
                    Platform resmi manajemen kegiatan ekstrakurikuler dan study club. Pilih mentor terbaikmu, kembangkan skill spesifik, dan bangun portofolio sejak dini.
                </p>
                <div class="flex items-center gap-3">
                    @auth
                        <a href="/admin" class="inline-flex items-center gap-2 px-4 py-2 text-[13px] font-medium rounded-md transition-all hover:opacity-90" style="background: var(--text-primary); color: var(--bg);">
                            Ke Dashboard
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-4 py-2 text-[13px] font-medium rounded-md transition-all hover:opacity-90" style="background: var(--text-primary); color: var(--bg);">
                            Daftar Sekarang
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <a href="#katalog" class="inline-flex items-center px-4 py-2 text-[13px] font-medium rounded-md transition-colors" style="color: var(--text-secondary); border: 1px solid var(--border);">Lihat Katalog</a>
                    @endauth
                </div>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-0 mt-14 rounded-lg overflow-hidden" style="border: 1px solid var(--border);">
                <div class="p-5" style="background: var(--surface);">
                    <div class="text-xl font-bold tracking-tight" style="color: var(--accent);">{{ $clubs->count() }}</div>
                    <div class="text-[11px] font-medium mt-0.5" style="color: var(--text-tertiary);">Club Aktif</div>
                </div>
                <div class="p-5" style="background: var(--surface); border-left: 1px solid var(--border);">
                    <div class="text-xl font-bold tracking-tight" style="color: var(--text-primary);">15+</div>
                    <div class="text-[11px] font-medium mt-0.5" style="color: var(--text-tertiary);">Mentor Ahli</div>
                </div>
                <div class="p-5" style="background: var(--surface); border-left: 1px solid var(--border);">
                    <div class="text-xl font-bold tracking-tight" style="color: var(--text-primary);">300+</div>
                    <div class="text-[11px] font-medium mt-0.5" style="color: var(--text-tertiary);">Siswa Bergabung</div>
                </div>
                <div class="p-5" style="background: var(--surface); border-left: 1px solid var(--border);">
                    <div class="text-xl font-bold tracking-tight" style="color: var(--accent);">100%</div>
                    <div class="text-[11px] font-medium mt-0.5" style="color: var(--text-tertiary);">Gratis</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Katalog (Table-style like Linear) ── --}}
    <section id="katalog" class="fade-in">
        <div class="max-w-5xl mx-auto px-6 pb-20">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-[13px] font-semibold uppercase tracking-wider" style="color: var(--text-tertiary);">Katalog Club</h2>
                <div class="flex items-center gap-1.5 flex-wrap">
                    <button class="px-2.5 py-1 text-[11px] font-medium rounded" style="background: var(--text-primary); color: var(--bg);">Semua</button>
                    @foreach($categories as $cat)
                        <button class="px-2.5 py-1 text-[11px] font-medium rounded transition-colors" style="color: var(--text-tertiary); border: 1px solid var(--border);">{{ $cat->name }}</button>
                    @endforeach
                </div>
            </div>

            <div class="rounded-lg overflow-hidden" style="border: 1px solid var(--border);">
                {{-- Table Header --}}
                <div class="hidden md:grid grid-cols-12 gap-4 px-5 py-2.5 text-[11px] font-medium uppercase tracking-wider" style="background: var(--surface-raised); color: var(--text-tertiary); border-bottom: 1px solid var(--border);">
                    <div class="col-span-5">Club</div>
                    <div class="col-span-3">Kategori</div>
                    <div class="col-span-3">Mentor</div>
                    <div class="col-span-1"></div>
                </div>
                {{-- Rows --}}
                @forelse($clubs as $club)
                    <a href="{{ route('club.show', $club->slug) }}" class="club-row grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-4 px-5 py-3.5 items-center" style="background: var(--surface); border-bottom: 1px solid var(--border); display: grid; text-decoration: none; color: inherit;">
                        <div class="md:col-span-5 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-md flex items-center justify-center text-[11px] font-bold flex-shrink-0" style="background: var(--accent-subtle); color: var(--accent);">
                                {{ substr($club->name, 0, 2) }}
                            </div>
                            <div class="min-w-0">
                                <div class="text-[13px] font-medium truncate" style="color: var(--text-primary);">{{ $club->name }}</div>
                                <div class="text-[11px] truncate" style="color: var(--text-tertiary);">{!! Str::limit(strip_tags($club->description), 50) !!}</div>
                            </div>
                        </div>
                        <div class="md:col-span-3">
                            <span class="text-[11px] font-medium px-2 py-0.5 rounded" style="background: var(--surface-raised); color: var(--text-secondary); border: 1px solid var(--border);">{{ $club->category->name }}</span>
                        </div>
                        <div class="md:col-span-3 flex items-center gap-2">
                            <div class="w-5 h-5 rounded-full flex items-center justify-center text-[9px] font-bold flex-shrink-0" style="background: var(--surface-raised); color: var(--text-secondary);">{{ substr($club->coach->name, 0, 1) }}</div>
                            <span class="text-[12px] truncate" style="color: var(--text-secondary);">{{ $club->coach->name }}</span>
                        </div>
                        <div class="md:col-span-1 flex justify-end">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--text-tertiary);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </a>
                @empty
                    <div class="p-12 text-center" style="background: var(--surface);">
                        <p class="text-sm" style="color: var(--text-tertiary);">Belum ada club aktif saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ── CTA ── --}}
    <section class="fade-in">
        <div class="max-w-5xl mx-auto px-6 pb-20">
            <div class="rounded-lg p-8 md:p-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6" style="background: var(--surface); border: 1px solid var(--border);">
                <div>
                    <h2 class="text-lg font-semibold tracking-tight mb-1" style="color: var(--text-primary);">Siap Mengembangkan Bakatmu?</h2>
                    <p class="text-[13px]" style="color: var(--text-secondary);">Bergabunglah dan mulai perjalananmu bersama mentor terbaik.</p>
                </div>
                @auth
                    <a href="/admin" class="inline-flex items-center gap-2 px-4 py-2 text-[13px] font-medium rounded-md flex-shrink-0 transition-all hover:opacity-90" style="background: var(--text-primary); color: var(--bg);">Ke Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-4 py-2 text-[13px] font-medium rounded-md flex-shrink-0 transition-all hover:opacity-90" style="background: var(--text-primary); color: var(--bg);">Daftar Sekarang</a>
                @endauth
            </div>
        </div>
    </section>

    {{-- ── Footer ── --}}
    <footer style="border-top: 1px solid var(--border);">
        <div class="max-w-5xl mx-auto px-6 py-8">
            <div class="flex flex-col md:flex-row justify-between items-start gap-8 mb-6">
                <div class="max-w-xs">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-5 h-5 rounded flex items-center justify-center text-[9px] font-bold" style="background: var(--text-primary); color: var(--bg);">SC</div>
                        <span class="text-[12px] font-semibold" style="color: var(--text-primary);">Study Club</span>
                    </div>
                    <p class="text-[11px] leading-relaxed" style="color: var(--text-tertiary);">Sistem manajemen terpadu untuk kegiatan akademik ekstrakurikuler sekolah.</p>
                </div>
                <div class="flex gap-10">
                    <div>
                        <h4 class="text-[11px] font-semibold uppercase tracking-wider mb-2.5" style="color: var(--text-secondary);">Menu</h4>
                        <ul class="space-y-1.5">
                            <li><a href="/" class="text-[11px] transition-colors" style="color: var(--text-tertiary);">Beranda</a></li>
                            <li><a href="#katalog" class="text-[11px] transition-colors" style="color: var(--text-tertiary);">Katalog</a></li>
                            <li><a href="/admin" class="text-[11px] transition-colors" style="color: var(--text-tertiary);">Portal Admin</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-[11px] font-semibold uppercase tracking-wider mb-2.5" style="color: var(--text-secondary);">Dukungan</h4>
                        <ul class="space-y-1.5">
                            <li><a href="#" class="text-[11px] transition-colors" style="color: var(--text-tertiary);">Panduan</a></li>
                            <li><a href="#" class="text-[11px] transition-colors" style="color: var(--text-tertiary);">Hubungi Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-5 flex flex-col md:flex-row justify-between items-center gap-2" style="border-top: 1px solid var(--border);">
                <p class="text-[11px]" style="color: var(--text-tertiary);">&copy; {{ date('Y') }} Study Club. All rights reserved.</p>
                <p class="text-[11px]" style="color: var(--text-tertiary);">by <span style="color: var(--accent);">Wibowo Assariy</span></p>
            </div>
        </div>
    </footer>
</body>
</html>
