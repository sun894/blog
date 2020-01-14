<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
 <h2>文章修改</h2>
<form method="post" action="{{url('/articles/update/'.$res->article_id)}}" enctype="multipart/form-data">
	<table>
	@csrf
	<tr>
		<td>文章标题</td>
		<td><input type="text" value="{{$res->article_name}}" name="article_name"></td>
	</tr>
	<tr>
		<td>文章分类</td>
		<td>
		<select name="c_id">
			<option value="">请选择......</option>
            @foreach ($data as $v)
			<option value="{{$v->c_id}}"{{$res->c_id ==$v->c_id?'selected':'' }}>{{$v->c_name}}</option>
            @endforeach
		</select>
		</td>
	</tr>
	<tr>
		<td>文章重要性</td>
		<td>
		<input type="radio" name="article_zyx" checked value="1"{{$res->article_zyx ==1?'checked':'' }}>普通
		<input type="radio" name="article_zyx" value="2" {{$res->article_zyx ==2?'checked':'' }}>顶置
		</td>
	</tr>
	<tr>
		<td>是否显示</td>
		<td>
		<input type="radio" name="is_show" checked value="1" {{$res->is_show ==1?'checked':'' }}>显示
		<input type="radio" name="is_show" value="2"{{$res->is_show ==2?'checked':'' }}>不显示
		</td>
	</tr>
	<tr>
		<td>文章作者</td>
		<td><input type="text" value="{{$res->article_author}}" name="article_author"></td>
	</tr>
	<tr>
		<td>作者email</td>
		<td><input type="text" name="author_email" value="{{$res->author_email}}"></td>
	</tr>
	<tr>
		<td>关键字</td>
		<td><input type="text" name="article_word" value="{{$res->author_email}}"></td>
	</tr>
	<tr>
		<td>网页描述</td>
		<td><textarea name="article_desc" rows="" cols="">{{$res->article_desc}}</textarea></td>
	</tr>
	<tr>
		<td>上传文件</td>
		<td><input type="file" name="article_img"></td>
	</tr>
	<tr>
		<td><input type="submit" value="确定"></td>
		<td><input type="reset" value="重置"></td>
	</tr>
	</table>
  </form>  
 </body>
</html>