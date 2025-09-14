<?php
namespace App\Http\Controllers\Auth;

use App\Helpers\HttpResponseHelper;
use App\Http\Controllers\Controller;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Login
    public function login(Request $request)
    {
       
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Call AuthService login method
        $result = AuthService::login($request);

        // Return success response
        return HttpResponseHelper::successResponse("Login successfully complete", $result, 200);
    }

    // Register
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', // Assuming you have a password confirmation field
        ]);

        // Call AuthService register method
        $result = AuthService::register($request);

        // Return success response
        return HttpResponseHelper::successResponse("Registration successfully complete", $result, 201);
    }
}
