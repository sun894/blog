<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>{{$data->goods_name}}</title>
<link rel="stylesheet" href="/static/css/bootstrap.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
 </head>
 <body>
      <h2  style="color:blue">{{$data->goods_name}}<font size="2" color="red">当前访问量为{{$num}}</font></h2>
      <p style="color:red">{{$data->content}}</p>
      
	  <button>购买</button>
 </body>
</html>
<script src="/static/js/jquery.min.js"></script>
<script>
     $('button').click(function(){
	     var goods_id = {{$data->goods_id}};
         $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
		 $.post('/goods_shop/addcart',{goods_id:goods_id},function(res){
		     if(res.code=='00001'){
			    alert(res.msg);
			 }
		     if(res.code=='00002'){
			    alert(res.msg);
			 }
		     if(res.code=='00000'){
			    alert(res.msg);
				location.href='/cart';
			 }

		 },'json');
	 });

</script>