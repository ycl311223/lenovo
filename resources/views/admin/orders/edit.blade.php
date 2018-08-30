@extends("admin.public.admin")
@section('main')
<!-- 订单状态列表首页 -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="#">订单状态管理</a></li>
		<li class="active">订单状态列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
				<button class="btn btn-success"> 订单状态修改</button>
		</div>
		<div class="panel-body">
			<form action="" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">订单号</label>
					<input class="form-control" type="text" name="code" value="{{$_GET['code']}}">
				</div>
				<div class="form-group">
					<label for="">订单状态</label>
					<select class="form-control" name="sid" id="">
						@foreach($data as $value)
							@if($_GET['sid']==$value->id)
								<option selected value="{{$value->id}}">{{$value->name}}</option>
							@else
								<option value="{{$value->id}}">{{$value->name}}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="提交">
				</div>
			</form>
		</div>

		<!-- 分页效果 -->
		<div class="panel-footer">
			<nav style="text-align:center;">
				
			</nav>

		</div>
	</div>
</div>
@endsection