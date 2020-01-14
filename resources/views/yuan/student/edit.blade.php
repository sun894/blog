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
 <form class="form-horizontal" role="form" method="post" action="{{url('/student/update/'.$res->student_id)}}">
  <caption><h2>学生修改</h2></caption>
  <div class="form-group">
    @csrf
    <label for="firstname" class="col-sm-2 control-label">学生名称</label>
    <div class="col-sm-5">
      <input type="text" name="student_name" value="{{$res->student_name}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">学生性别</label>
    <div class="col-sm-5">
      <input type="text" name="student_sex" value="{{$res->student_sex}}" class="form-control" id="firstname" placeholder="请输入性别">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">学生班级</label>
    <div class="col-sm-5">
      <input type="text" name="student_class"  value="{{$res->student_class}}"class="form-control" id="firstname" placeholder="请输入班级">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</form>
 
 </body>
</html>
