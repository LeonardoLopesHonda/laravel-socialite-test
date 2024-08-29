<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    public function githubRedirect() {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback() {
        $user = Socialite::driver('github')->user();
        
        // return ;
    }

    public function createUserForm() {
        return view('userForm');
    }

    public function createUser(Request $request) {
        $data = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'password' => 'string|required',
        ]);

        User::create($data);

        return redirect()->route('view.home');
    }

    public function heropage() {
        return view('heroPage');
    }
}
