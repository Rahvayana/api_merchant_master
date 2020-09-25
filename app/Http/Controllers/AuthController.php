<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public static function generateOTP($length)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function phone(Request $request)
    {
        $phone=User::where('phone',$request->phone)->first();
        $data['phone']=$request->phone;
        $data['otp']=$this->generateOTP(6);
        
        if(!$phone){
            //insert data to database
            $user=new User();
            $user->phone=$request->phone;
            $user->otp=$data['otp'];
            $user->save();
            
        }else{
            //if phone exist update otp only
            $user=new User();
            $user=User::where('phone',$data['phone'])->first();
            $user->otp=$data['otp'];
            $user->save();
        }
        return response()->json([
            'data'=>$data,
            'status'=>200,
            'message'=>'Phone Number Success Retrive'
        ]);
        
    }

    public function resendOtp(Request $request)
    {
        $user=new User();
        $data['otp']=$this->generateOTP(6);
        $data['phone']=$request->phone;
        $user=User::where('phone',$request->phone)->first();
        $user->otp=$data['otp'];
        $user->save();
        return response()->json([
            'data'=>$data,
            'status'=>200,
            'message'=>'Otp Success Retrive'
        ]);
        
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
