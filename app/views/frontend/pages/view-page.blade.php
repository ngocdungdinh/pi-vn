@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ $page->title }} ::
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')

@parent
@stop

{{-- Update the Meta Description --}}
@section('meta_description')

@parent
@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')

@parent
@stop

{{-- Page content --}}
@section('content')
		<!-- START PRIMARY SECTION -->
<div id="primary" class="inner group" />
<div class="layout-sidebar-right group">
	<!-- START CONTENT -->
	<div id="content" role="main" class="blog group">
		<div class="clear"></div>
		<div class="posts group">
			<div class="posts_space"></div>
			<div id="post-105" class="post-105 post type-post status-publish format-standard hentry category-glasses category-uncategorized category-vintage hentry-post group blog-big">
				<div class="post_header group">
					@if($media)
						<img width="640" height="295" src="{{ asset($media->mpath . '/640x295_crop/' . $media->mname) }}" class="attachment-blog_big wp-post-image" />
					@else
						<img width="640" height="295" src="{{ asset('assets/images/640x295_noimage.jpg') }}" class="attachment-blog_big wp-post-image" />
					@endif
					<div class="post_title">
						<h2>{{ $page->title }}</h2>
					</div>
				</div>
				<div class="post_content group">
					<div class="post_meta">
						<div class="post_date">
							<?php $post_date = explode('/', date("d/M/Y",strtotime($page->created_at))) ?>
							<span class="day">{{$post_date[0]}}</span>
							<span class="month">{{$post_date[1]}}</span>
							<span class="year">{{$post_date[2]}}</span>
						</div>
						<div class="post_twitter"><a href="#">Tweet this</a></div>
						<div class="post_author">by <a href="#" title="" rel="author">{{ $page->author->fullName() }}</a></div>
					</div>
					<p>{{ $page->excerpt }}</p>
					<p>{{ $page->content }}</p>
				</div>
				<div class="post_ group">
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- START SIDEBAR -->
	<div id="sidebar" class="blog group">
		<div id="popular-posts-3" class="widget-2 widget popular-posts">
			<h3>{{$page_group}}</h3>
			<div class="recent-post group">
				@foreach($pages as $key => $page)
				<div class="hentry-post group">
					<div class="thumb-img">
						<a href="{{ URL::to($page_slug.'/'.$page->slug) }}">
							@if($page->mpath)
								<img width="55" height="55" src="{{ asset($page->mpath . '/100x100_crop/' . $page->mname) }}" class="attachment-thumb_recentposts wp-post-image" />
							@else
								<img width="55" height="55" src="{{ asset('assets/images/100x100_noimage.jpg') }}" class="attachment-thumb_recentposts wp-post-image" />
							@endif
						</a>
					</div>
					<a href="{{ URL::to($page_slug.'/'.$page->slug) }}" title="Looking for a nice theme for your shop?" class="title">{{$page->title}}</a>
					<p class="post-date">July 26, 2011</p>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- END SIDEBAR -->
</div>
@stop