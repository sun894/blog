  <tr>
	<td>商品ID</td>
	<td>商品名称</td>
	<td>商品图片</td>
	<td>商品价格</td>
	<td>商品描述</td>
	<td>操作</td>
  </tr>
  @foreach($data as $v)
  <tr>
	<td>{{$v->shop_id}}</td>
	<td>{{$v->shop_name}}</td>
	<td><img src="{{env('UPLOAD_URL')}}{{$v->shop_img}}" width="200"/></td>
	<td>{{$v->shop_price}}</td>
	<td>{{$v->shop_desc}}</td>
	<td><a onclick="ajaxdel({{$v->shop_id}})" href="javascript:void(0)">删除</a></td>
  </tr>
  @endforeach
  <tr>
	<td colspan="6">{{$data->links()}}</td>
  </tr>
