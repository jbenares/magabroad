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
            $fullName = $google_user->getName();
            $nameParts = explode(' ', $fullName); // Split by spaces
            
            if (count($nameParts) > 1) {
                $lastName = array_pop($nameParts); // Get the last word as last name
                $firstName = implode(' ', $nameParts); // The rest as first name
            } else {
                $firstName = $fullName; // If there's only one word, treat it as first name
                $lastName = ''; // No last name available
            }

            if (!$user) {
                $new_user = User::create([
                    'firstname' => $firstName,
                    'lastname' => $lastName,
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'registration_date'=>date("Y-m-d"),
                    'registration_via'=>'google',
                    'usertype_id'=>'2'
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
