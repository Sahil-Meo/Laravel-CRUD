<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeaturedController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth
Route::get('/login',           [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login',          [AuthController::class, 'login'])->name('auth.login.submit');
Route::post('/logout',         [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('auth.forgot');

// Profile
Route::get('/create-profile',          [ProfileController::class, 'create'])->name('profile.create');
Route::post('/create-profile/seeker',  [ProfileController::class, 'storeSeekerProfile'])->name('profile.seeker.store');
Route::post('/create-profile/employer',[ProfileController::class, 'storeEmployerProfile'])->name('profile.employer.store');

// Featured
Route::get('/featured', [FeaturedController::class, 'index'])->name('featured.index');

// Blog routes
Route::get('/blog',        [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog',       [BlogController::class, 'store'])->name('blog.store');
