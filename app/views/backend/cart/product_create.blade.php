@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Đăng sản phẩm mới ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-th-large"></span> Đăng sản phẩm mới
    </h3>

	<form method="post" action="" autocomplete="off" role="form">
		<!-- Tabs -->
		<ul class="nav nav-tabs" style="margin: 15px 0">
			<li class="active"><a href="#tab-general" data-toggle="tab">Thông tin chung</a></li>
			<li><a href="#tab-meta-data" data-toggle="tab">Thẻ Meta</a></li>
			<li class="pull-right"><button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span> Lưu</button></li>
		</ul>
	
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<div class="row">
			<div class="col-md-9">
				<!-- Tabs Content -->
				<div class="tab-content">
					<!-- General tab -->
					<div class="tab-pane active" id="tab-general">
						<!-- Post Title -->
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label class="control-label" for="name">Tên sản phẩm</label>
							<input class="form-control" type="text" name="name" id="name" value="{{ Input::old('title') }}" />
						</div>

						<!-- excerpt -->
						<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
							<label class="control-label" for="excerpt">Tóm tắt</label>
							<textarea class="form-control" name="excerpt" id="excerpt" value="excerpt" rows="3">{{ Input::old('excerpt') }}</textarea>
						</div>
						<hr />
						<!-- Content -->
						<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
							<div style="padding-bottom: 4px;">
								<label class="control-label" for="textareabox">Nội dung</label>
								<span class="pull-right"><a class="btn btn-info btn-xs media-modal" data-url="{{ URL::to('medias/upload?env=product') }}"><i class="glyphicon glyphicon-cloud-upload"></i> Thêm ảnh</a></span>
							</div>
							<textarea class="form-control" name="content" id="textareabox" value="content" rows="40">{{ Input::old('content') }}</textarea>
						</div>
						<hr />
						<!-- Post Slug -->
						<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							<label class="control-label" for="slug">Đường dẫn</label>
							<div class="input-group">
							  <span class="input-group-addon">{{ str_finish(URL::to('/'), '/') }}</span>
							  <input class="form-control" type="text" name="slug" id="slug" value="{{ Input::old('slug') }}">
							</div>
						</div>
					</div>

					<!-- Meta Data tab -->
					<div class="tab-pane" id="tab-meta-data">
						<!-- Meta Title -->
						<div class="form-group {{ $errors->has('meta-title') ? 'has-error' : '' }}">
							<label class="control-label" for="meta-title">Meta Title</label>
							<input class="form-control" type="text" name="meta-title" id="meta-title" value="{{ Input::old('meta-title') }}" />
						</div>

						<!-- Meta Description -->
						<div class="form-group {{ $errors->has('meta-description') ? 'has-error' : '' }}">
							<label class="control-label" for="meta-description">Meta Description</label>
							<input class="form-control" type="text" name="meta-description" id="meta-description" value="{{ Input::old('meta-description') }}" />
						</div>

						<!-- Meta Keywords -->
						<div class="form-group {{ $errors->has('meta-keywords') ? 'has-error' : '' }}">
							<label class="control-label" for="meta-keywords">Meta Keywords</label>
							<input class="form-control" type="text" name="meta-keywords" id="meta-keywords" value="{{ Input::old('meta-keywords') }}" />
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 colright">
				<!-- Form actions -->
				<div>
					<div class="panel panel-default">
						<div class="panel-heading">Trạng thái</div>
						<div class="panel-body">
							<div class="pull-left">
								<select name="status" class="form-control">
									<option value="draft">Bản nháp</option>
									<option value="published">Hiển thị</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Chuyên mục</div>
					<div class="panel-body">
						<div id="category-list">
							@foreach($categories as $category)
								@if($category->parent_id == 0)
									<div class="checkbox">
										<label class="scat category-id-{{ $category->id }}" id="category-id-{{ $category->id }}">
											<input name="categories[]" type="checkbox" value="{{ $category->id}}"> {{ $category->name}}
										</label>
									</div>
									@foreach ($category->subscategories as $subcate)
										<div class="checkbox">
											<label class="scat category-id-{{ $subcate->id }}" id="category-id-{{ $subcate->id }}">
												<input name="categories[]" type="checkbox" value="{{ $subcate->id}}"> - {{ $subcate->name}}
											</label>
										</div>
									@endforeach
								@endif
							@endforeach
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Thông tin sản phẩm</div>
					<div class="panel-body">
						<div class="form-group">
							<label for="price">Giá thực</label>
							<div class="input-group">
								<input type="text" name="price" class="form-control" id="price" placeholder="" value="">
							  <span class="input-group-addon">$</span>
							</div>
						</div>
						<div class="form-group">
							<label for="discount_price">Giá giảm</label>
							<div class="input-group">
								<input type="text" name="discount_price" class="form-control" id="discount_price" placeholder="" value="">
							  <span class="input-group-addon">$</span>
							</div>
						</div>
						<div class="form-group">
							<label for="quantity">Số lượng</label>
							<input type="text" name="quantity" class="form-control" id="quantity" placeholder="ex: 1" value="1">
						</div>
						<div class="form-group">
							<label for="stock_status">Tình trạng</label>
							<select name="stock_status" id="stock_status" class="form-control">
								<option value="in_stock">Còn hàng</option>
								<option value="out_of_stock">Hết hàng</option>
								<option value="pre_order">Đặt hàng trước</option>
							</select>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Ảnh đại diện</div>
					<div class="panel-body">
					  <div class="form-group">
					    <p class="help-block" id="cover-image">Chưa có ảnh đại diện</p>
					    <input type="hidden" name="media_id" value="" id="media-cover-id" />
					  </div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Tùy chọn thêm</div>
					<div class="panel-body">
<!-- 						<div class="checkbox">
							<label><input type="checkbox" name="is_featured" value="1" checked="checked"> Nổi bật</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="is_popular" value="1"> Phổ biến</label>
						</div> -->
						<div class="checkbox">
							<label><input type="checkbox" name="showon_homepage" value="1" checked="checked"> Hiện ngoài trang chủ</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="allow_comments" value="1" checked="checked"> Cho phép bình luận</label>
						</div>
					</div>
				</div>
			</div>
		</div>

	</form>

<div class="modal fade" id="modal_taglist" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="modalTagList" ></div>
@stop
