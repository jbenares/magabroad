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
            $success['user_type'] = $user->usertype_id; // Ensure correct property name

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User login successfully'
            ];
                return response()->json($response, 200);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Unauthorized'
                ];
                return response()->json($response,200);     
            }
    }


    public function jobseeker_login_process(Request $request)
{
    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        $user = $request->user(); // Get authenticated user

        // Ensure user is a Jobseeker
        if ($user->usertype_id != 2) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        // Generate Sanctum token
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['firstname'] = $user->firstname;
        $success['approved'] = $user->approved;
        $success['user_type'] = $user->usertype_id;
            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User login successfully'
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => 'Unauthorized'
            ];
            return response()->json($response,200);     
        }
}

    public function EmployerLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            $user = $request->user(); // Get the authenticated user
    
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
            $success['approved'] = $user->approved;
            $success['user_type'] = $user->usertype_id;
                $response = [
                    'success' => true,
                    'data' => $success,
                    'message' => 'User login successfully'
                ];
                return response()->json($response, 200);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Unauthorized'
                ];
                return response()->json($response,200);     
            }
    }

    public function dashboard(){
        if(Auth::check()){
            $credentials=[
                'firstname' => Auth::user()?->firstname,
                'approved' => Auth::user()?->approved,
                'user_type' => Auth::user()?->usertype_id,
                'password' => Auth::user()?->password,
            ];
        }else{
            $credentials=[
                'firstname' => '',
                'approved' => 0,
                'user_type' => '',
                'password' => '',
            ];
        }
        return response()->json($credentials);
   }
}
