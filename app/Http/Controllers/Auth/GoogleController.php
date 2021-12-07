<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('email', $user->email)->orWhere('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect(route('home'));

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make(Str::rand(10))
                ]);

                Auth::login($newUser);

                return redirect(route('home'));
            }
    }
}
