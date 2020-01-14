<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoodsModel;
use App\Cl;
use App\BrandModel;
use Illuminate\Support\Facades\Cookie;
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;
use App\Cart;
//use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;
class Shop_goods extends Controller
{
    public function send_email()
    {
        Mail::to('2435863034@qq.com')->send(new SendCode());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         Cookie::queue('text','aaa',1);
		 echo Cookie::get('text');
		 $pageSize = config('app.pageSize');
         $data = GoodsModel::select('goods_shop.*','brand.brand_name','shop_type.t_name')
			                 ->leftjoin('brand','brand.brand_id','=','goods_shop.brand_id')
			                 ->leftjoin('shop_type','shop_type.t_id','=','goods_shop.t_id')
		                     ->paginate($pageSize);
		  	foreach($data as $v){
		    if($v->goods_imgs){
			   $v->goods_imgs=explode("-",$v->goods_imgs);
			}
		}

         return view('admin.shop_goods.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data = Cl::get();
		$data = createTree($data);
        $post = BrandModel::get();
        return view('admin.shop_goods.create',['data'=>$data,'post'=>$post]);
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
        if(request()->hasFile('goods_img')){
        $post['goods_img'] = upload('goods_img');
		}
		if(isset($post['goods_imgs'])){
		   $post['goods_imgs'] = moreupload('goods_imgs');
		   $post['goods_imgs'] = implode('-',$post['goods_imgs']);

		}
           $post['add_time'] =time();
           $post['update_time'] =time();  
		   $result = GoodsModel::create($post);
		   if($result){
		     return redirect('/goods_shop');
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
		$num = Redis::setnx('show_'.$id,1);
        if(!$num){
		   Redis::incr('show_'.$id);
		}
        $num = Redis::get('show_'.$id);
        $data = GoodsModel::find($id);
		return view('admin.shop_goods.show',['data'=>$data,'num'=>$num]);
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
        //
    }
    public function addcart()
    {
		
        $goods_id = request()->goods_id;
		$buy_number = 1;
		if(!$this->isLogin()){
		   //echo json_encode(['code'=>'00001','msg'=>'未登录,请登录']);die;
          
		}
		  $this->addDBcart($goods_id,$buy_number);
		//$this->addCookiecart($goods_id,$buy_number);
    }
//	public function addCookiecart($goods_id,$buy_number)
//	{
//        $goods = GoodsModel::where('goods_id',$goods_id)->first();
//	    $data = [
//		    'goods_id' => $goods_id,
//			'buy_number' => 1,
//			'goods_price' => $goods->goods_price,
//			'add_time' =>time(),
//		];
//		$data = json_encode($data);
//        $res = Cookie::queue('cart',$data,30);
//		dd($res);
//		if($result){
//		   echo json_encode(['code'=>'00000','msg'=>'添加成功']);die;
//		}
//	}














	public function addDBcart($goods_id,$buy_number){
		
        $goods = GoodsModel::where('goods_id',$goods_id)->first();
		//dd($goods);die;
        if($goods->goods_number<$buy_number){
		   echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
		}
		$u_id = session('res')->u_id;
        $result = Cart::where(['goods_id'=>$goods_id,'u_id'=>$u_id])->first();
        if($result){
        if($result->buy_number+$buy_number>$goods->goods_number){
		   echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
		}
		    $result = Cart::where(['goods_id'=>$goods_id,'u_id'=>$u_id])->increment('buy_number');
            if($result){  
            echo json_encode(['code'=>'00000','msg'=>'添加成功']);die;
			}
		}
	    $data = [
			'u_id' => $u_id,
		    'goods_id' => $goods_id,
			'buy_number' => 1,
			'goods_price' => $goods->goods_price,
			'add_time' =>time(),
		];
        $result = Cart::create($data);
		if($result){
		   echo json_encode(['code'=>'00000','msg'=>'添加成功']);die;
		}

	}
    public function isLogin()
    {
        $res = session('res');
		if(!$res){
		   return false;
		}
		return true;
    }

















}
