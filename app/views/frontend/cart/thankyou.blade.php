@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Gửi đơn hàng thành công ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="box-info">
			<div class="well p2">
			  	<h3 class="headline first-child text-color">
					<span class="border-color">Thank you!</span>
				</h3>
				<div>
					Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Đơn hàng của bạn đã được đưa vào hệ thống, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất để hoàn tất giao dịch.
					<hr />
					@if(!is_null($u))
						<a href="/account/orders" class="btn btn-red">Xem trạng thái đơn hàng</a>
					@else
						<div class="info-board info-board-green">
							<p>Đơn hàng số <strong>#{{ $order->id }}</strong> của bạn được đăng kí dưới địa chỉ e-mail: {{ $order->email }}.</p>
							Để xem trạng thái đơn hàng hãy <a href="{{ route('signup') }}">đăng kí</a> tài khoản hoặc <a href="{{ route('signin') }}">đăng nhập</a> sử dụng email đó.
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@stop