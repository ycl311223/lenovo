@extends("admin.public.admin")
@section('main')

	<!-- 用户列表首页 -->
	<div class="col-md-10">

		<ol class="breadcrumb">
			<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
			<li><a href="#">用户管理</a></li>
			<li class="active">用户列表</li>

			<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
		</ol>

		<!-- 面版 -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<button class="btn btn-danger"> 分类广告展示</button>
				<a href="/a/sys/types/create" class="btn btn-success">分类广告添加</a>
				<p class="pull-right tots" >共有 <span id="tot"></span> 条数据</p>
				<form action="" method="get" class="form-inline pull-right">
					<div class="form-group">
						<input type="text" name="search" class="form-control" placeholder="请输入你要搜索的内容" id="">
					</div>

					<input type="submit" value="搜索" class="btn btn-success">
				</form>


			</div>
			<table class="table-bordered table table-hover">
				<th><input type="checkbox" name="" id=""></th>
				<th>ID</th>
				<th>IMG</th>
				<th>TITLE</th>
				<th>TYPES</th>
				<th>分类</th>

				<th>操作</th>
				@foreach($data as $value)
					<tr>
						<td><input type="checkbox" name="" id=""></td>
						<td>{{$value->id}}</td>
						<td><img width="200px" src="/Uploads/ads/{{$value->img}}"></td>
						<td>{{$value->title}}</td>
						<td>{{$value->name}}</td>
						<td>
							@if($value->type)
								大图
							@else
								小图
							@endif
						</td>
						<td><a href="javascript:;" data-toggle="modal" data-target="#edit" onclick="edit({{$value->id}})">修改</a>    <a href="javascript:;" onclick="deletes(this,{{$value->id}})">删除</a></td>

					</tr>
				@endforeach


			</table>
			<!-- 分页效果 -->
			<div class="panel-footer">
				{{$data->links()}}

			</div>
		</div>
	</div>
	<!-- x修改的模态框 -->
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">修改分类广告</h4>
				</div>
				<div class="modal-body" id="body">

				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	<script>
		function deletes(obj,id){
		    $.post('/a/sys/types/'+id,{"_token":"{{csrf_token()}}","_method":"delete"},function(data){
		        if(data==1){
					$(obj).parent().parent().remove();
				}else{
		            alert("删除失败");
				}
			})
		}

		function edit(id){
		    $.get('/a/sys/types/'+id+"/edit",{},function(data){
				if(data){
				    $("#body").html(data);
				}
			})
		}
		function save(){
			str=$("#formEdit").serialize();
			$.post('/admin/sys/types/1',{str:str,"_token":"{{csrf_token()}}","_method":"put"},function(data){

			})
		}



	</script>
@endsection