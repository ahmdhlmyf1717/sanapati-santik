<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\DashboardController;

// Redirect ke dashboard sebagai halaman utama
Route::get('/', function () {
    return redirect('/dashboard');
});

// Route untuk halaman login dan logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard dengan proteksi middleware auth
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Route untuk export - HARUS DITEMPATKAN SEBELUM ROUTE RESOURCE
Route::get('/surats/export', [SuratController::class, 'export'])
    ->middleware('auth')
    ->name('surats.export');

// Resource route untuk surat dengan proteksi auth
Route::resource('surats', SuratController::class)->middleware('auth');

// Route untuk halaman FAQ
Route::get('/faq', [FAQController::class, 'index'])->name('faq');

// Rute fallback untuk menangani URL yang tidak dikenal
Route::fallback(function () {
    return redirect()->route('dashboard'); // Arahkan ke dashboard
    // Atau tampilkan view 404 khusus
    // return view('errors.404');
});
