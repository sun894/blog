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
<script src="/static/js/jquery.min.js"></script>
<script src="/static/bootstrap.min.js"></script>
 </head>
 <body>
<h2>用户管理</h2>
<table class="table">
  <thead>
    <tr>
	<th>用户ID</th>
	<th>用户昵称</th>
	<th>用户身份</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
  <tr>
	<td>{{$v->user_id}}</td>
	<td>{{$v->user_name}}</td>
	<td>{{$v->user_type==1?'普通库管员':'库管主管'}}</td>
	<td><a type="button" class="btn btn-danger" href="{{url('/user_login/del/'.$v->user_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="8"></td>
	</tr>
  </tbody>
</table>
 </body>
</html>

