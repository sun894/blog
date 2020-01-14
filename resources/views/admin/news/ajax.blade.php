  @foreach($res as $v)
  <tr>
	<td>{{$v->news_id}}</td>
	<td>{{$v->news_name}}</td>
	<td>{{$v->parent_id}}</td>
	<td>{{$v->news_time}}</td>
	<td><a type="button" class="btn btn-info" href="{{url('/news/edit/'.$v->news_id)}}">修改</a>&nbsp;<a type="button" class="btn btn-danger" href="{{url('/news/del/'.$v->news_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="4">{{$res->links()}}</td>
	</tr>
