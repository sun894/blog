<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
class Deng extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('index.deng.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function do_login()
    {
        $data=request()->except(['_token']);
        $res = UserModel::where(['user_name'=>$data['user_name'],'user_pwd'=>$data['user_pwd']])->first();
        if($res){
           session(['res'=>$res]);
           request()->session()->save();
		   return view('index.commont.create');
		}
        return redirect('user/login')->with('msg','没有此用户，请联系管理员');

    }
}