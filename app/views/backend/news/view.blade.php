@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Sửa tin ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-pencil"></span> Sửa bài viết
    </h3>
	<!-- Tabs -->
	<ul class="nav nav-tabs" style="margin: 15px 0">
		<li class="active"><a href="#tab-general" data-toggle="tab"><span class="glyphicon glyphicon-list-alt"></span> Thông tin chung</a></li>
		<li class="pull-right">
			<div align="center">
				@if(!is_null($post->deleted_at))
					<span class="label label-default">Bài viết bị xóa</span> - 
					@if (Permission::has_access('news', 'edit'))
						<a onclick="confirmDelete(this); return false;" href="{{ route('restore/news', $post->id) }}" class="btn btn-sm btn-default btooltip" data-toggle="tooltip" title="Nhận viết bài này"><span class="glyphicon glyphicon-import"></span> Khôi phục</a>
					@endif
				@elseif($post->status=='published')
					<span class="label label-success">Bài viết đã xuất bản</span> - 
					@if (Permission::has_access('news', 'publish') || Permission::has_access('news', 'full'))
						<button onclick="updatePost('submitted')" class="btn btn-default btn-sm btooltip" data-toggle="tooltip" title="Ngừng xuất bản bài này"><span class="glyphicon glyphicon-repeat"></span> Gỡ</button>
					@endif
				@elseif($post->status=='submitted')
					<span class="label label-info">Bài viết đang đợi xét duyệt</span> - 
					@if (Permission::has_access('news', 'publish') || Permission::has_access('news', 'full'))
						<button onclick="updatePost('published')" class="btn btn-default btn-sm btooltip" data-toggle="tooltip" title="Xuất bản bài này"><span class="glyphicon glyphicon-ok-sign"></span> Xuất bản</button>
					@endif
					@if (Permission::has_access('news', 'review') || Permission::has_access('news', 'publish') || Permission::has_access('news', 'full'))
						<button onclick="updatePost('returned')" class="btn btn-default btn-sm btooltip" data-toggle="tooltip" title="Trả lại bài này cho người viết"><span class="glyphicon glyphicon-repeat"></span> Trả lại</button>
					@endif
				@elseif($post->status=='returned')
					<span class="label label-default">Bài viết bị trả lại</span> - 
					@if (Permission::has_access('news', 'edit'))
						<a onclick="confirmDelete(this); return false;" href="{{ route('restore/news', $post->id) }}" class="btn btn-sm btn-default btooltip" data-toggle="tooltip" title="Nhận viết bài này"><span class="glyphicon glyphicon-import"></span> Khôi phục</a>
					@endif
				@elseif($post->status=='draft')
					<span class="label label-default">Bản nháp</span> - 
					@if (Permission::has_access('news', 'publish') || Permission::has_access('news', 'full'))
						<button onclick="updatePost('published')" class="btn btn-default btn-sm btooltip" data-toggle="tooltip" title="Xuất bản bài này"><span class="glyphicon glyphicon-ok-sign"></span> Xuất bản</button>
					@endif
					@if (Permission::has_access('news', 'edit', $u->id) || Permission::has_access('news', 'full'))
						<button onclick="updatePost('submitted')" class="btn btn-default btn-sm btooltip" data-toggle="tooltip" title="Đẩy lên đợi xét duyệt để xuất bản"><span class="glyphicon glyphicon-repeat"></span> Xét duyệt</button>
					@endif
				@endif

				@if(is_null($post->deleted_at))
					@if (($post->status=='published' && Permission::has_access('news', 'editpublish')) || ($post->status!='published' && Permission::has_access('news', 'edit', $u->id)) || Permission::has_access('news', 'full'))
						<button onclick="updatePost('{{ $post->status }}')" class="btn btn-default btn-sm btooltip"><span class="glyphicon glyphicon-floppy-disk"></span> Lưu</button>
					@endif

					@if ( $post->status!='published' && Permission::has_access('news', 'delete', $u->id))
						<a onclick="confirmDelete(this); return false;" href="{{ route('delete/news', $post->id) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span> @lang('button.delete')</a>
					@endif
				@endif
			</div>
		</li>
	</ul>

	<form method="post" action="" autocomplete="off" role="form" id="updatePost">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input type="hidden" name="status" id="status" value="{{ $post->status }}" />
		<input type="hidden" name="title" id="title" value="{{ Input::old('title', $post->title) }}" />
		<input type="hidden" name="excerpt" id="excerpt" value="{{ Input::old('excerpt', $post->excerpt) }}" />
		<textarea style="visibility: hidden;" name="content" id="content">{{ Input::old('content', $post->content) }}</textarea>
		<div class="row">
			<div class="col-md-9" style="border-right: 1px solid #cccccc">
				<!-- Tabs Content -->
				<div class="tab-content">
					<!-- General tab -->
					<div class="tab-pane active" id="tab-general">
						<!-- Post Title -->
						<h3>{{ Input::old('title', $post->title) }}</h3>

						<!-- excerpt -->
						<h5>
							{{ Input::old('excerpt', $post->excerpt) }}
						</h5>
						<!-- Content -->
						<div >
							{{ Input::old('content', $post->content) }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 colright">
				<!-- Form actions -->
				<div class="panel panel-default">
					<div class="panel-heading">Ngày xuất bản</div>
					<div class="panel-body">
		                {{ Input::old('publish_date', $post->publish_date) }}
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Chuyên mục</div>
					<div class="panel-body">
						<div id="category-list">
							@foreach($categories as $category)
								@if($category->parent_id == $post->category_id)
									<div> 
										{{ $category->name}} 
									</div>
									@foreach ($category->subscategories as $subcate)
										@if($subcate->id == $post->category_id)
											<div>
												-- {{ $subcate->name}} 
											</div>
										@endif
									@endforeach
								@endif
							@endforeach
							<i><span class="glyphicon glyphicon-flag"></span> - chuyên mục chính</i>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Ảnh đại diện</div>
					<div class="panel-body">
					  <div class="form-group">
					    <p class="help-block" id="cover-image">
					    	@if($media)
					    		<img src="{{ asset($media->mpath . '/200x130_crop/' . $media->mname) }}" width="175" />
					    	@else
					    		Chưa có ảnh đại diện
					    	@endif
					    </p>
					    <input type="hidden" name="media_id" value="{{ $post->media_id }}" id="media-cover-id" />
					  </div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Tags</div>
					<div class="panel-body">
						<div id="tagList">
							@foreach($tags as $tag)
								<p>{{ $tag->name}}</p>
							@endforeach
							<input type="hidden" name="tags" id="tagIds" value="{{ implode(',', $tagIds) }}" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
@stop
