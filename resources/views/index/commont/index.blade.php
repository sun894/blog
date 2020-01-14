<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
 </head>
 <body>
  <h2>留言列表&nbsp;&nbsp;<font size="1" color="#663333">当前页面浏览量{{Cache('num')}}</font></h2>
  <form>
	<input type="text" name="word" placeholder="请输入关键字">
    <button class="btn btn-info">搜索</button>	
  </form>
  <table border=1>
  <tr>
	<td>编号</td>
	<td>留言内容</td>
	<td>姓名</td>
	<td>时间</td>
	<td>操作</td>
  </tr>
  @foreach($list as $v)
  <tr>
	<td>{{$v->commont_id}}</td>
	<td>{{$v->content}}</td>
	<td>{{$v->user_name}}</td>
	<td>{{date('Y-m-d h:i:s',$v->add_time)}}</td>
	<td>
	@if($v->can_delete == 1)
	<a onclick="ajaxdel({{$v->commont_id}})" href="javascript:void(0)">删除</a>
	@else
	没有权限删除
	@endif
	</td>
  </tr>
  @endforeach
  </table>
 </body>
</html>
<a href="{{url('/commont/create')}}">返回添加页面</a>
<script src="/static/js/jquery.min.js"></script>
<script>
     function ajaxdel(id){
		 
         $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
		 $.post('commont/del/'+id,function(res){
//		      if(res.status==200){
//			    alert(res.msg);
//				$('')
//				location.reload();
//			  }
		 },'json');
	 };
</script>