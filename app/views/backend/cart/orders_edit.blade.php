@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Sửa hóa đơn ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-th-large"></span> Sửa hóa đơn số #{{ $order->id }}  ({{ $order->code ? $order->code : strtoupper(uniqid()) }})
    </h3>
  	<form method="post" action="" autocomplete="off" class="form-horizontal" role="form">
  		<input type="hidden" name="code" value="{{ $order->code ? $order->code : strtoupper(uniqid()) }}" />
		<div class="row">
			<div class="col-md-6">
			  	<h4 class="headline first-child text-color">
					<span class="border-color">Thông tin người mua</span>
				</h4>
				<div>
					<p>
						<strong>Họ tên: </strong>
						@if($order->user_id)
							<a href="">{{$order->full_name}}</a>
						@else
							{{$order->full_name}} (khách)
						@endif
					</p>
					<p><strong>Email:</strong> <br />{{ $order->email }}</p>
					<p><strong>Địa chỉ:</strong> <br />
					<textarea class="form-control" name="hometown" required>{{ $order->address }}</textarea></p>
					<p><strong>Điện thoại:</strong> <br />{{ $order->phone }}</p>
					<hr />
					<p><strong>Thanh toán:</strong> {{ $payment_gateways[$order->payment_gateway]['name'] }}</p>
					<p><strong>Vận chuyển:</strong> {{ $shipping_method[$order->shipping_method]['name'] }}</p>
				</div>
			</div>
			<div class="col-md-6">
			  	<h4 class="headline first-child text-color">
					<span class="border-color">Tình trạng hóa đơn</span>
				</h4>
					<p>Ngày tạo: {{ date("H:i - d/m/Y",strtotime($order->created_at)) }}</p>
					<strong>Ghi chú của khách hàng</strong>
					<blockquote style="font-size: 13px">
					  <p><textarea name="customer_note" class="form-control">{{ $order->customer_note }}</textarea></p>
					</blockquote>
					<strong>Ghi chú của quản trị</strong>
					<blockquote style="font-size: 13px">
					  <p><textarea name="admin_note" class="form-control" placeholder="Thêm ghi chú về hiện trạng của hóa đơn">{{ $order->admin_note }}</textarea></p>
					</blockquote>
					<blockquote style="font-size: 13px">
						<p style="overflow: hidden">
							<select name="status" class="form-control pull-left" style="width: 140px; margin-right: 8px;">
								<option value="new" {{ $order->status=='new' ? 'selected="selected"' : '' }}>Đợi giao dịch</option>
								<option value="processing" {{ $order->status=='processing' ? 'selected="selected"' : '' }}>Đang xử lý</option>
								<option value="completed" {{ $order->status=='completed' ? 'selected="selected"' : '' }}>Hoàn tất</option>
								<option value="invoice" {{ $order->status=='invoice' ? 'selected="selected"' : '' }}>Ghi nợ</option>
							</select>
							<input type="submit" class="btn btn-success pull-left" name="submit" value="Cập nhật" />
						</p>
					</blockquote>
			</div>
		</div>
	  	<h4 class="headline first-child text-color">
			<span class="border-color">Sản phẩm đặt mua</span>
		</h4>
		<div>
			<form action="" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
						  <input type="hidden" name="pid[]" value="{{ $cartItem->id }}" />

						  <p><a href="/shop/p/{{ $cartItem->slug }}">{{ $cartItem->name }}</a></p>
						  <img src="{{ asset($cartItem->mpath . '/100x100_crop/'. $cartItem->mname) }}" style="width: 100px;" class="thumbnail">
						</div>
					  </td>
					  <td style="vertical-align: top;">{{ number_format($cartItem->discount_price > 0 ? $cartItem->discount_price : $cartItem->price, 0) }} {{ Config::get('settings.currency') }}</td>
					  <td style="vertical-align: top; width: 70px;"><input type="number" name="qty[]" value="{{ $cartItem->qty }}" class="form-control show-popover" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Chọn 0 để xóa khỏi giỏ hàng" data-original-title="Số lượng" min="0"></td>
					  <td style="vertical-align: top;">{{ number_format($cartItem->subtotal, 0) }}₫</td>
					</tr>
					@endforeach
				  </tbody>
				</table>
				<div align="right">
				  <p><strong>Tổng tiền: <span class="text-color">{{ number_format($order->total, 0); }} {{ Config::get('settings.currency') }}</span></strong></p>
				  <p><button type="submit" class="btn btn-default">Cập nhật số lượng</button></p>
				</div>
			</form>
		</div>
  	</form>
@stop