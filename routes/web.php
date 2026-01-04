<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;

// Rute untuk Login dan Logout
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

// Rute untuk Registrasi (Daftar Akun)
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

// Redirect halaman utama ke daftar artikel
Route::get('/', function () {
    return redirect('/articles');
});

// Grup rute yang membutuhkan login (Autentikasi)
Route::middleware('auth')->group(function () {
    // Resource untuk CRUD 
    Route::resource('articles', ArticleController::class);
});