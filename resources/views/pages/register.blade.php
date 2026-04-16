@extends('layouts.portal')
@section('title', 'Daftar Akun Baru')

@section('content')
<main class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="w-full max-w-xl space-y-8 bg-surface-container-lowest/90 backdrop-blur-3xl p-10 rounded-3xl shadow-2xl border border-white/50">
        <div class="text-center">
            <div class="mx-auto w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4 border border-primary/20">
                <span class="material-symbols-outlined text-primary text-3xl">app_registration</span>
            </div>
            <h2 class="font-headline font-extrabold text-3xl text-primary tracking-tight">Buat Akun Portal</h2>
            <p class="mt-2 text-on-surface-variant font-medium">Langkah pertama untuk bergabung dengan jutaan aktivitas Study Club yang menantimu.</p>
        </div>

        @if ($errors->any())
            <div class="bg-error-container text-on-error-container p-4 rounded-xl text-sm animate-fade-in shadow-sm">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.process') }}" class="mt-8 space-y-6">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <!-- Nama Lengkap -->
                <div class="flex flex-col gap-2 relative">
                    <label class="text-xs font-extrabold text-primary uppercase tracking-widest pl-1">Nama Lengkap</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline/50">person</span>
                        </span>
                        <input name="name" type="text" required value="{{ old('name') }}" class="w-full pl-12 pr-4 py-3 bg-surface-container rounded-xl border border-transparent focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-on-surface placeholder:text-outline/40 shadow-inner" placeholder="Budi Santoso">
                    </div>
                </div>

                <!-- Email -->
                <div class="flex flex-col gap-2 relative">
                    <label class="text-xs font-extrabold text-primary uppercase tracking-widest pl-1">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline/50">mail</span>
                        </span>
                        <input name="email" type="email" required value="{{ old('email') }}" class="w-full pl-12 pr-4 py-3 bg-surface-container rounded-xl border border-transparent focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-on-surface placeholder:text-outline/40 shadow-inner" placeholder="budi@example.com">
                    </div>
                </div>

                <!-- No HP WhatsApp -->
                <div class="flex flex-col gap-2 relative">
                    <label class="text-xs font-extrabold text-primary uppercase tracking-widest pl-1">No WhatsApp <span class="text-outline text-[10px] font-normal lowercase">(opsional)</span></label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline/50">call</span>
                        </span>
                        <input name="phone" type="text" value="{{ old('phone') }}" class="w-full pl-12 pr-4 py-3 bg-surface-container rounded-xl border border-transparent focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-on-surface placeholder:text-outline/40 shadow-inner" placeholder="08123456789">
                    </div>
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-2 relative">
                    <label class="text-xs font-extrabold text-primary uppercase tracking-widest pl-1">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline/50">lock</span>
                        </span>
                        <input name="password" type="password" required class="w-full pl-12 pr-4 py-3 bg-surface-container rounded-xl border border-transparent focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-on-surface placeholder:text-outline/40 shadow-inner" placeholder="Minimal 8 karakter">
                    </div>
                </div>

                <!-- Konfirmasi Password -->
                <div class="flex flex-col gap-2 relative">
                    <label class="text-xs font-extrabold text-primary uppercase tracking-widest pl-1">Ulangi Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline/50">verified_user</span>
                        </span>
                        <input name="password_confirmation" type="password" required class="w-full pl-12 pr-4 py-3 bg-surface-container rounded-xl border border-transparent focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-on-surface placeholder:text-outline/40 shadow-inner" placeholder="Tulis kembali kata sandi">
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full group relative flex items-center justify-center gap-3 py-4 bg-secondary-container hover:bg-secondary-fixed-dim text-on-secondary-container font-headline font-extrabold text-lg rounded-2xl transition-all duration-300 transform active:scale-[0.98] shadow-xl shadow-secondary/20 hover:shadow-secondary/40">
                    <span class="tracking-tight">Daftar Akun</span>
                    <span class="material-symbols-outlined text-xl group-hover:translate-x-1.5 transition-transform duration-300">how_to_reg</span>
                </button>
            </div>
            
            <div class="text-center pt-2">
                <span class="text-sm text-on-surface-variant font-medium">Sudah punya akun? </span>
                <a href="{{ url('/admin/login') }}" class="text-sm font-bold text-primary hover:text-primary-container transition-colors underline decoration-2 underline-offset-4">Log in di sini</a>
            </div>
        </form>
    </div>
</main>
@endsection
