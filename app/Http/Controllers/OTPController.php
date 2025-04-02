<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;

class OTPController extends Controller
{
    public function sendOTP(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $otp = rand(100000, 999999);
        $email = $request->input('email');

        // Rate limiting to avoid excessive OTP requests
        $key = 'otp_request_' . $email;
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return response()->json(['message' => 'Too many requests. Please try again later.'], 429);
        }

        // Store OTP in cache for a limited time (e.g., 5 minutes)
        Cache::put('otp_' . $email, $otp, now()->addMinutes(5));

        // Send OTP via email (you can use SMS gateways for phone numbers)
        Mail::raw("Your MagAbroad OTP is: $otp", function ($message) use ($email) {
            $message->to($email)->subject('Your OTP Code');
        });

        RateLimiter::hit($key, 60);

        return response()->json(['message' => 'OTP sent successfully']);
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        $email = $request->input('email');
        $otp = $request->input('otp');

        $cachedOTP = Cache::get('otp_' . $email);

        if ($cachedOTP && $cachedOTP == $otp) {
            Cache::forget('otp_' . $email); // Invalidate OTP after successful verification
            return response()->json(['message' => 'OTP verified successfully']);
        } else {

            return response()->json(['message' => 'Invalid OTP or OTP expired'], 422);
        }

       // return response()->json(['message' => "'".$cachedOTP . "' = '" . $otp."'"], 422);
    }
}