<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->stateless()->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'email' => $google_user->getEmail(),  // Correct method
                    'google_id' => $google_user->getId(),
                    'registration_date'=>date("Y-m-d"),
                    'registration_via'=>'google'
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
