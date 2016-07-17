@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Trang chủ ::
@parent
@stop

{{-- Page content --}}
@section('content')
		<!-- START SLIDER -->
<div id="slider" class="thumbnails group inner">
	<div class="showcase group">
		@foreach($sliders->slidermedias as $m)
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset($m->mpath .'/958x421_crop/'. $m->mname ) }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset($m->mpath .'/200x200_crop/'. $m->mname ) }}" />
			</div>
		</div>
		@endforeach
	</div>
</div>
<!-- END SLIDER -->
<script type="text/javascript">
	var 	yiw_slider_type = 'thumbnails',
			yiw_slider_thumbnails_fx = 'fade',
			yiw_slider_thumbnails_speed = 300,
			yiw_slider_thumbnails_timeout = 5000;
</script>

<div class="slider-mobile">
	<!-- START SLIDER -->
	<div id="slider" class="group mobile inner fixed-image">
		<img src="{{ asset('assets/images/slider/slide-01.png') }}" width="960" height="338" alt="" />
	</div>
	<!-- END SLIDER -->
</div>
<!-- START PRIMARY SECTION -->
<div id="primary" class="inner group">
	<!--<div class="clear"></div>-->
	<div class="border-line"></div>
	<div id="slogan" class="inner">
		<h1>Thông tin nổi bật</h1>
	</div>
	<div id="post-206" class="post-206 page type-page status-publish hentry group">
		@foreach($home_posts as $key => $hp)
		<div class="one-fourth {{{($key+1)%4==0?'last':''}}}">
			<p><a href="{{$hp->url()}}"><img class="alignleft size-full wp-image-278" title="001" src="{{ asset($hp->mpath .'/220x81_crop/'. $hp->mname ) }}" alt="" width="220" height="81" /></a></p>
			<h3>{{$hp->title}}</h3>
			<p>{{$hp->excerpt}}</p>
		</div>
		@endforeach
		{{--<div class="one-fourth last">--}}
			{{--<h3>Công trình tiêu biểu</h3>--}}
			{{--<p><img class="alignleft size-full wp-image-286" title="04" src="{{ asset('assets/images/common/04.jpg') }}" alt="" width="220" height="81" /></p>--}}
			{{--<p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida.</p>--}}
		{{--</div>--}}
		<div class="clear space"></div>

		<div class="border-line"></div>
	</div>
	<div id="slogan" class="inner">
		<h1>Sản phẩm nổi bật</h1>
	</div>
	<div class="layout-sidebar-left">
		<!-- START CONTENT -->
		<div id="content" role="main" class="group wrapper-content">
			<div id="post-241" class="post-241 page type-page status-publish hentry group">
				<ul class="products">
					@foreach($last_products as $key => $product)
					<li class="product border shadow {{{ (($key+1)%4==1) ? 'first' : '' }}} {{{ (($key+1)%4==0) ? 'last' : '' }}}">
						@include('frontend/cart/inc/product-item')
					</li>
					@endforeach
				</ul>
				<div class="clear"></div>
				<div class="clear"></div>
				<div class="border-line"></div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- START SIDEBAR -->
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
			<div id="text-image-3" class="widget-2 widget-last widget text-image">
				<div class="text-image" style="text-align:left"><img src="{{ asset('assets/images/free.jpg') }}" alt="" /></div>
			</div>
		</div>
		<!-- END SIDEBAR -->
	</div>
	<!-- START EXTRA CONTENT -->
	<!-- END EXTRA CONTENT -->
</div>
<!-- END PRIMARY SECTION -->
@stop