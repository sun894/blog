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
 <form class="form-horizontal" role="form" method="post" action="{{url('/yuangong/update/'.$data->y_id)}}" enctype="multipart/form-data">
  <caption><h2>员工修改</h2></caption>
  <div class="form-group">
    @csrf
    <label for="firstname" class="col-sm-2 control-label">员工名称</label>
    <div class="col-sm-5">
      <input type="text" name="y_name" value="{{$data->y_name}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">员工号</label>
    <div class="col-sm-5">
      <input type="text" name="y_num" value="{{$data->y_num}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">部门</label>
    <div class="col-sm-5">
      <input type="text" name="y_type" value="{{$data->y_type}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">员工头像</label>
    <div class="col-sm-5">
	  <img src="{{env('UPLOAD_URL')}}{{$data->y_img}}" width="200"/>
      <input type="file" name="y_img" class="form-control" id="firstname" >
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
