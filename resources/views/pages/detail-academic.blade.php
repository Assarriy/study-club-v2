@extends('layouts.portal')
@section('title', 'Jadwal & Akademik ' . $club->name . ' - Study Club Portal')

@section('content')
<main class="max-w-[1440px] mx-auto px-4 md:px-8 py-12 flex flex-col lg:flex-row gap-12">
    <!-- Main Content Area (Left 70%) -->
    <div class="w-full lg:w-[70%] space-y-12">
        
        <!-- Hero Banner -->
        <section class="relative h-[200px] md:h-[480px] w-full rounded-2xl overflow-hidden bg-primary shadow-2xl">
            @if($club->banner_image)
                <img class="w-full h-full object-cover mix-blend-overlay opacity-40" alt="{{ $club->name }}" src="{{ Storage::url($club->banner_image) }}"/>
            @else
                <div class="w-full h-full bg-primary-container mix-blend-overlay opacity-40"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent flex flex-col justify-end p-8 md:p-12">
                <span class="inline-block px-4 py-1.5 bg-secondary-container text-on-secondary-container text-[10px] uppercase tracking-widest font-extrabold rounded-full w-fit mb-6 shadow-lg">KALENDER KEGIATAN &amp; MATERI</span>
                <h1 class="font-headline text-white text-5xl md:text-6xl font-extrabold leading-tight tracking-tight max-w-2xl">Akademik {{ $club->name }}</h1>
            </div>
        </section>

        <!-- Sub-Nav Bar -->
        <div class="flex items-center gap-10 border-b-2 border-surface-container-high overflow-x-auto hide-scroll pb-2">
            <a class="relative pb-3 text-outline hover:text-primary nav-tab-underline font-semibold whitespace-nowrap" href="{{ route('club.show', $club->slug) }}">Beranda</a>
            <a class="relative pb-3 text-outline hover:text-primary nav-tab-underline font-semibold whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'news']) }}">Berita &amp; Prestasi</a>
            <a class="relative pb-3 text-outline hover:text-primary nav-tab-underline font-semibold whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'gallery']) }}">Galeri</a>
            <a class="relative pb-3 text-primary nav-tab-active font-bold whitespace-nowrap" href="{{ route('club.show', ['slug' => $club->slug, 'tab' => 'academic']) }}">Akademik</a>
        </div>

        <!-- Section Tabel Akademik & Jadwal -->
        <div class="space-y-8 md:editorial-offset">
            <div class="flex items-center gap-4 mb-4">
                <div class="h-8 w-1.5 bg-secondary rounded-full"></div>
                <h2 class="text-2xl font-bold text-primary uppercase tracking-widest font-headline">Silabus &amp; Jadwal</h2>
                <div class="h-[1px] flex-grow bg-outline-variant/30 ml-4"></div>
            </div>

            <!-- Tabel Jadwal -->
            <div class="overflow-x-auto border border-outline-variant/30 rounded-2xl bg-white shadow-sm mb-12">
                @if($club->schedules && $club->schedules->isNotEmpty())
                <table class="w-full text-left border-collapse min-w-[700px]">
                    <thead>
                        <tr class="bg-surface-container-low border-b border-outline-variant/30">
                            <th class="px-8 py-5 font-headline font-bold text-[13px] uppercase tracking-wider text-primary">Tanggal &amp; Waktu</th>
                            <th class="px-8 py-5 font-headline font-bold text-[13px] uppercase tracking-wider text-primary">Lokasi</th>
                            <th class="px-8 py-5 font-headline font-bold text-[13px] uppercase tracking-wider text-primary text-center">Jenis</th>
                            <th class="px-8 py-5 font-headline font-bold text-[13px] uppercase tracking-wider text-primary">Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/20">
                        @foreach($club->schedules as $schedule)
                        <tr class="table-row-hover transition-colors duration-200">
                            <td class="px-8 py-6 font-semibold text-primary font-body">{{ \Carbon\Carbon::parse($schedule->schedule_time)->format('d M, H:i') }}</td>
                            <td class="px-8 py-6 text-on-surface font-medium">{{ $schedule->location ?? 'Belum ditentukan' }}</td>
                            <td class="px-8 py-6 text-center">
                                <span class="inline-flex items-center px-3 py-1 text-secondary rounded-full text-[11px] font-bold uppercase tracking-widest border border-secondary/20 bg-secondary-fixed/30">
                                    Aktivitas
                                </span>
                            </td>
                            <td class="px-8 py-6 text-on-surface-variant text-sm font-medium">
                                {{ $schedule->description ?? 'Rutin Mingguan' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="p-8 text-center text-outline">
                    <span class="material-symbols-outlined text-4xl mb-2">event_busy</span>
                    <p>Sesi jadwal aktivitas belum terbuka atau belum dijadwalkan.</p>
                </div>
                @endif
            </div>

            <!-- Tabel Materi (Jika di database ada $club->materials, misal) -->
            <div class="flex items-center gap-4 mb-4 mt-8">
                <div class="h-8 w-1.5 bg-primary rounded-full"></div>
                <h2 class="text-2xl font-bold text-primary uppercase tracking-widest font-headline">Materi &amp; Berkas</h2>
                <div class="h-[1px] flex-grow bg-outline-variant/30 ml-4"></div>
            </div>
            
            <div class="space-y-4">
                @if($club->materials && $club->materials->isNotEmpty())
                    @foreach($club->materials as $material)
                    <div class="flex items-center justify-between p-5 bg-white border border-outline-variant/20 rounded-xl hover:shadow-md hover:border-secondary transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">description</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary">{{ $material->title }}</h4>
                                <p class="text-xs text-outline">{{ $material->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        @if($material->file_path)
                            <a href="{{ Storage::url($material->file_path) }}" target="_blank" class="download-btn flex items-center justify-center w-10 h-10 bg-secondary/10 rounded-full text-secondary hover:bg-secondary hover:text-white transition-colors cursor-pointer">
                                <span class="material-symbols-outlined text-xl">download</span>
                            </a>
                        @endif
                    </div>
                    @endforeach
                @else
                    <div class="p-8 text-center text-outline bg-surface-container-low rounded-xl border border-dashed border-outline-variant">
                        <span class="material-symbols-outlined text-4xl mb-2">folder_off</span>
                        <p>Belum ada modul atau berkas akademik yang dibagikan.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <!-- Sticky Sidebar -->
    <aside class="w-full lg:w-[30%] space-y-8">
        <div class="sticky top-28 space-y-8">
            @include('pages.partials.sidebar')
        </div>
    </aside>
</main>
@endsection
