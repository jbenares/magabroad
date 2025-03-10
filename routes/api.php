<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\EmployerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/login_form', [LoginController::class,'login_form']);
Route::post('/admin_login_process', [LoginController::class,'admin_login_process']);
Route::post('/jobseeker_login_process', [LoginController::class,'jobseeker_login_process']);
Route::post('/emp_login_process', [LoginController::class,'EmployerLogin']);
Route::get('/dashboard',[LoginController::class,'dashboard']);

Route::get('/country_code_list', [UserController::class,'all_countrycode']);
Route::post('/add_employer',[UserController::class,'add_employer']);
Route::post('/add_jobseeker',[UserController::class,'add_jobseeker']);
Route::post('/send-otp', [OTPController::class, 'sendOTP']);
Route::post('/verify-otp', [OTPController::class, 'verifyOTP']);
Route::get('/check_employer_email/{email}', [UserController::class,'checkEmployerEmail']);
Route::get('/check_jobseeker_email/{email}', [UserController::class,'checkJobseekerEmail']);


Route::get('/check_employer_password/{password}', [EmployerController::class,'checkEmployerPassword']);
Route::post('/change_password', [EmployerController::class,'change_password']);
Route::get('/industry_list', [EmployerController::class,'all_industry']);
Route::get('/employer_data',[EmployerController::class,'employer_data']);
Route::post('/update_employeer/{id}',[EmployerController::class,'update_employeer']);
