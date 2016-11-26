<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FacebookAccountService;
use Socialite;

class FacebookAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(FacebookAccountService $service)
    {
        $facebookUser = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($facebookUser);

        return redirect()->to('/home');
    }
}
