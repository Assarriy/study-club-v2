@extends('layouts.portal')
@section('title', 'Daftar Akun Baru')

@section('content')
<main class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="w-full max-w-md">

        {{-- Form Card --}}
        <div class="bg-white rounded-2xl border border-zinc-200/80 shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-zinc-100">
                <h1 class="text-lg font-bold text-zinc-900 tracking-tight">Buat Akun Baru</h1>
                <p class="text-sm text-zinc-500 mt-1">Mulai perjalananmu mengeksplorasi minat dan bakat.</p>
            </div>

            @if ($errors->any())
                <div class="mx-6 mt-4 px-4 py-3 bg-red-50 border border-red-200 text-red-600 text-sm rounded-xl">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.process') }}" class="p-6 space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                    <input id="name" name="name" type="text" required value="{{ old('name') }}"
                        class="w-full px-4 py-3 text-sm bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-800 placeholder-zinc-400 focus:bg-white focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        placeholder="Contoh: Wibowo Assariy">
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Alamat Email</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}"
                        class="w-full px-4 py-3 text-sm bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-800 placeholder-zinc-400 focus:bg-white focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        placeholder="siswa@sekolah.com">
                </div>

                <div>
                    <label for="phone" class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">No WhatsApp <span class="text-zinc-400 normal-case tracking-normal">(opsional)</span></label>
                    <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                        class="w-full px-4 py-3 text-sm bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-800 placeholder-zinc-400 focus:bg-white focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        placeholder="08123456789">
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full px-4 py-3 text-sm bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-800 placeholder-zinc-400 focus:bg-white focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none transition-all"
                        placeholder="Minimal 8 karakter">
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
                    <a href="{{ url('/admin/login') }}" class="font-semibold text-blue-600 hover:text-blue-700 transition-colors">Login di sini</a>
                </p>
            </div>
        </div>
    </div>
</main>
@endsection
