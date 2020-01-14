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
   <form method="post" action="{{url('/store')}}">
       @csrf
	   学生名<input type="text" name="sname">
       <input type="submit">
   </form>
 </body>
</html>
