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
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
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
		#slider ul li .slider-caption h2 a, #slider ul li .slider-caption h2 a:hover {color:#fff;}
		#content { width:750px; }
		#content.blog { width:640px; }
		#sidebar { width:170px; }
		#sidebar.shop { width:200px; }
		#sidebar.page { width:280px; }
		#sidebar.blog { width:280px; }
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
						<a href="{{route('home')}}" title="">
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
								<a href="{{route('home')}}">TRANG CHỦ</a>
							</li>
							<li>
								<a href="#">GIỚI THIỆU</a>
								<ul class="sub-menu">
									@foreach($intros as $intro)
										<li><a href="{{route('view-intro', $intro->slug)}}">{{$intro->title}}</a></li>
									@endforeach
								</ul>
							</li>
							<li>
								<a href="#">DỊCH VỤ</a>
								<ul class="sub-menu">
									@foreach($services as $service)
										<li><a href="{{route('view-service', $service->slug)}}">{{$service->title}}</a></li>
									@endforeach
								</ul>
							</li>
							<li>
								<a href="#">ĐỒ NỘI THẤT</a>
								<ul class="sub-menu">
								@foreach($prod_cate_type_1 as $pcat_1)
									@if($pcat_1->parent_id == 0)
										<li><a href="{{ route('shop-category', $pcat_1->slug) }}">{{ $pcat_1->name }}</a></li>
									@endif
								@endforeach
								</ul>
							</li>
							<li>
								<a href="#">VẬT LIỆU XÂY DỰNG</a>
								<ul class="sub-menu">
									@foreach($prod_cate_type_2 as $pcat_2)
										@if($pcat_2->parent_id == 0)
											<li><a href="{{ route('shop-category', $pcat_2->slug) }}">{{ $pcat_2->name }}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							@foreach($categories as $cate)
								@if($cate->parent_id == 0)
									<li>
										<a href="{{route('view-category', $cate->slug)}}">{{$cate->name}}</a>
										<ul class="sub-menu">
											@foreach($categories as $subcat)
												@if($subcat->parent_id == $cate->id)
													<li><a href="{{route('view-category', $subcat->slug)}}">{{$subcat->name}}</a></li>
												@endif
											@endforeach
										</ul>
									</li>
								@endif
							@endforeach
							<li><a href="{{route('lien-he')}}">LIÊN HỆ</a></li>
						</ul>
					</div>
					<!-- END NAV -->
				</div>
				<!-- end .inner -->

			</div>
			<!-- END HEADER -->

			@yield('content')

			<!-- START FOOTER -->
			<div id="footer" class="group footer-sidebar-right columns-3">
				<div class="inner">
					<div class="footer-main">
						<div id="nav_menu-3" class="widget-1 widget-first widget widget_nav_menu">
							<h3>GIỚI THIỆU</h3>
							<div class="menu-utilities-container">
								<ul id="menu-utilities" class="menu">
									@foreach($intros as $intro)
										<li><a href="{{route('view-intro', $intro->slug)}}">{{$intro->title}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
						<div id="nav_menu-4" class="widget-2 widget widget_nav_menu">
							<h3>DỊCH VỤ</h3>
							<div class="menu-categories-footer-container">
								<ul id="menu-categories-footer" class="menu">
									@foreach($services as $service)
										<li><a href="{{route('view-intro', $service->slug)}}">{{$service->title}}</a></li>
									@endforeach
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
					<p class="left">
						<span class="logo">
							<!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
							<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
	_Hasync.push(['Histats.start', '1,3521434,4,428,112,75,00011111']);
	_Hasync.push(['Histats.fasi', '1']);
	_Hasync.push(['Histats.track_hits', '']);
	(function() {
		var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
		hs.src = ('//s10.histats.com/js15_as.js');
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
	})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3521434&101" alt="" border="0"></a></noscript>
							<!-- Histats.com  END  -->
						</span>
					</p>

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
