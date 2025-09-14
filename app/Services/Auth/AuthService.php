<?php
namespace App\Services\Auth;

use Illuminate\Support\Facades\RateLimiter;
use App\Models\User;
use App\Traits\Auth\LoginTraits;
use Illuminate\Support\Facades\Hash;
// use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthService
{
    use LoginTraits;

    /* login */
    public static function login($request)
    {
        // Get credentials
        $credentials = $request->only('email', 'password');
         $existCredintial = User::where('email', $request->email)->first(); 
        $token = auth()->claims([
            'id' => $existCredintial->id,
            'name' => $existCredintial->name,
            'role' => $existCredintial->role,
        ])->attempt($credentials);

        AuthService::createNewToken($token);
    }

    /* store resource documents */
    public static function storeDocument($request)
    {
        return [
            "name" => $request->name,
            'email' => $request->email,
            "phone" => $request->phone,
            "password" => $request->password
        ];
    }

    // Register
    public static function register($request)
    {
        // Store user data
        $userData = self::storeDocument($request);

        // Hash the password
        $userData['password'] = Hash::make($request->password);

        // Create the user
        $user = User::create($userData);

        // Optionally, create a token for the new user
        $token = auth()->login($user);

        return self::createNewToken($token);
    }

    /* create token and generate expiration date */
    public static function createNewToken($token)
    {
        return [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60, // expires in minutes (adjust as needed)
        ];
    }
}
