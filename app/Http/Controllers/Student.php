<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Cache;

class Student extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $word = request()->word??'' ;
       $page = request()->page?:1;
       echo 'student_'.$page.'_'.$word;
       $data = Cache::get('student_'.$page.'_'.$word);
	   //echo 'data_'.$page.'_'.$word;
	   dump($data);
	   if(!$data){
	     echo "DB";
	   
	   $where = [];
	   if($word){
	     $where[]=['student_name','like',"%$word%"];
	   }

       $data = DB::table('student')->where($where)->orderBy('student_id','asc')->paginate(2);
	   Cache::put('student_'.$page.'_'.$word,$data,300);
       }
	   $query = request()->all();
       if(request()->ajax()){
	     return view('yuan.student.ajax',['data'=>$data,'query'=>$query]);
	   }
       return view('yuan.student.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('yuan.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = request()->except(['_token']);
		$res = DB::table('student')->insert($post);
		if($res){
		   return redirect('/student');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$res = DB::table('student')->where('student_id',$id)->first();
        return view('yuan.student.edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = request()->except(['_token']);
		$res = DB::table('student')->where('student_id',$id)->update($post);
		if($res !==false){
		   return redirect('/student');
		}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$res = DB::table('student')->where('student_id',$id)->delete();
		if($res){
		   return redirect('/student');
		}

    }
}
