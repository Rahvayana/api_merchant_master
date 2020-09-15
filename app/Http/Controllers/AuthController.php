<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login (Request $request) {
        $otp = $request->otp;
        $phone = $request->phone;
        $user = User::where('phone', $phone)->where('otp', $otp)->first();
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }

    public function index()
    {
        $user=Auth::user();
        return response()->json([
            'data'=>$user
        ]);
    }
    
}
