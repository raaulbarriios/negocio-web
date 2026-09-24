<?php

use App\Http\Controllers\GameStoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GameStoreController::class, 'home'])->name('home');
Route::get('/catalogo', [GameStoreController::class, 'catalog'])->name('catalog');
Route::get('/nosotros', [GameStoreController::class, 'about'])->name('about');
