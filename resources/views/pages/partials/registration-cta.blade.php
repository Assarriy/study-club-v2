<!-- Registration CTA Component -->
@if(!$isRegistered)
    @auth
        <button onclick="document.getElementById('regModal').classList.remove('hidden')" class="w-full bg-secondary-container hover:bg-secondary-fixed-dim text-on-secondary-container font-headline font-extrabold text-xl py-6 rounded-2xl shadow-xl shadow-secondary/10 hover:shadow-secondary/20 transition-all duration-300 active:scale-95 flex items-center justify-center gap-4 group">
            Daftar Anggota Sekarang
            <span class="material-symbols-outlined text-2xl transition-transform group-hover:translate-x-1.5">arrow_forward</span>
        </button>

        <!-- Modal Overlay with Enhanced Glassmorphism -->
        <div id="regModal" class="fixed inset-0 z-[60] hidden flex items-center justify-center p-4 bg-primary/20 backdrop-blur-xl">
            <!-- Registration Modal with Figma Polish -->
            <div class="bg-white/95 w-full max-w-lg rounded-3xl editorial-shadow overflow-hidden flex flex-col border border-white/20 shadow-[0_32px_64px_-12px_rgba(30,58,138,0.12)]">
                <!-- Modal Header -->
                <div class="px-8 pt-8 pb-4">
                    <div class="flex justify-between items-start mb-2">
                        <h2 class="font-headline font-extrabold text-3xl text-primary tracking-tight">Pendaftaran Klub</h2>
                        <button onclick="document.getElementById('regModal').classList.add('hidden')" class="p-2 hover:bg-surface-container-low rounded-full transition-all group">
                            <span class="material-symbols-outlined text-outline group-hover:text-primary">close</span>
                        </button>
                    </div>
                    <p class="text-on-surface-variant text-[15px] leading-relaxed opacity-80">Ceritakan sedikit tentang dirimu dan mengapa kamu tertarik bergabung dengan {{ $club->name }}.</p>
                </div>
                
                <!-- Errors -->
                @if ($errors->any())
                    <div class="mx-8 bg-error-container text-on-error-container p-4 rounded-xl text-sm mb-2">
                        <ul class="list-disc pl-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if (session('error'))
                    <div class="mx-8 bg-error-container text-on-error-container p-4 rounded-xl text-sm mb-2">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Modal Content (Form) -->
                <form action="{{ route('club.register', $club->slug) }}" method="POST" class="p-8 pt-4 flex flex-col gap-6">
                    @csrf
                    <div class="flex flex-col gap-2.5">
                        <label class="text-[11px] font-extrabold text-primary uppercase tracking-[0.15em] ml-0.5 opacity-60">Motivasi Bergabung</label>
                        <textarea name="motivation" required minlength="10" maxlength="1000" class="w-full p-4 rounded-2xl bg-surface-container-lowest border border-outline-variant/50 focus:border-primary focus:ring-[4px] focus:ring-primary/10 transition-all duration-200 resize-none font-body text-on-surface placeholder:text-outline/40 shadow-sm" placeholder="Tuliskan alasanmu di sini..." rows="5">{{ old('motivation') }}</textarea>
                        <div class="flex justify-between px-1">
                            <span class="text-[10px] text-outline font-medium italic opacity-70">Minimal 10 karakter untuk pertimbangan kurator.</span>
                        </div>
                    </div>
                    
                    <div class="bg-primary/5 p-5 rounded-2xl flex gap-4 items-center border border-primary/10">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-xl" style="font-variation-settings: 'FILL' 1;">info</span>
                        </div>
                        <p class="text-xs text-primary leading-relaxed font-medium">
                            Pendaftaran ini akan mengirimkan pesan otomatis ke WhatsApp Coach terkait untuk ditinjau.
                        </p>
                    </div>

                    <!-- Action Button with Tactile Feedback -->
                    <div class="pt-2 flex flex-col gap-4">
                        <button type="submit" class="w-full group relative flex items-center justify-center gap-3 py-4 bg-secondary-container hover:bg-secondary-fixed-dim text-on-secondary-container font-headline font-extrabold text-[15px] rounded-2xl transition-all duration-300 transform active:scale-[0.98] shadow-lg shadow-secondary/20 hover:shadow-xl hover:shadow-secondary/30">
                            <span class="tracking-tight">Kirim Pendaftaran via WA</span>
                            <span class="material-symbols-outlined text-xl group-hover:translate-x-1.5 transition-transform duration-300">send</span>
                        </button>
                        <button onclick="document.getElementById('regModal').classList.add('hidden')" type="button" class="w-full py-2 text-outline hover:text-primary font-bold text-[14px] transition-all hover:scale-[1.02] active:scale-[0.98]">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if($errors->any() || session('error'))
            <script>
                document.getElementById('regModal').classList.remove('hidden');
            </script>
        @endif
    @else
        <a href="{{ url('/admin/login') }}" class="w-full bg-secondary-container hover:bg-secondary-fixed-dim text-on-secondary-container font-headline font-extrabold text-xl py-6 rounded-2xl shadow-xl shadow-secondary/10 hover:shadow-secondary/20 transition-all duration-300 active:scale-95 flex items-center justify-center gap-4 group">
            Login Untuk Mendaftar
            <span class="material-symbols-outlined text-2xl transition-transform group-hover:translate-x-1.5">login</span>
        </a>
    @endauth
@else
    <div class="w-full bg-surface-container-highest cursor-not-allowed text-primary font-headline font-extrabold text-base py-6 rounded-2xl flex items-center justify-center gap-4 group opacity-80 border border-outline-variant/50">
        <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
        Anda Berstatus Terdaftar
    </div>
@endif
