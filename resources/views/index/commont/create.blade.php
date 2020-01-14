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
  <h2>留言板</h2>
   <h3 align="center">欢迎【{{session('res')['user_name']}}】登录<a href="">退出</a></h3>
  <form method="post" action="{{url('/commont/store')}}" enctype="multipart/form-data">
	<table>
	@csrf
	
		<h3>内容:</h3>
		<textarea name="content" rows="5" cols="180"></textarea>
		<h3><button>发布</button></h3>
		
	
	</table>
  </form>
 </body>
</html>
