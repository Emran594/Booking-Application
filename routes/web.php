<?php

use App\Http\Controllers\UserController;
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

Route::get('/admindashboard',[UserController::class,'admindashboard']);
Route::get('/userdashboard',[UserController::class,'userdashboard']);


Route::get('/logout',[UserController::class,'UserLogout']);
