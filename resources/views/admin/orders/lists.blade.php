@extends("admin.public.admin")
@section('main')
<!-- 订单详情列表首页 -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="#">订单详情管理</a></li>
		<li class="active">订单详情列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
				<button class="btn btn-success"> 订单详情展示</button>
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
			<th>商品名</th>
			<th>商品图片</th>
			<th>购买价格</th>
			<th>购买数量</th>
			<th>小计</th>
			<?php
				$number=0;
				$money=0;
			?>
			@foreach($data as $value)
				<tr>
					<td><input type="checkbox" name="" id=""></td>
					<td>{{$value->title}}</td>
					<td><img width="100px" src="/Uploads/goods/{{$value->img}}"></td>
					<td>{{$value->price}}</td>
					<td>{{$value->num}}</td>
					<td>{{$value->price*$value->num}}</td>
					<?php
						$number+=$value->num;
						$money+=$value->price*$value->num;
					?>
				</tr>
			@endforeach
			<tr>
				<td>合计</td>
				<td>总价：{{$money}}</td>
				<td>数量：{{$number}}</td>
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