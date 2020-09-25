<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/phone',[AuthController::class,'phone']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/resendotp',[AuthController::class,'resendOtp']);

Route::get('/',[AuthController::class,'index'])->middleware('jwt.verify');

Route::get('/home',[HomeController::class,'index']);
Route::get('/menu/{id}',[HomeController::class,'detail']);

