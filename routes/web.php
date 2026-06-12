<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeaturedController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Featured
Route::get('/featured', [FeaturedController::class, 'index'])->name('featured.index');

// Blog routes
Route::get('/blog',        [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog',       [BlogController::class, 'store'])->name('blog.store');
