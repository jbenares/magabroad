<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google/', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback/', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/auth/facebook/', [FacebookController::class, 'facebookpage']);
Route::get('/auth/facebook/callback/',[FacebookController::class,'facebookredirect']);

Route::get('/{pathMatch}', function(){
    return view('welcome');
})->where('pathMatch',".*");

