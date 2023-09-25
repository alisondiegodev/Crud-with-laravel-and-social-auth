<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        $users = new User();

        $users->name = $newUser->getName();
        $users->email = $newUser->getEmail();
        $users->avatar = $newUser->getAvatar();

        $users->save();


        return view('welcome', ["user" => $newUser]);
    }
}
