<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\DatabaseController;

// Rute untuk login dan logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk registrasi
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// Rute yang membutuhkan autentikasi
Route::middleware('auth')->group(function () {
    
    // Rute khusus admin
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('add-candidate', [AdminController::class, 'addCandidate'])->name('admin.addCandidate');
        Route::delete('delete-pemilih/{id}', [AdminController::class, 'deletePemilih'])->name('admin.deletePemilih');
    });

    // Rute khusus pemilih
    Route::prefix('pemilih')->group(function () {
        Route::get('/vote', [VoteController::class, 'index'])->name('pemilih.vote');
        Route::post('/vote', [VoteController::class, 'vote']);
        Route::get('/hasil', [VoteController::class, 'hasil'])->name('pemilih.hasil');
    });

    // Rute pengecekan koneksi database
    Route::get('/check-connection', [DatabaseController::class, 'checkConnection'])->name('database.check');
});
