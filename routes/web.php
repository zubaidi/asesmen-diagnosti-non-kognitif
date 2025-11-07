<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;

Route::get('/', [UserController::class, 'index']);
Route::post('/start-questionnaire', [UserController::class, 'startQuestionnaire'])->name('user.start');
Route::get('/questionnaire', [UserController::class, 'questionnaire'])->name('user.questionnaire');
Route::get('/submit-questionnaire', [UserController::class, 'submitPage'])->name('user.submit.page');
Route::post('/save-answer', [AnswerController::class, 'saveAnswer'])->name('save.answer');
Route::post('/questionnaire', [UserController::class, 'submit'])->name('user.submit');
Route::get('/hasil', [UserController::class, 'hasil'])->name('user.hasil');
Route::get('/category-result', [UserController::class, 'categoryResult'])->name('user.category.result');
Route::get('/login',[AuthController::class, 'index'])->name('login.form');
Route::post('/login',[AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Siswa Routes
    Route::resource('siswa', SiswaController::class);
    // Category Routes
    Route::resource('category', CategoryController::class);
    // Pertanyaan Routes
    Route::resource('pertanyaan', PertanyaanController::class);
    // Hasil Routes
    Route::get('hasil/export', [HasilController::class, 'export'])->name('hasil.export');
    Route::resource('hasil', HasilController::class);
    // Profile Routes
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

