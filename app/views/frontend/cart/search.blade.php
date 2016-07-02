@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Lọc sản phẩm ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div>
	<ol class="breadcrumb hidden-xs">
		<li><a href="/"><i class="fa fa-home"></i></a></li>
		<li class="active">Tìm sản phẩm</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-3 nopl">
		<div>
			@include('frontend/cart/inc/sidebar-filter')
		</div>
	</div>
	<div class="col-md-9 nop">
		<h3 class="headline first-child text-color">
			<span class="border-color"><strong>{{ $products->count() }}</strong> Sản phẩm tìm được</span>
		</h3>
		@if($products->count())
		<div class="row" style="margin: 0">
			@foreach($products as $product)
			  <div class="col-sm-3 col-md-3 col-xs-6 product-item">
				@include('frontend/cart/inc/product-item')
			  </div>
			@endforeach
		</div>
		@else
			<div class="well">
				Đang cập nhật sản phẩm!
			</div>
		@endif
	</div>
</div>
@stop