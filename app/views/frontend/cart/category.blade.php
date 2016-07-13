@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ $category->name }} | {{ $meta_title }} ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<div id="primary" class="inner group" />
	<div class="layout-sidebar-left group">
		<div id="container">
			<div id="content" role="main">
				<div id="breadcrumb">
                    <a class="home" href="{{route('home')}}">Trang chủ</a>  &rsaquo;
					@if($category->type_id == 1)
						<a href="#">Đồ nội thất</a>  &rsaquo;
					@else
						<a href="#">Vật liệu xây dựng</a>  &rsaquo;
					@endif

                    @if($category->parent_id != 0)
                        <a href="{{ route('shop-category', $parent_category->slug) }}">{{ $parent_category->name }}</a>  &rsaquo;
                    @endif
                    <a href="{{ route('shop-category', $parent_category->slug) }}">{{ $category->name }}</a></div>
				<h1 class="page-title">{{ $category->name }}</h1>
				<h2></h2>
				@if($products->count())
				<ul class="products">
					@foreach($products as $key => $product)
					<li class="product border shadow {{{ (($key+1)%4==1) ? 'first' : '' }}} {{{ (($key+1)%4==0) ? 'last' : '' }}}">
						@include('frontend/cart/inc/product-item')
					</li>
					@endforeach
				</ul>
				@else
				<div class="well">
					Đang cập nhật sản phẩm!
				</div>
				@endif
				<div class="clear"></div>
			</div>
		</div>
		<div id="sidebar" class="shop group">
			<div id="product_categories-3" class="widget-1 widget-first widget widget_product_categories">
				<h3>Sản phẩm</h3>
				<ul>
					<li class="cat-item cat-item-22">
						<a href="#" title="View all posts filed under Brand">Đồ nội thất</a>
						<ul class="children">
							@foreach($prod_cate_type_1 as $pcat_1)
								@if($pcat_1->parent_id == 0)
									<li class="cat-item cat-item-28"><a href="{{ route('shop-category', $pcat_1->slug) }}" title="Xem tất cả sản phẩm trong {{ $pcat_1->name }}">{{ $pcat_1->name }}</a></li>
								@endif
							@endforeach
						</ul>
					</li>
					<li class="cat-item cat-item-18">
						<a href="#" title="View all posts filed under Categories">Vật liệu xây dựng</a>
						<ul class="children">
							@foreach($prod_cate_type_2 as $pcat_2)
								@if($pcat_2->parent_id == 0)
									<li class="cat-item cat-item-28">
										<a href="{{ route('shop-category', $pcat_2->slug) }}" title="Xem tất cả sản phẩm trong {{ $pcat_2->name }}">{{ $pcat_2->name }}</a>
										<ul>
											@foreach($prod_cate_type_2 as $spcat_2)
												@if($spcat_2->parent_id == $pcat_2->id)
													<li class="cat-item cat-item-28" style="margin-left: 5px;">+ <a href="{{ route('shop-category', $spcat_2->slug) }}">{{$spcat_2->name}}</a></li>
												@endif
											@endforeach
										</ul>
									</li>
								@endif
							@endforeach
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END PRIMARY SECTION -->
@stop