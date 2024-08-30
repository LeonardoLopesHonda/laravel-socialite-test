<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function githubRedirect() {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback() {
        $user = Socialite::driver('github')->user();
        
        $this->createOrUpdateUser($user, 'github');

        return redirect()->route('view.heropage');
    }

    public function createUserForm() {
        return view('userForm');
    }

    public function createUser(Request $request) {
        $data = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'password' => 'string',
        ]);

        User::create($data);

        return redirect()->route('view.home');
    }

    private function createOrUpdateUser($data, $provider) {
        $user = User::where('email', $data->email)->first();

        if($user) {
            $user->updated([
                'provider' => $provider,
                'provider_id' => $data->id,
                'avatar' => $data->avatar
            ]);
        } else {
            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'provider' => $provider,
                'provider_id' => $data->id,
                'avatar' => $data->avatar
            ]);
        }

        Auth::login($user);
    }

    public function heropage() {
        return view('heroPage');
    }
}
