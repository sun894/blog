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
 <form class="form-horizontal" role="form" method="post" action="{{url('/shop_type/update/'.$data->t_id)}}">
  <caption><h2>分类修改</h2></caption>
  <div class="form-group">
    @csrf
    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
    <div class="col-sm-5">
      <input type="text" name="t_name" value="{{$data->t_name}}" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-5">
      <select class="form-control" name="pid" disabled>
	      <option value="0">请选择父级分类</option>
          @foreach($res as $v)
		  <option value="{{$v->t_id}}"
		  {{$data->pid==$v->t_id ? 'selected' : ''}}
		  >{{str_repeat('|--',$v->level)}}{{$v->t_name}}</option>
		  @endforeach
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio" name="is_show" value="1" checked="checked"
	  {{$data->is_show==1 ? 'checked' : ''}}
	  >是
      <input type="radio" name="is_show" value="2" 
	  {{$data->is_show==2 ? 'checked' : ''}}
	  >否
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否导航栏显示</label>
    <div class="col-sm-5">
      <input type="radio" name="is_nav_show" value="1" checked="checked"
	  {{$data->is_nav_show==1 ? 'checked' : ''}}
	  >是
      <input type="radio" name="is_nav_show" value="2" 
	  {{$data->is_nav_show==2 ? 'checked' : ''}}
	  >否
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
