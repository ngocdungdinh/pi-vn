@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Quản lý tin ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-pencil"></span> Bài viết
    	@if ( Sentry::getUser()->hasAnyAccess(['news','news.create']) )
    		<a href="{{ route('create/news') }}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus-sign"></span> Tạo bài viết</a>
    	@endif
    </h3>
    <div>    	
	    <ul class="nav nav-tabs">
		  <li {{ $status=='' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/news') }}"><span class="glyphicon glyphicon-th-list"></span> Tất cả</a></li>
		  <li {{ $status=='published' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/news?status=published') }}"><span class="glyphicon glyphicon-ok-sign"></span> Đã xuất bản</a></li>
		  <li {{ $status=='submitted' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/news?status=submitted') }}"><span class="glyphicon glyphicon-time"></span> Đợi xét duyệt</a></li>
		  <li {{ $status=='returned' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/news?status=returned') }}"><span class="glyphicon glyphicon-repeat"></span> Bị trả lại</a></li>
		  <li {{ $status=='draft' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/news?status=draft') }}"><span class="glyphicon glyphicon-floppy-disk"></span> Bản nháp</a></li>
		  <li {{ $status=='deleted' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/news?status=deleted') }}"><span class="glyphicon glyphicon-trash"></span> Bị xóa</a></li>
		</ul>
    </div><br />
  	<form method="get" action="{{ route('search/news') }}" autocomplete="off" role="form" class="form-horizontal">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
			<div class="col-lg-3">
				<input class="form-control pull-left" type="text" name="key" id="key" value="{{ Input::old('key', (isset($keyword) ? $keyword : '')) }}" placeholder="Tiêu đề" />
			</div>
			<div class="col-lg-2">
				<select class="form-control" name="type">
					<option value="0">- Loại tin -</option>
					<option value="lastest" {{ isset($type) && $type == 'lastest' ? 'selected="selected"' : '' }}> Mới nhất</option>
					<option value="oldest" {{ isset($type) && $type == 'oldest' ? 'selected="selected"' : '' }}> Cũ nhất</option>
					<option value="homepage" {{ isset($type) && $type == 'homepage' ? 'selected="selected"' : '' }}> Trang chủ</option>
					<option value="featured" {{ isset($type) && $type == 'featured' ? 'selected="selected"' : '' }}> Nổi bật</option>
					<option value="popular" {{ isset($type) && $type == 'popular' ? 'selected="selected"' : '' }}> Phổ biến</option>
				</select>
			</div>
			<div class="col-lg-3">
				<select class="form-control" name="user_id">
					<option value="0">- Người viết -</option>
					<option value="{{ $u->id }}"> - Tôi -</option>
					@foreach($writers as $writer)
						<option value="{{ $writer->id }}" {{ (isset($user_id) && $writer->id == $user_id) ? 'selected="selected"' : '' }}> {{ $writer->first_name }} {{ $writer->last_name }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-lg-3">
				<select class="form-control" name="category_id">
					<option value="0">- Chuyên mục -</option>
					@foreach($categories as $category)
						@if($category->parent_id == 0)
							<option value="{{ $category->id }}" {{ (isset($category_id) && $category->id == $category_id) ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
							@foreach ($category->subscategories as $subcate)
								<option value="{{ $subcate->id }}" {{ (isset($category_id) && $subcate->id == $category_id) ? 'selected="selected"' : '' }}> - {{ $subcate->name }}</option>
							@endforeach
						@endif
					@endforeach
				</select>
			</div>
			<div class="col-lg-1">
				<input type="submit" class="btn btn-default btn-info" name="search" value="Tìm" />
			</div>
		</div>
  	</form>
	<table class="table table-hover">
		<thead>
			<tr>
				<th width="60"></th>
				<th class="span6">@lang('admin/news/table.title')</th>
				<th class="span2">Người đăng</th>
				<th class="span2">Chuyên mục</th>
				<th width="80">Phản hồi</th>
				<th width="150">Ngày</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $post)
			<tr>
				<td>
					@if(isset($post->mname))
						<img src="{{ asset($post->mpath . '/100x100_crop/'. $post->mname) }}" width="50">
					@else
						<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKsAAAC0CAYAAADraNxXAAAFeUlEQVR4Xu3YvUscURiF8buFgtoq2oqtNoIo/vtWKoidWIudrJ0gfiTcCXczTHZmN+menMcqupnsed/z82Z2ZvP5/Efxyw0ANjATK6AlI3YbEKsQMBsQK6Yqg4pVA5gNiBVTlUHFqgHMBsSKqcqgYtUAZgNixVRlULFqALMBsWKqMqhYNYDZgFgxVRlUrBrAbECsmKoMKlYNYDYgVkxVBhWrBjAbECumKoOKVQOYDYgVU5VBxaoBzAbEiqnKoGLVAGYDYsVUZVCxagCzAbFiqjKoWDWA2YBYMVUZVKwawGxArJiqDCpWDWA2IFZMVQYVqwYwGxArpiqDilUDmA2IFVOVQcWqAcwGxIqpyqBi1QBmA2LFVGVQsWoAswGxYqoyqFg1gNmAWDFVGVSsGsBsQKyYqgwqVg1gNiBWTFUGFasGMBsQK6Yqg4pVA5gNiBVTlUHFqgHMBsSKqcqgYtUAZgNixVRlULFqALMBsWKqMqhYNYDZgFgxVRlUrBrAbECsmKoMKlYNYDYgVkxVBhWrBjAbECumKoOKVQOYDYgVU5VBxaoBzAbEiqnKoGLVAGYDYsVUZVCxagCzAbFiqjKoWDWA2YBYMVUZVKwawGxArJiqDCpWDWA2IFZMVQYVqwYwGxArpiqDilUDmA1EY/3+/i7X19fl7e2tXF5elq2trfLw8FCen5//KHB/f7+cnJx0P1923TqNj1339PRUHh8fF//E8fFxOTg46L6fz+fl/v6+e8/61X9tnff8n/5OLNbPz89ydXVVvr6+ymw2W2Dtl7sM1zrXLQMydl37+fb2djk/Py93d3fl9fW1y7OxsdFl7L9Wf7Hq36uvpX1FYu3DqYWPYW2n7OHhYTk6OipT17UTcGdnp8PUrq0n4e7u7uIXY/h+7bq9vb3u5O5f9/Hx0Z247f3bCZx6usZivb29Laenp91J1r8NaKdVg1lPsHaS1Z9NXddOxYuLi3Jzc7M4EaeumzpZX15elmJteD1ZgzYwde85PFVX3R7U11fdIoy939h1wwztZBVrENI26hieVR+gpl6vp2v9r73/gWzq/f7lNkCsYu2eBvRPyPbBZriaMawNXr11eH9//+OT+9TTh+F9af1+c3PTe9be8iPvWVedrMPTbh2sDWJ9unB2dtbdC9c/9z+5L8M6dbK2D2Y+DfjVgFgHz1nrUlbdG/7NCbnO89nhc9b+f/M+Z/19VERjDbzzQY8sVnR9WeHFmtU3elqxouvLCi/WrL7R04oVXV9WeLFm9Y2eVqzo+rLCizWrb/S0YkXXlxVerFl9o6cVK7q+rPBizeobPa1Y0fVlhRdrVt/oacWKri8rvFiz+kZPK1Z0fVnhxZrVN3pasaLrywov1qy+0dOKFV1fVnixZvWNnlas6Pqywos1q2/0tGJF15cVXqxZfaOnFSu6vqzwYs3qGz2tWNH1ZYUXa1bf6GnFiq4vK7xYs/pGTytWdH1Z4cWa1Td6WrGi68sKL9asvtHTihVdX1Z4sWb1jZ5WrOj6ssKLNatv9LRiRdeXFV6sWX2jpxUrur6s8GLN6hs9rVjR9WWFF2tW3+hpxYquLyu8WLP6Rk8rVnR9WeHFmtU3elqxouvLCi/WrL7R04oVXV9WeLFm9Y2eVqzo+rLCizWrb/S0YkXXlxVerFl9o6cVK7q+rPBizeobPa1Y0fVlhRdrVt/oacWKri8rvFiz+kZPK1Z0fVnhxZrVN3pasaLrywov1qy+0dOKFV1fVnixZvWNnlas6Pqywos1q2/0tGJF15cVXqxZfaOnFSu6vqzwYs3qGz2tWNH1ZYUXa1bf6GnFiq4vK7xYs/pGTytWdH1Z4cWa1Td6WrGi68sKL9asvtHTihVdX1b4n4Ds4UXrUfTOAAAAAElFTkSuQmCC" alt="Chưa có ảnh đại điện" width="50">
					@endif
				</td>
				<td>
					@if(!Permission::has_access('news', 'edit') || ($post->status == 'published' && !Permission::has_access('news', 'publish')) || (!Permission::has_access('news', 'edit', $post->user_id)) || $post->deleted_at)
						<a style="color: #444444" href="{{ route('update/news', $post->id) }}"><strong>{{ $post->title }}</strong></a>
					@else
						<a href="{{ route('update/news', $post->id) }}"><strong>{{ $post->title }}</strong></a>
					@endif
				</td>
				<td>{{ $post->author->first_name }} {{ $post->author->last_name }}</td>
				<td>
					@if($post->category)
						<a href="{{ URL::to('admin/news/search?category_id='.$post->category->id) }}"> {{ $post->category->name }}</a>
					@endif
				<td>{{ $post->comment_count }} <span class="glyphicon glyphicon-comment" style="color:#76797c"></span></td>
				<td>
					@if($post->status == 'published')
						<span title="{{ $post->publish_date }}">{{ date("H:i - d/m/Y",strtotime($post->publish_date)) }}</span>
					@else
						<span title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</span>
					@endif
					<br />
					@if($post->deleted_at)
						<a onclick="confirmDelete(this); return false;" href="{{ route('restore/news', $post->id) }}" class="btn btn-xs btn-default btooltip" data-toggle="tooltip" title="Nhận viết bài này">Khôi phục</a>
					@elseif($post->status == 'published')
						<label class="label label-success">Đã xuất bản</label>
						<a href="{{ $post->url() }}" target="_blank"># {{ $post->id }}</a>
					@elseif($post->status == 'submitted')
						<label class="label label-info">Đang đợi duyệt</label>
					@elseif($post->status == 'returned')
						<label class="label label-warning">Bị trả lại</label>
					@elseif($post->status == 'deleted')
						<label class="label label-danger">Bị xóa</label>
					@else
						<label class="label label-default">Bản nháp</label>
					@endif					
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $posts->appends($appends)->links() }}
@stop
