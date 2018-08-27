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
		<li><a href="#">分类管理</a></li>
		<li class="active">分类列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
			<a href="/a/types/create"  class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加分类</a>
			
			<p class="pull-right tots" >共有 <span id="tot"></span> 条数据</p>
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
			<th>NAME</th>
			<th>Title</th>
			<th>keyword</th>
			<th>Description</th>
			<th>添加子类</th>
			<th>楼层</th>
			<th>操作</th>

			@foreach($data as $value)
				<tr>
					<td><input type="checkbox" name=""></td>
					<td>{{$value->id}}</td>
					<td>{{$value->name}}</td>
					<td>{{$value->title}}</td>
					<td>{{$value->keywords}}</td>
					<td>{{$value->description}}</td>
					<td><a href="/a/types/create?pid={{$value->id}}&path={{$value->path}}{{$value->id}},">添加子类</a></td>
					<td>
						@if($value->is_lou==1)
							<span class="btn-success">是</span>
						@else
							<span class="btn-danger">否</span>
						@endif
					</td>
					<td>
						<a>修改</a>
						<a href="javascript:;" onclick="del({{$value->id}})">删除</a>
					</td>
				</tr>
			@endforeach

		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">

		</div>
	</div>
</div>			

<!-- 修改分类的摸态框 -->
<div class="modal fade" id="updateAdmin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">修改分类</h4>
			</div>
			<div class="modal-body" id="body">

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	function del(id){
	    if(confirm("您确认要删除吗？")){
            $.post('/a/types/'+id,{'_token':"{{csrf_token()}}",'_method':'delete'},function (data) {
				if(data==1){
				    window.location.reload();
				}
            });
		}
	}

</script>
@endsection