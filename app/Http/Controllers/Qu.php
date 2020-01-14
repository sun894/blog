<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xiaoqu;
use App\BrandModel;
use App\Cl;

class Qu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Xiaoqu::get();
		foreach($data as $v){
		    if($v->qu_imgs){
			   $v->qu_imgs=explode("-",$v->qu_imgs);
			}
		}
        //dd($data);
		return view('admin.xiaoqu.index',['data'=>$data,'img'=>$v]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.xiaoqu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = request()->except('_token');
		if(request()->hasFile('qu_img')){
		   $post['qu_img'] = upload('qu_img');
		}
		if(isset($post['qu_imgs'])){
		    $post['qu_imgs'] = moreupload('qu_imgs');
            $post['qu_imgs'] = implode('-',$post['qu_imgs']);
		}
        $result = Xiaoqu::create($post);
		if($result){
		   return redirect('/qu');
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
        $res = Xiaoqu::find($id);
		return view('admin.xiaoqu.edit',['res'=>$res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Xiaoqu::where('qu_id',$id)->first();
		$res->qu_imgs=explode("-",$res->qu_imgs);
		//dd($res);die;
        return view('admin.xiaoqu.edit',['res'=>$res]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Xiaoqu::destroy($id);
        if(request()->ajax()){
          echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
		}
		    return redirect('/qu');

    }
}
