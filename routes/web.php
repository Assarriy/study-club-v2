<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontEndController::class, 'index'])->name('home');

Route::prefix('kimia')->name('kimia.')->group(function () {
    Route::view('/landing', 'pages.landing')->name('landing');
    Route::view('/contact', 'pages.contact')->name('contact');
    Route::view('/info-center', 'pages.info-center')->name('info-center');
    Route::view('/gallery', 'pages.gallery')->name('gallery');
    Route::view('/login', 'pages.login')->name('login');
    Route::view('/recruitment', 'pages.recruitment')->name('recruitment');
    Route::view('/profile', 'pages.profile')->name('profile');
    Route::view('/hub', 'pages.hub')->name('hub');
    Route::view('/directory', 'pages.directory')->name('directory');
    Route::view('/links', 'pages.links')->name('links');
});

// Route::get('/old-home', [FrontEndController::class, 'index'])->name('old.home');

Route::get('/club/{slug}', [FrontEndController::class, 'show'])->name('club.show');

Route::post('/club/{slug}/register', [FrontEndController::class, 'register'])
    ->name('club.register')
    ->middleware('auth');

Route::get('/club/{slug}/post/{postSlug}', [FrontEndController::class, 'showPost'])->name('club.post.show');
Route::get('/club/{slug}/achievement/{id}', [FrontEndController::class, 'showAchievement'])->name('club.achievement.show');

// Route khusus untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

// Route khusus Logout
Route::post('/logout-frontend', [AuthController::class, 'logout'])->name('logout.frontend');
