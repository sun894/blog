<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller
{
   function test(){
      $sname = '崔舒淇';
      return view('hello',['sname'=>$sname]);
   }
   function login(){
      $post=request()->all();
	  dump($post);
      return view('login');
   }
   function do_login(){
      $post=request()->all();
	  dd($post);
   }






















}
