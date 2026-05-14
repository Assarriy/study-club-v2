<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudyClubController;
use App\Http\Controllers\Api\PostController;

// Public Routes
Route::post('/login', [AuthController::class, 'login']);


// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Study Clubs
    Route::get('/study-clubs', [StudyClubController::class, 'index']);
    Route::get('/study-clubs/{id}', [StudyClubController::class, 'show']);

    // Posts CRUD
    Route::apiResource('posts', PostController::class);
});
