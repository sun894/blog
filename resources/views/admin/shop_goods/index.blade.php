<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
 </head>
 <body>
<table class="table">
  <caption><h2>商品展示</h2></caption>
 <h3 align="center">欢迎【{{session('res')['account']}}】登录<a href="{{url('/brand/loginout')}}">退出</a></h3>
  <thead>
    <tr>
	<th>商品ID</th>
	<th>商品名称</th>
	<th>商品货号</th>
	<th>品牌名称</th>
	<th>分类名称</th>
	<th>商品图册</th>
	<th>添加时间</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
  <tr>
	<td>{{$v->goods_id}}</td>
	<td>{{$v->goods_name}}</td>
	<td>{{$v->goods_sn}}</td>
	<td>{{$v->brand_name}}</td>
	<td>{{$v->t_name}}</td>
	<td>	
	@if($v->goods_imgs)
	@foreach($v->goods_imgs as $val)
	     <img src="{{env('UPLOAD_URL')}}{{$val}}" width="80"/>
    @endforeach
	@endif
    </td>
	<td>{{date('Y-m-d h:i:s',$v->add_time)}}</td>
	<td><a type="button" class="btn btn-info" href="{{url('/goods_shop/show/'.$v->goods_id)}}">查看</a>&nbsp;<a type="button" class="btn btn-danger" href="{{url('/goods_shop/del/'.$v->goods_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="8">{{$data->links()}}</td>
	</tr>
  </tbody>
</table>
 </body>
</html>
<a href="{{url('/goods_shop/create')}}">返回添加页面</a>
