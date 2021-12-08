<?php

namespace App\Services;

use App\Jobs\SendEmail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuth
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
            SendEmail::dispatch($newUser, $password);
            Auth::login($newUser);

        }
    }
}
