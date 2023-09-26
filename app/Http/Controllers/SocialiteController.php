<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $newUser = Socialite::driver('github')->user();

        $emailGithub = $newUser->getEmail();
        $userExist = User::where('email', $emailGithub)->first();

        if ($userExist) {
            Auth::login($userExist);
            return redirect()->route('dashboard');
        } else {
            $users = new User();
            $users->name = $newUser->getName();
            $users->email = $newUser->getEmail();
            $users->avatar = $newUser->getAvatar();
            $users->save();
            Auth::login($users);
        }

        return redirect()->route('dashboard');
    }
}
