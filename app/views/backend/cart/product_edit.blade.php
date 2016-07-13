@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Sửa sản phẩm ::
@parent
@stop
{{-- Page content --}}
@section('content')
<link rel="stylesheet" href="{{ URL::asset('assets/js/selectize/css/selectize.bootstrap3.css') }}">
<script type="text/javascript" src="{{ url('assets/js/selectize/js/standalone/selectize.min.js') }}"></script>
	<h3>
    	<span class="glyphicon glyphicon-pencil"></span> Sửa sản phẩm
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
		<input type="hidden" id="content_id" value="{{ $product->id }}" />
		<div class="row">
			<div class="col-md-9" style="border-right: 1px solid #cccccc">
				<!-- Tabs Content -->
				<div class="tab-content">
					<!-- General tab -->
					<div class="tab-pane active" id="tab-general">
						<!-- Post Title -->
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label class="control-label" for="name">Tên sản phẩm</label>
							<input class="form-control" type="text" name="name" id="name" value="{{ Input::old('name', $product->name) }}" />
						</div>

						<!-- excerpt -->
						<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
							<label class="control-label" for="excerpt">Tóm tắt</label>
							<textarea class="form-control" name="excerpt" id="excerpt" value="excerpt" rows="3">{{ Input::old('excerpt', $product->excerpt) }}</textarea>
						</div>
						<hr />
						<!-- Content -->
						<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
							<div style="padding-bottom: 4px;">
								<label class="control-label" for="textareabox">Nội dung</label>
								<span class="pull-right"><a class="btn btn-info btn-xs media-modal" data-url="{{ URL::to('medias/upload?env=product') }}"><i class="glyphicon glyphicon-cloud-upload"></i> Thêm ảnh</a></span>
							</div>
							<textarea class="form-control" name="content" id="textareabox" value="content" rows="40">{{ Input::old('content', $product->content) }}</textarea>
						</div>
						<hr />
						<div class="panel panel-info">
							<div class="panel-heading"><span class="glyphicon glyphicon-qrcode"></span> Thông tin sản phẩm</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="sku">Mã sản phẩm</label>
											<input type="text" name="sku" class="form-control" id="sku" placeholder="ex: EU098" value="{{ Input::old('sku', ($product->sku ? $product->sku : 'P'.$product->category_id.$product->id)) }}">
										</div>
										<div class="form-group">
											<label for="quantity">Số lượng</label>
											<input type="number" name="quantity" class="form-control" id="quantity" placeholder="1" value="{{ Input::old('quantity', $product->quantity) }}" step="any" min="0">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="stock_status">Tình trạng</label>
											<select name="stock_status" id="stock_status" class="form-control">
												<option value="in_stock" {{ $product->stock_status=='in_stock' ? 'selected="selected"' : '' }}>Còn hàng</option>
												<option value="out_of_stock" {{ $product->stock_status=='out_of_stock' ? 'selected="selected"' : '' }}>Hết hàng</option>
												<option value="pre_order" {{ $product->stock_status=='pre_order' ? 'selected="selected"' : '' }}>Đặt hàng trước</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="price">Giá thực</label>
											<div class="input-group">
												<input type="text" name="price" class="form-control" id="price" placeholder="" value="{{ Input::old('price', $product->price) }}">
											  <span class="input-group-addon">{{ Config::get('settings.currency') }}</span>
											</div>
										</div>
										<div class="form-group">
											<label for="discount_price">Giá giảm</label>
											<div class="input-group">
												<input type="text" name="discount_price" class="form-control" id="discount_price" placeholder="" value="{{ Input::old('discount_price', $product->discount_price) }}">
											  <span class="input-group-addon">{{ Config::get('settings.currency') }}</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-info">
							<div class="panel-heading"><span class="glyphicon glyphicon-picture"></span> Ảnh sản phẩm</div>
							<div class="panel-body">
								<div id="image-list" style="overflow: hidden">
									@foreach($product->productmedias as $m)
								      <div id="productImg{{ $m->id }}" style="width: 110px; float: left; margin: 5px 5px; ">
								        <div class="thumbnail">
								          <div style="height:100px;">
								            <img src="{{ asset($m->mpath .'/100x100_crop/'. $m->mname ) }}" width="100" />
								          </div>
								          <a class="label label-default" href="javascript:void(0)" onclick="removeProductImage('{{ $m->id }}')" >Bỏ ảnh</a>
								        </div>
								      </div>
									@endforeach
								</div>
								<a data-toggle="modal" href="#modal_updateMedia" class="btn btn-info media-modal" data-url="{{ URL::to('medias/upload?env=product-images') }}"><span class="glyphicon glyphicon-plus"></span> Thêm ảnh</a>
							</div>
						</div>
						<hr />
						<!-- content Slug -->
						<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							<label class="control-label" for="slug">Đường dẫn</label>
							<div class="input-group">
							  <span class="input-group-addon">{{ str_finish(URL::to('/'), '/') }}</span>
							  <input class="form-control" type="text" name="slug" id="slug" value="{{ Input::old('slug', $product->slug) }}">
							</div>
						</div>
					</div>

					<!-- Meta Data tab -->
					<div class="tab-pane" id="tab-meta-data">
						<!-- Meta Title -->
						<div class="form-group {{ $errors->has('meta-title') ? 'has-error' : '' }}">
							<label class="control-label" for="meta-title">Meta Title</label>
							<input class="form-control" type="text" name="meta-title" id="meta-title" value="{{ Input::old('meta-title', $product->meta_title) }}" />
						</div>

						<!-- Meta Description -->
						<div class="form-group {{ $errors->has('meta-description') ? 'has-error' : '' }}">
							<label class="control-label" for="meta-description">Meta Description</label>
							<input class="form-control" type="text" name="meta-description" id="meta-description" value="{{ Input::old('meta-description', $product->meta_description) }}" />
						</div>

						<!-- Meta Keywords -->
						<div class="form-group {{ $errors->has('meta-keywords') ? 'has-error' : '' }}">
							<label class="control-label" for="meta-keywords">Meta Keywords</label>
							<input class="form-control" type="text" name="meta-keywords" id="meta-keywords" value="{{ Input::old('meta-keywords', $product->meta_keywords) }}" />
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
									<option value="draft" {{ $product->status=='draft' ? 'selected="selected"' : '' }}>Ẩn</option>
									<option value="published" {{ $product->status=='published' ? 'selected="selected"' : '' }}>Hiển thị</option>
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
									  <label class="scat category-id-{{ $category->id }} {{ $category->id == $product->category_id ? 'active' : '' }}" id="category-id-{{ $category->id }}">
									    <input name="categories[]" type="checkbox" value="{{ $category->id}}" {{ in_array($category->id, $catIds) ? 'checked="checked"' : ''}}> {{ $category->name}}
									    @if($category->id == $product->category_id)
									    	<span class="glyphicon glyphicon-flag"></span>
									    @endif
									    <a href="javascript:void(0)" onclick="setPrimaryProductCat('{{ $product->id }}', '{{ $category->id }}')" style="display: none"><span class="glyphicon glyphicon-flag"></span></a>
									  </label>
									</div>
									@foreach ($category->subscategories as $subcate)
										<div class="checkbox">
									  		<label class="scat category-id-{{ $subcate->id }} {{ $subcate->id == $product->category_id ? 'active' : '' }}" id="category-id-{{ $subcate->id }}">
										    <input name="categories[]" type="checkbox" value="{{ $subcate->id}}" {{ in_array($subcate->id, $catIds) ? 'checked="checked"' : ''}}> - {{ $subcate->name}} 
									    	{{ $subcate->id == $product->category_id ? '<span class="glyphicon glyphicon-flag"></span>' : '' }}
										    <a href="javascript:void(0)" onclick="setPrimaryProductCat('{{ $product->id }}', '{{ $subcate->id }}')" style="display: none"><span class="glyphicon glyphicon-flag"></span></a>
										  </label>
										</div>
									@endforeach
								@endif
							@endforeach
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Ảnh đại diện</div>
					<div class="panel-body">
					  <div class="form-group">
					    <p class="help-block" id="cover-image">
					    	@if($media)
					    		<img src="{{ asset($media->mpath . '/'.Config::get('image.featuredsize').'/' . $media->mname) }}" width="100%" />
					    		<a class="label label-default" href="javascript:void(0)" onclick="removeNewsCover()" >Bỏ ảnh</a>
					    	@else
					    		Chưa có ảnh đại diện
					    		<p align="center"><a class="btn btn-default btn-xs media-modal" data-url="{{ URL::to('medias/index?env=product') }}"><i class="glyphicon glyphicon-cloud-upload"></i> Chọn ảnh</a></p>
					    	@endif
					    </p>
					    <input type="hidden" name="media_id" value="{{ $product->media_id }}" id="media-cover-id" />
					  </div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Tags</div>
					<div class="panel-body">
						<div style="margin-bottom: 5px; padding-bottom: 5px; border-bottom: 1px solid #eeeeee">
							<input type="text" name="tagname" id="tagName" class="form-control" value="" />
						</div>
						<div id="tagList">
							@foreach($tags as $tag)
								<p><a href="javascript:void(0)" onclick="removeTaginPost('tag', '{{ $tag->id }}', this)" class="btn btn-default btn-xs">X</a> {{ $tag->name}}</p>
							@endforeach
							<input type="hidden" name="tags" id="tagIds" value="{{ implode(',', $tagIds) }}" />
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Tùy chọn thêm</div>
					<div class="panel-body">
						<div class="checkbox">
							<label><input type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked="checked"' : ''}}> Nổi bật</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="is_popular" value="1" {{ $product->is_popular ? 'checked="checked"' : ''}}> Phổ biến</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="showon_homepage" value="1" {{ $product->showon_homepage ? 'checked="checked"' : ''}}> Hiện ngoài trang chủ</label>
						</div>
					</div>
				</div>
				@if ( $product->status=='published' && Sentry::getUser()->hasAnyAccess(['cart','cart.editproduct']) || Sentry::getUser()->hasAnyAccess(['cart','cart.deleteproduct']) )
					<a onclick="confirmDelete(this); return false;" href="{{ route('deleteproduct/cart', $product->id) }}" class="btn btn-danger btn-xs">@lang('button.delete')</a>
				@endif
			</div>
		</div>

	</form>

<div class="modal fade" id="modal_taglist" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="modalTagList" ></div>
<script type="text/javascript">
	$(document).ready(function(){
	    $('.attrselector').selectize();
	});
</script>
@stop
