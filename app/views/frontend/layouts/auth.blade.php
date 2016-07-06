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

		<!-- Wrapper -->
		<div class="wrapper">
			<!-- Content -->
			<div class="container">
				@yield('content')
			</div>
		</div>

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
