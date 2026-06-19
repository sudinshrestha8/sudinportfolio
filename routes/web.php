<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// Public portfolio
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// Protected blog routes (require login)
Route::middleware('auth')->group(function () {
    Route::get('/blog/{slug}', [PortfolioController::class, 'blogShow'])->name('blog.show');
});
