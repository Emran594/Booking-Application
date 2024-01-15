<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;


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
    return view('pages.auth.login');
});

// Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/forgot-pass',[UserController::class,'forgotPassword']);
Route::get('/verify-email',[UserController::class,'emailVerify']);
Route::get('/set-password',[UserController::class,'passwordSet']);
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/admindashboard',[UserController::class,'admindashboard'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userdashboard',[UserController::class,'userdashboard'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/logout',[UserController::class,'UserLogout']);
