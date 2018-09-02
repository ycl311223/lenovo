@extends("admin.public.admin")
@section('main')

<link rel="stylesheet" href="/up/uploadify.css">
<!-- 引入JQ -->
<script src="/style/admin/public/bs/js/jquery.min.js"></script>
<!-- 引入文件上传插件 -->
<script src="/up/jquery.uploadify.min.js"></script>
<!-- 内容 -->
<div class="col-md-10">
				
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="#">商品管理</a></li>
		<li class="active">商品列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
			<a href="/a/goods/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加商品</a>
			
			<p class="pull-right tots" >共有 <span id="tot">{{$data->count()}}</span> 条数据</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" >
				</div>
				
				<input type="submit" value="搜索" class="btn btn-success">
			</form>
		</div>
		<table class="table-bordered table table-hover">
			<th><input type="checkbox" name=""></th>
			<th>ID</th>
			<th>Title</th>
			<th>INFO</th>
			<th>IMG</th>
			<th>PRICE</th>
			<th>NUM</th>
			<th>操作</th>
			@foreach($data as $value)
				<tr>
					<td><input type="checkbox" name="" ></td>
					<td>{{$value->id}}</td>
					<td>{{$value->title}}</td>
					<td>{{$value->info}}</td>
					<td>
						<img width="100px" src="/Uploads/goods/{{$value->img}}" alt="">
						<br>
						@foreach($value->tupian as $val)
							<img width="50px" src="/Uploads/goods/{{$val->img}}">
						@endforeach
					</td>
					<td>{{$value->price}}</td>
					<td>{{$value->num}}</td>
					<td>
						<a href="" >修改</a>
						<a href="javascript:;" onclick="deletes(this,{{$value->id}})">删除</a>
					</td>

				</tr>
			@endforeach
		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			{{ $data->links() }}
		</div>
	</div>
</div>			


<script>

    //删除商品
    function deletes(obj,id){
        if(confirm("你确认要删除吗？")){
            $.post('/a/goods/'+id,{'_token':"{{csrf_token()}}","_method":"delete"},function(data){
                if(data==1){
                    $(obj).parent().parent().remove();
                    tot=Number($("#tot").html());
                    $("#tot").html(--tot);
                }else{
                    alert("删除失败");
                }

            })
		}

    }


</script>
@endsection