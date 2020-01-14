<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () { 
	return 'Hello, Welcome to LaravelAcademy.org';
});
//Route::get('/haha', 'Index@test' );
//Route::any('/login', 'Index@login' );
//Route::post('/do_login', 'Index@do_login' );
//Route::match(['get','post'],'/login', 'Index@login' );
//Route::get('/list', 'Student@lists' );
//Route::get('/create', 'Student@add' );
//Route::post('/store', 'Student@store' );

//Route::get('user/{id}', function ($id) {
//	return 'User ' . $id; });
//Route::get('user/{name?}', function ($name='崔大马') {
//	return $name; 
//	});

//Route::get('/list/{id}/{name?}', 'Student@getgoods' )->where('id','\d+');
Route::prefix('brand')->group(function(){
Route::get('create', 'Brand@create' )->middleware('checklogin');
Route::post('store', 'Brand@store' );
Route::get('/', 'Brand@index' );
Route::get('edit/{id}', 'Brand@edit' );
Route::post('update/{id}', 'Brand@update' );
Route::get('del/{id}', 'Brand@destroy' );
Route::get('login', 'Brand@login' );
Route::post('do_login', 'Brand@do_login' );
Route::get('loginout', 'Brand@loginout' );

});

Route::prefix('student')->group(function(){
Route::get('create','student@create');
Route::post('store','student@store');
Route::get('/','student@index');
Route::get('edit/{id}','student@edit');
Route::post('update/{id}','student@update');
Route::get('del/{id}','student@destroy');

});
Route::prefix('yuangong')->group(function(){
Route::get('create','yuangong@create');
Route::post('store','yuangong@store');
Route::get('/','yuangong@index');
Route::get('edit/{id}','yuangong@edit');
Route::post('update/{id}','yuangong@update');
Route::get('del/{id}','yuangong@destroy');

});


Route::prefix('book')->group(function(){
Route::get('create','bookcontroller@create');
Route::post('store','bookcontroller@store');
Route::get('/','bookcontroller@index');
Route::get('edit/{id}','bookcontroller@edit');
Route::post('update/{id}','bookcontroller@update');
Route::get('del/{id}','bookcontroller@destroy');
});

Route::prefix('shop_type')->group(function(){
Route::get('create','shoptype@create');
Route::post('store','shoptype@store');
Route::get('/','shoptype@index');
Route::get('edit/{id}','shoptype@edit');
Route::post('update/{id}','shoptype@update');
Route::get('del/{id}','shoptype@destroy');

});


Route::prefix('news')->group(function(){
Route::get('create','news@create');
Route::post('store','news@store');
Route::get('/','news@index');
Route::get('edit/{id}','news@edit');
Route::post('update/{id}','news@update');
Route::get('del/{id}','news@destroy');

});


Route::prefix('articles')->group(function(){
Route::get('create','article@create');
Route::post('store','article@store');
Route::get('/','article@index');
Route::get('edit/{id}','article@edit');
Route::post('update/{id}','article@update');
Route::get('del/{id}','article@destroy');
Route::post('do_login', 'article@do_login' );
Route::get('loginout', 'article@loginout' );
});



Route::prefix('shop_goods')->group(function(){
Route::get('create','shop@create');
Route::post('store','shop@store');
Route::get('/','shop@index');
Route::get('del/{id}','shop@destroy');

Route::get('checkOnly','shop@checkOnly');
});


Route::prefix('goods_shop')->group(function(){
Route::get('create','shop_goods@create');
Route::post('store','shop_goods@store');
Route::get('/','shop_goods@index');
Route::get('show/{id}','shop_goods@show');
Route::get('edit/{id}','shop_goods@edit');
Route::post('update/{id}','shop_goods@update');
Route::get('del/{id}','shop_goods@destroy');
Route::post('addcart','shop_goods@addcart');


});

Route::get('send','shop_goods@send_email');


Route::prefix('qu')->group(function(){
Route::get('create','qu@create');
Route::post('store','qu@store');
Route::get('/','qu@index');
Route::get('show/{id}','qu@show');
Route::get('edit/{id}','qu@edit');
Route::post('update/{id}','qu@update');
Route::get('del/{id}','qu@destroy');
});


Route::get('/get', function () {

    Illuminate\Support\Facades\Cookie::queue('name','lisi',1);
    echo request()->cookie('name');
});

//Route::prefix('user_login')->group(function(){
//Route::get('create','user@create');
//Route::post('store','user@store');
//Route::get('/','user@index');
//Route::get('show/{id}','user@show');
//Route::get('edit/{id}','user@edit');
//Route::post('update/{id}','user@update');
//Route::get('del/{id}','user@destroy');
//Route::get('show','user@show');
//
//});


Route::prefix('user_login')->group(function(){
Route::get('login','deng@login');
Route::post('do_login','deng@do_login');

});

Route::prefix('commont')->group(function(){
Route::get('create','commont@create')->middleware('login');
Route::post('store','commont@store');
Route::get('/','commont@index');
Route::post('del/{id}','commont@destroy');
});