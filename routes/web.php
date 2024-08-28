<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/auth/redirect', function() {
//     return Socialite::driver('github')->redirect();
// });

// Route::get('/auth/callback', function() {
//     $user = Socialite::driver('github')->user();
// });