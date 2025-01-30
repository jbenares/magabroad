<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            if ($user->user_type_id != 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }
    
            // Generate token for authenticated user
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
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


    public function jobseeker_login_process(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the authenticated user
    
            // Check if user_type_id is 1
            if ($user->user_type_id != 2) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }
    
            // Generate token for authenticated user
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
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

    
    public function employer_login_process(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the authenticated user
    
            // Check if user_type_id is 1
            if ($user->user_type_id != 3) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }
    
            // Generate token for authenticated user
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
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
}
