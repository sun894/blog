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
<script type="text/javascript" charset="utf-8" src="/static/ue/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/ue/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/ue/lang/zh-cn/zh-cn.js"></script>
 </head>
 <body>
 <form class="form-horizontal" role="form" method="post" action="{{url('/goods_shop/store')}}" enctype="multipart/form-data">
  <caption><h2>商品查看</h2></caption>
  
    @csrf
<ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#home" data-toggle="tab">
			 基础信息
		</a>
	</li>
	<li><a href="#ios" data-toggle="tab">商品相册</a></li>
	<li><a href="#desc" data-toggle="tab">商品详情</a></li>

</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<p>
	<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-5">
      <input type="text" name="goods_name" value="{{$res->goods_name}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品货号</label>
    <div class="col-sm-5">
      <input type="text" name="goods_sn" value="{{$res->goods_sn}}"  class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品品牌</label>
    <div class="col-sm-5">
      <select class="form-control" name="brand_id">
	      <option value="0">请选择商品品牌</option>
          @foreach($post as $v)
		  <option value="{{$v->brand_id}}"
		  {{$res->brand_id==$v->brand_id ? 'selected' : ''}}
		  >{{$v->brand_name}}</option>
		  @endforeach
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-5">
      <select class="form-control" name="t_id">
	      <option value="0">请选择商品分类</option>
          @foreach($data as $v)
		  <option value="{{$v->t_id}}"
		  {{$res->t_id==$v->t_id ? 'selected' : ''}}
		  >{{str_repeat('|--',$v->level)}}{{$v->t_name}}</option>
		  @endforeach
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-5">
      <input type="text" name="goods_price" value="{{$res->goods_price}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品库存</label>
    <div class="col-sm-5">
      <input type="text" name="goods_number" value="{{$res->goods_number}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品缩略图</label>
    <div class="col-sm-5">
	  <img src="{{env('UPLOAD_URL')}}{{$res->qu_img}}" width="100"/>
      <input type="file" name="goods_img" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>

		</p>
	</div>
	<div class="tab-pane fade" id="ios">
		<p>
		     <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品相册</label>
    <div class="col-sm-5">
	  @if($res->qu_imgs)
	@foreach($res->qu_imgs as $val)
	     <img src="{{env('UPLOAD_URL')}}{{$val}}" width="80"/>
    @endforeach
	@endif
      <input type="file"  multiple="multiple" name="goods_imgs[]" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>

		</p>
	</div>
	<div class="tab-pane fade" id="desc">
		<p>
		     <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品详情</label>
    <div class="col-sm-5">
<script id="editor" name="content" value="{{$res->content}}" type="text/plain" style="width:120%;height:400px;"></script>    </div>
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
<script type="text/javascript">
$(function(){
    var ue = UE.getEditor("editor");
});
</script>
