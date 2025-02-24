<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    // public function login_form(){
    //     $formData = [
    //         'email'=>null,
    //         'password'=> null,
    //     ];
    //     return response()->json($formData);
    // }

    public function admin_login_process(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the authenticated user
    
            // Check if user_type_id is 1
            if ($user->usertype_id != 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }
    
            // Generate token for authenticated user
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['firstname'] = $user->firstname;
            $success['middlename'] = $user->middlename;
            $success['lastname'] = $user->lastname;
            $success['user_type'] = $user->usertype_id; // Ensure correct property name
    
            return response()->json([
                'success' => true,
                'data' => $success,
                'message' => 'User login successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }
    }


    public function jobseeker_login_process(Request $request)
{
    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        $user = Auth::user(); // Get authenticated user

        // Ensure user is a Jobseeker
        if ($user->usertype_id != 2) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        // Generate Sanctum token
        $token = $user->createToken('MyAppToken')->plainTextToken;

        return response()->json([
            'success' => true,
            'data' => [
                'token' => $token,
                'firstname' => $user->firstname,
                'middlename' => $user->middlename,
                'lastname' => $user->lastname,
                'user_type' => $user->usertype_id,
            ],
            'message' => 'User login successfully'
        ], 200);
    }

    return response()->json([
        'success' => false,
        'message' => 'Invalid credentials'
    ], 401);
}

    public function EmployerLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the authenticated user
    
            // Check if user_type_id is 1
            if ($user->usertype_id != 3) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }
    
            // Generate token for authenticated user
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['firstname'] = $user->firstname;
            $success['middlename'] = $user->middlename;
            $success['lastname'] = $user->lastname;
            $success['user_type'] = $user->usertype_id; // Ensure correct property name
    
            return response()->json([
                'success' => true,
                'data' => $success,
                'message' => 'User login successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function dashboard(){
        if(Auth::check()){
            $credentials=[
                'user_id' => Auth::id(),
                'firstname' => Auth::user()?->firstname,
                'lastname' => Auth::user()?->lastname,
                'user_type' => Auth::user()?->usertype_id,
                'password' => Auth::user()?->password,
            ];
        }else{
            $credentials=[
                'user_id' => '',
                'firstname' => '',
                'lastname' => '',
                'user_type' => '',
                'password' => '',
            ];
        }
        return response()->json($credentials);
   }
}
