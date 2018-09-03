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
		<li><a href="#">商品管理</a></li>
		<li class="active">商品修改</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="index.html" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 商品页面</a>
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 修改商品</a>

		</div>
		<div class="panel-body">
			<form action="" method="post">
				{{csrf_field()}}
				<input type="hidden" name="id" value="{{$data[0]->id}}">
				<div class="form-group">
					<label for="">商品名</label>
					<input type="text" name="title" value="{{$data[0]->title}}" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">商品简介</label>
					<textarea name="info" id="" class="form-control">{{$data[0]->info}}</textarea>
				</div>
				<div class="form-group">
					<label for="">商品所属分类</label>
					<select name="cid" class="form-control" id="">
						{{--<option value="">请选择商品分类</option>--}}

						@foreach($types as $value)

							@if($value->size==2)
								if($value->id==$data[0]->id){
									<option value="{{$value->id}}" selected >{{$value->html}}</option>
								}
							@else
								<option disabled value="{{$value->id}}">{{$value->html}}</option>

							@endif


						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">商品价格</label>
					<input type="text" name="price" value="{{$data[0]->price}}" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">商品库存</label>
					<input type="text" name="num" value="{{$data[0]->num}}" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">商品封面图片</label>
					<input type="file" name="" id="uploads">
					<div id="main">
						<img width='200px'  src='/Uploads/goods/{{$data[0]->img}}'>;
					</div>
					<input type="hidden" name="img" value="" id="imgs">

					<div class="form-group">
						<label for="">商品多图片</label>
						<input type="file" name="" id="uploads1">
						<div id="main1">
							@foreach($data[0]->imgs as $val)
								<img width='200px'  src='/Uploads/goods/{{$val->img}}'>;
							@endforeach
						</div>
						<input type="hidden" name="imgs" value="" id="imgs1">
					</div>


					<div class="form-group">
						<label for="">商品简介</label>
						<script id="editor" type="text/plain" name="text"   style="width:100%;height:300px;">{{$data[0]->text}}</script>
                    </div>

                    <div class="form-group">
                         <label for="">商品配置</label>
                         <script id="editor1" type="text/plain" name="config" style="width:100%;height:300px;">{{$data[0]->config}}</script>
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
            // 商品详情的百度编辑器调用
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

            // 商品的多图片上传
            var imgs1='';

            var arr=[];
            // 使用 uploadify 插件
            $('#uploads1').uploadify({
                // 设置文本
                'buttonText' : '多图片上传',
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