<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Administration
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Jon Doe" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->		
		<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">

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
	</head>

	<body>
		<!-- Container -->
		<div class="container">
			<!-- Navbar -->
			@include('backend/inc/nav')

			<!-- Notifications -->
			@include('frontend/notifications')

			<!-- Content -->
			<div class="row">
			  	<div class="col-md-2">
			      <!--Sidebar content-->
			      	<div class="list-group">
					  <a href="{{ route('create/news') }}" class="list-group-item {{ (Request::is('admin/news/create') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Đăng bài mới</a>
					  <a href="{{ URL::to('admin/news') }}" class="list-group-item {{ (Request::is('admin/news') ? ' active"' : '') }}"><i class="icon-chevron-right"></i> Danh sách bài</a></a>
					  <a href="{{ URL::to('admin/categories') }}" class="list-group-item {{ (Request::is('admin/categories*') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Chuyên mục</a>
					  <a href="{{ URL::to('admin/comments') }}" class="list-group-item {{ (Request::is('admin/comments*') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Bình luận</a>
					</div>
			    </div>
			    <div class="col-md-10">
			      <!--Body content-->
					@yield('content')
			    </div>
			  </div>
			</div>
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

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('assets/js/jquery.1.10.2.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/bootstrap-datetimepicker.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/bootstrap-datetimepicker.pt-vi.js') }}"></script>
		<script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
		<script src="{{ asset('assets/js/admin.js') }}"></script>

		<script type="text/javascript">
			$(document).ready(function(){
			    jQuery('#datetimepicker').datetimepicker({
			    	format: 'yyyy-MM-dd hh:mm:ss ',
			    	language: 'pt-BR'
			    });

			    CKEDITOR.replace('textareabox',{ toolbar:'CusToolbar', height: '600px'} );

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
			padding: 100px 0;
		}
		@show
		</style>

	</body>
</html>
