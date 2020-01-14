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
  <caption><h2>图书列表</h2><br/>
  <form>
	<input type="text" name="word" placeholder="请输入关键字">
    <button class="btn btn-default">搜索</button>
  </form>
  </caption>
  <thead>
    <tr>
	<th>图书ID</th>
	<th>图书名称</th>
	<th>图书作者</th>
	<th>图书售价</th>
	<th>图书封面</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
	<td>{{$v->book_id}}</td>
	<td>{{$v->book_name}}</td>
	<td>{{$v->book_author}}</td>
	<td>{{$v->book_price}}</td>
	<td><img src="{{env('UPLOAD_URL')}}{{$v->book_img}}" width="200"/></td>
	<td><a type="button" class="btn btn-danger" href="{{url('/book/edit/'.$v->book_id)}}">修改</a>&nbsp;<a type="button" class="btn btn-info" href="{{url('/book/del/'.$v->book_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="6">{{$data->links()}}</td>
	</tr>
  </tbody>
</table>
 </body>
</html>
<a href="{{url('/book/create')}}">返回添加页面</a>
