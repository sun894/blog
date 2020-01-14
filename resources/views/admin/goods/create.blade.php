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
  <h2>商品添加系统</h2>
  <form method="post" action="{{url('/shop_goods/store')}}" enctype="multipart/form-data">
	<table>
	@csrf
	<tr>
		<td>商品名称</td>
		<td><input type="text" name="shop_name"><font size="" color="red"></font></td>
	</tr>
	<tr>
		<td>商品图片</td>
		<td><input type="file" name="shop_img"></td>
	</tr>
	<tr>
		<td>商品价格</td>
		<td><input type="text" name="shop_price"></td>
	</tr>
	<tr>
		<td>商品描述</td>
		<td><textarea name="shop_desc" rows="" cols=""></textarea><font size="" color="red"></font></td>
	</tr>
	<tr>
		<td><button type="button">添加</button></td>
		<td></td>
	</tr>
	</table>
  </form>
 </body>
</html>
<script src="/static/js/jquery.min.js"></script>
<script>

     function checkurl(shop_desc){
		 var reg =/^http:\/\/*/;
         if(!reg.test(shop_desc)){
		   $('[name=shop_desc]').next().text('必须http开头!');
           return false;
		 }
       return true;
	 }


     $('input[name=shop_name]').blur(function(){
		 
		 $(this).next().text('');
         var shop_name = $(this).val();
         checkname(shop_name);
	 });
     function checkname(shop_name){
        var flag = true;
	   	var reg =/^[\u4e00-\u9fa5\w.\-]{1,16}$/;
         if(!reg.test(shop_name)){
		   $('input[name=shop_name]').next().text('商品名需是中文,字母,数字,下划线,点和一组长度为1-16位!');
		   return false;
		 }
	      $.ajax({
		        method:'get',
				url :"/shop_goods/checkOnly",
				data:{shop_name:shop_name},
                async:false,
				}).done(function(res){
                     if( res != 0 ){
				    $('input[name=shop_name]').next().text('商品名已存在');
					flag = false;
				} 
		  });
		  return flag;
	 }

     $('[name=shop_desc]').blur(function(){
		 //alert(222);
		 $(this).next().text('');
         var shop_desc = $(this).val();
         checkurl(shop_desc);
	 });

     $('[type=button]').click(function(){
		 $('input[name=shop_name]').next().text('');
         var shop_name = $('input[name=shop_name]').val();
         var nameflag = checkname(shop_name);


		 $('[name=shop_desc]').next().text('');
         var shop_desc = $('[name=shop_desc]').val();
         var urlflag = checkurl(shop_desc);
		 //alert(nameflag);
         if( nameflag==true &&urlflag==true ){
		      $('form').submit();
		 }
         







	 });

</script>
