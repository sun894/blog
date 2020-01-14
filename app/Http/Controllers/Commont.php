<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CommontModel;

use Illuminate\Support\Facades\Cache;


class Commont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		Cache::increment('num');
       $word = request()->word??'' ;
	   echo 'commont_'.$word;
       //$data = Cache::get('commont_'.$word);
	   //dump($data);
	   //if(!$data){
	     //echo "DB";
	   
	   $where = [];
	   if($word){
	     $where[]=['commont_name','like',"%$word%"];
	   }
       $data = DB::table('commont')->leftjoin('user_login','user_login.user_id','=','commont.user_id')->where($where)->orderBy('commont_id','asc')->get();
	   //Cache::put('commont_'.$word,$data,60);
       //}
       $list = $data->toArray();
	   //dd($list);die;
	   $user_info = session('res');
	   //dd($user_info['user_id']);die;
//	   if($user_info['user_type'] == 1)
//	   {
//	   foreach($list as $k=>$v){
//	        $list[$k]->can_delete=1;
//	   }
//	   }else{
          
	      foreach($list as $k=>$v){
			if($v->user_id==$user_info->user_id){   
	            $list[$k]->can_delete=1;
			}else{
                $list[$k]->can_delete=0;
            }
	   }
	   
       return view('index.commont.index',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index.commont.create');
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
		
		$post['user_id'] = getUserId();
        $post['add_time'] = time();
        //dd($post);die;
		$res = DB::table('commont')->insert($post);
		if($res){
		   return redirect('/commont');
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
//		$res = DB::table('student')->where('student_id',$id)->first();
//        return view('yuan.student.edit',['res'=>$res]);
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
//        $post = request()->except(['_token']);
//		$res = DB::table('student')->where('student_id',$id)->update($post);
//		if($res !==false){
//		   return redirect('/student');
//		}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
		$commont_model = new CommontModel();
        $data = CommontModel::where('commont_id',$id)->first();
        $session_user_id = getUserId();
        if($data->user_id == $session_user_id){
		   if( (time()-$data->add_time)<1800 ){
			   $data->status = 2;
               if($data->delete()){
                  return [
				      'status' => 200,
				      'msg' => 'success',
					  'data' => []
				  ];
               }else{
                      return [
				      'status' => 4,
				      'msg' => '删除失败',
					  'data' => []
				  ];

               }
		   }else{
                      return [
				      'status' => 3,
				      'msg' => '只能删除半小时内的评论',
					  'data' => []
				  ];
           }




		}





    }
    }