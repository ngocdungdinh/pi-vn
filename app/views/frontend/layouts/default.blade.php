<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="description" content="{{ Config::get('settings.site_info') }}" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>
		@section('title')
			{{ Config::get('settings.sitename') }}
		@show
	</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/style.css') }}" />
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 980px)" href="{{ asset('assets/css/lessthen980.css') }}" />
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 600px)" href="{{ asset('assets/css/lessthen600.css') }}" />
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="{{ asset('assets/css/lessthen480.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('assets/css/prettyPhoto.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('assets/css/tipsy.css') }}" type="text/css" media="all" />
	<link rel='stylesheet' href='{{ asset('assets/css/jquery-rotating.css') }}' type='text/css' media='all' />
	<link rel='stylesheet' href='{{ asset('assets/css/slider-cycle.css') }}' type='text/css' media='all' />

	<!-- [favicon] begin -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}" />
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}" />
	<!-- [favicon] end -->

	<!-- FONT -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster&amp;ver=3.3.2" type="text/css" media="all" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz%3A400&amp;ver=3.3.2" type="text/css" media="all" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans&amp;ver=3.3.2" type="text/css" media="all" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster&amp;text=Sommerce+Shop&amp;ver=3.3.2" type="text/css" media="all" />

	<!-- SCRIPTS -->
	<script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.prettyPhoto.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.tipsy.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.tweetable.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.nivo.slider.pack.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.cycle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/comment-reply.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.aw-showcase.js') }}"></script>

	<style type="text/css">
		#nav.elegant ul li a:hover { color:#d7cc96; }
		#nav.elegant ul.sub-menu li a:hover, #nav.elegant ul.children li a:hover { color:#fff; }
		#nav.elegant ul.sub-menu, #nav.elegant ul.children { background-color:#624e2f; }
		#nav.elegant .megamenu ul.sub-menu li { border-left-color:#745d39; }
		#nav.elegant ul.sub-menu li:hover, #nav.elegant ul.children li:hover, #nav.elegant .megamenu ul.sub-menu li ul li:hover { background-color:#745d39; }
		#nav.elegant .megamenu > ul.sub-menu > li > a { color:#d7cc96; }
		span.onsale { background-color:#ba7601; }
		.products li .buttons a.add-to-cart { background-color:#967d57; }
		.products li .buttons a.details { background-color:#6b512d; }
		.products li .buttons a.add-to-cart:hover { background-color:#b29b78; }
		.products li .buttons a.details:hover { background-color:#8d6e42; }
		#newsletter-form .newsletter-section form ul li input.text-field { background-color:#d5c6a1; }
		#newsletter-form .newsletter-section form ul li input.submit-field { background-color:#b4a58a; }
		#newsletter-form .newsletter-section form ul li input.submit-field:hover { background-color:#b69a68; }
		#footer .footer-sidebar, #copyright .inner { border-color:#D1D2D2; }
		#slider ul li .slider-caption h2 a, #slider ul li .slider-caption h2 a:hover {color:#fff;}        #content { width:750px; }
		#sidebar { width:170px; }
		#sidebar.shop { width:170px; }
		.products li { width:164px !important; }
		.products li a strong { width:120px !important; }
		.products li a strong.inside-thumb { bottom:0px !important; }
		.products li.shadow a strong.inside-thumb { bottom:21px !important; }
		.products li.border a strong.inside-thumb { bottom:7px !important; }
		.products li.border.shadow a strong.inside-thumb { bottom:28px !important; }
		.products li a img { width:150px !important;height:150px !important; }
		div.product div.images { width:56.6666666667%; }
		div.product div.images img { width:530px; }
		.layout-sidebar-no div.product div.summary { width:41.25%; }
		.layout-sidebar-right div.product div.summary, .layout-sidebar-left div.product div.summary { width:24.8%; }
		body, .stretched-layout .bgWrapper {
			background-color: #ffffff;
			background-image:  url('{{ asset('assets/images/backgrounds/main-bg.jpg') }}');
			background-position: top center;
			background-repeat: repeat;
			background-attachment: fixed}
		#header {
			background:#000000 url('{{ asset('assets/images/headers/002.jpg') }}') no-repeat top center;}
		.wrapper-content { width:750px; }
		#logo .logo-title, .logo { font-family: 'Trebuchet MS', Helvetica, sans-serif !important }
		h1, h2, h3, h4, h5, h6, .special-font { font-family: 'Trebuchet MS', Helvetica, sans-serif !important; }
		#slogan h1 { font-family: 'Trebuchet MS', Helvetica, sans-serif !important; }
		p, li { font-family: 'Trebuchet MS', Helvetica, sans-serif !important; }
	</style>
</head>
<body class="responsive boxed-layout no_js">
<!-- START LIGHT WRAPPER -->
<div class="bgLight group">
	<!-- START WRAPPER -->
	<div class="wrapper group">
		<!-- START BG WRAPPER -->
		<div class="bgWrapper group">
			<!-- START HEADER -->
			<div id="header" class="group">
				<!-- .inner -->
				<div class="inner group">
					<!-- START LOGO -->
					<div id="logo" class="group">
						<a href="index.html" title="">
							<img src="{{ asset('assets/images/pivn-logo.jpg') }}" height="110" alt=""/>
						</a>
					</div>
					<!-- END LOGO -->
					<!-- START LINKSBAR -->
					<ul id="linksbar" class="group">
						<li class="icon cart">
							<a href="#">0909.687.568 - 0433.645.668</a>
						</li>
					</ul>
					<!-- END LINKSBAR -->
					<div>
						<!-- START SEARCH FORM -->
						<form role="search" method="get" id="searchform" action="#" class="group">
							<div><label class="screen-reader-text" for="s">Tìm kiếm</label>
								<input type="text" value="" name="s" id="s" />
								<input type="submit" id="searchsubmit" value="&gt;" />
								<input type="hidden" name="post_type" value="product" />
							</div>
						</form>
						<!-- END SEARCH FORM -->
					</div>
					<div class="clear"></div>

					<!-- START NAV -->
					<div id="nav" class="group elegant">
						<ul id="menu-navigation" class="level-1">
							<li>
								<a href="index.html">TRANG CHỦ</a>
							</li>
							<li>
								<a href="#">GIỚI THIỆU</a>
								<ul class="sub-menu">
									<li><a href="#">Quá trình hình thành</a></li>
									<li><a href="#">Lĩnh vực hoạt động</a></li>
									<li><a href="#">Tiêu chí</a></li>
								</ul>
							</li>
							<li>
								<a href="#">DỊCH VỤ</a>
								<ul class="sub-menu">
									<li><a href="#">Thiết kế kiến trúc & Nội thất</a></li>
									<li><a href="#">Thi công Nội thất - Ngoại thất</a></li>
									<li><a href="#">Đo đạc bản đồ</a></li>
								</ul>
							</li>
							<li>
								<a href="#">ĐỒ NỘI THẤT</a>
								<ul class="sub-menu">
									<li><a href="#">Nội thất phòng khách</a></li>
									<li><a href="#">Nội thất bếp</a></li>
									<li><a href="#">Nội thất phòng ngủ</a></li>
									<li><a href="#">Đèn trang trí</a></li>
								</ul>
							</li>
							<li>
								<a href="#">VẬT LIỆU XÂY DỰNG</a>
								<ul class="sub-menu">
									<li><a href="#">Sơn</a></li>
									<li><a href="#">Chống thấm Sika</a></li>
									<li><a href="#">Sàn Gỗ</a></li>
									<li><a href="#">Sản phẩm khác</a></li>
								</ul>
							</li>
							<li>
								<a href="#">CÔNG TRÌNH</a>
								<ul class="sub-menu">
									<li><a href="#">Nội thất chung cư</a></li>
									<li><a href="#">Nội thất nhà ở</a></li>
									<li><a href="#">Kiến trúc nhà ở</a></li>
									<li><a href="#">Văn phòng & Showroom</a></li>
									<li><a href="#">Bar & Nhà hàng</a></li>
								</ul>
							</li>
							<li><a href="#">TIN TỨC</a></li>
							<li><a href="#">LIÊN HỆ</a></li>
						</ul>
					</div>
					<!-- END NAV -->
				</div>
				<!-- end .inner -->

			</div>
			<!-- END HEADER -->
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
					<div id="sidebar" class="group">
						<div id="product_categories-3" class="widget-1 widget-first widget widget_product_categories">
							<h3>Sản phẩm</h3>
							<ul>
								<li class="cat-item cat-item-22">
									<a href="#" title="View all posts filed under Brand">Đồ nội thất</a>
									<ul class="children">
										<li class="cat-item cat-item-28"><a href="#" title="View all posts filed under Wallmart">Nội thất phòng khách</a></li>
										<li class="cat-item cat-item-26"><a href="#" title="View all posts filed under Ikea">Nội thất bếp</a></li>
										<li class="cat-item cat-item-25"><a href="#" title="View all posts filed under Pathio">Nội thất phòng ngủ</a></li>
										<li class="cat-item cat-item-24"><a href="#" title="View all posts filed under Furnishop">Đèn trang trí</a></li>
									</ul>
								</li>
								<li class="cat-item cat-item-18">
									<a href="#" title="View all posts filed under Categories">Vật liệu xây dựng</a>
									<ul class="children">
										<li class="cat-item cat-item-34"><a href="#" title="View all posts filed under Wood">Sơn</a></li>
										<li class="cat-item cat-item-33"><a href="#" title="View all posts filed under Bathroom">Chống thấm Sika</a></li>
										<li class="cat-item cat-item-21"><a href="#" title="View all posts filed under Kitchen">Sàn gỗ</a></li>
										<li class="cat-item cat-item-20"><a href="#" title="View all posts filed under Bedroom">Sản phẩm khác</a></li>
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

			<!-- START FOOTER -->
			<div id="footer" class="group footer-sidebar-right columns-3">
				<div class="inner">
					<div class="footer-main">
						<div id="nav_menu-3" class="widget-1 widget-first widget widget_nav_menu">
							<h3>GIỚI THIỆU</h3>
							<div class="menu-utilities-container">
								<ul id="menu-utilities" class="menu">
									<li><a href="#">Quá trình hình thành</a></li>
									<li><a href="#">Lĩnh vực hoạt động</a></li>
									<li><a href="#">Tiêu chí</a></li>
								</ul>
							</div>
						</div>
						<div id="nav_menu-4" class="widget-2 widget widget_nav_menu">
							<h3>DỊCH VỤ</h3>
							<div class="menu-categories-footer-container">
								<ul id="menu-categories-footer" class="menu">
									<li><a href="#">Thiết kế kiến trúc & Nội thất</a></li>
									<li><a href="#">Thi công Nội thất - Ngoại thất</a></li>
									<li><a href="#">Đo đạc bản đồ</a></li>
								</ul>
							</div>
						</div>
						<div id="nav_menu-5" class="widget-3 widget-last widget widget_nav_menu">
							<h3>CÔNG TRÌNH</h3>
							<div class="menu-get-in-touch-container">
								<ul id="menu-get-in-touch" class="menu">
									<li><a href="#">Nội thất chung cư</a></li>
									<li><a href="#">Nội thất nhà ở</a></li>
									<li><a href="#">Kiến trúc nhà ở</a></li>
									<li><a href="#">Văn phòng & Showroom</a></li>
									<li><a href="#">Bar & Nhà hàng</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="footer-sidebar">
						<div id="recent-posts-3" class="widget-1 widget-first widget recent-posts">
							<h3>Thông tin liên hệ</h3>
							<div class="recent-post group">
								<div class="hentry-post group">
									<p class="title">CÔNG TY TNHH KIẾN TRÚC & CÔNG NGHỆ PI VIỆT NAM</p>
									<p>Địa chỉ: B12TT3 Khu đô thị Văn Quán, Q. Hà Đông, TP. Hà Nội</p>
									<p>Đại lý phân phối SP: Cụm 3 Tam Hiệp, H. Phúc Thọ, TP. Hà Nội</p>
									<p>Điện thoại: 0909.687.568 - 0433.645.668</p>
									<p>Email: pivietnam.ltd@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END FOOTER -->
			<!-- START COPYRIGHT -->
			<div id="copyright" class="group two-columns">
				<div class="inner group">

					<p class="right">
						Powered by <a href="#"><strong>PI-VN</strong></a> &copy; 2016
					</p>
				</div>
			</div>
			<!-- END COPYRIGHT -->
		</div>
		<!-- END BG WRAPPER -->
	</div>
	<!-- END WRAPPER -->
</div>
<!-- END LIGHT WRAPPER -->
<script type="text/javascript" src="{{ asset('assets/js/jquery.custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/contact.js') }}"></script>

</body>
</html>
