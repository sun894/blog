<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yuan;
class Yuangong extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $word = request()->word??'' ;
		$where=[];
		if($word){
		   $where[]=['y_name','like',"%$word%"];
		}
        $data = Yuan::where($where)->orderBy('y_id','asc')->paginate(2);
		return view('ceshi.yuangong.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ceshi.yuangong.create');
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
		if(request()->hasFile('y_img')){
		  $post['y_img']=$this->upload('y_img');
		}
		$data = Yuan::create($post);
		if($data){
		  return redirect('/yuangong');
		}
    }
    public function upload($filename)
    {
       if(request()->hasFile($filename)&&request()->file($filename)->isValid()){
        $photo = request()->file($filename);
        $result = $photo->store('uploads');
        return $result;
	   }
        exit('文件上传失败'); 
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
		$data = Yuan::where('y_id',$id)->first();
		return view('ceshi.yuangong.edit',['data'=>$data]);
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
		if(request()->hasFile('y_img')){
		  $post['y_img']=$this->upload('y_img');
		}
		$data = Yuan::where('y_id',$id)->update($post);
		if($data !==false){
		  return redirect('/yuangong');
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
     	$data = Yuan::destroy($id);
		if($data){
		  return redirect('/yuangong');
		}
    }
}
