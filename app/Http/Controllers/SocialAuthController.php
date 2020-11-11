<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function loginFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook() {
        // echo 111;exit;
        $user = Socialite::driver('facebook')->user();
        print_r($user);exit;
    }

    public function loginTwitter() {
        return Socialite::driver('twitter')->redirect();
    }

    public function callbackTwitter() {
        $user = Socialite::driver('twitter')->user();
        print_r($user);exit;
    }

    public function loginLinkedin() {
        return Socialite::driver('linkedin')->redirect();
    }

    public function callbackLinkedin() {
        $user = Socialite::driver('linkedin')->user();
        print_r($user);exit;
    }
}
