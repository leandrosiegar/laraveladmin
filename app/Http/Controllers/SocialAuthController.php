<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\SocialProfile;


class SocialAuthController extends Controller
{
    public function loginFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook(Request $request) {

        if ($request->get('error')) { // por ejemplo al dar a cancelar cuando se loguea con facebook
            return redirect()->route('login');
        }


        $userSocialite = Socialite::driver('facebook')->user();

        // check si ese email está ya dado de alta
        $user = User::where('email', $userSocialite->getEmail())->first();
        if (!$user) {
            $user = User::create([
                'name' => $userSocialite->getName(),
                'email' => $userSocialite->getEmail(),
               ]);
        }

        // check que ese social_id ya no esté metido de antes
        $socialProfile = SocialProfile::where('social_id',$userSocialite->getId())
                        ->where('social_name', 'Facebook')->first();

       if (!$socialProfile) {
            $socialProfile = SocialProfile::create([
                    'user_id' => $user->id,
                    'social_id' => $userSocialite->getId(),
                    'social_name' => 'Facebook',
                    'social_avatar' => $userSocialite->getAvatar(),
            ]);
       }

       // una vez metido o no metido (por estar de antes) vamos a loguearlo
       auth()->login($user);
       return redirect()->route('home');
    }

    public function loginTwitter() {
        return Socialite::driver('twitter')->redirect();
    }

    public function callbackTwitter() {
        $userS = Socialite::driver('twitter')->user();
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
