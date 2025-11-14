<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// 🔹 Landing Page (untuk pengunjung yang belum login)
Route::get('/', function () {
    if (auth()->check()) {
        // Kalau sudah login, arahkan ke halaman utama sesuai role
        return redirect(auth()->user()->role === 'admin' ? route('admin.users.index') : route('items.index'));
    }
    // Kalau belum login, tampilkan halaman landing
    return view('landing', ['title' => 'Sistem Inventori Barang']);
})->name('landing');

// 🔹 Auth routes (dari Breeze)
require __DIR__.'/auth.php';

// 🔹 Dashboard
Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'Dashboard'
    ]);
})->middleware(['auth'])->name('dashboard');

// 🔹 Protected routes (user biasa)
Route::middleware(['auth'])->group(function () {
    Route::resource('items', ItemController::class);
});

// 🔹 Admin-only area
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth','role:admin'])
    ->group(function () {
        Route::resource('users', AdminUserController::class)->except(['show']);
    });
