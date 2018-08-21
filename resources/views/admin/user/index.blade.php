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
		<li><a href="#">用户管理</a></li>
		<li class="active">用户列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
			<a href="javascript:;" data-toggle="modal" data-target="#addUser" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加用户</a>
			
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
			<th>NickName</th>
			<th>EMAIL</th>
			<th>TEL</th>
			<th>状态</th>
			<th>加入时间</th>
			<th>操作</th>
			@foreach($data as $value)
				<tr>
					<td><input type="checkbox" name="" ></td>
					<td>{{$value->id}}</td>
					<td>{{$value->nickname}}</td>
					<td>{{$value->email}}</td>
					<td>{{$value->tel}}</td>
					<!--0	1	2-->
					@if($value->status==0)
						<td><span class="btn btn-danger" onclick="change(this,{{$value->id}},{{$value->status}})">未激活</span></td>
					@elseif($value->status==1)
						<td><span class="btn btn-success" onclick="change(this,{{$value->id}},{{$value->status}})">激活</span></td>
					@elseif($value->status==2)
						<td><span class="btn btn-success" onclick="change(this,{{$value->id}},{{$value->status}})">黑名单</span></td>

					@endif
					<td>{{date("Y-m-d H:i:s",$value->time)}}</td>

					<td><a href="javascript:;" onclick="edit({{$value->id}})" data-toggle="modal" data-target="#updateAdmin">编辑</a>
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
<!-- 添加用户的摸态框 -->
<div class="modal fade" id="addUser">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">添加用户</h4>
				</div>
				<div class="modal-body">
					<form action="" onsubmit="return false" id="formAdd">
						<div class="form-group">
							<label for="">用户昵称</label>
							<input type="text" name="name" class="form-control" placeholder="请输入用户名" >
						</div>
						<div id="adminInfo" >

						</div>
						<div class="form-group">
							<label for="">性别</label>
							<br>
							<input type="radio" name="sex" checked value="1">男
							<input type="radio" name="sex" value="0" >女
						</div>
						<div id="passInfo">

						</div>
						<div class="form-group">
							<label for="">密码</label>
							<input type="password" name="pass" class="form-control" placeholder="请输入密码" >
						</div>
						<div class="form-group">
							<label for="">确认密码</label>
							<input type="password" name="repass" class="form-control" placeholder="请再次输入密码" >
						</div>
						<div class="form-group">
							<label for="">用户电话</label>
							<input type="password" name="tel" class="form-control" placeholder="请输入电话号码" >
						</div>
						<div class="form-group">
							<label for="">生日</label>
							<input type="text" name="birth" class="form-control" placeholder="请填写生日，格式为：1997年02月11日">
						</div>
						<div class="form-group">
							<label for="">用户地址</label>
							<input type="password" name="addr" class="form-control" placeholder="请输入省市区县" >
						</div>
						<div class="form-group">
							<label for="">详细地址</label>
							<input type="password" name="addrInfo" class="form-control" placeholder="请输入街道小区" >
						</div>
						<div class="form-group">
							<label for="">用户头像</label>
							<input type="file" name="" id="uploads">
							<div id="main">

							</div>
							<input type="hidden" name="img" id="imgs">
						</div>


						<div class="form-group pull-right">
							<input type="submit" value="提交" onclick="add()" class="btn btn-success">
							<input type="reset" id="reset1" value="重置" class="btn btn-danger">
						</div>

						<div style="clear:both"></div>
					</form>
				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<!-- 修改用户的摸态框 -->
<div class="modal fade" id="updateAdmin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">修改用户</h4>
			</div>
			<div class="modal-body" id="body">

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	//添加用户
	function add(){
	    str=$("#formAdd").serialize();
		$.post('/a/user',{str:str,'_token':"{{csrf_token()}}"},function(data){
			if(data==1){
			    $(".close").click();
				$("#reset1").click();
			    $("#adminInfo").html('');
			    $("#passInfo").html("");

				window.location.reload();

			}else if(data){

                var str='';
			    if(data.name){
                    str="<div class='alert alert-danger'>"+data.name+"</div>";

				}else{
                    str="<div class='alert alert-success'>"+'验证通过'+"</div>";

				}
                $("#adminInfo").html(str);
				if(data.pass){
                    str="<div class='alert alert-danger'>"+data.pass+"</div>";
				}else{
                    str="<div class='alert alert-success'>"+'验证通过'+"</div>";

				}
                $("#passInfo").html(str);
			}else{
			    alert('添加用户失败');
			}
		})
	}
    //删除用户
    function deletes(obj,id){
		$.post('/a/admin/'+id,{'_token':"{{csrf_token()}}","_method":"delete"},function(data){
			if(data==1){
				$(obj).parent().parent().remove();
				tot=Number($("#tot").html());
				$("#tot").html(--tot);
			}else{
			    alert("删除失败");
			}

		})
    }
    //修改用户携带数据的方法
	function edit(id){
        //这里没有csrf，为啥？
        $.get('/a/admin/'+id+'/edit',{'_token':"{{csrf_token()}}"},function(data){
           if(data){
				$("#body").html(data);
		   }
		});
	}
	//修改用户
	function updates(){
	    str=$("#formUpdate").serialize();
	    $.post('/a/admin/1',{str:str,'_token':"{{csrf_token()}}",'_method':"put"},function(data){
			if(data==1){
                $(".close").click();
                window.location.reload();
            }else if(data==0){
                alert('修改失败');

			}else if(data) {
                if (data.pass) {
                    strs = "<div class='alert alert-danger'>" + data.pass + "</div>";
                    $("#passInfo2").html(strs)
                }
            }
		})
	}

	function change(obj,id,sta){
	    $.post('/a/admin/changeSta',{id:id,"_token":"{{csrf_token()}}"},function(data){
			if(data==1){
				if(sta==1){
				    $(obj).parent().html('<span class="btn btn-success" onclick="change(this,'+id+',0)">正常</span>')
				}else{
                    $(obj).parent().html('<span class="btn btn-danger" onclick="change(this,'+id+',1)">禁用</span>')
				}
			}else{
			    alert("修改状态失败");
			}
		})
	}

    $(function() {
        // 声明字符串

        var imgs='';
        // 使用 uploadify 插件
        $('#uploads').uploadify({
            // 设置文本
            'buttonText' : '图片上传',
            // 设置文件传输数据
            'formData'     : {
                '_token':'{{ csrf_token() }}',
                'files':'users',

            },
            // 上传的flash动画
            'swf'      : "/up/uploadify.swf",
            // 文件上传的地址
            'uploader' : "/admin/shangchuan",
            // 当文件上传成功
            'onUploadSuccess' : function(file, data, response) {

                // 拼接图片
                imgs="<img width='200px'  src='/Uploads/users/"+data+"'>";
                // 展示图片
                $("#main").html(imgs);
                // 隐藏传递数据
                $("#imgs").val(data);

            }
        });
    });

</script>
@endsection