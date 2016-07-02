<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8" />
		<title>
			@section('title')
			Đơn hàng số: #{{ $order->id }} | {{ Config::get('settings.sitename') }}
			@show
		</title>
		<meta name="keywords" content="bbcms" />
		<meta name="author" content="BinhBEER" />
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- CSS
		================================================== -->
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/frontend.'. Config::get('app.compress_name') .'.css?v='.Config::get('app.css_ver')) }}" rel="stylesheet">
	</head>
  	<body class="body-red">
		<div id="fb-root"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="well">
						<div align="center">
							<img src="/assets/img/logo.png">
						</div>
						<hr />
						<h4>Thông tin Hóa đơn</h4>
						<div class="row">
							<div class="col-xs-6">
								<div>
									<p><strong>Trạng thái: </strong> 
									  	@if($order->status == 'new')
									  		<span class="label label-warning">Đợi giao dịch</span>
									  	@elseif($order->status == 'processing')
									  		<span class="label label-info">Đang xử lý</span>
									  	@elseif($order->status == 'completed')
									  		<span class="label label-success">Hoàn tất</span>
									  	@elseif($order->status == 'invoice')
									  		<span class="label label-default">Hóa đơn</span>
									  	@endif
									</p>
									<p>{{ $order->admin_note }}</p>
									<hr />
									<p><strong>Số hóa đơn: </strong> #{{ $order->id }}</p>
									<p><strong>Mã hóa đơn: </strong> {{ $order->code }}</p>
									<p><strong>Ngày tạo: </strong> {{ date("H:i - d/m/Y",strtotime($order->created_at)) }}</p>
								</div>
							</div>
							<div class="col-xs-6">
								<p>
									<strong>Họ tên: </strong>
									@if($order->user_id)
										<a href="">{{$order->full_name}}</a>
									@else
										{{$order->full_name}} (khách)
									@endif
								</p>
								<p><strong>Email:</strong> <br />{{ $order->email }}</p>
								<p><strong>Địa chỉ:</strong> <br />{{ $order->address }}</p>
								<p><strong>Thanh toán:</strong> {{ $payment_gateways[$order->payment_gateway]['name'] }}</p>
								<p><strong>Vận chuyển:</strong> {{ $shipping_method[$order->shipping_method]['name'] }}</p>
							</div>
						</div>
						<hr />
						<div>
							<table class="table table-bordered table-striped">
							  <thead>
							    <tr>
								  <th>{{ $products->count() }} sản phẩm</th>
								  <th>Giá</th>
								  <th>Số lượng</th>
								  <th>Thành tiền</th>
								</tr>
							  </thead>
							  <tbody>
							  	@foreach($products as $cartItem)
								<tr>
								  <td style="vertical-align: top;">
									<div class="item">
									  <p><a href="/shop/p/{{ $cartItem->slug }}">{{ $cartItem->name }}</a></p>
									</div>
								  </td>
								  <td style="vertical-align: top; width: 100px; ">{{ number_format($cartItem->discount_price > 0 ? $cartItem->discount_price : $cartItem->price, 0) }}{{ Config::get('settings.currency') }}</td>
								  <td style="vertical-align: top; width: 90px;">{{ $cartItem->qty }}</td>
								  <td style="vertical-align: top;">{{ number_format($cartItem->subtotal, 0) }}{{ Config::get('settings.currency') }}</td>
								</tr>
								@endforeach
							  </tbody>
							</table>
							<div align="right">
							  <p><strong>Tổng tiền: <span class="text-color">{{ number_format($order->total, 0); }}{{ Config::get('settings.currency') }}</span></strong></p>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-xs-4" align="right">
								<img src="/assets/img/logo-footer.png">
							</div>
							<div class="col-xs-8" align="left">
								<h5 style="font-weight: bold;">Thông tin của hàng</h5>
								<div class="row" style="font-size:12px;">
									<div class="col-xs-2" style="padding: 0"><strong>Địa chỉ:</strong></div>
									<div class="col-xs-10">
										- Số 52 ngõ Núi Trúc, Hà Nội<br>
										- Số 3 ngách 51 ngõ Hoàng An A, Lê Duẩn, Hà Nội
									</div>
								</div>
								<hr style="margin: 5px 0">
								<div class="row" style="font-size:12px;">
									<div class="col-xs-2" style="padding: 0"><strong>Điện thoại:</strong></div>
									<div class="col-xs-10">
										098.66.77.911
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</body>
</html>