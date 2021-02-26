<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect($service){
        return Socialite::driver($service)->redirect();

    }
    public function callback($service){

        $user = Socialite::with($service)->user();
          return $user_data = response()->json($user);
     /* $get_users_data =  $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();*/


    }

}
