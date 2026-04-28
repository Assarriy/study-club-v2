{{-- ══ Registration CTA — Modern SaaS ══ --}}
@if(!$isRegistered)
    @auth
        <button onclick="document.getElementById('regModal').classList.remove('hidden')" class="w-full py-4 text-sm font-semibold tracking-wide cursor-pointer transition-all duration-300 rounded-xl text-white shadow-sm hover:shadow-md active:scale-[0.99]" style="background: var(--accent, #2563EB); border: none;">
            Daftar Sekarang →
        </button>

        {{-- Modal --}}
        <div id="regModal" class="fixed inset-0 z-[60] hidden flex items-center justify-center p-4" style="background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);">
            <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden">
                {{-- Header --}}
                <div class="px-6 py-4 flex justify-between items-center border-b border-zinc-100" style="background: var(--accent, #2563EB);">
                    <span class="text-sm font-semibold tracking-wide text-white">Pendaftaran Klub</span>
                    <button onclick="document.getElementById('regModal').classList.add('hidden')" class="w-7 h-7 flex items-center justify-center cursor-pointer rounded-lg bg-white/20 text-white hover:bg-white/30 transition-colors" style="border: none;">✕</button>
                </div>
                <div class="px-6 py-3 text-xs font-medium text-zinc-500 border-b border-zinc-100 bg-zinc-50">
                    Bergabung dengan {{ $club->name }}
                </div>

                {{-- Errors --}}
                @if ($errors->any())
                    <div class="mx-6 mt-4 px-4 py-2.5 text-xs font-medium bg-red-50 border border-red-200 text-red-600 rounded-xl">
                        <ul class="list-disc pl-4 space-y-0.5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif
                @if (session('error'))
                    <div class="mx-6 mt-4 px-4 py-2.5 text-xs font-medium bg-red-50 border border-red-200 text-red-600 rounded-xl">{{ session('error') }}</div>
                @endif

                {{-- Form --}}
                <form action="{{ route('club.register', $club->slug) }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-semibold uppercase tracking-wider text-zinc-400 mb-1.5">Motivasi Bergabung</label>
                        <textarea name="motivation" required minlength="10" maxlength="1000" rows="4"
                            class="w-full p-3 text-sm outline-none resize-none rounded-xl bg-zinc-50 border border-zinc-200 text-zinc-800 placeholder-zinc-400 focus:border-blue-400 focus:bg-white focus:ring-2 focus:ring-blue-100 transition-all duration-200"
                            style="font-family: 'Inter', sans-serif;"
                            placeholder="Tuliskan alasanmu bergabung...">{{ old('motivation') }}</textarea>
                        <p class="text-[10px] mt-1.5 text-zinc-400">Min. 10 karakter. Dikirim ke WhatsApp Coach.</p>
                    </div>
                    <div class="flex gap-2.5">
                        <button type="submit" class="flex-1 py-3 text-sm font-semibold tracking-wide cursor-pointer rounded-xl text-white transition-all duration-200 hover:shadow-md" style="background: var(--accent, #2563EB); border: none;">Kirim</button>
                        <button onclick="document.getElementById('regModal').classList.add('hidden')" type="button" class="px-5 py-3 text-xs font-semibold cursor-pointer rounded-xl bg-zinc-100 text-zinc-500 hover:bg-zinc-200 transition-colors" style="border: none;">Batal</button>
                    </div>
                </form>
            </div>
        </div>

        @if($errors->any() || session('error'))
            <script>document.getElementById('regModal').classList.remove('hidden');</script>
        @endif
    @else
        <a href="{{ url('/admin/login') }}" class="block w-full py-4 text-sm font-semibold tracking-wide text-center transition-all duration-300 rounded-xl text-white shadow-sm hover:shadow-md hover:scale-[1.01] no-underline" style="background: var(--accent, #2563EB);">
            Login untuk Mendaftar →
        </a>
    @endauth
@else
    <div class="w-full py-4 text-sm font-semibold tracking-wide text-center rounded-xl border-2 border-dashed" style="border-color: var(--accent, #2563EB); color: var(--accent-text, #1e40af); background: var(--accent-light, #EFF6FF);">
        ✓ Anda Sudah Terdaftar
    </div>
@endif
