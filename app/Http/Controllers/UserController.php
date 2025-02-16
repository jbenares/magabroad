<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CountryCodes;

class UserController extends Controller
{   
    public function all_countrycode(){
        $countrycode_list=CountryCodes::orderBy('country_name','ASC')->get()->unique('country_name');
        $countrycodelist = array();
        foreach($countrycode_list AS $ccl){
            $countrycodelist[] = [
                'id'=>$ccl->id,
                'country_name'=>$ccl->country_name,
                'country_code' =>$ccl->country_code,
            ];
        }
        return response()->json($countrycodelist);
    }

    public function checkEmployerEmail($email){
        $exists = User::where('email', $email)->where('usertype_id', '3')->exists();

        return response()->json(['exists' => $exists]);
    }

    public function add_employer(Request $request){

        try {
            DB::beginTransaction();
            $employer_details['email']=$request->input('email');
            $employer_details['password']=$request->input('password');
            $employer_details['firstname']=$request->input('firstname');
            $employer_details['middlename']=$request->input('middlename');
            $employer_details['lastname']=$request->input('lastname');
            $employer_details['contact_no']=$request->input('contact_no');
            $employer_details['country_code_id']=$request->input('country_code_id');
            $employer_details['business_name']=$request->input('business_name');
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

    public function checkJobseekerEmail($email){
        $exists = User::where('email', $email)->where('usertype_id', '2')->where('registration_via', '!=', 'facebook')->exists();

        return response()->json(['exists' => $exists]);
    }

    public function add_jobseeker(Request $request){

        try {
            DB::beginTransaction();
            $jobseeker_details['email']=$request->input('email');
            $jobseeker_details['password']=$request->input('password');
            $jobseeker_details['firstname']=$request->input('firstname');
            $jobseeker_details['middlename']=$request->input('middlename');
            $jobseeker_details['lastname']=$request->input('lastname');
            $jobseeker_details['contact_no']=$request->input('contact_no');
            $jobseeker_details['country_code_id']=$request->input('country_code_id');
            $jobseeker_details['usertype_id']='2';
            $jobseeker_details['registration_date']=date("Y-m-d");
            $jobseeker_details['registration_via']='manual';
            User::create($jobseeker_details);
        
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
