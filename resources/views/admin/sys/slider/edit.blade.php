@extends('admin.public.admin')
@section('main')
	<!-- 引入CSS -->
	<link rel="stylesheet" href="/up/uploadify.css">
	<!-- 引入JQ -->
	<script src="/style/admin/bs/js/jquery.min.js"></script>
	<!-- 引入文件上传插件 -->
	<script src="/up/jquery.uploadify.js"></script>

<!-- 内容 -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="#">轮播图管理</a></li>
		<li class="active">轮播图修改</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 修改轮播图</a>
		</div>
		<div class="panel-body">
			<form action="" method="post">
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" name="" value="{{$data[0]->title}}" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">Orders</label>
					<input type="text" name="" value="{{$data[0]->orders}}" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">Href</label>
					<input type="text" name="" value="{{$data[0]->href}}" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">轮播图图片</label>
					<input type="file" name="" id="uploads">
					<div id="main">
						<img width='200px'  src='/Uploads/lun/{{$data[0]->img}}'>
					</div>
					<input type="hidden" name="img"  id="imgs">
				</div>

				<div class="form-group">
					<input type="submit" value="提交" onclick="edits()"class="btn btn-success">
					<input type="reset" value="重置" class="btn btn-danger">
				</div>

			</form>
		</div>
	</div>
</div>

<script>
	// 当所有HTML代码都加载完毕
	$(function() {
		// 声明字符串
		var imgs='';
		// 使用 uploadify 插件
		$('#uploads').uploadify({
			// 设置文本
			'buttonText' : '图片上传',
			// 设置文件传输数据
			'formData': {
				'_token':'{{ csrf_token() }}',
				//设置了文件上传的目录
				'files':'lun',
			},
			// 上传的flash动画
			'swf': "/up/uploadify.swf",
			// 文件上传的地址
			'uploader' : "/admin/shangchuan",
			// 当文件上传成功
			'onUploadSuccess' : function(file, data, response) {
				// 拼接图片
				imgs="<img width='200px'  src='/Uploads/lun/"+data+"'>";
				// 展示图片
				$("#main").html(imgs);
				// 图片上传完毕后上边隐藏的Input的值就被设置为data,可以传到控制器。
				$("#imgs").val(data);
			}
		});
	});
</script>
@endsection