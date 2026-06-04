<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/blog/{slug}', [PortfolioController::class, 'blogShow'])->name('blog.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
