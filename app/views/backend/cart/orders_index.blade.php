@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Đơn hàng ::
@parent
@stop

{{-- Page content --}}
@section('content')
<h3>
	<span class="glyphicon glyphicon-th-large"></span> Đơn hàng
</h3>
<div>
    <ul class="nav nav-tabs">
	  <li {{ $status=='' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/cart/orders') }}">Tất cả</a></li>
	  <li {{ $status=='new' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/cart/orders?status=new') }}"><i class="fa fa-clock-o"></i> Đợi giao dịch</a></li>
	  <li {{ $status=='processing' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/cart/orders?status=processing') }}"><i class="fa fa-arrow-circle-o-right"></i> Đang xử lý</a></li>
	  <li {{ $status=='complete' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/cart/orders?status=complete') }}"><i class="fa fa-check-circle"></i> Đã hoàn tất</a></li>
	</ul>
</div><br />
<div>
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
			  <td style="vertical-align: top; width: 70px;" align="center">
			  	<a href="">#{{ $order->id }}</a>			  	
			  </td>
			  <td style="vertical-align: top;">
			  	@if($order->user_id)
			  		<a href="/admin/cart/statistic?user_id={{ $order->user_id }}"><strong>{{ $order->full_name }}</strong></a> (thành viên)
			  	@else
			  		<strong>{{ $order->full_name }}</strong> (khách)
			  	@endif
			  	<span class="pull-right" style="color:#666666"><i class="glyphicon glyphicon-comment"></i> {{ Str::words($order->admin_note, 5) }}</span>
			  	<p>{{ $order->address }}</p>
			  	<p>
			  		<span class="label label-default pull-left"><i class="fa fa-money"></i> {{ $payment_gateways[$order->payment_gateway]['name'] }}</span>
			  		<span class="label label-info pull-right"><i class="fa fa-truck"></i> {{ $shipping_method[$order->shipping_method]['name'] }}</span>
			  	</p>
			  </td>
			  <td style="vertical-align: top; width: 100px;">
			  	<strong>{{ number_format($order->total, 0) }} {{ Config::get('settings.currency') }}</strong>
			  	<p>{{ $order->products->count() }} sản phẩm</p>
			  	<p style="color:#999999"><span title="{{ $order->created_at }}">{{ $order->created_at->diffForHumans() }}</span></p>
			  </td>
			  <td style="vertical-align: top; width:100px ">
			  	<p>
			  		<a href="/admin/cart/orders/{{ $order->id }}/edit" class="btn btn-default btn-xs">Xem</a>
			  	</p>
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
</div>
@stop