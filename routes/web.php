<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'user.index');
Route::get('/login',[AuthController::class, 'index'])->name('login.form');
Route::post('/login',[AuthController::class, 'authenticate'])->name('login.authenticate');
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    // Siswa Routes
    Route::resource('siswa', App\Http\Controllers\SiswaController::class);
});

