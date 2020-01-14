 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
  <form method="post" action="{{url('/login')}}">
  
	<table border=1>
	<tr>
		<td>用户名</td>
		<td>
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="text" name="sname"></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><input type="password" name="pwd"></td>
	</tr>
	<tr>
		<td><button>登录</button></td>
		<td></td>
	</tr>
	</table>
  </form>
 </body>
</html>
