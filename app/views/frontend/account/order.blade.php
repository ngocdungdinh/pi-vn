@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Đơn hàng
@endsection

{{-- Account page content --}}
@section('account-content')
	<hr />
	@if($orders->count())
		<table class="table table-bordered table-striped">
		  <thead>
		    <tr>
			  <th>Đơn số</th>
			  <th>Sản phẩm</th>
			  <th>Tổng tiền</th>
			  <th>Trạng thái</th>
			</tr>
		  </thead>
		  <tbody>
		  	@foreach($orders as $order)
			<tr>
			  <td style="vertical-align: top; width: 70px;" align="center">#{{ $order->id }}</td>
			  <td style="vertical-align: top;">
			  	<div>
			  		Lúc: {{ date("H:i - d/m/Y",strtotime($order->created_at)) }}			  		
			  	</div>
			  	@foreach($order->products as $pro)
					<div class="row small-cart-item">
						<div class="col-xs-8" style="padding-left: 0">
							<img src="{{ asset($pro->mpath . '/100x100_crop/'. $pro->mname) }}" width="40" class="thumbnail" style="float: left; margin-right: 8px; margin-bottom: 0px;">
							{{ $pro->qty }} x <a href="/shop/p/{{ $pro->slug }}">{{ $pro->name }}</a>
						</div>
						<div class="col-xs-4">{{ number_format($pro->subtotal, 0) }}{{ Config::get('settings.currency') }}</div>
					</div>
			  	@endforeach
			  </td>
			  <td style="vertical-align: top; width: 100px;">{{ number_format($order->total, 0) }}{{ Config::get('settings.currency') }}</td>
			  <td style="vertical-align: top; width:100px ">
			  	<p><a href="/shop/invoice/{{ $order->code }}" target="_blank">Xem hóa đơn</a></p>
			  	@if($order->status == 'new')
			  		<span class="label label-warning">Đợi giao dịch</span>
			  	@elseif($order->status == 'processing')
			  		<span class="label label-info">Đang xử lý</span>
			  	@elseif($order->status == 'completed')
			  		<span class="label label-success">Hoàn tất</span>
			  	@elseif($order->status == 'invoice')
			  		<span class="label label-default">Hóa đơn</span>
			  	@endif
			  </td>
			</tr>
			@endforeach
		  </tbody>
		</table>
	@else
		<div class="well">
			Chưa có đơn hàng
		</div>
	@endif
@stop