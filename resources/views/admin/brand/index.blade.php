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
 </head>
 <body>
<table class="table">
  <caption><h2>品牌添加<font size="2" color="red">当前访问量{{$num}}</font></h2>
  <br/>
  <form>
	<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字">
    <button class="btn btn-info">搜索</button>
  </form>
  </caption>
  <thead>
    <tr>
	<th>品牌ID</th>
	<th>品牌名称</th>
	<th>品牌路径</th>
	<th>品牌描述</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
  <tr>
	<td>{{$v->brand_id}}</td>
	<td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="200"/>{{$v->brand_name}}</td>
	<td>{{$v->brand_url}}</td>
	<td>{{$v->brand_desc}}</td>
	<td><a type="button" class="btn btn-info" href="{{url('/brand/edit/'.$v->brand_id)}}">修改</a>&nbsp;<a type="button" class="btn btn-danger" href="{{url('/brand/del/'.$v->brand_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="4">{{$data->links()}}</td>
	</tr>
  </tbody>
</table>
 </body>
 <script>
       $(document).on('click','.pagination a',function(){
	        var url = $(this).attr('href');
            $.get(url,function(res){
			    $('tbody').html(res);
			});
			return false;
	   });
 </script>
</html>
<a href="{{url('/brand/create')}}">返回添加页面</a>
