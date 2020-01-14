<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopModel;
class Shop extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopModel::orderBy('shop_id','asc')->paginate(2);
		if(request()->ajax()){
        return view('admin.goods.ajax',['data'=>$data]);
		}
        return view('admin.goods.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create');
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
        if(request()->hasFile('shop_img')){
          $post['shop_img'] = $this->upload('shop_img');
		}
		$result = ShopModel::create($post);
		if($result){
		   return redirect('/shop_goods');
		}
    }
    public function upload($filename)
    {
		if(request()->file($filename)->isValid()){
        $photo = request()->file($filename);
		$result = $photo -> store('uploads');
		return $result;
		}
		exit('文件上传失败');
    }
    public function checkOnly()
    {
        $shop_name = request()->shop_name;
		$where=[];
		if($shop_name){
		   $where['shop_name'] = $shop_name;
		}
        $count = ShopModel::where($where)->count();
		echo intval($count);
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
        //
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
        $data = ShopModel::destroy($id);
        if(request()->ajax()){
          echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
		}
		    return redirect('/shop_goods');
    }
}
