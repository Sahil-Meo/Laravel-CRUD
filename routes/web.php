<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Blog routes
Route::get('/blog',        [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog',       [BlogController::class, 'store'])->name('blog.store');
