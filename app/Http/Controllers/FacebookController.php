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
            $fullName = $facebook_user->getName();
            $nameParts = explode(' ', $fullName, 2); // Split into two parts (first name and last name)

            $firstName = $nameParts[0]; 
            $lastName = isset($nameParts[1]) ? $nameParts[1] : ''; // Handle cases where there's no last name

            if (!$user) {
                $new_user = User::create([
                    'firstname' => $firstName,
                    'lastname' => $lastName,
                    'email' => $facebook_user->getEmail(),
                    'facebook_id' => $facebook_user->getId(),
                    'registration_date'=>date("Y-m-d"),
                    'registration_via'=>'facebook',
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
