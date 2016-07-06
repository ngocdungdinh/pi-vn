@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Sửa trang giới thiệu ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-book"></span> Sửa trang giới thiệu
    </h3>
	<!-- Tabs -->
	<ul class="nav nav-tabs" style="margin: 15px 0">
		<li class="active"><a href="#tab-general" data-toggle="tab">Thông tin chung</a></li>
	</ul>

	<form method="post" action="" autocomplete="off" role="form">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<div class="row">
			<div class="col-md-9" style="border-right: 1px solid #cccccc">
				<!-- Tabs Content -->
				<div class="tab-content">
					<!-- General tab -->
					<div class="tab-pane active" id="tab-general">
						<!-- Post Title -->
						<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							<label class="control-label" for="title">Tiêu đề</label>
							<input class="form-control" type="text" name="title" id="title" value="{{ Input::old('title', $post->title) }}" />
						</div>

						<!-- excerpt -->
						<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
							<label class="control-label" for="excerpt">Tóm tắt</label>
							<textarea class="form-control" name="excerpt" id="excerpt" value="excerpt" rows="3">{{ Input::old('excerpt', $post->excerpt) }}</textarea>
						</div>
						<hr />
						<!-- Content -->
						<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
							<div>
								<label class="control-label" for="textareabox">Nội dung</label>
								<span class="pull-right"><a class="btn btn-info btn-xs media-modal" data-url="{{ URL::to('medias/upload?env=page') }}"><i class="glyphicon glyphicon-cloud-upload"></i> Thêm ảnh</a></span>
							</div>
							<textarea class="form-control" name="content" id="textareabox" value="content" rows="40">{{ Input::old('content', $post->content) }}</textarea>
						</div>
						<hr />
						<!-- Post Slug -->
						<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							<label class="control-label" for="slug">Đường dẫn</label>
							<div class="input-group">
							  <span class="input-group-addon">{{ str_finish(URL::to('/'), '/') }}gioi-thieu/</span>
							  <input class="form-control" type="text" name="slug" id="slug" value="{{ Input::old('slug', $post->slug) }}">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<!-- Form actions -->
				<div>
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="pull-left">
								<select name="status" class="form-control">
									<option value="hidden" {{ $post->status=='hidden' ? 'selected="selected"' : '' }}>Ẩn</option>									
									<option value="published" {{ $post->status=='published' ? 'selected="selected"' : '' }}>Hiển thị</option>
								</select>
							</div>
							<div class="controls pull-right">
								<button type="submit" class="btn btn-success btn-sm">Lưu</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Ảnh đại diện</div>
					<div class="panel-body">
					  <div class="form-group">
					    <p class="help-block" id="cover-image">
					    	@if($media)
					    		<img src="{{ asset($media->mpath . '/180x100_crop/' . $media->mname) }}" width="175" />
					    		<a class="label label-default" href="javascript:void(0)" onclick="removeNewsCover()" >Bỏ ảnh</a>
					    	@else
					    		Chưa có ảnh đại diện
					    	@endif
					    </p>
					    <input type="hidden" name="media_id" value="{{ $post->media_id }}" id="media-cover-id" />
					  </div>
					</div>
				</div>
				@if(Config::get('app.module.widget'))
				<div class="panel panel-default">
					<div class="panel-heading">Widgets
					<a data-toggle="modal" data-target="#modal_widgets" class="btn btn-default btn-xs show-modal pull-right" href="{{ URL::to('admin/widgets/ajaxlist?item_id='.$post->id.'&type=post') }}"><i class="fa fa-puzzle-piece"></i> Thêm </a>
					</div>
					<div class="panel-body">
						<div id="widgetList" style="padding-bottom: 6px">
							@if($widgets->count())
							<ol class="itemsort">
								@foreach($widgets as $widget)
									<li class="link-item big" data-wrid="{{$widget->wrid}}" data-position="{{$widget->position}}">
										<p class="btn btn-default btn-block" align="left">
										<span class="handle-item" style="cursor: move">{{ $widget->name }} </span>
										<a href="{{ URL::to('admin/widgets/updatewidgetref?name='.$widget->form.'&id='.$widget->wrid) }}" data-toggle="modal" data-target="#modal_widgets" class="btn btn-xs show-modal pull-right"><i class="glyphicon glyphicon-edit"></i></a>
										<a href="javascript:void(0)" onclick="removeWidget('{{ $widget->wrid }}', this)" class="btn btn-xs pull-right"><i class="glyphicon glyphicon-remove"></i></a></p>
									</li>
								@endforeach
							</ol>
							@else
							<p>- no widget -</p>
							@endif
						</div>
					</div>
				</div>
				@endif
				@if ( Sentry::getUser()->hasAnyAccess(['pages','pages.delete']) )
					<a onclick="confirmDelete(this); return false;" href="{{ route('delete/intro', $post->id) }}" class="btn btn-danger btn-xs">@lang('button.delete')</a>
				@endif
			</div>
		</div>
	</form>
    <script src="{{ asset('assets/js/jquery-sortable.min.js') }}"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
			var adjustment;
			var p = 1;
		  	$("ol.itemsort").sortable({
			  group: 'itemsort',
			  handle: '.handle-item',
			  pullPlaceholder: true,
			  onDrop: function  ($item, container, _super) {
				$item.removeClass("dragged").removeAttr("style")
				$("body").removeClass("dragging")

				p = 1;
				$("ol.itemsort").children("li").each(function(){
					$(this).attr('data-position', p++);
				});

				updateWidgetsPosition();
			  }
			});
		});
    </script>
@stop
