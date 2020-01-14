<center>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
  <h2>商品展示</h2>
  <table border=1>
  <tr>
	<td>商品ID</td>
	<td>商品名称</td>
	<td>商品图片</td>
	<td>商品价格</td>
	<td>商品描述</td>
	<td>操作</td>
  </tr>
  @foreach($data as $v)
  <tr>
	<td>{{$v->shop_id}}</td>
	<td>{{$v->shop_name}}</td>
	<td><img src="{{env('UPLOAD_URL')}}{{$v->shop_img}}" width="200" height="150"/></td>
	<td>{{$v->shop_price}}</td>
	<td>{{$v->shop_desc}}</td>
	<td><a onclick="ajaxdel({{$v->shop_id}})" href="javascript:void(0)">删除</a></td>
  </tr>
  @endforeach
  <tr>
	<td colspan="6">{{$data->links()}}</td>
  </tr>
  </table>
 </body>
</html>
<a href="{{url('/shop_goods/create')}}">返回添加页面</a>
<script src="/static/js/jquery.min.js"></script>
<script>
     $(document).on('click','.pagination a',function(){
		 //alert(333);
	     var url = $(this).attr('href');
		 $.get(url,function(res){
		      $('table').html(res);
		 });
		 return false;
	 });
     function ajaxdel(id){
		 $.get('shop_goods/del/'+id,function(res){
		      if(res.code=='00000'){
			    alert(res.msg);
				location.reload();
			  }
		 },'json');
	 };
</script>
