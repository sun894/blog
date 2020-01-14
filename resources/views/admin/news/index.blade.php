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
  <caption><h2>新闻展示</h2>
  </caption>
  <thead>
    <tr>
	<th>新闻ID</th>
	<th>新闻名称</th>
	<th>新闻分类</th>
	<th>新闻作者</th>
	<th>添加时间</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($res as $v)
  <tr>
	<td>{{$v->news_id}}</td>
	<td>{{$v->news_name}}</td>
	<td>{{$v->news_author}}</td>
	<td>{{$v->parent_id}}</td>
	<td>{{$v->news_time}}</td>
	<td><a type="button" class="btn btn-info" href="{{url('/news/edit/'.$v->news_id)}}">修改</a>&nbsp;<a type="button" class="btn btn-danger" href="{{url('/news/del/'.$v->news_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="6">{{$res->links()}}</td>
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
<a href="{{url('/news/create')}}">返回添加页面</a>
