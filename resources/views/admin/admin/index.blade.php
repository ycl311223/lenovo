@extends("admin.public.admin")
@section('main')
<!-- 内容 -->
<div class="col-md-10">
				
	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="#">管理员管理</a></li>
		<li class="active">管理员列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
			<a href="javascript:;" data-toggle="modal" data-target="#addAdmin" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a>
			
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
			<th>NAME</th>
			<th>加入时间</th>
			<th>状态</th>
			<th>操作</th>
			@foreach($data as $value)
				<tr>
					<td><input type="checkbox" name="" ></td>
					<td>{{$value->id}}</td>
					<td>{{$value->name}}</td>
					<td>{{date("Y-m-d H:i:s",$value->time)}}</td>
					@if($value->status)
						<td>禁用</td>
					@else
						<td>正常</td>

					@endif
					<td><a href="javascript:;" onclick="edit({{$value->id}})" data-toggle="modal" data-target="#updateAdmin">编辑</a>
						<a href="javascript:;" onclick="deletes(this,{{$value->id}})">删除</a>
					</td>
				</tr>
			@endforeach
		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			{{--{{ $data->links() }}--}}
		</div>
	</div>
</div>			
<!-- 添加管理员的摸态框 -->
<div class="modal fade" id="addAdmin">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">添加管理员</h4>
				</div>
				<div class="modal-body">
					<form action="" onsubmit="return false" id="formAdd">
						<div class="form-group">
							<label for="">用户名</label>
							<input type="text" name="name" class="form-control" placeholder="请输入用户名" >
						</div>
						<div id="adminInfo" >

						</div>
						<div class="form-group">
							<label for="">密码</label>
							<input type="password" name="pass" class="form-control" placeholder="请输入密码" >
						</div>
						<div id="passInfo">

						</div>
						<div class="form-group">
							<label for="">确认密码</label>
							<input type="password" name="repass" class="form-control" placeholder="请再次输入密码" >
						</div>
						<div class="form-group">
							<label for="">状态</label>
							<br>
							<input type="radio" name="status" checked value="0" >正常
							<input type="radio" name="status" value="1" >禁用
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
<!-- 修改管理员的摸态框 -->
<div class="modal fade" id="updateAdmin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">修改管理员</h4>
			</div>
			<div class="modal-body" id="body">

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	//添加管理员
	function add(){
	    str=$("#formAdd").serialize();
		$.post('/a/admin',{str:str,'_token':"{{csrf_token()}}"},function(data){
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
			    alert('添加管理员失败');
			}
		})
	}
    //删除管理员
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
    //修改管理员携带数据的方法
	function edit(id){
        //这里没有csrf，为啥？
        $.get('/a/admin/'+id+'/edit',{'_token':"{{csrf_token()}}"},function(data){
           if(data){
				$("#body").html(data);
		   }
		});
	}
	//修改管理员
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

</script>
@endsection