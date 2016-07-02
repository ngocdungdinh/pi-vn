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
		<li><a href="#tab-royalties" data-toggle="tab"><span class="glyphicon glyphicon-usd"></span> Nhuận bút</a></li>
		<li><a href="#tab-meta-data" data-toggle="tab"><span class="glyphicon glyphicon-info-sign"></span> Thẻ Meta</a></li>
		<li class="pull-right">
			<div align="center">
				@if($post->status=='published')
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

				@if (($post->status=='published' && Permission::has_access('news', 'editpublish')) || ($post->status!='published' && Permission::has_access('news', 'edit', $u->id)) || Permission::has_access('news', 'full'))
					<button onclick="updatePost('{{ $post->status }}')" class="btn btn-default btn-sm btooltip"><span class="glyphicon glyphicon-floppy-disk"></span> Lưu</button>
				@endif

				@if ( $post->status!='published' && Permission::has_access('news', 'delete', $u->id))
					<a onclick="confirmDelete(this); return false;" href="{{ route('delete/news', $post->id) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span> @lang('button.delete')</a>
				@endif
			</div>
		</li>
	</ul>

	<form method="post" action="" autocomplete="off" role="form" id="updatePost">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input type="hidden" name="status" id="status" value="{{ $post->status }}" />
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
							<div style="padding-bottom: 4px;">
								<label class="control-label" for="textareabox">Nội dung</label>
								<span class="pull-right"><a class="btn btn-info btn-xs media-modal" data-url="{{ URL::to('medias/upload?env=news') }}"><i class="glyphicon glyphicon-cloud-upload"></i> Thêm ảnh</a></span>
							</div>
							<textarea class="form-control" name="content" id="textareabox" value="content" rows="40">{{ Input::old('content', $post->content) }}</textarea>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">Luồng sự kiện</div>
							<div class="panel-body">
								<div id="topicList">
									@foreach($topics as $topic)
										<p><a href="javascript:void(0)" onclick="removeTaginPost('topic', '{{ $topic->id }}', this)" class="btn btn-default btn-xs">X</a> {{ $topic->name}}</p>
									@endforeach
								</div>
								<hr />
								<a data-toggle="modal" href="{{ URL::to('admin/tags/listpopup') }}" data-target="#modal_taglist" class="show-modal btn btn-info btn-xs"><span class="glyphicon glyphicon-plus"></span> Thêm</a>

								<input type="hidden" name="topics" id="topicIds" value="{{ implode(',', $topicIds) }}" />
							</div>
						</div>
						<hr />
						<!-- Post Slug -->
						<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							<label class="control-label" for="slug">Đường dẫn</label>
							<div class="input-group">
							  <span class="input-group-addon">{{ str_finish(URL::to('/'), '/') }}</span>
							  <input class="form-control" type="text" name="slug" id="slug" value="{{ Input::old('slug', $post->slug) }}">
							</div>
						</div>
					</div>

					<!-- Meta Data tab -->
					<div class="tab-pane" id="tab-meta-data">
						<!-- Meta Title -->
						<div class="form-group {{ $errors->has('meta-title') ? 'has-error' : '' }}">
							<label class="control-label" for="meta-title">Meta Title</label>
							<input class="form-control" type="text" name="meta-title" id="meta-title" value="{{ Input::old('meta-title', $post->meta_title) }}" />
						</div>

						<!-- Meta Description -->
						<div class="form-group {{ $errors->has('meta-description') ? 'has-error' : '' }}">
							<label class="control-label" for="meta-description">Meta Description</label>
							<input class="form-control" type="text" name="meta-description" id="meta-description" value="{{ Input::old('meta-description', $post->meta_description) }}" />
						</div>

						<!-- Meta Keywords -->
						<div class="form-group {{ $errors->has('meta-keywords') ? 'has-error' : '' }}">
							<label class="control-label" for="meta-keywords">Meta Keywords</label>
							<input class="form-control" type="text" name="meta-keywords" id="meta-keywords" value="{{ Input::old('meta-keywords', $post->meta_keywords) }}" />
						</div>
					</div>
					<!-- Meta Data tab -->
					<div class="tab-pane" id="tab-royalties">
						@if ( Permission::has_access('royalty', 'full') || Permission::has_access('royalty', 'view') || Permission::has_access('royalty', 'full', $post->user_id))
						<div id="royaltiesResult">
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="120">Người nhận</th>
										<th width="60">Nhuận bút</th>
										<th width="60">Thuế</th>
										<th width="70">Được nhận</th>
										<th width="150">Ghi chú</th>
										<th width="60">Đã nhận?</th>
										<th width="60"></th>
									</tr>
								</thead>
								<tbody>
									@if(isset($royalties))
									@foreach ($royalties as $royalty)
										<tr>
											<td>
												{{ $royalty->author->fullName() }}
											</td>
											<td>
												{{ $royalty->royalty }}
											</td>
											<td>
												{{ $royalty->tax }}
											</td>
											<td>
												{{ $royalty->total }}
											</td>
											<td>
												{{ $royalty->description }}
											</td>
											<td>
												{{ $royalty->received ? '<span class="label label-success">Đúng</span>' : '<span class="label label-success">Sai</span>' }}
											</td>
											<td>
												@if ( Permission::has_access('royalty', 'full') || Permission::has_access('royalty', 'set'))
													<a data-toggle="modal" href="{{ URL::to('admin/royalties/form?royal_id='.$royalty->id) }}" data-target="#modal_royaltyform" class="show-modal label label-default">Sửa</a>
													<a onclick="DeleteRoyalties('{{ $royalty->id }}');" href="javascript:void(0)" class="label label-danger">Xóa</a>
												@endif
											</td>
										</tr>
									@endforeach
										<tr class="success">
											<td colspan="2"></td>
											<td>Tổng</td>
											<td>{{ $royalyTotal }}</td>
											<td colspan="3"></td>
										</tr>									
									@endif
								</tbody>
							</table>
						</div>
						@else
							<div>Bạn không thể xem nội dung này.</div>
						@endif
						<hr />
						@if ( Permission::has_access('royalty', 'full') || Permission::has_access('royalty', 'set'))
							<a data-toggle="modal" href="{{ URL::to('admin/royalties/form?writer_id='.$post->user_id.'&item_id='.$post->id) }}" data-target="#modal_royaltyform" class="show-modal btn btn-info btn-xs"><span class="glyphicon glyphicon-plus"></span> Thêm nhuận bút</a>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-3 colright">
				<!-- Form actions -->
				<div class="panel panel-default">
					<div class="panel-heading">Ngày xuất bản</div>
					<div class="panel-body">
		                <div class="form-group {{ $errors->has('publish_date') ? 'has-error' : '' }}">
			                <div id="datetimepicker" class="date input-group">
								<span class="input-group-addon" style="padding: 6px 9px;"><i data-time-icon="icon-time" data-date-icon="icon-calendar" class="glyphicon glyphicon-calendar"></i></span>
								<input class="form-control" readonly type="text" name="publish_date" id="publish_date" value="{{ Input::old('publish_date', $post->publish_date) }}" />
			                </div>
			                <hr />
			                <div>Viết bởi: {{ $post->author->fullName() }}</div>
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
									  <label class="scat category-id-{{ $category->id }} {{ $category->id == $post->category_id ? 'active' : '' }}" id="category-id-{{ $category->id }}">
									    <input name="categories[]" type="checkbox" value="{{ $category->id}}" {{ in_array($category->id, $catIds) ? 'checked="checked"' : ''}}> {{ $category->name}} 
									    @if($category->id == $post->category_id)
									    	<span class="glyphicon glyphicon-flag"></span>
									    @endif
									    <a href="javascript:void(0)" onclick="setPrimaryCat('{{ $post->id }}', '{{ $category->id }}')" style="display: none"><span class="glyphicon glyphicon-flag"></span></a>
									  </label>
									</div>
									@foreach ($category->subscategories as $subcate)
										<div class="checkbox">
										  <label class="scat {{ $subcate->id == $post->category_id ? 'active' : '' }}" id="category-id-{{ $subcate->id }}">
										    <input name="categories[]" type="checkbox" value="{{ $subcate->id}}" {{ in_array($subcate->id, $catIds) ? 'checked="checked"' : ''}}> -- {{ $subcate->name}} 
										    @if($subcate->id == $post->category_id)
										    	<span class="glyphicon glyphicon-flag"></span>
										    @else
										    	<a href="javascript:void(0)" onclick="setPrimaryCat('{{ $post->id }}', '{{ $subcate->id }}')" style="display: none"><span class="glyphicon glyphicon-flag"></span></a>
										    @endif
										  </label>
										</div>
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
					    		<img src="{{ asset($media->mpath . '/'.Config::get('image.featuredsize').'/' . $media->mname) }}" width="100%" />
					    		<a class="label label-default" href="javascript:void(0)" onclick="removeNewsCover()" >Bỏ ảnh</a>
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
							<label><input type="checkbox" name="is_featured" value="1" {{ $post->is_featured ? 'checked="checked"' : ''}}> Nổi bật</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="is_popular" value="1" {{ $post->is_popular ? 'checked="checked"' : ''}}> Tin nhanh</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="showon_homepage" value="1" {{ $post->showon_homepage ? 'checked="checked"' : ''}}> Hiện ngoài trang chủ</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="allow_comments" value="1" {{ $post->allow_comments ? 'checked="checked"' : ''}}> Cho phép bình luận</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

<div class="modal fade" id="modal_taglist" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="modalTagList" ></div>
@stop
