<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function phone(Request $request)
    {
        $phone=User::where('phone',$request->phone);
        if(!$phone){
            return response()->json([
                'status'=>404,
                'message'=>'Phone Number Not Found'
            ]);    
        }else{
            return response()->json([
                'data'=>$request->phone,
                'status'=>200,
                'message'=>'Phone Number Success Retrive'
            ]);
        }
    }

    public function login (Request $request) {
        $user = User::where('phone', $request->phone)->where('otp', $request->otp)->first();
        if($user){
            $token = JWTAuth::fromUser($user);
            return response()->json([
                'data'=>$token,
                'status'=>200,
                'message'=>'Token Success Retrive'
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Failed OTP Wrong'
            ]);
        }
        
    }

    public function index()
    {
        $user=Auth::user();
        return response()->json([
            'data'=>$user
        ]);
    }
    
}
