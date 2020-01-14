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
 <h2>用户登录</h2>
 <font size="" color="red">{{session('msg')}}</font>
 <form class="form-horizontal" role="form" method="post" action="{{url('/user_login/store')}}" enctype="multipart/form-data">
  <div class="form-group">
    @csrf
    <label for="firstname" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-5">
      <input type="text" name="user_name" class="form-control" id="firstname" placeholder="请输入名字"><font size="" color="red">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">用户密码</label>
    <div class="col-sm-5">
      <input type="text" name="user_pwd" class="form-control" id="firstname" placeholder="请输入名字"><font size="" color="red">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info">添加</button>
    </div>
  </div>
</form>
 
 </body>
</html>
