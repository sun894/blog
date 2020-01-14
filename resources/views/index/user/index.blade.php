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
      <h2>后台主页</h2>
	  <p>
         @if(session('res')->user_type != 1)
         <a href="{{url('/user_login/show')}}">用户管理</a>
         @endif
	  </p>
	  <p>
         <a href="">货物管理</a>
	  </p>
	  <p>
         <a href="">出入记录管理</a>
	  </p>

 </body>
</html>
