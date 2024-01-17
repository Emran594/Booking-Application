<?php

use App\Http\Controllers\TripController;
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
Route::get('/logout',[UserController::class,'UserLogout']);



Route::middleware(['token.verify'])->group(function () {
    Route::get('/userdashboard', [UserController::class, 'userdashboard']);
    Route::get('/admindashboard', [UserController::class, 'admindashboard']);
    Route::post('/reset-password',[UserController::class,'ResetPassword']);

    Route::controller(TripController::class)->group(function(){
        Route::get('/trip','trip');
        Route::post('/store-trips','storeTrips');
        Route::post('/store-trips','storeTrips');
        Route::get('/deleteTrip/{id}','deleteTrip');
        Route::get('/search-trip','searchTrip');
    });
});

