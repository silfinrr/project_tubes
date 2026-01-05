<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;

// Ini jalur buat masuk (Login) sama keluar (Logout)
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

// Kalau mau daftar akun baru, lewat sini jalurnya
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

// Kalau buka halaman utama, langsung oper ke daftar artikel aja
Route::get('/', function () {
    return redirect('/articles');
});

// Nah, yang ada di dalam grup ini cuma bisa diakses kalau udah login ya
Route::middleware('auth')->group(function () {
    // Resource buat ngurusin CRUD Artikel (Create, Read, Update, Delete)
    Route::resource('articles', ArticleController::class);
});