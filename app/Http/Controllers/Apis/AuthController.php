<?php

namespace App\Http\Controllers\Apis;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['login','register','refresh','logout']]);
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        try{
            if(! $token = auth()->guard('admin')->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'],401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'],500);
        }

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'token_type' => 'bearer',
            'permissions' => [
                'super_admin',
            ],
            'role' => 'super_admin'
        ]);
    }

    public function logout()
    {
        try {
            auth()->guard('admin')->logout();

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out',
            ]);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not log out'], 500);
        }
    }

    public function me () {
        $admin = auth()->guard('admin')->user();

        if(!$admin) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        return response()->json($admin);
    }
}
