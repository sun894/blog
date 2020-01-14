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
	<td><a href="{{url('/articles/del/'.$v->article_id)}}">删除</a>&nbsp;&nbsp;<a href="{{url('/articles/edit/'.$v->article_id)}}">修改</a></td>
  </tr>
  @endforeach
  <tr>
	<td colspan="7">{{$post->links()}}</td>
  </tr>
