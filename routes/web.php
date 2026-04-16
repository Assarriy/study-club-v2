<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/search', [FrontEndController::class, 'search'])->name('search');
Route::get('/filter-category/{categoryId?}', [FrontEndController::class, 'filterByCategory'])->name('filter.category');
Route::get('/club/{slug}', [FrontEndController::class, 'show'])->name('club.show');

Route::post('/club/{slug}/register', [FrontEndController::class, 'register'])
    ->name('club.register')
    ->middleware('auth');

// Route khusus untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

// Route khusus Logout
Route::post('/logout-frontend', [AuthController::class, 'logout'])->name('logout.frontend');
