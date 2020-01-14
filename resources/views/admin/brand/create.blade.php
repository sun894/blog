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
 <h2>品牌添加</h2>
 <!--   @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif	-->
   <h3 align="center">欢迎【{{session('res')['account']}}】登录<a href="{{url('/brand/loginout')}}">退出</a></h3>
 <form class="form-horizontal" role="form" method="post" action="{{url('/brand/store')}}" enctype="multipart/form-data">
  <div class="form-group">
    @csrf
    <label for="firstname" class="col-sm-2 control-label">品牌名称<br/></label>
    <div class="col-sm-5">
      <input type="text" name="brand_name" value="{{session('data')['brand_name']}}" class="form-control" id="firstname" placeholder="请输入名字"><font size="" color="red">{{$errors->first('brand_name')}}</font>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌路径</label>
    <div class="col-sm-5">
      <input type="text" name="brand_url" class="form-control" id="firstname" placeholder="请输入名字"><font size="" color="red">{{$errors->first('brand_url')}}</font>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌logo</label>
    <div class="col-sm-5">
      <input type="file" name="brand_logo" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌描述</label>
    <div class="col-sm-5">
      <textarea name="brand_desc" class="form-control" id="firstname" placeholder="请输入名字"></textarea>
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
