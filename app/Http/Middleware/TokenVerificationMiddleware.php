<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        $result = JWTToken::VerifyToken($token);

        if ($result == "unauthorized") {
            return redirect('/userLogin');
        } else {
            $request->headers->set('email', $result->userEmail);
            $request->headers->set('id', $result->userID);
            $request->headers->set('userType', $result->userType); // Assuming user type is in the payload

            // Check user type and redirect accordingly
            if ($result->userType == 1) {
                return $next($request);
            } elseif ($result->userType == 2) {
                return redirect('/admin/dashboard'); // Adjust the route accordingly
            } else {
                return redirect('/userLogin');
            }
        }
    }
}
