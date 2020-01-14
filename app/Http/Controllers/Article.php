<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Art;
use App\Cates;
use App\Use_login;
use Validator;
        
class Article extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $word = request()->word??'' ;
       $c_id = request()->c_id??'' ;
	   $where = [];
	   if($word){
	     $where[]=['article_name','like',"%$word%"];
	   }
	   if($c_id){
	     $where[]=['cate.c_id','=',$c_id];
	   }
        $data = Cates::get();
        $post = Art::where($where)->leftjoin('cate','cate.c_id','=','articles.c_id')->paginate(2);
		if(request()->ajax()){
	        return view('admin.article.ajax',['post'=>$post,'data'=>$data]);	   
		}
        return view('admin.article.index',['post'=>$post,'data'=>$data]);
    }
    public function login()
    {
        return view('admin.articles.login');
    }
    public function do_login()
    {
        $oo=request()->except(['_token']);

        $res = Use_login::where(['account'=>$oo['account'],'pwd'=>$oo['pwd']])->first();
        if($res){
           session(['res'=>$res]);
           request()->session()->save();
		   return redirect('/articles');
		}
        return redirect('articles/login')->with('msg','没有此用户，请联系管理员');
    }

    public function loginout()
    {
        session(['res'=>null]);
        request()->session()->save();
		return view('admin.article.login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data = Cates::get();
        return view('admin.article.create',['data'=>$data]);
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
        $validator = Validator::make($post, [
            'article_name' => 'required|unique:articles|max:255|regex:/^[\x{4e00}-\x{9fa5}]+$/u',
//            'brand_name' => [
//				'required',
//			    'unique:brand',
//                'max:255',
//				'regex:/^\w+$/',
//			],
        ],[
	        'article_name.required' => '名称必填',
	        'article_name.unique' => '名称已存在',
	        'article_name.regex' => '名称需是中文字母数字下划线组成',
        ]);
        if ($validator->fails()) {
        return redirect('articles/create')
        ->withErrors($validator)
        ->withInput();
        }
		$post['create_time']=time();
		if (request()->hasFile('article_img'))
		{ 
			$post['article_img'] = $this->upload('article_img');
		}
		$result= Art::create($post);
		if($result){
		    return redirect('/articles');
		}
    }
    public function upload($filename)
	{
	if (request()->file($filename)->isValid()) { 
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
		$data = Cates::get();
		$res = Art::where('article_id',$id)->first();
        return view('admin.article.edit',['data'=>$data,'res'=>$res]);
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
		$post['create_time']=time();
		$result= Art::where('article_id',$id)->update($post);
		if($result){
		    return redirect('/articles');
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
   $result = Art::destroy($id);
   if(request()->ajax()){
     echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
   }
		    return redirect('/articles');
    }
}
