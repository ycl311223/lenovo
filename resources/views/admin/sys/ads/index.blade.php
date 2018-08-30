@extends("admin.public.admin")
@section('main')
<!-- 用户列表首页 -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="#">系统管理</a></li>
		<li class="active">广告列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
				<button class="btn btn-success"> 广告展示</button>
				<a href="/a/sys/ads/create" class="btn btn-success">广告添加</a>
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
			<th>Title</th>
			<th>Sort</th>
			<th>Href</th>
			<th>Img</th>
			<th>操作</th>
			@foreach($data as $value)
				<tr>
					<td><input type="checkbox" name="" id=""></td>
					<td>{{$value->id}}</td>
					<td>{{$value->title}}</td>
					<td>{{$value->sort}}</td>
					<td>{{$value->href}}</td>
					<td>
						<img width="200px" height="200px" src="/Uploads/ads/{{$value->img}}">
					</td>
					<td><a href="javascript:;" data-toggle="modal" data-target="#edit" onclick="edit({{$value->id}})" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="deletes(this,{{$value->id}})" class="glyphicon glyphicon-trash"></a></td>
				</tr>
			@endforeach



		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			{{$data->links()}}
		</div>
	</div>
</div>
@endsection