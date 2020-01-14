<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class Bookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		 $word = request()->word??'' ;
		 $where = [];
		 if($word){
		   $where[] = ['book_name','like',"%$word%"];
		 }
         $data = Book::where($where)->paginate(2);
		 return view('tushu.book.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tushu.book.create');
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
	   if(request()->hasFile('book_img')){
	      $post['book_img'] = $this->upload('book_img');
	   }
	$validatedData = $request->validate(
		[ 
		'book_name' => 'required|unique:book|max:255',
		'book_author' => 'required',
		],
		[
		'book_name.required' => '图书名称必填',
		'book_name.unique' => '图书名称已存在',
		'book_author.required' => '图书作者必填',
	    ]);
	   $data = Book::create($post);
	   if($data){
	     return redirect('/book');
	   }
    }
     public function upload($filesname){
	  if(request()->file($filesname)->isValid()){
	     $photo = request()->file($filesname);
		 $result = $photo->store('uploads'); 
		 return $result;
	  }
	     exit('上传文件失败');
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
        $data = Book::where('book_id',$id)->first();
		return view('tushu.book.edit',['data'=>$data]);
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
	   if(request()->hasFile('book_img')){
	      $post['book_img'] = $this->upload('book_img');
	   }
	   $data = Book::where('book_id',$id)->update($post);
	   if($data !==false ){
	     return redirect('/book');
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
        $data = Book::destroy($id);
	   if($data){
	     return redirect('/book');
	   }
    }
}
