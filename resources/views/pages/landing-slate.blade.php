{{-- ══════════════════════════════════════════════════════════════════════════
     OPTION C: SLATE DEPTH — Warm Neutral Linear-Inspired Design
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
            --bg: #f8fafc;
            --surface: #ffffff;
            --surface-raised: #f1f5f9;
            --border: #e2e8f0;
            --border-subtle: #f1f5f9;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --text-tertiary: #94a3b8;
            --accent: #0f172a;
            --accent-highlight: #f59e0b;
            --accent-highlight-subtle: #fffbeb;
        }
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
        }
        .fade-in { animation: fadeIn 0.5s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        .card-hover { transition: box-shadow 0.2s ease, border-color 0.2s ease; }
        .card-hover:hover { box-shadow: 0 1px 3px rgba(0,0,0,0.06); border-color: #cbd5e1; }
    </style>
</head>
<body class="min-h-screen">

    {{-- ── Navigation ── --}}
    <nav class="sticky top-0 z-50" style="background: rgba(248,250,252,0.9); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border-bottom: 1px solid var(--border);">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between h-14">
                <div class="flex items-center gap-8">
                    <a href="/" class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-md flex items-center justify-center text-[10px] font-bold" style="background: var(--accent); color: white;">SC</div>
                        <span class="text-[13px] font-semibold tracking-tight" style="color: var(--text-primary);">Study Club</span>
                    </a>
                    <div class="hidden md:flex items-center gap-5">
                        <a href="#katalog" class="text-[13px] transition-colors" style="color: var(--text-tertiary);" onmouseenter="this.style.color='var(--text-primary)'" onmouseleave="this.style.color='var(--text-tertiary)'">Katalog</a>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    @auth
                        <a href="/admin" class="px-3.5 py-1.5 text-[12px] font-medium rounded-md transition-all hover:opacity-90" style="background: var(--accent); color: white;">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-3.5 py-1.5 text-[12px] font-medium rounded-md transition-colors" style="color: var(--text-secondary);">Login</a>
                        <a href="{{ route('register') }}" class="px-3.5 py-1.5 text-[12px] font-medium rounded-md transition-all hover:opacity-90" style="background: var(--accent); color: white;">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- ── Hero ── --}}
    <section class="fade-in">
        <div class="max-w-6xl mx-auto px-6 pt-20 pb-16">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-start">
                <div class="lg:col-span-3">
                    <div class="inline-flex items-center gap-2 mb-6">
                        <div class="w-2 h-2 rounded-full" style="background: var(--accent-highlight);"></div>
                        <span class="text-[11px] font-semibold uppercase tracking-widest" style="color: var(--text-tertiary);">Tahun Ajaran Baru</span>
                    </div>
                    <h1 class="text-[42px] md:text-[52px] font-bold tracking-[-0.035em] leading-[1.06] mb-5" style="color: var(--text-primary);">
                        Temukan<br>Potensimu.
                    </h1>
                    <p class="text-[15px] leading-[1.7] mb-8 max-w-md" style="color: var(--text-secondary);">
                        Platform resmi manajemen kegiatan ekstrakurikuler. Pilih mentor, kembangkan skill, dan bangun portofolio sejak dini.
                    </p>
                    <div class="flex items-center gap-3">
                        @auth
                            <a href="/admin" class="inline-flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium rounded-md transition-all hover:opacity-90" style="background: var(--accent); color: white;">
                                Ke Dashboard
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium rounded-md transition-all hover:opacity-90" style="background: var(--accent); color: white;">
                                Daftar Sekarang
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                            <a href="#katalog" class="inline-flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium rounded-md transition-colors" style="color: var(--text-secondary); border: 1px solid var(--border);">Lihat Katalog</a>
                        @endauth
                    </div>
                </div>

                {{-- Side Stats Panel --}}
                <div class="lg:col-span-2">
                    <div class="rounded-lg overflow-hidden" style="border: 1px solid var(--border); background: var(--surface);">
                        <div class="px-4 py-3 text-[11px] font-semibold uppercase tracking-wider" style="color: var(--text-tertiary); border-bottom: 1px solid var(--border); background: var(--surface-raised);">Ringkasan</div>
                        <div class="divide-y" style="--tw-divide-color: var(--border);">
                            <div class="px-4 py-3.5 flex items-center justify-between">
                                <span class="text-[12px]" style="color: var(--text-secondary);">Club Aktif</span>
                                <span class="text-[14px] font-bold tabular-nums" style="color: var(--accent);">{{ $clubs->count() }}</span>
                            </div>
                            <div class="px-4 py-3.5 flex items-center justify-between">
                                <span class="text-[12px]" style="color: var(--text-secondary);">Mentor Ahli</span>
                                <span class="text-[14px] font-bold tabular-nums" style="color: var(--text-primary);">15+</span>
                            </div>
                            <div class="px-4 py-3.5 flex items-center justify-between">
                                <span class="text-[12px]" style="color: var(--text-secondary);">Siswa Bergabung</span>
                                <span class="text-[14px] font-bold tabular-nums" style="color: var(--text-primary);">300+</span>
                            </div>
                            <div class="px-4 py-3.5 flex items-center justify-between">
                                <span class="text-[12px]" style="color: var(--text-secondary);">Biaya</span>
                                <span class="text-[12px] font-semibold px-2 py-0.5 rounded" style="background: var(--accent-highlight-subtle); color: #92400e;">Gratis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Katalog (Card Grid) ── --}}
    <section id="katalog" class="fade-in">
        <div class="max-w-6xl mx-auto px-6 pb-20">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-base font-semibold tracking-tight" style="color: var(--text-primary);">Katalog Club</h2>
                    <p class="text-[12px] mt-0.5" style="color: var(--text-tertiary);">Pilih dan bergabung dengan club pilihanmu</p>
                </div>
                <div class="hidden md:flex items-center gap-1.5">
                    <button class="px-2.5 py-1 text-[11px] font-medium rounded" style="background: var(--accent); color: white;">Semua</button>
                    @foreach($categories as $cat)
                        <button class="px-2.5 py-1 text-[11px] font-medium rounded transition-colors" style="color: var(--text-tertiary); border: 1px solid var(--border);">{{ $cat->name }}</button>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($clubs as $club)
                    <a href="{{ route('club.show', $club->slug) }}" class="group card-hover block rounded-lg p-5" style="background: var(--surface); border: 1px solid var(--border); text-decoration: none; color: inherit;">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-md flex items-center justify-center text-[11px] font-bold flex-shrink-0" style="background: var(--surface-raised); color: var(--text-secondary); border: 1px solid var(--border);">
                                    {{ substr($club->name, 0, 2) }}
                                </div>
                                <div>
                                    <div class="text-[13px] font-semibold group-hover:underline" style="color: var(--text-primary);">{{ $club->name }}</div>
                                    <div class="text-[11px]" style="color: var(--text-tertiary);">{{ $club->category->name }}</div>
                                </div>
                            </div>
                            <div class="w-1.5 h-1.5 rounded-full mt-1.5 flex-shrink-0" style="background: var(--accent-highlight);"></div>
                        </div>

                        <p class="text-[12px] leading-relaxed line-clamp-2 mb-4" style="color: var(--text-secondary);">
                            {!! strip_tags($club->description) ?? 'Eksplorasi ilmu dan kembangkan potensimu.' !!}
                        </p>

                        <div class="flex items-center justify-between pt-3" style="border-top: 1px solid var(--border);">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 rounded-full flex items-center justify-center text-[9px] font-bold" style="background: var(--surface-raised); color: var(--text-secondary);">{{ substr($club->coach->name, 0, 1) }}</div>
                                <span class="text-[11px]" style="color: var(--text-tertiary);">{{ $club->coach->name }}</span>
                            </div>
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-60 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--text-secondary);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 17L17 7M17 7H7M17 7v10"></path></svg>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full p-12 text-center rounded-lg" style="background: var(--surface); border: 1px solid var(--border);">
                        <p class="text-[13px]" style="color: var(--text-tertiary);">Belum ada club aktif saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ── CTA ── --}}
    <section class="fade-in">
        <div class="max-w-6xl mx-auto px-6 pb-20">
            <div class="rounded-lg p-8 md:p-10 text-center" style="background: var(--accent); color: white;">
                <h2 class="text-xl font-semibold tracking-tight mb-2">Siap Mengembangkan Bakatmu?</h2>
                <p class="text-[13px] opacity-70 mb-6 max-w-md mx-auto">Bergabunglah dan mulai perjalananmu bersama mentor terbaik.</p>
                @auth
                    <a href="/admin" class="inline-flex items-center gap-2 px-5 py-2.5 text-[13px] font-medium rounded-md transition-all" style="background: white; color: var(--accent);">Ke Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-5 py-2.5 text-[13px] font-medium rounded-md transition-all" style="background: white; color: var(--accent);">Daftar Sekarang</a>
                @endauth
            </div>
        </div>
    </section>

    {{-- ── Footer ── --}}
    <footer style="border-top: 1px solid var(--border);">
        <div class="max-w-6xl mx-auto px-6 py-8">
            <div class="flex flex-col md:flex-row justify-between items-start gap-8 mb-6">
                <div class="max-w-xs">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-6 h-6 rounded flex items-center justify-center text-[9px] font-bold" style="background: var(--accent); color: white;">SC</div>
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
                <p class="text-[11px]" style="color: var(--text-tertiary);">by <span class="font-medium" style="color: var(--text-secondary);">Wibowo Assariy</span></p>
            </div>
        </div>
    </footer>
</body>
</html>
