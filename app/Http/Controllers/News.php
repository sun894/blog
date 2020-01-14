<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\NewsModel;
use Validator;

class News extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cate::get();
		$res = NewsModel::paginate(2);
		$post = Tree($data);
	   if(request()->ajax()){
	      return view('admin.news.ajax',['data'=>$data,'res'=>$res]);
	   }	 

        return view('admin.news.index',['data'=>$data,'res'=>$res]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data = Cate::get();
		//dd($post);
		$post = Tree($data);
        return view('admin.news.create',['data'=>$data]);
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
            //'brand_name' => 'required|unique:brand|max:255',
            'news_name' => [
				'required',
			    'unique:news',
                'max:255',
			],
	        'news_author' => 'required',
        ],[
	        'news_name.required' => '新闻名称必填',
	        'news_name.unique' => '新闻名称已存在',
	        'news_author.required' => '新闻作者必填',
        ]);
        if ($validator->fails()) {
        return redirect('news/create')
        ->withErrors($validator)
        ->withInput();
        }
        $post['news_time']=time();
		$res = NewsModel::create($post);
		if($res){
		   return redirect('/news');
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
}
