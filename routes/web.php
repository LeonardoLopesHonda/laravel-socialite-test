<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name('view.home');

Route::get('/auth/github/redirect', [LoginController::class, 'githubRedirect'])->name('githubRedirect');

Route::get('/auth/github/callback', [LoginController::class, 'githubCallback'])->name('githubCallback');