<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['menu_top']=Menu::all();
        $data['menu_best']=Menu::all();

        return response()->json([
            'data'=>$data,
            'status'=>200,
            'message'=>'success'
        ]);
    
    }
    public function detail($id)
    {
        $data['menu']=Menu::find($id);
        
        return response()->json([
            'data'=>$data,
            'status'=>200,
            'message'=>'success'
        ]);
    }
}
