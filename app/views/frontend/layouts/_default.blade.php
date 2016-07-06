<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8" />
		<title>
			@section('title')
			{{ Config::get('settings.sitename') }}
			@show
		</title>
		<meta name="keywords" content="bbcms" />
		<meta name="author" content="BinhBEER" />
		<meta name="description" content="{{ Config::get('settings.site_info') }}" />
		<meta name="google-site-verification" content="C5BIFxCF4z_DQlgpyKGA7M-lPTCjrhJUsx3fk22my7I" />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- CSS
		================================================== -->
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/frontend.'. Config::get('app.compress_name') .'.css?v='.Config::get('app.css_ver')) }}" rel="stylesheet">

		<link rel="stylesheet" href="{{ URL::asset('assets/js/selectize/css/selectize.bootstrap3.css') }}">
		<!-- Resources -->
		<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,500,400italic,500italic,700italic&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png?v='.Config::get('app.css_ver')) }}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png?v='.Config::get('app.css_ver')) }}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png?v='.Config::get('app.css_ver')) }}">
		<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png?v='.Config::get('app.css_ver')) }}">
		<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png?v=k'.Config::get('app.css_ver')) }}">

		<script src="{{ asset('assets/js/jquery.1.10.2.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
	</head>
  	<body class="body-red">
		<div id="fb-root"></div>

		<!-- Extra Bar -->
		<div class="mini-navbar mini-navbar-white hidden-xs">
		  <div class="container">
			<div class="col-sm-12">
			  @if (Sentry::check())
			  	<span class="dropdown pull-right" style="display: inline-block;">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Chào,{{ $u->first_name }} <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to('profile/messages') }}"><i class="glyphicon glyphicon-inbox"></i> Tin nhắn</a></li>
						<li><a href="{{ URL::to('account/orders') }}"><i class="fa fa-shopping-cart"></i> Đơn hàng</a></li>
						<li><a href="{{ route('profile') }}"><i class="glyphicon glyphicon-cog"></i> Sửa thông tin</a></li>
						@if($u->hasAccess('admin'))
							<li class="divider"></li>
							<li><a href="{{ route('admin') }}"><i class="glyphicon glyphicon-tower"></i> Quản trị</a></li>
						@endif
						<li class="divider"></li>
						<li><a href="{{ route('logout') }}"><i class="glyphicon glyphicon-log-out"></i> Thoát</a></li>
					</ul>
				</span>
			  	<a href="{{ URL::to('/profile/messages') }}" class="pull-right">
	    			<span class="fa fa-envelope" style="font-size: 16px; {{ $u->has_msg ? 'color: #e06666' : 'color: #dddddd' }}"></span>
	    		</a>
			  @else
			  <a data-toggle="modal" href="#modal_signupBox" href="{{ route('signup') }}" class="pull-right"><i class="fa fa-arrow-circle-down"></i> Đăng kí</a>
			  <a data-toggle="modal" href="#modal_loginBox" href="{{ route('signin') }}" class="pull-right"><i class="fa fa-sign-in"></i> Đăng nhập</a>
			  @endif
			  <span class="dropdown pull-right" style="display: inline-block;" id="preview-cart">
			  	@include('frontend/cart/inc/smallcart')
			  </span>
			  <a href="javascript:void(0)" class="pull-left" id="nav-search"><i class="fa fa-search"></i> Tìm kiếm</a>
			  <a href="#" class="pull-left hidden" id="nav-search-close"><i class="fa fa-times"></i></a>
			  <!-- Search Form -->
			  <form class="pull-left hidden" role="search" id="nav-search-form" action="/shop/search">
				<div class="input-group">
				  <input type="text" name="k" class="form-control" placeholder="Tìm sản phẩm, tin tức...">
				  <span class="input-group-btn">
				    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				  </span>
				</div>
			  </form>
			</div>
		  </div>
		</div>
		<div class="container">
			<div align="center" class="logo">
				<a href="/"><img src="/assets/img/logo.png" /></a>
			</div>
		</div>

	    <div class="navbar navbar-white navbar-static-top" role="navigation">
	      <div class="container">
		    <!-- Navbar Header -->
		    <div class="nav-main">
		        <div class="navbar-header navbar-right">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <span class="navbar-text pull-left"><i class="fa fa-phone-square"></i> Hotline.: <span class="text-color">094.567.7911</span></span>
		        </div> <!-- / Navbar Header -->

				<!-- Navbar Links -->
		        <div class="navbar-collapse collapse">
				  <ul class="nav navbar-nav navbar-left">
	  				@foreach( Menu::position('nav')->mlinks as $nav )
	        			<li>
	          				<a class="bg-hover-color main-menu" href="{{ $nav->url }}" target="{{ $nav->target }}">{{ $nav->title }}</a>
	        			</li>
	    			@endforeach
				  </ul>			  
				  <!-- Search Form (xs) -->
				  <form class="navbar-form navbar-left visible-xs" role="search">
					<div class="form-group">
					  <input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Go!</button>
				  </form> <!-- / Search Form (xs) -->
				</div>
			</div>
	      </div>
	    </div>
	    <div class="container">
	    	<div class="services">
				<div class="row">
				  <div class="col-sm-4">
				    <!-- Service Item #1 -->
				    <div class="services-item" style="border-right: 1px solid #e6e6e6;">
					  <i class="fa fa-gift fa-2x text-color"></i>
					  <div class="services-item-desc">
				        <h3 class="primary-font">LUÔN GIẢM 5%</h3>
					    <p class="services-text">
					      Cho khách ngoại thành Hà Nội
					    </p>
					  </div>
					</div>
				  </div>
				  <div class="col-sm-4">
					<!-- Service Item #1 -->
				    <div class="services-item show-popover" data-container="body" data-toggle="popover" data-placement="left" data-content="mỗi thứ tư hàng tuần có một sản phẩm bán ra với giá ưu đãi giảm giá từ 30 - 50%." style="border-right: 1px solid #e6e6e6;">
					  <i class="fa fa-bullhorn fa-2x text-color"></i>
					  <div class="services-item-desc">
				        <h3 class="primary-font">HAPPY WEDNESDAY</h3>
					    <p class="services-text">
					      Giá ưu đãi giảm giá từ 30 - 50%
					    </p>
					  </div>
					</div>
				  </div>
				  <div class="col-sm-4">
					<!-- Service Item #1 -->
				    <div class="services-item show-popover" data-container="body" data-toggle="popover" data-placement="left" data-content=" mỗi thứ sáu hàng tuần giảm giá 5% một nhãn hàng ( áp dụng cộng dồn thành 10% cho khách Vip và khách tỉnh ). Tên hãng sale sẽ được thông báo vào ngày thứ năm trên facebook.">
					  <i class="fa fa-users fa-2x text-color"></i>
					  <div class="services-item-desc">
				        <h3 class="primary-font">BLACK FRIDAY</h3>
					    <p class="services-text">
					      Giảm giá 5% một nhãn hàng
					    </p>
					  </div>
					</div>
				  </div>
				</div>
	    	</div>
		</div>
		<!-- Wrapper -->
		<div class="wrapper">
			<!-- Content -->
			<div class="container">
				@yield('content')
			</div>
		</div>
		<div class="container" style="margin-top: 30px;">
			<h3 class="headline first-child text-color">
				<span class="border-color">Thương hiệu nổi bật</span>
			</h3>
          <div class="row manufacturers-list" style="text-align: center; overflow: hidden">
          	@foreach($manufacturers as $key => $man)
          		@if($key < 6)
            		<div class="col-xs-2 col-sm-2"><a href="/shop/search?thuong-hieu[]={{$man->id}}" class="thumbnail"><img src="{{ asset($man->mpath . '/100x100_crop/' . $man->mname) }}" alt="brand_logo" title="brand_logo"></a></div>
            	@endif
            @endforeach
          </div>
	    </div>
		<!-- Footer -->
		<footer>
			<div class="container">
				<div style="border-bottom: 2px solid #dddddd; overflow: hidden; margin-bottom: 20px;">
					<div class="footer-menus">
		  				@foreach( Menu::position('bottom')->mlinks as $nav )
	          				<a href="{{ $nav->url }}" target="{{ $nav->target }}">{{ $nav->title }}</a>
		    			@endforeach
				  	</div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<div class="row">
							<div class="col-xs-4" align="right">
								<img src="/assets/img/logo-footer.png">
							</div>
							<div class="col-xs-8" align="left">
								<h5 style="font-weight: bold;">Thông tin của hàng</h5>
								<div class="row" style="font-size:12px;">
									<div class="col-xs-2" style="padding: 0"><strong>Địa chỉ:</strong></div>
									<div class="col-xs-10">
										Số 52 ngõ Núi Trúc, Hà Nội<br />
									</div>
								</div>
								<hr style="margin: 5px 0" />
								<div class="row" style="font-size:12px;">
									<div class="col-xs-2" style="padding: 0"><strong>Điện thoại mua lẻ:</strong></div>
									<div class="col-xs-10">
										094.567.7911 / 04.62732145
									</div>
								</div>
								<hr style="margin: 5px 0" />
								<div class="row" style="font-size:12px;">
									<div class="col-xs-2" style="padding: 0"><strong>Điện thoại mua sỉ:</strong></div>
									<div class="col-xs-10">
										098.6677.911
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4" align="center">
						<h5 style="font-weight: bold;">Liên kết</h5>
						<div class="social-links">
							<a href="{{ Config::get('app.socialapp.facebook.url') }}" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="" class="google"><i class="fa fa-google-plus"></i></a>
							<a href="" class="youtube"><i class="fa fa-youtube"></i></a>
						</div>
					</div>
				</div>
		        <hr />
		        <div class="copyright" align="center">
		        	Copyright © 2013. All rights reserved. Powered by <a href="http://cms.binhbeer.com" target="_blank">BBCMS</a>
		        </div>
	        </div>
		</footer>

		@if (Sentry::check())
			<div class="modal fade" id="modal_composeMessage" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="composeMessage" ></div>
		@else
			<div class="modal fade" id="modal_loginBox" tabindex="-1" role="dialog" aria-labelledby="loginBox">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Đăng nhập</h4>
			      </div>
			      <div class="modal-body">
					@include('frontend/inc/signinform')
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<!-- Signup -->
			<div class="modal fade" id="modal_signupBox" tabindex="-1" role="dialog" aria-labelledby="signupBox">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Đăng ký</h4>
			      </div>
			      <div class="modal-body">
			      	@include('frontend/inc/signupform')
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		@endif
		<!-- Cart Popup -->
		<div class="modal fade" id="modal_shoppingCart" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="shoppingCart" >
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Giỏ hàng của bạn</h4>
		      </div>
		      <div class="modal-body">
		      	<div id="cartContent"></div>        
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('assets/js/scrolltopcontrol.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
		<script type="text/javascript" src="{{ url('assets/js/selectize/js/standalone/selectize.min.js') }}"></script>
		<script src="{{ asset('assets/js/custom.'. Config::get('app.compress_name') .'.js?v='.Config::get('app.js_ver')) }}"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-49263134-1', 'sammishop.com');
		  ga('send', 'pageview');

		</script>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId={{ Config::get('app.socialapp.facebook.client_id') }}";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

	</body>
</html>
