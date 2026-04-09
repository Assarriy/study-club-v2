<?php

use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontEndController::class, 'index'])->name('home');

Route::get('/club/{slug}', [FrontEndController::class, 'show'])->name('club.show');