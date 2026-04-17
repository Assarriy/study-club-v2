<!-- Advisor Card -->
<div class="bg-white rounded-2xl p-10 shadow-lg border border-surface-container-high relative overflow-hidden">
    <div class="absolute top-0 right-0 w-24 h-24 bg-secondary/5 rounded-full -mr-12 -mt-12"></div>
    <div class="flex flex-col items-center text-center relative z-10">
        <div class="w-28 h-28 bg-primary text-secondary-fixed rounded-full flex items-center justify-center text-4xl font-headline font-extrabold mb-6 shadow-2xl ring-4 ring-secondary-fixed/30">
            {{ strtoupper(substr($club->coach->name ?? 'P B', 0, 2)) }}
        </div>
        <h4 class="font-headline text-2xl font-bold text-primary">{{ $club->coach->name ?? 'Belum ada Pembina' }}</h4>
        <p class="text-secondary font-bold text-xs uppercase tracking-widest mt-2">Dosen/Pembina Akademik</p>
        
        <div class="w-full mt-10 pt-10 border-t border-slate-100 grid grid-cols-2 gap-8">
            <div class="text-center group">
                <span class="block text-3xl font-black text-primary group-hover:text-secondary transition-colors">{{ $club->galleries()->count() }}</span>
                <span class="text-[10px] text-outline font-extrabold tracking-widest uppercase">GALERI</span>
            </div>
            <div class="text-center group">
                <span class="block text-3xl font-black text-primary group-hover:text-secondary transition-colors">{{ $club->posts()->count() }}</span>
                <span class="text-[10px] text-outline font-extrabold tracking-widest uppercase">ARTIKEL</span>
            </div>
        </div>
    </div>
</div>

<!-- Registration CTA -->
@include('pages.partials.registration-cta')

<!-- Info Card -->
<div class="bg-primary p-8 rounded-2xl shadow-xl relative overflow-hidden">
    <div class="absolute inset-0 bg-white opacity-5 mix-blend-overlay"></div>
    <h5 class="font-headline font-bold text-secondary-fixed text-base flex items-center gap-3 relative z-10">
        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">info</span>
        Informasi Pendaftaran
    </h5>
    <p class="text-sm text-primary-fixed leading-relaxed font-semibold mt-4 relative z-10 opacity-90">
        Pendaftaran porseni/anggota periode Ganjil masih dibuka. Pastikan Anda telah memiliki komitmen yang cukup untuk tergabung bersama klub ini.
    </p>
</div>
