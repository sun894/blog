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
 <h3>文章展示页面</h3>
<h3 align="center">欢迎【{{session('res')['account']}}】登录<a href="{{url('/articles/loginout')}}">退出</a></h3>
 <h6><a href="{{url('/articles/create')}}">返回添加页面</a></h6>
 <body>
 <form>
	<input type="text" name="word" placeholder="请输入">
    		<select name="c_id">
			<option value="">请选择......</option>
            @foreach ($data as $v)
			<option value="{{$v->c_id}}">{{$v->c_name}}</option>
            @endforeach
		</select>
	<button>搜索</button>
 </form>
  <table border=1>
  <tr>
	<td>编号</td>
	<td>文章标题</td>
	<td>文章分类</td>
	<td>文章重要性</td>
	<td>是否显示</td>
	<td>添加日期</td>
	<td>操作</td>
  </tr>
  @foreach($post as $v)
  <tr>
	<td>{{$v->article_id}}</td>
	<td>{{$v->article_name}}</td>
	<td>{{$v->c_name}}</td>
	<td>{{$v->article_zyx==1?'普通':'顶置'}}</td>
	<td>{{$v->is_show==1?'显示':'不显示'}}</td>
	<td>{{date("Y-m-d h:i:s",$v->create_time)}}</td>
	<td><a onclick="ajaxdel({{$v->article_id}})" href="javascript:void(0)">删除</a>&nbsp;&nbsp;<a href="{{url('/articles/edit/'.$v->article_id)}}">修改</a></td>
  </tr>
  @endforeach
  <tr>
	<td colspan="7">{{$post->links()}}</td>
  </tr>
  </table>
 </body>
</html>
<script src="/static/js/jquery.min.js"></script>
<script>
      $(document).on('click','.pagination a',function(){
		    var url=$(this).attr('href');
	        $.get(url,function(res){
			      $('table').html(res);
			});
			return false;
	  });
      function ajaxdel(id){
		    if(!id){
			  return;
			}
	        $.get('/articles/del/'+id,function(res){
			      if(res.code=='00000'){
				     alert(res.msg);
					 location.reload();
				  }
			},'json');
	  }

</script>