@if(!$isRegistered)
    @auth
        <button onclick="document.getElementById('regModal').classList.remove('hidden')"
                class="shimmer-hover w-full py-4 text-sm font-bold tracking-wide cursor-pointer transition-all duration-300 rounded-2xl text-white shadow-lg border-none"
                style="background: linear-gradient(135deg, var(--accent, #2563EB), var(--accent-dark, #1d4ed8)); box-shadow: 0 8px 24px rgba(37,99,235,0.35);">
            Daftar Sekarang →
        </button>

        {{-- Modal --}}
        <div id="regModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4"
             style="background: rgba(15,23,42,0.6); backdrop-filter: blur(8px);"
             onclick="if(event.target===this) this.classList.add('hidden')">
            <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden animate-modal">
                <div class="px-6 py-4 flex justify-between items-center"
                     style="background: linear-gradient(135deg, var(--accent, #2563EB), var(--accent-dark, #1d4ed8));">
                    <div>
                        <span class="text-sm font-bold text-white">Pendaftaran Club</span>
                        <p class="text-[10px] text-blue-200 mt-0.5">{{ $club->name }}</p>
                    </div>
                    <button onclick="document.getElementById('regModal').classList.add('hidden')"
                            class="w-8 h-8 flex items-center justify-center cursor-pointer rounded-xl bg-white/20 text-white hover:bg-white/30 transition-colors border-none text-lg leading-none">
                        ×
                    </button>
                </div>

                @if ($errors->any())
                    <div class="mx-5 mt-4 px-4 py-3 text-xs font-medium bg-red-50 border border-red-200 text-red-600 rounded-2xl">
                        <ul class="list-disc pl-4 space-y-0.5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif
                @if (session('error'))
                    <div class="mx-5 mt-4 px-4 py-3 text-xs font-medium bg-red-50 border border-red-200 text-red-600 rounded-2xl">{{ session('error') }}</div>
                @endif

                <form action="{{ route('club.register', $club->slug) }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2">Motivasi Bergabung</label>
                        <textarea name="motivation" required minlength="10" maxlength="1000" rows="4"
                            class="w-full p-3.5 text-sm outline-none resize-none rounded-2xl bg-slate-50 border border-slate-200 text-slate-800 placeholder-slate-400 focus:border-blue-400 focus:bg-white focus:ring-2 focus:ring-blue-100 transition-all duration-200"
                            placeholder="Tuliskan alasanmu bergabung...">{{ old('motivation') }}</textarea>
                        <p class="text-[10px] mt-1.5 text-slate-400">Min. 10 karakter. Akan dikirim ke WhatsApp Coach.</p>
                    </div>
                    <div class="flex gap-2.5">
                        <button type="submit"
                                class="flex-1 py-3.5 text-sm font-bold tracking-wide cursor-pointer rounded-2xl text-white transition-all duration-200 hover:shadow-lg border-none"
                                style="background: linear-gradient(135deg, var(--accent, #2563EB), var(--accent-dark, #1d4ed8));">
                            Kirim Pendaftaran
                        </button>
                        <button onclick="document.getElementById('regModal').classList.add('hidden')" type="button"
                                class="px-5 py-3.5 text-xs font-semibold cursor-pointer rounded-2xl bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors border-none">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if($errors->any() || session('error'))
            <script>
                document.getElementById('regModal').classList.remove('hidden');
                document.getElementById('regModal').classList.add('flex');
            </script>
        @endif
    @else
        <a href="{{ url('/admin/login') }}"
           class="shimmer-hover flex items-center justify-center gap-2 w-full py-4 text-sm font-bold tracking-wide text-center transition-all duration-300 rounded-2xl text-white no-underline shadow-lg"
           style="background: linear-gradient(135deg, var(--accent, #2563EB), var(--accent-dark, #1d4ed8)); box-shadow: 0 8px 24px rgba(37,99,235,0.35);">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
            Login untuk Mendaftar
        </a>
    @endauth
@else
    <div class="w-full py-4 text-sm font-bold tracking-wide text-center rounded-2xl border-2 flex items-center justify-center gap-2"
         style="border-color: var(--accent, #2563EB); color: var(--accent-text, #1e40af); background: var(--accent-light, #EFF6FF);">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        Anda Sudah Terdaftar
    </div>
@endif

<style>
    @keyframes modalIn {
        from { opacity: 0; transform: scale(0.95) translateY(10px); }
        to   { opacity: 1; transform: scale(1) translateY(0); }
    }
    .animate-modal { animation: modalIn 0.25s cubic-bezier(0.4,0,0.2,1) both; }
    #regModal:not(.hidden) { display: flex !important; }
</style>
