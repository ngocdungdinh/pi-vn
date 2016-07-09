@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Trang chủ ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="row">
	<div class="col-sm-3 nopl">
		<div>
			@include('frontend/cart/inc/sidebar')
		</div>
	</div>
	<div class="col-sm-9 nop">
		<h3 class="headline first-child text-color">
		  <span class="border-color"><a href="/news">Tin tức - Cẩm nang</a></span>
		</h3>
		<div class="row portfolio">
			@foreach($featured_posts as $key => $post)
			  <div class="col-sm-4 {{ $key > 1 ? ' hidden-xs' : 'col-xs-6' }}">
			    <!-- Portfolio Item #1 -->
			    <div class="portfolio-item">
				  <a href="{{ $post->url() }}">
				    <img src="{{ asset($post->mpath . '/320x210_crop/'. $post->mname) }}" class="img-responsive" alt="{{ $post->title }}">
					<!-- <div class="mask">
					  by John Doe <span class="pull-right"><i class="fa fa-heart"></i> 12 <i class="fa fa-comments-o"></i> 24</span>
					</div> -->
				  </a>
				  <div class="portfolio-desc">
				    <a class="title" href="{{ $post->url() }}">{{ $post->title }}</a>
				    <p class="text-muted">
				      <!-- {{ Str::words($post->excerpt, 20) }} -->
				    </p>
				  </div>
				</div>
			  </div>
			@endforeach
		</div>
		<div>
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="/shop?sort=lastest"><i class="fa fa-clock-o"></i> Sản phẩm Mới</a></li>
				<li><a href="/shop?sort=featured"><i class="fa fa-star"></i> Nổi bật</a></li>
				<li><a href="/shop?sort=review"><i class="fa fa-thumbs-up"></i> Đánh giá tốt</a></li>
				<li><a href="/shop?sort=discount"><i class="fa fa-certificate"></i> Đang khuyến mãi</a></li>
			</ul>
		</div>
		<div class="row" style="margin: 0">
			@foreach($last_products as $product)
			  <div class="col-sm-3 col-md-3 col-xs-6 product-item">
				@include('frontend/cart/inc/product-item')
			  </div>
			@endforeach
			<div>
				{{ $last_products->links() }}
			</div>
		</div>
	</div>
</div>
@stop