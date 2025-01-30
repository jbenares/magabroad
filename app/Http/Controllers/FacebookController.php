<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class FacebookController extends Controller
{
    public function facebookpage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookredirect()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->stateless()->user();

            $user = User::where('facebook_id', $facebook_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'email' => $facebook_user->getEmail(),  // Correct method
                    'facebook_id' => $facebook_user->getId(),
                    'registration_date'=>date("Y-m-d"),
                    'registration_via'=>'facebook'
                ]);

                Auth::login($new_user);
                return redirect()->intended('job_seeker/dashboard');
            } else {
                Auth::login($user);
                return redirect()->intended('job_seeker/dashboard');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong! '. $th->getMessage());
        }
    }
}
