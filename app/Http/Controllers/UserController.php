<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{   
    
    public function add_employer(Request $request){

        try {
            DB::beginTransaction();
            $employer_details['email']=$request->input('email');
            $employer_details['password']=$request->input('password');
            $employer_details['firstname']=$request->input('firstname');
            $employer_details['middlename']=$request->input('middlename');
            $employer_details['lastname']=$request->input('lastname');
            $employer_details['contact_no']=$request->input('contact_no');
            $employer_details['usertype_id']='3';
            $employer_details['registration_date']=date("Y-m-d");
            $employer_details['registration_via']='manual';
            User::create($employer_details);
        
            DB::commit();
        
            return response()->json(['message' => 'Successful!'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
           
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function add_jobseeker(Request $request){

        try {
            DB::beginTransaction();
            $employer_details['email']=$request->input('email');
            $employer_details['password']=$request->input('password');
            $employer_details['firstname']=$request->input('firstname');
            $employer_details['middlename']=$request->input('middlename');
            $employer_details['lastname']=$request->input('lastname');
            $employer_details['contact_no']=$request->input('contact_no');
            $employer_details['usertype_id']='2';
            $employer_details['registration_date']=date("Y-m-d");
            $employer_details['registration_via']='manual';
            User::create($employer_details);
        
            DB::commit();
        
            return response()->json(['message' => 'Successful!'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
           
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
