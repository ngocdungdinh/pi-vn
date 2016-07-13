@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ $post->title }} ::
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
					<img width="640" height="295" src="{{ asset($post->mpath . '/640x295_crop/' . $post->mname) }}" class="attachment-blog_big wp-post-image" alt="blog3" title="blog3" />
					<div class="post_title">
						<h2>{{ $post->title }}</h2>
					</div>
				</div>
				<div class="post_content group">
					<div class="post_meta">
						<div class="post_date">
							<?php $post_date = explode('/', date("d/M/Y",strtotime($post->publish_date))) ?>
							<span class="day">{{$post_date[0]}}</span>
							<span class="month">{{$post_date[1]}}</span>
							<span class="year">{{$post_date[2]}}</span>
						</div>
						<div class="post_twitter"><a href="#">Tweet this</a></div>
						<div class="post_author">by <a href="#" rel="author">{{ $post->author->fullName() }}</a></div>
					</div>
					<p>{{ $post->excerpt }}</p>
					<p>{{ $post->content }}</p>
				</div>
				<div class="post_ group">
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- START SIDEBAR -->
	<div id="sidebar" class="blog group">
		<div id="almost-all-categories-3" class="widget-3 widget almost-all-categories">
			@foreach($categories as $cate)
				@if($cate->parent_id == 0)
					<h3><a href="{{route('view-category', $cate->slug)}}">{{$cate->name}}</a></h3>
					<ul id="almost_all_categories_widget">
						@foreach($categories as $subcat)
							@if($subcat->parent_id == $cate->id)
								<li><a href="{{route('view-category', $subcat->slug)}}">{{$subcat->name}}</a></li>
							@endif
						@endforeach
					</ul>
				@endif
			@endforeach
		</div>
		<div id="popular-posts-3" class="widget-2 widget popular-posts">
			<h3>Bài được quan tâm</h3>
			<div class="recent-post group">
				@foreach($mostview_post as $mostview)
					<div class="hentry-post group">
						<div class="thumb-img"><a href="{{$mostview->url()}}"><img width="55" height="55" src="{{ asset($mostview->mpath . '/100x100_crop/'. $mostview->mname) }}" class="attachment-thumb_recentposts wp-post-image" /></a></div>
						<a href="{{$mostview->url()}}"  class="title">{{$mostview->title}}</a>
						<p class="post-date">{{date("d/M/Y",strtotime($mostview->publish_date))}}</p>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- END SIDEBAR -->
</div>
@stop
