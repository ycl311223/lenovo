@extends("admin.public.admin")
@section('main')
<!-- 地址详情列表首页 -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="#">地址详情管理</a></li>
		<li class="active">地址详情列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
				<button class="btn btn-success"> 地址详情展示</button>
			<p class="pull-right tots" >共有 <span id="tot"></span> 条数据</p>
			<form action="" method="get" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>

				<input type="submit" value="搜索" class="btn btn-success">
			</form>
		</div>
		<table class="table-bordered table table-hover">
			<tr>
				<td>姓名</td>
				<td>{{$data->sname}}</td>
			</tr>
			<tr>
				<td>电话</td>
				<td>{{$data->stel}}</td>
			</tr>
			<tr>
				<td>所在省市</td>
				<td>{{$data->addr}}</td>
			</tr>
			<tr>
				<td>详细信息</td>
				<td>{{$data->addrInfo}}</td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td>{{$data->email}}</td>
			</tr>
		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			<nav style="text-align:center;">
			</nav>
		</div>
	</div>
</div>
@endsection