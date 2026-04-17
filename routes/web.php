<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// ROUTE PUBLIK (Landing Page & Detail)
// ==========================================
Route::get('/', [FrontEndController::class, 'index'])->name('home');

Route::get('/club/{slug}', [FrontEndController::class, 'show'])->name('club.show');

// ==========================================
// ROUTE GUEST (Untuk yang BELUM login)
// ==========================================
Route::middleware('guest')->group(function () {
    // Form Pendaftaran Akun Siswa Baru
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

// Route khusus Logout
Route::post('/logout-frontend', [AuthController::class, 'logout'])->name('logout.frontend');