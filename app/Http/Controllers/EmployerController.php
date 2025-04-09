<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Industry;
use App\Models\WorkCategories;
use App\Models\City;
use App\Models\Region;
use App\Models\CountryCodes;
use App\Models\JobTypes;
use App\Models\Currency;
use App\Models\Job;
use App\Models\JobResponsibilities;
use App\Models\JobSkills;
use App\Models\Skills;


class EmployerController extends Controller
{
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

    public function all_category(){
        $category_list=WorkCategories::orderBy('name','ASC')->get()->unique('name');
        $categorylist = array();
        foreach($category_list AS $c){
            $categorylist[] = [
                'id'=>$c->id,
                'category_name'=>$c->name,
            ];
        }
        return response()->json($categorylist);
    }

    public function all_city(){
        $city_list=City::orderBy('city_name','ASC')->get()->unique('city_name');
        $citylist = array();
        foreach($city_list AS $cl){
            $citylist[] = [
                'id'=>$cl->id,
                'region_id'=>$cl->region_id,
                'city_name'=>$cl->city_name,
            ];
        }
        return response()->json($citylist);
    }

    public function all_region(){
        $region_list=Region::orderBy('region_name','ASC')->get()->unique('region_name');
        $regionlist = array();
        foreach($region_list AS $rl){
            $regionlist[] = [
                'id'=>$rl->id,
                'country_id'=>$rl->country_id,
                'region_name'=>$rl->region_name,
            ];
        }
        return response()->json($regionlist);
    }

    public function all_country(){
        $country_list=CountryCodes::orderBy('country_name','ASC')->get()->unique('country_name');
        $countrylist = array();
        foreach($country_list AS $cyl){
            $countrylist[] = [
                'id'=>$cyl->id,
                'country_name'=>$cyl->country_name,
            ];
        }
        return response()->json($countrylist);
    }
    
    public function all_job_type(){
        $job_type_list=JobTypes::orderBy('name','ASC')->get()->unique('name');
        $jobtype_list = array();
        foreach($job_type_list AS $jtl){
            $jobtype_list[] = [
                'id'=>$jtl->id,
                'name'=>$jtl->name,
            ];
        }
        return response()->json($jobtype_list);
    }

    public function all_currency(){
        $currencies =Currency::orderBy('code','ASC')->get()->unique('code');
        $currency_list = array();
        foreach($currencies  AS $c){
            $currency_list[] = [
                'id'=>$c->id,
                'name'=>$c->name,
                'code'=>$c->code,
            ];
        }
        return response()->json($currency_list);
    }

    public function all_skill(){
        $skills=Skills::orderBy('name','ASC')->get()->unique('name');
        $skill_list = array();
        foreach($skills AS $sk){
            $skill_list[] = [
                'id'=>$sk->id,
                'name'=>$sk->name,
            ];
        }
        return response()->json($skill_list);
    }

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

    public function add_new_job(Request $request){
        $employerid = Auth::id();
        $job['job_title']=$request->input('job_title');
        $job['industry']=$request->input('industry');
        $job['employment_category']=$request->input('employment_category');
        $job['city']=$request->input('city');
        $job['region']=$request->input('region');
        $job['country']=$request->input('country');
        $job['workplace']=$request->input('workplace');
        $job['job_type']=$request->input('job_type');
        $job['pay_type']=$request->input('pay_type');
        $job['currency']=$request->input('currency');
        $job['job_description']=$request->input('job_description');
        $job['job_summary']=$request->input('job_summary');
        $job['salary_from']=$request->input('salary_from') ?? 0;
        $job['salary_to']=$request->input('salary_to') ?? 0;
        $job['confidential']=$request->input('confidential') ?? 0;
        $job['start_date']=$request->input('start_date');
        $job['end_date']=$request->input('end_date');
        $job['employer_id']=$employerid;
        $job['status']='Active';
        $job['created_at']=date('Y-m-d H:i:s');
        $job_id=Job::insertGetId($job);


        $responsibilities_list = $request->input('responsibilities');
        foreach(json_decode($responsibilities_list) as $rl){
                $res['job_id']=$job_id;
                $res['responsibility']=$rl->responsibility;
                $res['employer_id']=$employerid;
                $res['created_at']=date('Y-m-d H:i:s');
                JobResponsibilities::create($res);
        }

        // $skill_list = $request->input('skills');
        // foreach(json_decode($skill_list) as $sl){
        //         $skill['job_id']=$job_id;
        //         $skill['skill']=$sl->skill;
        //         $skill['employer_id']=$employerid;
        //         $skill['created_at']=date('Y-m-d H:i:s');
        //         JobSkills::create($skill);
        // }

        return $job_id;
    }

    public function job_details($job_id){
        $jd = Job::where('id', $job_id)->first();
        $job_responsibilities = JobResponsibilities::where('job_id', $job_id)->get();
        $job_skills = JobSkills::where('job_id', $job_id)->get();
        $job_dets = [
            'job_id' => $jd->id,
            'job_description' => $jd->job_description,
            'job_summary' => $jd->job_summary,
            'job_title' => $jd->job_title,
            'city' => $jd->city,
            'region' => $jd->region,
            'country' => $jd->country,
            'industry' => $jd->industry,
            'employment_category' => $jd->employment_category,
            'workplace' => $jd->workplace,
            'job_type' => $jd->job_type,
            'pay_type' => $jd->pay_type,
            'currency' => $jd->currency,
            'salary_from' => $jd->salary_from,
            'salary_to' => $jd->salary_to,
            'confidential' => $jd->confidential,
            'start_date'=>date('F j, Y', strtotime($jd->start_date)),
            'end_date'=>date('F j, Y', strtotime($jd->end_date)),
            'company_name'=>User::where('id',$jd->employer_id)->value('business_name'),
            'firstname'=>User::where('id',$jd->employer_id)->value('firstname'),
            'lastname'=>User::where('id',$jd->employer_id)->value('lastname'),
        ];
    
        return response()->json([
            'job_dets' => $job_dets,
            'job_responsibilities' => $job_responsibilities,
            'job_skills' => $job_skills,
        ], 200);
    }

    public function get_alljob(){
        $jobs=Job::orderBy('id','ASC')->get();
        $alljobs=[];
        foreach($jobs AS $j){
            $alljobs[]=[
                'job_id'=>$j->id,
                'job_title'=>$j->job_title,
                'status'=>$j->status,
                'workplace'=>$j->workplace,
            ];
        }
        return response()->json([
            'alljobs'=>$alljobs,
        ],200);
    }
}
