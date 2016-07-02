<div class="navbar navbar-inverse navbar-fixed-top header-nav">
	<div class="navbar-inner">
		<div class="container">
			<div>
				<div class="col-md-8" style="padding-left: 0">
					<ul class="nav navbar-nav">
						<li class="active"><a href="{{ URL::to('admin') }}"><i class="glyphicon glyphicon-tree-conifer"></i> <strong>BBCMS</strong></a></li><li><a href="{{ route('update/user', Sentry::getId()) }}">Chào, <strong>{{ Sentry::getUser()->fullName() }}</strong></a></li>
						<li><a href="{{ URL::to('admin/deletecaches') }}"><span class="glyphicon glyphicon-refresh"></span> Xóa cache</a></li>						
						<li class="dropdown ishover">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-plus"></span> Thêm</a>
							<ul class="dropdown-menu">
								<li><a href="/admin/news/create"><span class="glyphicon glyphicon-pencil"></span> Tin tức</a></li>
								<li><a href="/admin/cart/products/create"><span class="glyphicon glyphicon-list-alt"></span> Sản phẩm</a></li>
								<li><a href="/admin/medias/upload"><span class="glyphicon glyphicon-cloud-upload"></span> Tệp tin</a></li>
								<li><a href="/admin/users/create"><span class="glyphicon glyphicon-user"></span> Người dùng</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="col-md-4" style="padding-right: 0">
					<ul class="nav navbar-nav" style="float: right">
						<li><a target="_blank" href="{{ URL::to('/') }}"><span class="glyphicon glyphicon-share-alt"></span> Xem trang chủ</a></li>
						<li class="divider-vertical"></li>
						<li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>