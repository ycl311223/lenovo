
<form action="" onsubmit="return false" id="formUpdate">
	<div class="form-group">
		<label for="">用户名</label>
		<input type="text" disabled value="{{$data->name}}" name="name" class="form-control" placeholder="请输入用户名" >
		<input type="hidden" value="{{$data->id}}" name="id">
	</div>

	<div class="form-group">
		<label for="">密码</label>
		<input type="password" name="pass" value="{{$data->pass}}" class="form-control" placeholder="请输入密码" >
	</div>
	<div id="passInfo2">

	</div>
	<div class="form-group">
		<label for="">确认密码</label>
		<input type="password" name="repass" value="{{$data->pass}}" class="form-control" placeholder="请再次输入密码" >
	</div>
	<div class="form-group">
		<label for="">状态</label>
		<br>
		@if($data->status)
			<input type="radio" name="status"  value="0" >正常
			<input type="radio" name="status" checked value="1" >禁用
		@else
			<input type="radio" name="status" checked  value="0" >正常
			<input type="radio" name="status"  value="1" >禁用
		@endif

	</div>
	<div class="form-group pull-right">
		<input type="submit" value="提交" onclick="updates()" class="btn btn-success">
		<input type="reset" id="reset" value="重置" class="btn btn-danger">
	</div>

	<div style="clear:both"></div>
</form>
