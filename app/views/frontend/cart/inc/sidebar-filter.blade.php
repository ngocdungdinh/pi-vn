<div class="categories-box">
	<div style="margin-top: 12px">
		<div class="ctitle">
			<span>TÌM SẢN PHẨM</span>
			<span class="cshadown"></span>
		</div>
	</div>
	<ul class="nav nav-pills nav-stacked bs-sidebar catelist">
		<li>
			<form action="" method="get" role="form" style="padding: 15px;">
				<div class="form-group">
					<input type="text" class="form-control" id="keyword" name="k" value="{{ isset($keyword) ? $keyword : '' }}" placeholder="Tên sản phẩm...">
				</div>
				@foreach($attributes as $attr)
					@if($attr->parent_id == 0)
					  <div class="form-group">
				  		<select name="{{$attr->slug}}[]" multiple="multiple" class="attrselector" class="form-control" placeholder="{{ $attr->name }}">
				  			@foreach($attributes as $subattr)
				  				@if($subattr->parent_id == $attr->id)
				  					<option {{ in_array($subattr->id, $attrIds) ? 'selected="selected"' : '' }} value="{{ $subattr->id }}">{{ $subattr->name }}</option>
				  				@endif
				  			@endforeach
				  		</select>
					  </div>
					@endif
				@endforeach
  				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Tìm</button>
			</form>
		</li>
	</ul>
</div>
<div class="categories-box hidden-xs">
	<div style="margin-top: 12px">
		<div class="ctitle">
			<span>SAMMISHOP</span>
			<span class="cshadown"></span>
		</div>
	</div>
	<div class="well">
		<strong>Cửa hàng:</strong><br />
		số 52 ngõ Núi Trúc ( ngõ cạnh số 59 ) phố Núi Trúc<br />
		<br />
		<strong>Điện thoại mua lẻ:</strong> 094.567.7911 / 04.62732145 <br />( có thể gọi hoặc nhắn tin từ 9h-21h ) <br /><br />
		<strong>Điện thoại mua sỉ:</strong> 098.6677.911<br /><br />
		<strong>Email:</strong><br />
		sammi.shop86@gmail.com<br />
	</div>
</div>