<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\ContentReaderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Frontend\VideosFrontendController;
use App\Http\Controllers\Frontend\AudiosFrontendController;
use App\Http\Controllers\Frontend\PdfsFrontendController;
use App\Http\Controllers\Frontend\ArticlesFrontendController;
use App\Http\Controllers\Frontend\DevFrontendController;
use App\Http\Controllers\Payment\DownloadController;

use App\Http\Controllers\Content\{
    ArticleController,
    PdfController,
    AudioController,
    VideoController
};


// 🚀 Page publique
Route::get('/', [HomeController::class, 'landing'])->name('home');
// Route pour la page d'accueil

// 🌐 Auth via Google
Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// Routes accessibles uniquement aux utilisateurs connectés et vérifiés
Route::middleware(['auth'])->group(function () {

    Route::get('/content/checkout/{id}', [PayPalPaymentController::class, 'showCheckout'])->name('paypal.checkout');
    
    // Stream route should be more specific
    Route::get('/content/{id}/stream', [ContentReaderController::class, 'stream'])->name('content.stream');
    Route::get('/content/{id}/download', [ContentReaderController::class, 'download'])->name('content.download');
    
    // General content view route should come last
    Route::get('/content/{id}', [ContentReaderController::class, 'show'])->name('content.show');
    
    // Other routes
    Route::get('/paypal/success/{id}', [PayPalPaymentController::class, 'success'])->name('paypal.success');
    Route::get('/paypal/cancel', [PayPalPaymentController::class, 'cancel'])->name('paypal.cancel');
 //Frontend routes
    Route::get('/frontend/videos', [VideosFrontendController::class, 'index'])->name('frontend.videos');
    Route::get('/frontend/audios', [AudiosFrontendController::class, 'index'])->name('frontend.audios');
    Route::get('/frontend/pdf', [PdfsFrontendController::class, 'index'])->name('frontend.pdf');
    Route::get('/frontend/articles', [ArticlesFrontendController::class, 'index'])->name('frontend.articles');
    Route::get('/frontend/devs', [DevFrontendController::class, 'index'])->name('frontend.devs');

    Route::get('/accueil', [HomeController::class, 'discover'])->name('accueil');  
    Route::get('/users/dashboard', [HomeController::class, 'index'])->name('users.dashboard');
  //  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  //  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/full-update', [ProfileController::class, 'fullUpdate'])->name('profile.full-update');
});

// 🔒 Routes réservées aux administrateurs
Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/articles', ArticleController::class)->names('articles');
    Route::resource('/pdf', PdfController::class)->names('pdf');
    Route::resource('/audios', AudioController::class)->names('audios');
    Route::resource('/videos', VideoController::class)->names('videos');
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
