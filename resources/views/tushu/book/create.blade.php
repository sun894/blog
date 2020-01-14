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
 <form class="form-horizontal" role="form" method="post" action="{{url('/book/store')}}" enctype="multipart/form-data">
  <caption><h2>图书添加</h2></caption>
  <div class="form-group">
    @csrf
    <label for="firstname" class="col-sm-2 control-label">图书名称</label>
    <div class="col-sm-5">
      <input type="text" name="book_name" class="form-control" id="firstname" placeholder="请输入名字"><font size="" color="red">{{$errors->first('book_name')}}</font>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书作者</label>
    <div class="col-sm-5">
      <input type="text" name="book_author" class="form-control" id="firstname" placeholder="请输入名字"><font size="" color="red">{{$errors->first('book_author')}}</font>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书价格</label>
    <div class="col-sm-5">
      <input type="text" name="book_price" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书封面</label>
    <div class="col-sm-5">
      <input type="file" name="book_img" class="form-control" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">图书添加</button>
    </div>
  </div>
</form>
 
 </body>
</html>
