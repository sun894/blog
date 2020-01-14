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
 <form>
	<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字">
    <button class="btn btn-info">搜索</button>
 </form>
<table class="table">
  <caption><h2>学生展示</h2></caption>
  <thead>
    <tr>
	<th>学生ID</th>
	<th>学生名称</th>
	<th>学生性别</th>
	<th>学生班级</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
  <tr>
	<td>{{$v->student_id}}</td>
	<td>{{$v->student_name}}</td>
	<td>{{$v->student_sex}}</td>
	<td>{{$v->student_class}}</td>
	<td><a type="button" class="btn btn-info" href="{{url('/student/edit/'.$v->student_id)}}">修改</a>&nbsp;<a type="button" class="btn btn-danger" href="{{url('/student/del/'.$v->student_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="4">{{$data->appends($query)->links()}}</td>
	</tr>
  </tbody>
</table>
 </body>
<script>
    $(document).on('click','.pagination a',function(){
	     var url = $(this).attr('href');
		 $.get(
		       url,function(res){
               $('tbody').html(res);
		      }       
		      );
		 return false;
	});
</script>
</html>
<a href="{{url('/student/create')}}">返回添加页面</a>
