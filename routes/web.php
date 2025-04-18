<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleController;

use App\Http\Controllers\Content\{
    ArticleController,
    PdfController,
    AudioController,
    VideoController
};

// 🚀 Page publique
Route::get('/', [HomeController::class, 'landing'])->name('home');

// 🌐 Auth via Google
Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// ✅ Routes accessibles uniquement aux utilisateurs connectés et vérifiés
Route::middleware(['auth'])->group(function () {
    Route::get('/accueil', [HomeController::class, 'discover'])->name('accueil');  
    Route::get('/users/dashboard', [HomeController::class, 'index'])->name('users.dashboard');
    // 🔐 Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/full-update', [ProfileController::class, 'fullUpdate'])->name('profile.full-update');
});

// 🔒 Routes réservées aux administrateurs
Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
   // Route::get('/dashboard', [AdminController::class, 'modules'])->name('modules.accueil');
    // 📁 Contenus protégés (Admin uniquement)
    Route::resource('/articles', ArticleController::class)->names('articles');
    Route::resource('/pdf', PdfController::class)->names('pdf');
    Route::resource('/audios', AudioController::class)->names('audios');
    Route::resource('/videos', VideoController::class)->names('videos');

    // 📊 Autres vues admin
    Route::view('/faq', 'faq.accueil')->name('faq.accueil');
    Route::view('/devs', 'devs.accueil')->name('devs');
    Route::view('/paiements', 'paiements.accueil')->name('paiements');
    Route::view('/telechargements', 'downloads.accueil')->name('downloads');
    Route::view('/premiums', 'premiums.accueil')->name('premiums');
    Route::view('/users', 'users.accueil')->name('users');
    Route::view('/transactions', 'transactions.accueil')->name('transactions');
});
// ✨ Auth routes générées par Laravel Breeze
require __DIR__.'/auth.php';
