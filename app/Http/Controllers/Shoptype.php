<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cl;
class Shoptype extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cl::get();
		$data = createTree($data);
        return view('admin.category.index',['data'=>$data]);  
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
        return view('admin.category.create',['data'=>$data]);
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

		$res = Cl::create($post);
		if($res){
		   return redirect('/shop_type');
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
        $res = Cl::get();
        $data = Cl::where('t_id',$id)->first();
		$res = createTree($res);
        return view('admin.category.edit',['data'=>$data,'res'=>$res]);  

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

		$res = Cl::where('t_id',$id)->update($post);
		if($res){
		   return redirect('/shop_type');
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
        $res = Cl::destroy($id);
		if($res){
		   return redirect('/shop_type');
		}

    }
}
