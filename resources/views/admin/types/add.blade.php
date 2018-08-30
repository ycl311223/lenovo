@extends('admin.public.admin')

@section('main')

<!-- 引入CSS -->
<link rel="stylesheet" href="/up/uploadify.css">
<!-- 引入JQ -->
<script src="/style/admin/bs/js/jquery.min.js"></script>
<!-- 引入文件上传插件 -->
<script src="/up/jquery.uploadify.min.js"></script>

<script type="text/javascript" charset="utf-8" src="/baidu/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/baidu/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/baidu/lang/zh-cn/zh-cn.js"></script>
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="#">分类管理</a></li>
		<li class="active">分类添加</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="index.html" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 分类页面</a>
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加分类</a>
			
		</div>
		<div class="panel-body">
			<form action="/a/types" method="post">
					{{csrf_field()}}
				<div class="form-group">
					<label for="">分类名</label>
					<input type="text" name="name" placeholder="请输入分类名" class="form-control" id="">
					<input type="hidden" name="pid" value="<?php echo isset($_GET['pid'])?$_GET['pid']:0;?>">
					<input type="hidden" name="path" value="<?php echo isset($_GET['path'])?$_GET['path']:'0,';?>">
				</div>
				<div class="form-group">
					<label for="">TITLE</label>
					<input type="text" name="title" placeholder="请输入标题" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">KEYWORD</label>
					<input type="text" name="keywords" placeholder="请输入关键词" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">DESCRIPTION</label>
					<input type="text" name="description" placeholder="请输入描述" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">SORT</label>
					<input type="text" name="sort" placeholder="请输入排序" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">是否楼层</label>
					<br>
					<input type="radio" name="is_lou" value="1" id="">是
					<input type="radio" name="is_lou" value="0" checked id="">否
				</div>

				<div class="form-group">
					<input type="submit" value="提交" class="btn btn-success">
					<input type="reset" value="重置" class="btn btn-danger">
				</div>

			</form>
		</div>
		
	</div>
</div>

<script>
	// 当所有HTML代码都加载完毕
	$(function() {
		// 分类详情的百度编辑器调用
		var ue = UE.getEditor('editor');
		var ue1 = UE.getEditor('editor1');
		// 声明字符串

		var imgs='';
		// 使用 uploadify 插件
        $('#uploads').uploadify({
        	// 设置文本
            'buttonText' : '图片上传',
            // 设置文件传输数据
            'formData'     : {
            	'_token':'{{ csrf_token() }}',
            	'files':'goods',
                
            },
            // 上传的flash动画
            'swf'      : "/up/uploadify.swf",
            // 文件上传的地址
            'uploader' : "/admin/shangchuan",
            // 当文件上传成功
            'onUploadSuccess' : function(file, data, response) {

            	// 拼接图片
            	imgs="<img width='200px'  src='/Uploads/goods/"+data+"'>";
            	// 展示图片
            	$("#main").html(imgs);
            	// 隐藏传递数据
            	$("#imgs").val(data);
               
            }
        });

        // 分类的多图片上传
		var imgs1='';

		var arr=[];
		// 使用 uploadify 插件
        $('#uploads1').uploadify({
        	// 设置文本
            'buttonText' : '图片多上传',
            // 设置文件传输数据
            'formData'     : {
            	'_token':'{{ csrf_token() }}',
            	'files':'goods',
                
            },
            // 上传的flash动画
            'swf'      : "/up/uploadify.swf",
            // 文件上传的地址
            'uploader' : "/admin/shangchuan",
            // 当文件上传成功
            'onUploadSuccess' : function(file, data, response) {

            	// 拼接图片
            	imgs1+="<img width='200px'  src='/Uploads/goods/"+data+"'>";

            	arr.push(data);
            	// 展示图片
            	$("#main1").html(imgs1);
            	// 隐藏传递数据
            	$("#imgs1").val(arr.join(','));
               
            }
        });
    });
</script>
@endsection