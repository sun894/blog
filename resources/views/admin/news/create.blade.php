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
 <h2>新闻添加</h2><br/>
 <!--   @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif	-->
 <form class="form-horizontal" role="form" method="post" action="{{url('/news/store')}}" enctype="multipart/form-data">
  <div class="form-group">
    @csrf
    <label for="firstname" class="col-sm-2 control-label">新闻名称<br/></label>
    <div class="col-sm-5">
      <input type="text" name="news_name" class="form-control" id="firstname" placeholder="请输入名字"><font size="" color="red">{{$errors->first('news_name')}}</font>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-5">
      <select name="parent_id">
		<option value="0">请选择父级分类</option>
        @foreach ($data as $v )
		<option value="{{$v->cate_id}}">{{str_repeat('|--',$v->level)}}{{$v->cate_name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">新闻作者</label>
    <div class="col-sm-5">
      <input type="text" name="news_author" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info">新闻添加</button>
    </div>
  </div>
</form>
 
 </body>
</html>
