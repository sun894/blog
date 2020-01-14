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
  <caption><h2>员工列表</h2><br/>
  <form>
	<input type="text" name="word" placeholder="请输入关键字">
    <button class="btn btn-default">搜索</button>
  </form>
  </caption>
  <thead>
    <tr>
	<th>员工ID</th>
	<th>员工名称</th>
	<th>员工号</th>
	<th>部门</th>
	<th>员工头像</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
	<td>{{$v->y_id}}</td>
	<td>{{$v->y_name}}</td>
	<td>{{$v->y_num}}</td>
	<td>{{$v->y_type}}</td>
	<td><img src="{{env('UPLOAD_URL')}}{{$v->y_img}}" width="200"/></td>
	<td><a type="button" class="btn btn-danger" href="{{url('/yuangong/edit/'.$v->y_id)}}">修改</a>&nbsp;<a type="button" class="btn btn-info" href="{{url('/yuangong/del/'.$v->y_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="4">{{$data->links()}}</td>
	</tr>
  </tbody>
</table>
 </body>
</html>
<a href="{{url('/yuangong/create')}}">返回添加页面</a>
