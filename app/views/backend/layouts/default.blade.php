<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			BBCMS - Admin CP
			@show
		</title>
		<meta name="keywords" content="bbcms" />
		<meta name="author" content="BinhBEER" />
		<meta name="description" content="Content management system." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
		<link href="{{ asset('assets/css/bootstrap.min.css?v='.Config::get('app.css_ver')) }}" rel="stylesheet" media="all">
		<link href="{{ asset('assets/css/font-awesome.min.css?v='.Config::get('app.css_ver')) }}" rel="stylesheet" media="all">
		<link href="{{ asset('assets/css/admin.css?v='.Config::get('app.css_ver')) }}" rel="stylesheet">


		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
		<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('assets/js/jquery.1.10.2.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/bootstrap-datetimepicker.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/bootstrap-datetimepicker.pt-vi.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/typeahead.min.js') }}"></script>
		<script src="{{ asset('assets/js/moment.js') }}"></script>
		<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
		<script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.nestable.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
		<script src="{{ asset('assets/js/admin.js?v='.Config::get('app.css_ver')) }}"></script>		
	</head>

	<body>
		<!-- Container -->
		<div class="container">
			<!-- Header -->
			@include('backend/inc/header')

			<div class="row">
				<div class="col-md-2 sidebar nopr">
					<!-- Nav -->
					@include('backend/inc/nav')
				</div>
				<div class="col-md-10">
					<!-- Notifications -->
					@include('frontend/notifications')
					<!-- Content -->
					@yield('content')
				</div>
			</div>
			<hr />
			<!-- Footer -->
			<footer>
				<div class="copyright">
		        	Copyright © 2013. All rights reserved. Powered by <a target="_blank" href="http://cms.binhbeer.com">BBCMS</a>
		        </div>
			</footer>
		</div>
		<div class="modal fade" id="modal_widgets" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="widgetModal" >
		</div>
		<!-- Upload image -->
		<div class="modal fade" id="modal_updateMedia" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Thư viện</h4>
		      </div>
		      <div class="modal-body">
		      	<div id="mediaContent"></div>        
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<script type="text/javascript">			
			$(document).ready(function(){
			    jQuery('#datetimepicker').datetimepicker({
			    	format: 'yyyy-MM-dd hh:mm:ss ',
			    	language: 'pt-BR'
			    });

			    jQuery('input#tagName').typeahead({
				  name: 'tagname',
				  local: ['Bình BEER', 'BBCMS'],
				  valueKey: 'name',
				  remote: {
				  	url: '/admin/tags/ajaxlist?keyword=%QUERY',
				  }
				});

			    CKEDITOR.replace('textareabox',{ toolbar:'CusToolbar', height: '500px'} );

			    $("#category-list").mouseleave(function(){
			        $("#category-list a").css("display", "none");
			    });

			    $("#category-list label").hover(function() {        
			        $("#category-list label a").css("display", "none");
			        $(this).children("a").css("display", "inline-block");
			    });
			});
		</script>
		
		<style>
		@section('styles')
		body {
			padding: 60px 0;
		}
		@show
		</style>
	</body>
</html>
