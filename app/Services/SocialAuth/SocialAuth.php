<?php

namespace App\Services\SocialAuth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuth implements ISocialAuth
{
    public static function Authenticate($authDriverName)
    {
        $user = Socialite::driver($authDriverName)->stateless()->user();
        $finduser = User::where('email', $user->email)->orWhere("$authDriverName" . "_id", $user->id)->first();
        if($finduser){

            Auth::login($finduser);

        }else{
            $password = Str::random(10);
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => Hash::make($password)
            ]);
            Auth::login($newUser);
            Mail::send(
                'emails/newUserEmail',
                [ 'user' => $newUser, 'password' => $password ],
                function ($m) use ($newUser) {
                    $m->from('testim.mailer@gmail.com', 'test');
                    $m->to($newUser->email, $newUser->name)->subject('just a test');
            });
        }
    }
}
