  @foreach($data as $v)
  <tr>
	<td>{{$v->student_id}}</td>
	<td>{{$v->student_name}}</td>
	<td>{{$v->student_sex}}</td>
	<td>{{$v->student_class}}</td>
	<td><a type="button" class="btn btn-info" href="{{url('/student/edit/'.$v->student_id)}}">修改</a>&nbsp;<a type="button" class="btn btn-danger" href="{{url('/student/del/'.$v->student_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="4">{{$data->appends($query)->links()}}</td>
	</tr>