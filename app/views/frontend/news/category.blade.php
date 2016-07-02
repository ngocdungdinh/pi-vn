@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ isset($category->name) ? $category->name : 'Tin tức - Cẩm nang' }} ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div>
	<ol class="breadcrumb hidden-xs">
		<li><a href="/"><i class="fa fa-home"></i></a></li>
		<li class="active"><a href="/news">Tin tức cẩm nang</a></li>
		@if(isset($category->name))
	  		<li class="active">{{ $category->name }}</li>
	  	@endif
	</ol>
</div>
<div>
	<div class="row">
		<div class="colu main-content col-md-8">
			@foreach ($posts as $key => $post)
				@if(($key+1)%4==1)
					<div class="box-info">
						<div class="news-item big" style="margin-right: 8px; background-color: #ffffff; border: 1px solid #e3e3e3">
							<div class="news-item-v">
								<div style="height: 210px;" class="thumb-news">
									<a href="{{ $post->url() }}" title="{{ $post->title }}"><img alt="{{ $post->title }}" src="{{ asset($post->mpath . '/320x210_crop/'. $post->mname) }}" width="320" height="210" /></a>
								</div>
								<div style="padding-top: 10px; padding-right: 20px">
									<p class="published-date"><i class="glyphicon glyphicon-calendar"></i> {{ date("H:i - d/m/Y",strtotime($post->publish_date)) }}</p>
									<a href="{{ $post->url() }}" class="title" title="{{ $post->title }}">{{ $post->title }}</a>
									<p>{{ $post->excerpt }}</p>
								</div>
							</div>
						</div>
					</div>
				@else
					<div class="box-info">
						<div class="news-item" style="margin-right: 8px; background-color: #ffffff; border: 1px solid #e3e3e3">
							<div class="news-item-v">
								<div style="height: 130px;" class="thumb-news">
									<a href="{{ $post->url() }}" title="{{ $post->title }}"><img alt="{{ $post->title }}" src="{{ asset($post->mpath . '/320x210_crop/'. $post->mname) }}" width="200" height="130" /></a>
								</div>
								<div style="padding-top: 15px; padding-right: 20px">
									<p class="published-date"><i class="glyphicon glyphicon-calendar"></i> {{ date("H:i - d/m/Y",strtotime($post->publish_date)) }}</p>
									<a href="{{ $post->url() }}" class="title" title="{{ $post->title }}">{{ $post->title }}</a>
								</div>
							</div>
						</div>
					</div>
				@endif
			@endforeach
			<div class="paging">
				{{ $posts->links() }}
			</div>
		</div>
		<div class="col-right colu col-md-4">
			<ul class="nav nav-pills nav-stacked">
				@foreach($categories as $cat)
			  		<li {{ isset($category->slug) && $category->slug==$cat->slug ? 'class="active"' : '' }}><a href="/{{ $cat->slug }}">{{ $cat->name }}</a></li>
				@endforeach
		    </ul>
			<div class="box-info">
				<div class="well" style="padding: 5px;">
					<div class="fb-like-box" data-href="{{ Config::get('app.socialapp.facebook.url') }}" data-width="285" data-height="184" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
