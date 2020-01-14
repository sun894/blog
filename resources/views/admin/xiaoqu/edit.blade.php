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
<script src="/static/js/jquery.min.js"></script>
<script src="/static/bootstrap.min.js"></script>
 </head>
 <body>
 <form class="form-horizontal" role="form" method="post" action="{{url('/qu/store')}}" enctype="multipart/form-data">
  <caption><h2>售楼信息管理查看</h2></caption>
  
    @csrf
<ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#home" data-toggle="tab">
			 基础信息
		</a>
	</li>
	<li><a href="#ios" data-toggle="tab">楼盘主图</a></li>
	<li><a href="#desc" data-toggle="tab">楼盘相册</a></li>

</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<p>
	<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">小区名称</label>
    <div class="col-sm-5">
      <input type="text" name="qu_name" value="{{$res->qu_name}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">地理位置</label>
    <div class="col-sm-5">
      <input type="text" name="qu_location" value="{{$res->qu_location}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">面积</label>
    <div class="col-sm-5">
      <input type="text" name="qu_ji" value="{{$res->qu_ji}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">导购员</label>
    <div class="col-sm-5">
      <input type="text" name="qu_man" value="{{$res->qu_man}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">联系电话</label>
    <div class="col-sm-5">
      <input type="text" name="qu_tel" value="{{$res->qu_tel}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
		</p>
	</div>
	<div class="tab-pane fade" id="ios">
		<p>
		     <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">楼盘主图</label>
    <div class="col-sm-5">
	  <img src="{{env('UPLOAD_URL')}}{{$res->qu_img}}" width="100"/>
      <input type="file" name="qu_img" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>

		</p>
	</div>
	<div class="tab-pane fade" id="desc">
		<p>
		     <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">楼盘相册</label>
    <div class="col-sm-5">
	@if($res->qu_imgs)
	@foreach($res->qu_imgs as $val)
	     <img src="{{env('UPLOAD_URL')}}{{$val}}" width="80"/>
    @endforeach
	@endif
      <input type="file"  multiple="multiple" name="qu_imgs[]" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
		</p>
	</div>
</div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</form>

 </body>
</html>
