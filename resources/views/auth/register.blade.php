<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Portal Study Club</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body
    class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative">

    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-brand-yellow/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-brand-blue/10 rounded-full blur-3xl"></div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md relative z-10">
        <a href="/" class="flex justify-center items-center gap-2 mb-6 hover:scale-105 transition-transform">
            <div
                class="w-10 h-10 bg-brand-blue rounded-lg flex items-center justify-center text-white font-bold text-lg shadow-lg">
                SC</div>
            <div class="font-extrabold text-3xl text-brand-blue tracking-tight">
                Study<span class="text-brand-yellow">Club</span>
            </div>
        </a>
        <h2 class="text-center text-2xl font-bold text-slate-900 mb-2">Buat Akun Siswa Baru</h2>
        <p class="text-center text-sm text-slate-500">Mulai perjalananmu mengeksplorasi minat dan bakat.</p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md relative z-10">
        <div class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 sm:rounded-3xl sm:px-10 border border-slate-100">

            <form action="{{ route('register.process') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700">Nama Lengkap</label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" required value="{{ old('name') }}"
                            class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition sm:text-sm"
                            placeholder="Contoh: Wibowo Assariy">
                    </div>
                    @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700">Alamat Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" required value="{{ old('email') }}"
                            class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition sm:text-sm"
                            placeholder="Contoh: siswa@sekolah.com">
                    </div>
                    @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-semibold text-slate-700">Nomor WhatsApp <span
                            class="text-slate-400 font-normal">(Opsional)</span></label>
                    <div class="mt-1">
                        <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                            class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition sm:text-sm"
                            placeholder="Contoh: 08123456789">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required
                            class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition sm:text-sm"
                            placeholder="Minimal 8 karakter">
                    </div>
                    @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-slate-700">Konfirmasi
                        Password</label>
                    <div class="mt-1">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition sm:text-sm"
                            placeholder="Ulangi password">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-brand-blue hover:bg-blue-800 hover:shadow-lg hover:shadow-blue-900/30 transition-all transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-blue">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-slate-500">
                    Sudah punya akun?
                    <a href="/admin/login" class="font-bold text-brand-blue hover:text-brand-yellow transition">Login di
                        sini</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
