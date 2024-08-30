<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name('view.home');

Route::get('/heropage', [LoginController::class, 'heropage'])->name('view.heropage')->middleware('auth');

Route::get('/userForm', [LoginController::class, 'createUserForm'])->name('user.form');
Route::post('/userForm/create', [LoginController::class, 'createUser'])->name('user.create');

Route::get('/auth/github/redirect', [LoginController::class, 'githubRedirect'])->name('githubRedirect');

Route::get('/auth/github/callback', [LoginController::class, 'githubCallback'])->name('githubCallback');