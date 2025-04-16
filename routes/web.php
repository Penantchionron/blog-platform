<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Content\{
    ArticleController,
    PdfController,
    AudioController,
    VideoController
};
use App\Http\Controllers\Auth\GoogleController;

// Auth via Google
Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/', [HomeController::class, 'landing'])->name('home'); // 👈 Page d’accueil
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/discover', [HomeController::class, 'discover'])->name('accueil'); // 👈 Page après login
    });
// Redirection post-login
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('layouts.dashboard');
    })->name('admin.dashboard');
});

    Route::patch('/profile/full-update', [ProfileController::class, 'fullUpdate'])->name('profile.full-update');

Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/full-update', [ProfileController::class, 'fullUpdate'])->name('profile.full-update');

    // Contents
    Route::resource('/articles', ArticleController::class)->names('articles');
    Route::resource('/pdf', PdfController::class)->names('pdf');
    Route::resource('/audios', AudioController::class)->names('audios');
    Route::resource('/videos', VideoController::class)->names('videos');
});

// Admin routes protégées par rôle
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('layouts.dashboard');
    })->name('admin.dashboard');
    Route::get('/dashboard', function () {
        return view('modules.accueil'); // adapte selon ta vue
    })->middleware(['auth'])->name('modules.accueil');
    Route::get('/faq', function () {
        return view('faq.accueil');
    })->name('faq.accueil');
    // Trading
    Route::get('/devs', function () {
        return view('devs.accueil');
    })->name('devs');
    
    // Paiements
    Route::get('/paiements', function () {
        return view('paiements.accueil');
    })->name('paiements');
    
    // Téléchargements
    Route::get('/telechargements', function () {
        return view('downloads.accueil');
    })->name('downloads');
    
    Route::get('/premiums', function () {
        return view('premiums.accueil');
    })->name('premiums');  
    
    Route::get('/users', function () {
        return view('users.accueil');
    })->name('users');  
    
    Route::get('/transactions', function () {
        return view('transactions.accueil');
    })->name('transactions');  
});

// Auth routes de Breeze
require __DIR__.'/auth.php';
