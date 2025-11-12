<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// 🔹 Jika belum login, tampilkan halaman login
Route::get('/', function () {
    if (auth()->check()) {
        // Kalau sudah login, arahkan ke halaman utama sesuai role
        return redirect(auth()->user()->role === 'admin' ? '/admin/users' : '/items');
    }
    return redirect('/login');
});

// Auth routes (Breeze)
require __DIR__.'/auth.php';

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::resource('items', ItemController::class);
});

// Admin-only area
Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::resource('users', AdminUserController::class)->except(['show']);
});
