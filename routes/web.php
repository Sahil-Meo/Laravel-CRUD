<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\FeaturedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return view('home');
})->name('home');

// About
Route::get('/about',   [AboutController::class, 'index'])->name('about');

// Pricing
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

// Candidates
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');

// Contact
Route::get('/contact',  [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

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
Route::get('/blog',           [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create',    [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog',          [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{id}',      [BlogController::class, 'show'])->name('blog.show');

// Salary Insights
Route::get('/salary-insights', [SalaryController::class, 'index'])->name('salary.index');


