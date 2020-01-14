<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\BrandModel;
use App\Http\Requests\StoreBrandPost;
use Validator;
use App\Use_login;
//use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class Brand extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $num = Redis::Incr('num');
       //dump($num);
       //showMsg(1,'Hello World!');
       $word = request()->word??'' ;
       $page = request()->page?:1;
       //$data = cache('data_'.$page.'_'.$word);
       $data = Redis::get('brand_'.$page.'_'.$word);
	   //echo 'data_'.$page.'_'.$word;
	   dump($data);
	   if(!$data){
	     //echo "走db";
	   
	   $where = [];
	   if($word){
	     $where[]=['brand_name','like',"%$word%"];
	   }
       //DB::connection()->enableQueryLog();
       //$data = DB::table('brand')->orderBy('brand_id','asc')->paginate(2);
       $data = BrandModel::where($where)->orderBy('brand_id','asc')->paginate(2);
       $data = serialize($data);	   
	   //cache(['data_'.$page.'_'.$word => $data],60);
       Redis::setex('brand_'.$page.'_'.$word,300,$data);
       }
       $data = unserialize($data);
       $query = request()->all();

        //$logs = DB::getQueryLog();
        //dump($logs);
	   if(request()->ajax()){
	      return view('admin.brand.ajax',['data'=>$data,'query'=>$query,'num'=>$num]);
	   }	 
       return view('admin.brand.index',['data'=>$data,'query'=>$query,'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }
    public function login()
    {
        return view('admin.brand.login');
    }
    public function do_login()
    {
        $data=request()->except(['_token']);

        $res = Use_login::where(['account'=>$data['account'],'pwd'=>$data['pwd']])->first();
        if($res){
           session(['res'=>$res]);
           request()->session()->save();
		   return redirect('brand/create');
		}
        return redirect('brand/login')->with('msg','没有此用户，请联系管理员');
    }

    public function loginout()
    {
        session(['res'=>null]);
        request()->session()->save();
		return view('admin.brand.login');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreBrandPost $request)
    public function store(Request $request)
    {
//$validatedData = $request->validate(
//	[ 
//	'brand_name' => 'required|unique:brand|max:255',
//	'brand_url' => 'required',
//	],
//	[
//	'brand_name.required' => '品牌名称必填',
//	'brand_name.unique' => '品牌名称已存在',
//	'brand_url.required' => '品牌网址必填',
//    ]);
        $data=request()->except(['_token']);

        $validator = Validator::make($data, [
            'brand_name' => 'required|unique:brand|max:255|regex:/^\w+$/',
//            'brand_name' => [
//				'required',
//			    'unique:brand',
//                'max:255',
//				'regex:/^\w+$/',
//			],
	        'brand_url' => 'required',
        ],[
	        'brand_name.required' => '品牌名称必填',
	        'brand_name.unique' => '品牌名称已存在',
	        'brand_name.regex' => '品牌名称需是中文字母数字下划线组成',
	        'brand_url.required' => '品牌网址必填',
        ]);
        if ($validator->fails()) {
        return redirect('brand/create')
        ->with('data',$data)
        ->withErrors($validator)
        ->withInput();
        }
		//dd($data);
		//$res = DB::table('brand')->insert($data);
		if (request()->hasFile('brand_logo'))
		{ 
			$data['brand_logo'] = $this->upload('brand_logo');
		}
        $res = BrandModel::create($data);
        if($res){
		    return redirect('/brand');
		}

    }
    public function upload($filename)
	{
	if (request()->hasFile($filename) && request()->file($filename)->isValid()) { 
	$photo = request()->file($filename); 
	$store_result = $photo->store('uploads');
    return $store_result;
	}
	exit('没有文件上传或者文件上传错误');
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
        //$data = DB::table('brand')->where('brand_id',$id)->first();
        $data = BrandModel::where('brand_id',$id)->first();
        return view('admin.brand.edit',['data'=>$data]);
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
        $data=request()->except(['_token']);
		//dd($data);
		//$res = DB::table('brand')->where('brand_id',$id)->update($data);
        $res = BrandModel::where('brand_id',$id)->update($data);
        if( $res !== false ){
		    return redirect('/brand');
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
		$res = BrandModel::destroy($id);
        if( $res ){
		    return redirect('/brand');
		}        
    }
}
