<?php

use App\Http\Controllers\{
    HomeController
};
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('donasi');
Route::get('/donasi/{slug}', [HomeController::class, 'kumpuldonasi'])->name('kumpul.donasi');
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/donasi/{slug}/nominal', [HomeController::class, 'nominaldonasi'])->name('nominal.donasi');
    Route::get('/donasi-saya', [HomeController::class, 'donasisaya'])->name('donasi.saya');
    Route::get('/galang-dana', [HomeController::class, 'galangdana'])->name('galang.dana');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
