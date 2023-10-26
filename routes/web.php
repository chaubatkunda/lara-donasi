<?php

use App\Http\Controllers\{AuthGoogleController,
    CampaignController,
    DashboardController,
    DonaturController,
    HomeController};
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/donasi/{slug}', [HomeController::class, 'kumpuldonasi'])->name('kumpul.donasi');

// Login & Register Google
Route::get('/login-google', [AuthGoogleController::class, 'logingoogle'])->name('login.google');
Route::get('/auth/google/callback', [AuthGoogleController::class, 'callbackGoogle']);
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/donasi/{slug}/nominal', [HomeController::class, 'nominaldonasi'])->name('nominal.donasi');
    Route::get('/donasi-saya', [HomeController::class, 'donasisaya'])->name('donasi.saya');
    Route::get('/galang-dana', [HomeController::class, 'galangdana'])->name('galang.dana');
    Route::post('/galang-checkout', [HomeController::class, 'checkOut'])->name('galang.checkout');
    Route::get('/galang-checkout', [HomeController::class, 'checkOut'])->name('galang.view');
    Route::get('/pay/{id}', [HomeController::class, 'pay'])->name('pay');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resources([
        'campaign' => CampaignController::class,
        'donatur' => DonaturController::class
    ]);
});

require __DIR__ . '/auth.php';
