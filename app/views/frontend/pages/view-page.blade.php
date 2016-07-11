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
					<img width="640" height="295" src="{{ asset($media->mpath . '/640x295_crop/' . $media->mname) }}" class="attachment-blog_big wp-post-image" alt="blog3" title="blog3" />
					<div class="post_title">
						<h2>{{ $page->title }}</h2>
					</div>
				</div>
				<div class="post_content group">
					<div class="post_meta">
						<div class="post_date">
							<span class="day">04</span>
							<span class="month">Sep</span>
							<span class="year">2011</span>
						</div>
						<div class="post_twitter"><a href="#">Tweet this</a></div>
						<div class="post_author">by <a href="#" title="" rel="author">nando</a></div>
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
		<div id="search-3" class="widget-1 widget-first widget widget_search">
			<h3>Search</h3>
			<form role="search" method="get" id="searchform" action="home.html" class="group">
				<div><label class="screen-reader-text" for="s">Search</label>
					<input type="text" value="" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="Search" />
					<input type="hidden" name="post_type" value="post" />
				</div>
			</form>
		</div>
		<div id="popular-posts-3" class="widget-2 widget popular-posts">
			<h3>Popular Posts</h3>
			<div class="recent-post group">
				@foreach($pages as $key => $page)
				<div class="hentry-post group">
					<div class="thumb-img"><a href="{{ URL::to($page_slug.'/'.$page->slug) }}"><img width="55" height="55" src="{{ asset($page->mpath . '/100x100_crop/' . $media->mname) }}" class="attachment-thumb_recentposts wp-post-image" alt="blog2" title="blog2" /></a></div>
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