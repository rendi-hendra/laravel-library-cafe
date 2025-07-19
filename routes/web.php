<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Route hanya untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

// Route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'barang'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/barang/{id}/edit', [DashboardController::class, 'showEdit']);
    Route::post('/barang/{id}/edit', [DashboardController::class, 'edit'])->name('barang.edit');
    Route::delete('/barang/{id}', [DashboardController::class, 'destroy'])->name('barang.destroy');
});
