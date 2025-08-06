<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DashboardController; // ✅ Tambahkan ini

// ✅ Dashboard menampilkan Film & Genre sekaligus
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// CRUD Film
Route::resource('film', FilmController::class);

// CRUD Genre
Route::resource('genre', GenreController::class);
