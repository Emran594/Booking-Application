<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\Bus;
use App\Models\Location;
use App\Models\Trip;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function RegistrationPage(){
        return view('pages.auth.registration');
    }

    public function admindashboard(){
        return view('pages.admin.index');
    }

    public function userdashboard(){
        $locations = Location::all();
        return view('pages.user.index', compact('locations'));
    }
    public function searchTrip(Request $request)
    {

        $date = $request->input('date');
        $from_location = $request->input('from_location');
        $to_location = $request->input('to_location');
        $trips = Trip::where('date', $date)
        ->where('from_location', $from_location)
        ->where('to_location', $to_location)
        ->where('status','active')
        ->get();
        $locations = Location::all();

        return view('pages.user.index', compact('trips','locations'));
    }

    public function forgotPassword(){
        return view('pages.auth.forgot-pass');
    }

    public function emailVerify(){
        return view('pages.auth.verify-email');
    }
    public function passwordSet(){
        return view('pages.auth.set-password');
    }

    function UserRegistration(Request $request){
        try {
            User::create([
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);
            return redirect('/')->with('status', 'success')->with('message', 'User Registration Successfully');

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e
            ],200);

        }
    }

    function UserLogin(Request $request){
        $user = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->first();
    
        if ($user !== null) {
            // User Login -> JWT Token Issue
            $token = JWTToken::CreateToken($request->input('email'), $user->id);
    
            if ($user->role == 1) {
                // Redirect to user dashboard
                return redirect('/userdashboard')->withCookie(cookie('token', $token, time() + 60 * 24 * 30));
            } elseif ($user->role == 2) {
                // Redirect to admin dashboard
                return redirect('/admindashboard')->withCookie(cookie('token', $token, time() + 60 * 24 * 30));
            } else {
                // Handle other roles if needed
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Invalid user role',
                ], 200);
            }
        } else {
            // Redirect to home with error message
            return redirect('/')->with('error', 'Invalid credentials');
        }
    }
    

    function UserLogout(){
        return redirect('/')->cookie('token','',-1);
    }


    function SendOTPCode(Request $request){
    $email = $request->input('email');
    $otp = rand(1000, 9999);
    $count = User::where('email', '=', $email)->count();

    if ($count == 1) {
        // OTP Email Address
        Mail::to($email)->send(new OTPMail($otp));
        // OTP Code Table Update
        User::where('email', '=', $email)->update(['otp' => $otp]);

        // Store email in cookie
        return redirect('/verify-email')->withCookie('email', $email)->with('status', 'success')->with('message', '4 Digit OTP Code has been sent to your email!');
    } else {
        return response()->json([
            'status' => 'failed',
            'message' => 'unauthorized'
        ]);
    }
}

function VerifyOTP(Request $request)
{
    $email = $request->cookie('email'); // Retrieve email from cookie
    $otp = $request->input('otp');
    $count = User::where('email', '=', $email)
        ->where('otp', '=', $otp)->count();

    if ($count == 1) {
        // Database OTP Update
        User::where('email', '=', $email)->update(['otp' => '0']);

        // Pass Reset Token Issue
        $token = JWTToken::CreateTokenForSetPassword($email);

        // Redirect to "/set-password" URL after successful OTP verification
        return redirect('/set-password')->withCookie('token', $token, 60 * 24 * 30);
    } else {
        return response()->json([
            'status' => 'failed',
            'message' => 'unauthorized'
        ], 200);
    }
}

function ResetPassword(Request $request)
{
    try {
        $email = $request->cookie('email'); // Retrieve email from cookie
        $password = $request->input('password');
        User::where('email', '=', $email)->update(['password' => $password]);

        return redirect('/')->with('status', 'success')->with('message', 'User Password Updated Successfully');

    } catch (Exception $exception) {
        return response()->json([
            'status' => 'fail',
            'message' => 'Something Went Wrong',
        ], 200);
    }
}




}
