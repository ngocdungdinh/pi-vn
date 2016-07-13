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
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset('assets/images/slider/slide-01.png') }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset('assets/images/slider/thumb/no-thumbnail.jpg') }}" />
			</div>
		</div>
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset('assets/images/slider/slide-02.png') }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset('assets/images/slider/thumb/no-thumbnail.jpg') }}" />
			</div>
		</div>
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset('assets/images/slider/slide-03.png') }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset('assets/images/slider/thumb/no-thumbnail.jpg') }}" />
			</div>
		</div>
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset('assets/images/slider/slide-04.png') }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset('assets/images/slider/thumb/no-thumbnail.jpg') }}" />
			</div>
		</div>
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset('assets/images/slider/slide-05.png') }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset('assets/images/slider/thumb/no-thumbnail.jpg') }}" />
			</div>
		</div>
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset('assets/images/slider/slide-06.png') }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset('assets/images/slider/thumb/no-thumbnail.jpg') }}" />
			</div>
		</div>
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset('assets/images/slider/slide-07.jpg') }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset('assets/images/slider/thumb/no-thumbnail.jpg') }}" />
			</div>
		</div>
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset('assets/images/slider/slide-08.jpg') }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset('assets/images/slider/thumb/no-thumbnail.jpg') }}" />
			</div>
		</div>
		<div class="showcase-slide">
			<div class="showcase-content">
				<!-- If the slide contains multiple elements you should wrap them in a div with the class
                   .showcase-content-wrapper. We usually wrap even if there is only one element,
                   because it looks better. -->
				<div class="showcase-content-wrapper">
					<img src="{{ asset('assets/images/slider/slide-04.png') }}" width="960" height="401" alt="" />
				</div>
			</div>
			<div class="showcase-thumbnail">
				<img src="{{ asset('assets/images/slider/thumb/no-thumbnail.jpg') }}" />
			</div>
		</div>
	</div>
</div>
<!-- END SLIDER -->
<script type="text/javascript">
	var 	yiw_slider_type = 'thumbnails',
			yiw_slider_thumbnails_fx = 'fade',
			yiw_slider_thumbnails_speed = 300,
			yiw_slider_thumbnails_timeout = 50000;
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
		<h1>Các dự án đã & đang thực hiện</h1>
	</div>
	<div id="post-206" class="post-206 page type-page status-publish hentry group">
		<div class="one-fourth">
			<h3>Công trình tiêu biểu</h3>
			<p><a href="images/common/00112.jpg"><img class="alignleft size-full wp-image-278" title="001" src="{{ asset('assets/images/common/00112.jpg') }}" alt="" width="220" height="81" /></a></p>
			<p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida.</p>
		</div>
		<div class="one-fourth">
			<h3>Công trình tiêu biểu</h3>
			<p><a href="images/common/0024.jpg"><img class="alignleft size-full wp-image-281" title="002" src="{{ asset('assets/images/common/0024.jpg') }}" alt="" width="220" height="81" /></a></p>
			<p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida.</p>
		</div>
		<div class="one-fourth">
			<h3>Công trình tiêu biểu</h3>
			<p><a href="images/common/0036.jpg"><img class="alignleft size-full wp-image-283" title="003" src="{{ asset('assets/images/common/0036.jpg') }}" alt="" width="220" height="81" /></a></p>
			<p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida.</p>
		</div>
		<div class="one-fourth last">
			<h3>Công trình tiêu biểu</h3>
			<p><img class="alignleft size-full wp-image-286" title="04" src="{{ asset('assets/images/common/04.jpg') }}" alt="" width="220" height="81" /></p>
			<p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida.</p>
		</div>
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
					<li class="product border shadow first">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="{{ asset('assets/images/common/ktichen21-150x150.jpg') }}" class="attachment-shop_small wp-post-image" alt="ktichen2" title="ktichen2" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Wood Kitchen</strong>
							</div>
							<span class="price">&#36;367.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">CHI TIẾT</a>
						</div>
					</li>
					<li class="product border shadow">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="{{ asset('assets/images/common/kitchen-150x150.jpg') }}" class="attachment-shop_small wp-post-image" alt="kitchen" title="kitchen" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Dark Kitchen</strong>
							</div>
							<span class="price">&#36;940.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">CHI TIẾT</a>
						</div>
					</li>
					<li class="product border shadow">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="{{ asset('assets/images/common/wood5-150x150.jpg') }}" class="attachment-shop_small wp-post-image" alt="wood" title="wood" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Wood Flor</strong>
							</div>
							<span class="price">&#36;650.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">CHI TIẾT</a>
						</div>
					</li>
					<li class="product border shadow last">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="{{ asset('assets/images/common/originalparquet_001_big-150x150.jpg') }}" class="attachment-shop_small wp-post-image" alt="originalparquet_001_big" title="originalparquet_001_big" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Gold mahibo</strong>
							</div>
							<span class="price"><del>&#36;1,000.00</del> <ins>&#36;450.00</ins></span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">CHI TIẾT</a>
						</div>
					</li>
					<li class="product border shadow first last-row">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="{{ asset('assets/images/common/Fotolia_19668952_Subscription_XL-150x150.jpg') }}" class="attachment-shop_small wp-post-image" alt="Fotolia_19668952_Subscription_XL" title="Fotolia_19668952_Subscription_XL" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Nice pillows</strong>
							</div>
							<span class="price"><del>&#36;420.00</del> <ins>&#36;380.00</ins></span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">CHI TIẾT</a>
						</div>
					</li>
					<li class="product border shadow last-row">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="{{ asset('assets/images/common/warmroom-150x150.jpg') }}" class="attachment-shop_small wp-post-image" alt="warmroom" title="warmroom" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Hot Room</strong>
							</div>
							<span class="price">&#36;730.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">CHI TIẾT</a>
						</div>
					</li>
					<li class="product border shadow last-row">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="{{ asset('assets/images/common/wood-150x150.jpg') }}" class="attachment-shop_small wp-post-image" alt="wood" title="wood" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Wood design</strong>
							</div>
							<span class="price"><del>&#36;340.00</del> <ins>&#36;340.00</ins></span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">CHI TIẾT</a>
						</div>
					</li>
					<li class="product border shadow last last-row">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="{{ asset('assets/images/common/001b-150x150.jpg') }}" class="attachment-shop_small wp-post-image" alt="001b" title="001b" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">PINK BATHROOM</strong>
							</div>
							<span class="price">&#36;450.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">CHI TIẾT</a>
						</div>
					</li>
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