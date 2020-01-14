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
  <caption><h2>售房展示</h2></caption>
  <thead>
    <tr>
	<th>小区ID</th>
	<th>小区名称</th>
	<th>小区地理位置</th>
	<th>小区面积</th>
	<th>导购员</th>
	<th>联系电话</th>
	<th>楼盘主图</th>
	<th>楼盘相册</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
  <tr>
	<td>{{$v->qu_id}}</td>
	<td>{{$v->qu_name}}</td>
	<td>{{$v->qu_location}}</td>
	<td>{{$v->qu_ji}}</td>
	<td>{{$v->qu_man}}</td>
	<td>{{$v->qu_tel}}</td>
	<td><img src="{{env('UPLOAD_URL')}}{{$v->qu_img}}" width="100"/></td>
	<td>
	@if($v->qu_imgs)
	@foreach($v->qu_imgs as $val)
	     <img src="{{env('UPLOAD_URL')}}{{$val}}" width="80"/>
    @endforeach
	@endif
	</td>
	<td><a type="button" class="btn btn-info" href="{{url('/qu/show/'.$v->qu_id)}}">查看</a>&nbsp;<a type="button" onclick="ajaxdel({{$v->qu_id}})" class="btn btn-danger" href="javascript:void(0)">删除</a></td>
  </tr>
  @endforeach
  </tbody>
</table>
 </body>
</html>
<a href="{{url('/qu/create')}}">返回添加页面</a>
<script src="/static/js/jquery.min.js"></script>
<script>
     function ajaxdel(id){
		 $.get('qu/del/'+id,function(res){
		      if(res.code=='00000'){
			    alert(res.msg);
				location.reload();
			  }
		 },'json');
	 };

</script>
