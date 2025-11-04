<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\HasilController;

Route::view('/', 'user.index');
Route::get('/login',[AuthController::class, 'index'])->name('login.form');
Route::post('/login',[AuthController::class, 'authenticate'])->name('login.authenticate');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Siswa Routes
    Route::resource('siswa', SiswaController::class);
    // Category Routes
    Route::resource('category', CategoryController::class);
    // Pertanyaan Routes
    Route::resource('pertanyaan', PertanyaanController::class);
    // Hasil Routes
    Route::resource('hasil', HasilController::class);
});

