<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function githubRedirect() {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback() {
        $user = Socialite::driver('github')->user();
        
        // return ;
    }
}
