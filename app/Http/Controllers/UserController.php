<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function __construct()
    {
        //
    }

    public function authenticate()
    {
        $data='jaya tampan';
        return response()->json([
            'data'=>$data,
            'status'=>200,
            'message'=>'Sukses',
        ]);
    }
}
