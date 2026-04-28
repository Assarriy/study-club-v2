{{-- ══ Advisor Card — Modern SaaS ══ --}}
<div class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden transition-shadow duration-300 hover:shadow-md">
    <div class="px-5 py-3 bg-zinc-50 border-b border-zinc-100">
        <span class="text-[10px] font-semibold uppercase tracking-wider text-zinc-400">Pembina</span>
    </div>
    <div class="p-5">
        <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-sm font-bold text-white" style="background: var(--accent, #2563EB);">
                {{ strtoupper(substr($club->coach->name ?? 'PB', 0, 2)) }}
            </div>
            <div>
                <div class="text-sm font-bold text-zinc-900">{{ $club->coach->name ?? 'Belum ada Pembina' }}</div>
                <div class="text-[10px] font-medium text-zinc-400 mt-0.5">Dosen / Pembina</div>
            </div>
        </div>
        <div class="h-px bg-zinc-100 mb-4"></div>
        <div class="grid grid-cols-2 gap-3">
            <div class="text-center py-3.5 rounded-xl bg-zinc-50 border border-zinc-100 transition-all duration-200 hover:border-zinc-200 hover:shadow-sm">
                <div class="text-2xl font-bold text-zinc-900 tabular-nums">{{ $club->galleries()->count() }}</div>
                <div class="text-[9px] font-semibold uppercase tracking-wider text-zinc-400 mt-0.5">Galeri</div>
            </div>
            <div class="text-center py-3.5 rounded-xl bg-zinc-50 border border-zinc-100 transition-all duration-200 hover:border-zinc-200 hover:shadow-sm">
                <div class="text-2xl font-bold text-zinc-900 tabular-nums">{{ $club->posts()->count() }}</div>
                <div class="text-[9px] font-semibold uppercase tracking-wider text-zinc-400 mt-0.5">Artikel</div>
            </div>
        </div>
    </div>
</div>

{{-- ══ Registration CTA ══ --}}
@include('pages.partials.registration-cta')

{{-- ══ Info Card — Accent tinted ══ --}}
<div class="rounded-2xl p-5 border transition-shadow duration-300 hover:shadow-sm" style="background: var(--accent-light, #EFF6FF); border-color: var(--accent-medium, #DBEAFE);">
    <div class="flex items-start gap-3">
        <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5 text-white" style="background: var(--accent, #2563EB);">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-xs font-bold uppercase tracking-wider mb-1" style="color: var(--accent-text, #1e40af);">Info Pendaftaran</div>
            <p class="text-xs leading-relaxed" style="color: var(--accent-dark, #1d4ed8); opacity: 0.8;">Pendaftaran porseni/anggota periode Ganjil masih dibuka. Pastikan Anda memiliki komitmen yang cukup.</p>
        </div>
    </div>
</div>
