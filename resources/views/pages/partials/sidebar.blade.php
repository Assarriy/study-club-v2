{{-- ── Advisor Card ── --}}
<div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden card-lift">
    <div class="px-5 py-3.5 border-b border-slate-100 flex items-center gap-2"
         style="background: linear-gradient(to right, var(--accent-light, #EFF6FF), white);">
        <div class="w-1.5 h-4 rounded-full" style="background: var(--accent, #2563EB);"></div>
        <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-text, #1e40af);">Pembina Club</span>
    </div>
    <div class="p-5">
        <div class="flex items-center gap-3.5 mb-5">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-sm font-extrabold text-white shadow-md flex-shrink-0"
                 style="background: linear-gradient(135deg, var(--accent, #2563EB), var(--accent-dark, #1d4ed8));">
                {{ strtoupper(substr($club->coach->name ?? 'PB', 0, 2)) }}
            </div>
            <div>
                <div class="text-sm font-bold text-slate-900">{{ $club->coach->name ?? 'Belum ada Pembina' }}</div>
                <div class="text-[10px] font-medium text-slate-400 mt-0.5">Pembina / Coach</div>
            </div>
        </div>
        <div class="h-px bg-slate-100 mb-4"></div>
        <div class="grid grid-cols-2 gap-3">
            <div class="text-center py-3.5 rounded-2xl border transition-all duration-200 hover:shadow-sm"
                 style="background: var(--accent-light, #EFF6FF); border-color: var(--accent-medium, #DBEAFE);">
                <div class="text-2xl font-extrabold tabular-nums" style="color: var(--accent, #2563EB);">{{ $club->galleries()->count() }}</div>
                <div class="text-[9px] font-bold uppercase tracking-widest mt-0.5" style="color: var(--accent-text, #1e40af);">Galeri</div>
            </div>
            <div class="text-center py-3.5 rounded-2xl border transition-all duration-200 hover:shadow-sm"
                 style="background: var(--accent-light, #EFF6FF); border-color: var(--accent-medium, #DBEAFE);">
                <div class="text-2xl font-extrabold tabular-nums" style="color: var(--accent, #2563EB);">{{ $club->posts()->count() }}</div>
                <div class="text-[9px] font-bold uppercase tracking-widest mt-0.5" style="color: var(--accent-text, #1e40af);">Artikel</div>
            </div>
        </div>
    </div>
</div>

{{-- ── Registration CTA ── --}}
@include('pages.partials.registration-cta')

{{-- ── Info Card ── --}}
<div class="rounded-3xl p-5 border relative overflow-hidden"
     style="background: linear-gradient(135deg, var(--accent, #2563EB), var(--accent-dark, #1d4ed8)); border-color: var(--accent-dark, #1d4ed8);">
    <div class="absolute top-0 right-0 w-24 h-24 rounded-full bg-white/5 -mr-8 -mt-8 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-16 h-16 rounded-full bg-white/5 -ml-6 -mb-6 pointer-events-none"></div>
    <div class="relative z-10 flex items-start gap-3">
        <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5 bg-white/20">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-xs font-bold uppercase tracking-wider text-white mb-1">Info Pendaftaran</div>
            <p class="text-xs leading-relaxed text-blue-100 mb-3">Pastikan Anda memiliki komitmen yang cukup.</p>
        </div>
    </div>
</div>

@if(!empty($club->social_links))
    <div class="mt-4">
        <a href="{{ collect($club->social_links)->first() }}" target="_blank" 
           class="flex items-center justify-between w-full px-5 py-3.5 bg-white rounded-2xl border border-slate-200/80 shadow-sm transition-all duration-200 hover:shadow-md hover:border-blue-300 group no-underline">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl flex items-center justify-center" style="background: var(--accent-light); color: var(--accent);">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                </div>
                <div class="text-xs font-bold text-slate-700 group-hover:text-blue-600 transition-colors">Platform / URL External</div>
            </div>
            <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>
@endif
