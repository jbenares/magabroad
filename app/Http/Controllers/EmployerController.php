<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Industry;
use App\Models\CountryCodes;


class EmployerController extends Controller
{

    public function checkEmployerPassword($password){
        $employerid = Auth::id();
        $user = User::find($employerid);

        if ($user && Hash::check($password, $user->password)) {
            return response()->json(['exists' => true]); // Password matches
        } else {
            return response()->json(['exists' => false]); // Wrong password or user not found
        }

        // if (Auth::attempt(['id' => $employerid, 'password' => $password])) {
        //     return response()->json(['exists' => true]);
        // } else {
        //     return response()->json(['exists' => false]);
        // }
    }

    public function change_password(Request $request){
        $employerid = Auth::id();
        $employeer=User::where('id',$employerid)->first();
        $validated=[
            'password' => $request->password,
        ];
        $employeer->update($validated);
    }

    public function all_industry(){
        $industry_list=Industry::orderBy('name','ASC')->get()->unique('name');
        $industrylist = array();
        foreach($industry_list AS $il){
            $industrylist[] = [
                'id'=>$il->id,
                'industry_name'=>$il->name,
            ];
        }
        return response()->json($industrylist);
    }

    public function employer_data(){
        $employerid = Auth::id();

        // $employerdata = User::find($employerid);
        $employerdata=User::where('id',$employerid)->get();
        foreach($employerdata AS $e){
            $employer = [
                'employeerid'=>$e->id,
                'firstname'=>$e->firstname,
                'middlename'=>$e->middlename,
                'lastname'=>$e->lastname,
                'email'=>$e->email,
                'contact_no'=>$e->contact_no,
                'country_code_id'=>$e->country_code_id,
                'country'=>CountryCodes::where('id',$e->country_code_id)->value('country_name'),
                'business_name'=>$e->business_name,
                'website'=>$e->website,
                'industry_id'=>$e->industry_id,
                'industry'=>Industry::where('id',$e->industry_id)->value('name'),
                'company_size'=>$e->company_size,
                'about'=>$e->about,
                'approved'=>$e->approved,
                'logo'=>$e->logo
            ];
        }

        return response()->json([
            'employer'=>$employer,
        ],200);
    }

    public function update_employeer(Request $request, $id){
        $employer=User::where('id',$id)->first();
            $validated=[
                'business_name'=>$request->business_name,
                'website'=>$request->website,
                'contact_no'=>$request->contact_no,
                'country_code_id'=>$request->country_code_id,
                'industry_id'=>$request->industry_id,
                'company_size'=>$request->company_size,
                'about'=>$request->about,
            ];

            if($request->file('logo')){
                $imagename=$request->file('logo')->getClientOriginalName();
                // $request->file('logo')->storeAs('images',$imagename);
                $request->file('logo')->move(public_path('images'), $imagename);
                $validated['logo']=$imagename;
            }

            $employer->update($validated);
    }
}
