<?php

use App\Http\Middleware\CustomAuth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

Route::get('/home', function () {
    return view('welcome');
})->name('view.home');

Route::get('/heropage', function () {
    return view('heroPage');
})->name('view.heropage')->middleware(CustomAuth::class);

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('view.home');
})->name('logout')->middleware(CustomAuth::class);

Route::get('/userForm', [LoginController::class, 'createUserForm'])->name('user.form');
Route::post('/userForm/create', [LoginController::class, 'createUser'])->name('user.create');

Route::get('/auth/github/redirect', [LoginController::class, 'githubRedirect'])->name('githubRedirect');
Route::get('/auth/github/callback', [LoginController::class, 'githubCallback'])->name('githubCallback');

Route::get('/auth/google/redirect', [LoginController::class, 'googleredirect'])->name('googleRedirect');
Route::get('/auth/google/callback', [LoginController::class, 'googlecallback'])->name('googleCallback');
