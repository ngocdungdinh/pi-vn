@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ $meta_title }} ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div>
	<ol class="breadcrumb hidden-xs">
		<li><a href="/"><i class="fa fa-home"></i></a></li>
		<li class="active"> {{ $meta_title }}</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-3 nopl">
		<div>
			@include('frontend/cart/inc/sidebar')
		</div>
	</div>
	<div class="col-md-9 nop">
		<div>
			<ul class="nav nav-tabs nav-justified">
				<li {{ isset($filter) && $filter=='lastest' ? 'class="active"' : '' }}><a href="/shop?sort=lastest"><i class="fa fa-clock-o"></i> Sản phẩm Mới</a></li>
				<li {{ isset($filter) && $filter=='featured' ? 'class="active"' : '' }}><a href="/shop?sort=featured"><i class="fa fa-star"></i> Nổi bật</a></li>
				<li {{ isset($filter) && $filter=='review' ? 'class="active"' : '' }}><a href="/shop?sort=review"><i class="fa fa-thumbs-up"></i> Đánh giá tốt</a></li>
				<li {{ isset($filter) && $filter=='discount' ? 'class="active"' : '' }}><a href="/shop?sort=discount"><i class="fa fa-certificate"></i> Đang khuyến mãi</a></li>
			</ul>
		</div>
		@if($products->count())
		<div class="row" style="margin: 0">
			@foreach($products as $product)
			  <div class="col-sm-3 col-md-3 col-xs-6 product-item">
			  	@include('frontend/cart/inc/product-item')
			  </div>
			@endforeach
		</div>
		<div>
			{{ $products->appends(array('sort' => $filter))->links() }}
		</div>
		@else
			<div class="well">
				Đang cập nhật sản phẩm!
			</div>
		@endif
	</div>
</div>
@stop