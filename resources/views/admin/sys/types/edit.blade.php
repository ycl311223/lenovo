<form action="" onsubmit="return false;" id="formEdit">
	<div class="form-group">
		<label for="">所属类别</label>
		<input type="text" name="cid"  value="{{$data[0]->name}}" class="form-control" placeholder="请输入所属类别" id="">

		<input type="hidden" name="id" value="{{$data[0]->id}}">
	</div>
	<div class="form-group">
		<label for="">商品封面图片</label>
		<img width="100px" height="100px" src="/Uploads/ads/{{$data[0]->img}}">

	</div>
	<div class="form-group">
		<label for="">分类广告类型</label>
		<input type="text" name="type" value="{{$data[0]->type}}"class="form-control" placeholder="" id="">
	</div>
	<div class="form-group">
		<label for="">分类广告名称</label>
		<input type="text" name="title" value="{{$data[0]->title}}"class="form-control" placeholder="" id="">
	</div>
	<div class="form-group pull-right">
		<input type="submit" value="提交" onclick="save()" class="btn btn-success">
		<input type="reset"  value="重置" id="reset1" class="btn btn-danger">
	</div>

	<div style="clear:both"></div>
</form>