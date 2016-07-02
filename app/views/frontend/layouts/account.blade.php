@extends('frontend/layouts/default')

{{-- Page content --}}
@section('content')
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="box-info">
			<div class="well p2">
				<div>
					<ul class="nav nav-tabs">
						<li{{ Request::is('account/orders') ? ' class="active"' : '' }}><a href="{{ URL::to('account/orders') }}{{ Request::has('uid') ? '?uid='.Request::query('uid') : '' }}">Đơn hàng</a></li>
						<li{{ Request::is('account/profile') ? ' class="active"' : '' }}><a href="{{ URL::route('profile') }}{{ Request::has('uid') ? '?uid='.Request::query('uid') : '' }}">Thông tin cá nhân</a></li>
						<li{{ Request::is('account/avatar') ? ' class="active"' : '' }}><a href="{{ URL::route('avatar') }}{{ Request::has('uid') ? '?uid='.Request::query('uid') : '' }}">Ảnh đại diện</a></li>
						<li{{ Request::is('account/change-password') ? ' class="active"' : '' }}><a href="{{ URL::route('change-password') }}{{ Request::has('uid') ? '?uid='.Request::query('uid') : '' }}">Đổi mật khẩu</a></li>
						<li{{ Request::is('account/change-email') ? ' class="active"' : '' }}><a href="{{ URL::route('change-email') }}{{ Request::has('uid') ? '?uid='.Request::query('uid') : '' }}">Đổi Email</a></li>
					</ul>
				</div>
				@yield('account-content')
			</div>
		</div>
	</div>
</div>
@stop
