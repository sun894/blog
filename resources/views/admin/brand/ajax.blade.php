 @foreach($data as $v)
  <tr>
	<td>{{$v->brand_id}}</td>
	<td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="200"/>{{$v->brand_name}}</td>
	<td>{{$v->brand_url}}</td>
	<td>{{$v->brand_desc}}</td>
	<td><a type="button" class="btn btn-info" href="{{url('/brand/edit/'.$v->brand_id)}}">修改</a>&nbsp;<a type="button" class="btn btn-danger" href="{{url('/brand/del/'.$v->brand_id)}}">删除</a></td>
  </tr>
  @endforeach
	<tr>
		<td colspan="4">{{$data->links()}}</td>
	</tr>