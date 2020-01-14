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
  <caption><h2>分类展示</h2></caption>
  <thead>
    <tr>
	<th>分类ID</th>
	<th>分类名称</th>
	<th>父级分类</th>
	<th>是否显示</th>
	<th>是否导航栏显示</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
  <tr>
	<td>{{$v->t_id}}</td>
	<td>{{str_repeat('|--',$v->level)}}{{$v->t_name}}</td>
	<td>{{$v->pid}}</td>
	<td>{{$v->is_show}}</td>
	<td>{{$v->is_nav_show}}</td>
	<td><a type="button" class="btn btn-info" href="{{url('/shop_type/edit/'.$v->t_id)}}">修改</a>&nbsp;<a type="button" class="btn btn-danger" href="{{url('/shop_type/del/'.$v->t_id)}}">删除</a></td>
  </tr>
  @endforeach
  </tbody>
</table>
 </body>
</html>
<a href="{{url('/shop_type/create')}}">返回添加页面</a>
