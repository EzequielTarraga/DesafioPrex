<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiphyController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/dashboard', [GiphyController::class, 'showDashboard'])->name('dashboard');

Route::get('/search-gifs-by-id', [GiphyController::class, 'showSearchGifsByIdForm'])->name('search-gifs-by-id');
Route::post('/search-gifs-by-id', [GiphyController::class, 'searchGifById'])->name('search-gif-by-id');
Route::get('/search-gifs-by-phrase', [GiphyController::class, 'showSearchGifsByPhraseForm'])->name('search-gifs-by-phrase');
Route::post('/search-gifs-by-phrase', [GiphyController::class, 'searchGifsByPhrase'])->name('search-gifs-by-phrase-action');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/add-to-favorites', [GiphyController::class, 'showAddToFavoritesForm'])->name('add-to-favorites-form');
Route::post('/add-to-favorites', [GiphyController::class, 'addToFavorites'])->name('add-to-favorites');

Route::get('/', function () {
    return view('auth/login');
});
