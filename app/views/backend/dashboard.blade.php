@extends('backend/layouts/default')
{{-- Page title --}}
@section('title')
Dashboard ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="dashboard">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-th"></span> Thống kê</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group">
					  <li class="list-group-item">
					    <span class="badge">{{ $posts['published']->getTotal() }}</span>
					    <a href="{{ URL::to('admin/news?status=published') }}"><span class="glyphicon glyphicon-ok-sign"></span> Bài đã xuất bản</a>
					  </li>
					  <li class="list-group-item">
					    <span class="badge">{{ $posts['submitted']->getTotal() }}</span>
					    <a href="{{ URL::to('admin/news?status=submitted') }}"><span class="glyphicon glyphicon-time"></span> Bài chờ xét duyệt</a>
					  </li>
					  <li class="list-group-item">
					    <span class="badge">{{ $posts['returned']->getTotal() }}</span>
					    <a href="{{ URL::to('admin/news?status=returned') }}"><span class="glyphicon glyphicon-time"></span> Bài bị trả lại</a>
					  </li>
					  <li class="list-group-item">
					    <span class="badge">{{ $posts['draft']->getTotal() }}</span>
					    <a href="{{ URL::to('admin/news?status=draft') }}"><span class="glyphicon glyphicon-floppy-disk"></span> Bài nháp</a>
					  </li>
					  </li>
					  <hr />
					  <li class="list-group-item">
					    <span class="badge">{{ $users->getTotal() }}</span>
					    <a href="{{ URL::to('admin/users') }}">Thành viên</a>
					  </li>
					</ul>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Thành viên mới</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<tbody>
							@foreach ($users as $user)
							<tr>
								<td>
									{{ $user->id }}
								</td>
								<td>
									{{ $user->fullName() }}
								</td>
								<td>
									{{ $user->activated }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<a href="{{ URL::to('admin/users') }}">Xem thêm</a>
				</div>
			</div>
		</div>
		@if(Config::get('app.module.cart'))
		<div class="col-md-8">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="fa fa-shopping-cart"></span> 
					Gian hàng
						<span class="pull-right"> 
							<a href="/admin/cart/orders" class="btooltip" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="Đơn hàng">{{ $cart['orders'] }} <i class="fa fa-tasks"></i></a>
							<a href="/admin/cart" class="btooltip" data-toggle="tooltip" data-placement="bottom" title="Sản phẩm">{{ $cart['products'] }} <i class="glyphicon glyphicon-th-large"></i></a>
						</span>
					</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="alert alert-success stats_box">
								<i class="fa fa-check-circle stats_icon"></i>
								<span class="stats_count">{{ $cart['orders_complete'] }}</span>
								<p><a href="/admin/cart/orders?status=complete">Đã hoàn tất</a></p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="alert alert-danger stats_box">
								<i class="fa fa-arrow-circle-o-right stats_icon"></i>
								<span class="stats_count">{{ $cart['orders_processing'] }}</span>
								<p><a href="/admin/cart/orders?status=processing">Đang xử lý</a></p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="alert alert-warning stats_box">
								<i class="fa fa-clock-o fa-3 stats_icon"></i>
								<span class="stats_count">{{ $cart['orders_new'] }}</span>
								<p><a href="/admin/cart/orders?status=new">Đợi giao dịch</a></p>
							</div>
						</div>
					</div>
					@if($cart['orders'])
					<div class="progress progress-striped active">
					  <div class="progress-bar progress-bar-success" style="width: {{ ($cart['orders_complete']/$cart['orders'])*100 }}%">
					    <span class="sr-only"> </span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: {{ ($cart['orders_processing']/$cart['orders'])*100 }}%">
					    <span class="sr-only"> </span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: {{ ($cart['orders_new']/$cart['orders'])*100 }}%">
					    <span class="sr-only"> </span>
					  </div>
					</div>
					@endif
				</div>
			</div>
		</div>
		@endif
		<div class="col-md-8">
			@if($posts['draft']->count())
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Bài nháp</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<tbody>
							@foreach ($posts['draft'] as $post)
							<tr>
								<td>					
									@if(!Permission::has_access('news', 'edit') || ($post->status == 'published' && !Permission::has_access('news', 'editpublish')) || (Permission::has_access('news', 'editowner') && !Permission::has_access('news', 'editowner', $post->user_id)))
										{{ $post->title }}
									@else
										<a href="{{ route('update/news', $post->id) }}"><strong>{{ $post->title }}</strong></a>
									@endif
								</td>
								<td>{{ $post->author->first_name }} {{ $post->author->last_name }}</td>
								<td>
									@if($post->status == 'published')
										<span title="{{ $post->publish_date }}">{{ date("H:i - d/m/Y",strtotime($post->publish_date)) }}</span>
									@else
										<span title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</span>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@endif
			@if($posts['submitted']->count())
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-time"></span> Bài đang chờ duyệt</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<tbody>
							@foreach ($posts['submitted'] as $post)
							<tr>
								<td>					
									@if(!Permission::has_access('news', 'edit') || ($post->status == 'published' && !Permission::has_access('news', 'editpublish')) || (Permission::has_access('news', 'editowner') && !Permission::has_access('news', 'editowner', $post->user_id)))
										{{ $post->title }}
									@else
										<a href="{{ route('update/news', $post->id) }}"><strong>{{ $post->title }}</strong></a>
									@endif
								</td>
								<td>{{ $post->author->first_name }} {{ $post->author->last_name }}</td>
								<td>
									@if($post->status == 'published')
										<span title="{{ $post->publish_date }}">{{ date("H:i - d/m/Y",strtotime($post->publish_date)) }}</span>
									@else
										<span title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</span>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-ok-sign"></span> Bài vừa đăng</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<tbody>
							@foreach ($posts['published'] as $post)
							<tr>
								<td>					
									@if(!Permission::has_access('news', 'edit') || ($post->status == 'published' && !Permission::has_access('news', 'editpublish')) || (Permission::has_access('news', 'editowner') && !Permission::has_access('news', 'editowner', $post->user_id)))
										{{ $post->title }}
									@else
										<a href="{{ route('update/news', $post->id) }}"><strong>{{ $post->title }}</strong></a>
									@endif
								</td>
								<td>{{ $post->author->first_name }} {{ $post->author->last_name }}</td>
								<td>
									@if($post->status == 'published')
										<span title="{{ $post->publish_date }}">{{ date("H:i - d/m/Y",strtotime($post->publish_date)) }}</span>
									@else
										<span title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</span>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
