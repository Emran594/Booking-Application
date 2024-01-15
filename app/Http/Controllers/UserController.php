<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function RegistrationPage(){
        return view('pages.auth.registration');
    }

    public function admindashboard(){
        return view('pages.admin.index');
    }

    public function userdashboard(){
        return view('pages.user.index');
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
            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successfully'
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e
            ],200);

        }
    }

    function UserLogin(Request $request)
    {
        $user = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->first();

        if ($user !== null) {
            // User Login -> JWT Token Issue
            // Update the UserLogin function in UserController
            $token=JWTToken::CreateToken($request->input('email'),$user->id);


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
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized',
            ], 200);
        }
    }

    function UserLogout(){
        return redirect('/')->cookie('token','',-1);
    }




}
