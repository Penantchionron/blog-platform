<?php

use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');;
    Route::get('/dashboard', function () {
        return view('modules.accueil');
    });
    Route::get('/faq', function () {
        return view('faq.accueil');
    })->name('faq.accueil');
    Route::get('/dashboard', function () {
        return view('modules.accueil'); // Assure-toi que ce fichier existe dans resources/views/dashboard/accueil.blade.php
    })->name('modules.accueil');
    // Vidéos
Route::get('/videos', function () {
    return view('videos.accueil');
})->name('videos');

// Trading
Route::get('/devs', function () {
    return view('devs.accueil');
})->name('devs');

// PDF
Route::get('/pdf', function () {
    return view('pdf.accueil');
})->name('pdf');

// Paiements
Route::get('/paiements', function () {
    return view('paiements.accueil');
})->name('paiements');

// Téléchargements
Route::get('/telechargements', function () {
    return view('downloads.accueil');
})->name('downloads');

Route::get('/articles', function () {
    return view('articles.accueil');
})->name('articles');  

Route::get('/premiums', function () {
    return view('premiums.accueil');
})->name('premiums');  

Route::get('/users', function () {
    return view('users.accueil');
})->name('users');  

Route::get('/transactions', function () {
    return view('transactions.accueil');
})->name('transactions');  
