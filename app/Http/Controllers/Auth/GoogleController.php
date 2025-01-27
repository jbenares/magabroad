<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    public function redirectToGoogle($google)
    {
        return Socialite::driver($google)->redirect();
    }

    public function handleGoogleCallback()
    {
        try{
            $google_user = Socialite::driver('google')->stateless()->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if(!$user){
                $new_user = User::create([
                    // 'firstname' => $google_user->getName(),
                    // 'middlename' => $google_user->getmiddlename(),
                    // 'lastname' => $google_user->getlastname(),
                    'email' => $google_user->Email(),
                    'google_id' => $google_user->getId(),
                ]);

                Auth::login($new_user);
                return redirect()->intended('job_seeker/dashboard');
            }else{
                Auth::login($user);
                return redirect()->intended('job_seeker/dashboard');
            }
        } catch (\Throwable $th){
            dd('Something went wrong! '. $th->getMessage());
        }
    }
}
