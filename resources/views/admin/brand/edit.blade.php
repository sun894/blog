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
 <form class="form-horizontal" role="form" method="post" action="{{url('/brand/update/'.$data->brand_id)}}">
  <div class="form-group">
    @csrf
    <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
    <div class="col-sm-5">
      <input type="text" name="brand_name" value="{{$data->brand_name}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌路径</label>
    <div class="col-sm-5">
      <input type="text" name="brand_url" value="{{$data->brand_url}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌logo</label>
    <div class="col-sm-5">
      <input type="file" name="brand_logo"  value="{{$data->brand_logo}}"class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌描述</label>
    <div class="col-sm-5">
      <textarea name="brand_desc"  class="form-control" id="firstname" placeholder="请输入名字">{{$data->brand_desc}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info">修改</button>
    </div>
  </div>
</form>
 
 </body>
</html>
