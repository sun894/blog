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
 <form class="form-horizontal" role="form" method="post" action="{{url('/shop_type/store')}}">
  <caption><h2>分类添加</h2></caption>
  <div class="form-group">
    @csrf
<ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#home" data-toggle="tab">
			 基础信息
		</a>
	</li>
	<li><a href="#ios" data-toggle="tab">商品相册</a></li>
	<li><a href="#desc" data-toggle="tab">商品详情</a></li>

	<li class="dropdown">
		<a href="#" id="myTabDrop1" class="dropdown-toggle" 
		   data-toggle="dropdown">Java 
			<b class="caret"></b>
		</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
			<li><a href="#jmeter" tabindex="-1" data-toggle="tab">jmeter</a></li>
			<li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>
		</ul>
	</li>
</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<p>老子登场</p>
	</div>
	<div class="tab-pane fade" id="ios">
		<p>老爷在场</p>
	</div>
	<div class="tab-pane fade" id="desc">
		<p>尔等退下</p>
	</div>
</div>














    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
    <div class="col-sm-5">
      <input type="text" name="t_name" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-5">
      <select class="form-control" name="pid">
	      <option value="0">请选择父级分类</option>
          @foreach($data as $v)
		  <option value="{{$v->t_id}}">{{str_repeat('|--',$v->level)}}{{$v->t_name}}</option>
		  @endforeach
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio" name="is_show" value="1" checked="checked">是
      <input type="radio" name="is_show" value="2" >否
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否导航栏显示</label>
    <div class="col-sm-5">
      <input type="radio" name="is_nav_show" value="1" checked="checked">是
      <input type="radio" name="is_nav_show" value="2" >否
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">添加</button>
    </div>
  </div>
</form>
 
 </body>
</html>
