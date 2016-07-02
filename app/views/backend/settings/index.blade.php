@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Thiết lập ::
@parent
@stop

{{-- Page content --}}
@section('content')
<h3>
	<span class="glyphicon glyphicon-cog"></span> Thiết lập
</h3>
<div>    	
    <ul class="nav nav-tabs">
	  <li class="active"><a href="#tab-general" data-toggle="tab">Cơ bản</a></li>
	  <li><a href="#tab-news" data-toggle="tab">Tin tức</a></li>
	  <li><a href="#tab-cart" data-toggle="tab">Gian hàng</a></li>
	</ul>
</div>
<hr />
<form method="post" action="" autocomplete="off" class="form-horizontal" role="form">
<!-- CSRF Token -->
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="tab-content">
	<div class="tab-pane active" id="tab-general">
		<div class="form-group">
			<label for="sitename" class="col-sm-2 control-label">Tiêu đề</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="sitename" name="configs[sitename]" value="{{ Config::get('settings.sitename') }}" placeholder="" />
			</div>
		</div>
		<div class="form-group">
			<label for="siteinfo" class="col-sm-2 control-label">Mô tả</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="siteinfo" name="configs[site_info]" value="{{ Config::get('settings.site_info') }}" placeholder="" />
			</div>
		</div>
		<div class="form-group">
			<label for="keywords" class="col-sm-2 control-label">Từ khóa</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="keywords" name="configs[keywords]" value="{{ Config::get('settings.keywords') }}" placeholder="" />
			</div>
		</div>
		<div class="form-group">
			<label for="siteurl" class="col-sm-2 control-label">Địa chỉ web</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="siteurl" name="configs[site_url]" value="{{ Config::get('settings.site_url') }}" placeholder="" />
			</div>
		</div>
		<div class="form-group">
			<label for="admin_email" class="col-sm-2 control-label">Admin Email</label>
			<div class="col-sm-5">
				<input type="email" class="form-control" id="admin_email" name="configs[admin_email]" value="{{ Config::get('settings.admin_email') }}" placeholder="" />
			</div>
		</div>
		<div class="form-group">
			<label for="language" class="col-sm-2 control-label">Ngôn ngữ</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="language" name="configs[language]" value="{{ Config::get('settings.language') }}" placeholder="" />
			</div>
		</div>
		<hr />
		<div class="form-group">
			<label for="maintain_mode" class="col-sm-2 control-label">Bảo trì</label>
			<div class="col-sm-2">
				<select id="maintain_mode" name="configs[maintain_mode]" class="form-control">
					<option value="no" {{ Config::get('settings.maintain_mode')=='no' ? 'selected="selected"' : '' }}>Sai</option>
					<option value="yes" {{ Config::get('settings.maintain_mode')=='yes' ? 'selected="selected"' : '' }}>Đúng</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="maintain_info" class="col-sm-2 control-label">Thông tin bảo trì</label>
			<div class="col-sm-5">
				<textarea rows="5" class="form-control" id="maintain_info" name="configs[maintain_info]">{{ Config::get('settings.maintain_info') }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="maintain_info" class="col-sm-2 control-label">Thời gian hoạt động trở lại</label>
			<div class="col-sm-5">
                <div id="datetimepicker" class="date input-group">
					<span class="input-group-addon" style="padding: 6px 9px;"><i data-time-icon="icon-time" data-date-icon="icon-calendar" class="glyphicon glyphicon-calendar"></i></span>
					<input class="form-control" readonly type="text" name="configs[active_date]" id="active_date" value="{{ Config::get('settings.active_date') }}" />
                </div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="tab-news">
	</div>
	<div class="tab-pane" id="tab-cart">
		<div class="form-group">
			<label for="currency" class="col-sm-2 control-label">Tiền tệ</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="currency" name="configs[currency]" value="{{ Config::get('settings.currency') ? Config::get('settings.currency') : '₫' }}" placeholder="" />
			</div>
		</div>
		<div class="form-group">
			<label for="unit" class="col-sm-2 control-label">Thuộc tính chọn làm Đơn vị</label>
			<div class="col-sm-4">
				<select id="unit" name="configs[productunit]" class="form-control">
					@foreach($attributes as $attr)
						<option value="{{ $attr->id }}" {{ Config::get('settings.productunit') == $attr->id ? 'selected="selected"' : '' }}>{{ $attr->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="productperpage" class="col-sm-2 control-label">Số sản phẩm trên trang</label>
			<div class="col-sm-2">
				<select id="productperpage" name="configs[productperpage]" class="form-control">
					<option value="10" {{ Config::get('settings.productperpage')=='10' ? 'selected="selected"' : '' }}>10</option>
					<option value="15" {{ Config::get('settings.productperpage')=='15' ? 'selected="selected"' : '' }}>15</option>
					<option value="20" {{ Config::get('settings.productperpage')=='20' ? 'selected="selected"' : '' }}>20</option>
					<option value="25" {{ Config::get('settings.productperpage')=='25' ? 'selected="selected"' : '' }}>25</option>
					<option value="30" {{ Config::get('settings.productperpage')=='30' ? 'selected="selected"' : '' }}>30</option>
					<option value="35" {{ Config::get('settings.productperpage')=='35' ? 'selected="selected"' : '' }}>35</option>
					<option value="40" {{ Config::get('settings.productperpage')=='40' ? 'selected="selected"' : '' }}>40</option>
					<option value="50" {{ Config::get('settings.productperpage')=='50' ? 'selected="selected"' : '' }}>50</option>
				</select>
			</div>
		</div>
	</div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Cập nhật</button>
	    </div>
	  </div>
</div>
</form>
@stop