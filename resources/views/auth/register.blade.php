<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR — STUDY CLUB PORTAL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: #FAFBFC;
            color: #111827;
            -webkit-font-smoothing: antialiased;
        }
        .fade-in { animation: fadeUp 0.4s ease-out; }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-center py-12 px-4">

    <div class="fade-in w-full max-w-md mx-auto">

        {{-- Logo --}}
        <a href="/" class="flex items-center justify-center gap-2.5 mb-8 no-underline">
            <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-sm shadow-blue-600/20">SC</div>
            <span class="text-lg font-bold text-zinc-900 tracking-tight">StudyClub</span>
        </a>

        {{-- Form Card --}}
        <div class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-zinc-100">
                <h1 class="text-lg font-bold text-zinc-900 tracking-tight">Buat Akun Baru</h1>
                <p class="text-sm text-zinc-500 mt-1">Mulai perjalananmu mengeksplorasi minat dan bakat.</p>
            </div>

            <form action="{{ route('register.process') }}" method="POST" class="p-6 space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                    <input id="name" name="name" type="text" required value="{{ old('name') }}"
                        class="w-full px-4 py-3 text-sm bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-800 placeholder-zinc-400 focus:bg-white focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        placeholder="Contoh: Wibowo Assariy">
                    @error('name') <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Email</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}"
                        class="w-full px-4 py-3 text-sm bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-800 placeholder-zinc-400 focus:bg-white focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        placeholder="siswa@sekolah.com">
                    @error('email') <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">WhatsApp <span class="text-zinc-400 normal-case">(opsional)</span></label>
                    <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                        class="w-full px-4 py-3 text-sm bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-800 placeholder-zinc-400 focus:bg-white focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        placeholder="08123456789">
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full px-4 py-3 text-sm bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-800 placeholder-zinc-400 focus:bg-white focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        placeholder="Minimal 8 karakter">
                    @error('password') <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Konfirmasi Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full px-4 py-3 text-sm bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-800 placeholder-zinc-400 focus:bg-white focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        placeholder="Ulangi password">
                </div>

                <button type="submit" class="w-full py-3.5 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition-all cursor-pointer border-none shadow-sm shadow-blue-600/20 mt-1">
                    Daftar Sekarang
                </button>
            </form>

            <div class="text-center py-4 border-t border-zinc-100">
                <p class="text-sm text-zinc-500">
                    Sudah punya akun?
                    <a href="/admin/login" class="font-semibold text-blue-600 hover:text-blue-700 transition-colors">Login di sini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
