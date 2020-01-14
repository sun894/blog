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
   <font size="" color="red">{{session('msg')}}</font>
  <form method="post" action="{{url('/articles/do_login')}}">
	<table border=1>
	@csrf
	<tr>
		<td>用户名</td>
		<td><input type="text" name="account"></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><input type="text" name="pwd"></td>
	</tr>
	<tr>
		<td><input type="submit" value="登录"></td>
		<td></td>
	</tr>
	</table>
  </form>
 </body>
</html>
