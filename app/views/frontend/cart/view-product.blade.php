@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ $product->name }} | {{ $category->name }} ::
@parent
@stop

{{-- Page content --}}
@section('content')
		<!-- START PRIMARY SECTION -->
<div id="primary" class="inner group" />
<div class="layout-sidebar-no group">
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
				<a href="{{ route('shop-category', $parent_category->slug) }}">{{ $category->name }}</a> &rsaquo;

				<a href="#">{{ $product->name }}</a> &rsaquo;
			</div>

			<div class="product type-product status-publish hentry">

				<div class="images">
					<a href="{{ asset($product->mpath .'/550x500/'. $product->mname ) }}" class="zoom" rel="prettyphoto[gallery]">
						<img width="530" height="345" src="{{ asset($product->mpath .'/530x345_crop/'. $product->mname ) }}" class="attachment-530x345 wp-post-image" />
					</a>

					<div class="thumbnails">
						@foreach($product_medias as $key => $m)
						<a href="{{ asset($m->mpath .'/550x500/'. $m->mname ) }}" title="albatros_niwa_001_big" rel="prettyphoto[gallery]" class="zoom {{{($key==0) ? 'first' : ''}}}">
							<img width="90" height="90" src="{{ asset($m->mpath .'/100x100_crop/'. $m->mname ) }}" class="attachment-90x90" />
						</a>
						@endforeach
					</div>
					<span class="onsale">Sale!</span>
				</div>

				<div class="summary">
					<h1 class="product_title page-title">{{ $product->name }}</h1>
					@if($product->discount_price)
						<p class="price"><del>{{ number_format($product->price, 0) }}</del> <ins>{{ number_format($product->discount_price, 0) }} {{ Config::get('settings.currency') }}</ins></p>
					@else
						<p class="price"> <ins>{{ number_format($product->price, 0) }} {{ Config::get('settings.currency') }}</ins></p>
					@endif
					<p>
						{{$product->excerpt}}
					</p>
					<div class="product_meta"><span class="sku">SKU: {{$product->sku}}</span></div>
				</div>
				<div id="product-tabs">
					<ul class="tabs">
						{{--<li class="active"><a href="#related-products">Related Products</a></li>--}}
						<li class="active"><a href="#tab-description">Description</a></li>
					</ul>
					<div class="containers">
						{{--<div class="panel" id="related-products">--}}
							{{--<div class="related products">--}}
								{{--<ul class="products">--}}
									{{--<li class="product border shadow first last-row">--}}
										{{--<a href="#">--}}
											{{--<div class="thumbnail">--}}
												{{--<img width="150" height="150" src="images/common/001.png" class="attachment-shop_small wp-post-image" alt="001" title="001" />--}}
												{{--<div class="thumb-shadow"></div>--}}
												{{--<strong class="below-thumb">Elegant Glasses</strong>--}}
											{{--</div>--}}
											{{--<span class="price">&#36;250.00</span>--}}
										{{--</a>--}}
										{{--<div class="buttons">--}}
											{{--<a href="#" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>--}}
										{{--</div>--}}
									{{--</li>--}}
									{{--<li class="product border shadow last-row">--}}
										{{--<a href="#">--}}
											{{--<div class="thumbnail">--}}
												{{--<img width="150" height="150" src="images/common/warmroom-150x150.jpg" class="attachment-shop_small wp-post-image" alt="warmroom" title="warmroom" />--}}
												{{--<div class="thumb-shadow"></div>--}}
												{{--<strong class="below-thumb">Hot Room</strong>--}}
											{{--</div>--}}
											{{--<span class="price">&#36;730.00</span>--}}
										{{--</a>--}}
										{{--<div class="buttons">--}}
											{{--<a href="#" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>--}}
										{{--</div>--}}
									{{--</li>--}}
									{{--<li class="product border shadow last-row">--}}
										{{--<a href="#">--}}
											{{--<div class="thumbnail">--}}
												{{--<img width="150" height="150" src="images/common/ktichen21-150x150.jpg" class="attachment-shop_small wp-post-image" alt="ktichen2" title="ktichen2" />--}}
												{{--<div class="thumb-shadow"></div>--}}
												{{--<strong class="below-thumb">Wood Kitchen</strong>--}}
											{{--</div>--}}
											{{--<span class="price">&#36;367.00</span>--}}
										{{--</a>--}}
										{{--<div class="buttons">--}}
											{{--<a href="#" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>--}}
										{{--</div>--}}
									{{--</li>--}}
									{{--<li class="product border shadow last-row">--}}
										{{--<a href="#">--}}
											{{--<div class="thumbnail">--}}
												{{--<img width="150" height="150" src="images/common/warmroom-150x150.jpg" class="attachment-shop_small wp-post-image" alt="kitchen" title="kitchen" />--}}
												{{--<div class="thumb-shadow"></div>--}}
												{{--<strong class="below-thumb">Dark Kitchen</strong>--}}
											{{--</div>--}}
											{{--<span class="price">&#36;940.00</span>--}}
										{{--</a>--}}
										{{--<div class="buttons">--}}
											{{--<a href="#" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>--}}
										{{--</div>--}}
									{{--</li>--}}
								{{--</ul>--}}
								{{--<div class="clear"></div>--}}
							{{--</div>--}}
						{{--</div>--}}
						<div class="panel" id="tab-description">
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#8217;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#8217;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
						</div>
						<div class="panel" id="tab-attributes">
							<h2>Additional Information</h2>
						</div>
						<div class="panel" id="tab-reviews"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END PRIMARY SECTION -->
@stop