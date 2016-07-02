@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Sửa thuộc tính ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-th-large"></span> Sửa thuộc tính</h3>
  	<form method="post" action="" autocomplete="off" class="form-horizontal" role="form">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label class="col-lg-2 control-label" for="name">Tiêu đề</label>
			<div class="col-lg-5">
				<input class="form-control" type="text" name="name" id="name" value="{{ $attribute->name }}" />
			</div>
		</div>
		<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
			<label class="col-lg-2 control-label" for="description">Mô tả</label>
			<div class="col-lg-5">
				<textarea class="form-control" name="description" id="description">{{ $attribute->description }}</textarea>
			</div>
		</div>
		
		<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
			<label class="col-lg-2 control-label" for="description">Ảnh đại diện</label>
			<div class="col-lg-3">
				<div id="cover-image">
			    	@if($media)
			    		<img src="{{ asset($media->mpath . '/'.Config::get('image.featuredsize').'/' . $media->mname) }}" width="100%" />
			    		<a class="label label-default" href="javascript:void(0)" onclick="removeNewsCover()" >Bỏ ảnh</a>
			    	@else
			    		Chưa có ảnh đại diện
			    		<p align="center"><a class="btn btn-default btn-xs media-modal" data-url="{{ URL::to('medias/index?env=attributes') }}"><i class="glyphicon glyphicon-cloud-upload"></i> Chọn ảnh</a></p>
			    	@endif
		    	</div>
				<input type="hidden" name="media_id" value="{{ $attribute->media_id }}" id="media-cover-id" />
			</div>
		</div>

		<hr />
		<label for="inputEmail1" class="col-lg-2 control-label"></label>
		<div class="col-lg-2">
			<button type="submit" class="btn btn-success btn-sm">Lưu</button>
				<a onclick="confirmDelete(this); return false;" href="{{ route('deleteattribute/cart', $attribute->id) }}" class="btn btn-danger btn-xs">@lang('button.delete')</a>
		</div>
	</form>
@stop
