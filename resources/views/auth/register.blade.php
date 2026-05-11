<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun — Study Club Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; -webkit-font-smoothing: antialiased; }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.5s cubic-bezier(0.4,0,0.2,1) both; }
        .fade-up-1 { animation-delay: 0.1s; }
        .fade-up-2 { animation-delay: 0.2s; }
        @keyframes blobMove {
            0%, 100% { transform: translate(5rem, -5rem) scale(1); }
            50% { transform: translate(4rem, -6rem) scale(1.05); }
        }
        @keyframes blobMove2 {
            0%, 100% { transform: translate(-5rem, 5rem) scale(1); }
            50% { transform: translate(-4rem, 6rem) scale(1.05); }
        }
        .blob-1 { animation: blobMove 8s ease-in-out infinite; }
        .blob-2 { animation: blobMove2 10s ease-in-out infinite; }
    </style>
</head>

<body class="min-h-screen flex flex-col justify-center py-10 px-4 sm:px-6 relative overflow-hidden"
      style="background: linear-gradient(135deg, #F0F4FF 0%, #F8FAFC 50%, #FFF7ED 100%);">

    {{-- Blobs --}}
    <div class="blob-1 fixed top-0 right-0 w-80 h-80 sm:w-[28rem] sm:h-[28rem] rounded-full pointer-events-none"
         style="background: radial-gradient(circle, rgba(37,99,235,0.12) 0%, transparent 70%);"></div>
    <div class="blob-2 fixed bottom-0 left-0 w-64 h-64 sm:w-96 sm:h-96 rounded-full pointer-events-none"
         style="background: radial-gradient(circle, rgba(245,158,11,0.10) 0%, transparent 70%);"></div>

    <div class="w-full max-w-md mx-auto relative z-10">
        {{-- Logo --}}
        <a href="/" class="flex justify-center items-center gap-2.5 mb-7 no-underline group fade-up">
            <div class="w-11 h-11 rounded-2xl flex items-center justify-center text-white font-extrabold text-lg shadow-xl group-hover:scale-110 transition-transform duration-300"
                 style="background: linear-gradient(135deg, #2563EB, #1d4ed8); box-shadow: 0 8px 24px rgba(37,99,235,0.35);">SC</div>
            <div class="font-extrabold text-3xl tracking-tight" style="color: #1e3a8a;">
                Study<span style="color: #F59E0B;">Club</span>
            </div>
        </a>

        <div class="text-center mb-7 fade-up fade-up-1">
            <h2 class="text-2xl font-extrabold mb-1.5" style="color: #0F172A;">Buat Akun Baru</h2>
            <p class="text-sm" style="color: #64748B;">Mulai perjalananmu mengeksplorasi minat dan bakat.</p>
        </div>

        {{-- Card --}}
        <div class="bg-white/80 backdrop-blur-xl py-7 px-5 sm:px-8 rounded-3xl border border-white shadow-2xl shadow-slate-200/60 fade-up fade-up-2">
            <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
                @csrf

                @foreach([
                    ['id' => 'name', 'name' => 'name', 'type' => 'text', 'label' => 'Nama Lengkap', 'placeholder' => 'Contoh: Wibowo Assariy', 'required' => true],
                    ['id' => 'email', 'name' => 'email', 'type' => 'email', 'label' => 'Alamat Email', 'placeholder' => 'Contoh: siswa@sekolah.com', 'required' => true],
                ] as $field)
                <div>
                    <label for="{{ $field['id'] }}" class="block text-sm font-semibold mb-1.5" style="color: #334155;">{{ $field['label'] }}</label>
                    <input id="{{ $field['id'] }}" name="{{ $field['name'] }}" type="{{ $field['type'] }}"
                           @if($field['required']) required @endif
                           value="{{ old($field['name']) }}"
                           class="w-full px-4 py-3 border rounded-2xl text-sm transition-all duration-200 outline-none"
                           style="border-color: #E2E8F0; color: #0F172A; background: #F8FAFC;"
                           placeholder="{{ $field['placeholder'] }}"
                           onfocus="this.style.borderColor='#2563EB'; this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.1)'; this.style.background='white';"
                           onblur="this.style.borderColor='#E2E8F0'; this.style.boxShadow='none'; this.style.background='#F8FAFC';">
                    @error($field['name']) <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                @endforeach

                <div>
                    <label for="phone" class="block text-sm font-semibold mb-1.5" style="color: #334155;">
                        Nomor WhatsApp <span style="color: #94A3B8; font-weight: 400;">(Opsional)</span>
                    </label>
                    <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                           class="w-full px-4 py-3 border rounded-2xl text-sm transition-all duration-200 outline-none"
                           style="border-color: #E2E8F0; color: #0F172A; background: #F8FAFC;"
                           placeholder="Contoh: 08123456789"
                           onfocus="this.style.borderColor='#2563EB'; this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.1)'; this.style.background='white';"
                           onblur="this.style.borderColor='#E2E8F0'; this.style.boxShadow='none'; this.style.background='#F8FAFC';">
                </div>

                @foreach([
                    ['id' => 'password', 'name' => 'password', 'label' => 'Password', 'placeholder' => 'Minimal 8 karakter'],
                    ['id' => 'password_confirmation', 'name' => 'password_confirmation', 'label' => 'Konfirmasi Password', 'placeholder' => 'Ulangi password'],
                ] as $field)
                <div>
                    <label for="{{ $field['id'] }}" class="block text-sm font-semibold mb-1.5" style="color: #334155;">{{ $field['label'] }}</label>
                    <input id="{{ $field['id'] }}" name="{{ $field['name'] }}" type="password" required
                           class="w-full px-4 py-3 border rounded-2xl text-sm transition-all duration-200 outline-none"
                           style="border-color: #E2E8F0; color: #0F172A; background: #F8FAFC;"
                           placeholder="{{ $field['placeholder'] }}"
                           onfocus="this.style.borderColor='#2563EB'; this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.1)'; this.style.background='white';"
                           onblur="this.style.borderColor='#E2E8F0'; this.style.boxShadow='none'; this.style.background='#F8FAFC';">
                    @error($field['name']) <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                @endforeach

                <div class="pt-1">
                    <button type="submit"
                            class="w-full py-3.5 px-4 rounded-2xl text-sm font-bold text-white border-none cursor-pointer transition-all duration-300"
                            style="background: linear-gradient(135deg, #2563EB, #1d4ed8); box-shadow: 0 8px 24px rgba(37,99,235,0.35);"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 32px rgba(37,99,235,0.45)';"
                            onmouseout="this.style.transform=''; this.style.boxShadow='0 8px 24px rgba(37,99,235,0.35)';">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-5 text-center">
                <p class="text-sm" style="color: #64748B;">
                    Sudah punya akun?
                    <a href="/admin/login" class="font-bold no-underline transition-colors duration-200" style="color: #2563EB;"
                       onmouseover="this.style.color='#F59E0B';" onmouseout="this.style.color='#2563EB';">
                        Login di sini
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
