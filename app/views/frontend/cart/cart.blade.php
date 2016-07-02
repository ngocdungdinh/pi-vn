@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Giỏ hàng - thực hiện thanh toán ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div>
	<ol class="breadcrumb hidden-xs">
		<li><a href="/"><i class="fa fa-home"></i></a></li>
		<li class="active">Giỏ hàng</li>
	</ol>
</div>
<div class="">
	<div class="row">
	  <div class="col-sm-6 shopping-cart">
	  	<h3 class="headline first-child text-color">
			<span class="border-color">Sản phẩm đặt mua</span>
		</h3>
		<div>
			<form action="" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<table class="table table-bordered table-striped">
				  <thead>
				    <tr>
					  <th>{{ Cart::count() }} sản phẩm</th>
					  <th>Giá</th>
					  <th>Số lượng</th>
					  <th>Thành tiền</th>
					</tr>
				  </thead>
				  <tbody>
				  	@foreach(Cart::content() as $cartItem)
					<tr>
					  <td style="vertical-align: top;">
						<div class="item">
						  <input type="hidden" name="pid[]" value="{{ $cartItem->id }}" />

						  <p><a href="/shop/p/{{ $cartItem->options->slug }}">{{ $cartItem->name }}</a></p>
						  <img src="{{ asset($cartItem->options->mpath . '/100x100_crop/'. $cartItem->options->mname) }}" style="width: 100px;" class="thumbnail">
						</div>
					  </td>
					  <td style="vertical-align: top;">{{ number_format($cartItem->discount_price > 0 ? $cartItem->discount_price : $cartItem->price, 0) }}{{ Config::get('settings.currency') }}</td>
					  <td style="vertical-align: top;"><input type="number" name="qty[]" value="{{ $cartItem->qty }}" class="form-control show-popover" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Chọn 0 để xóa khỏi giỏ hàng" data-original-title="Số lượng" min="0"></td>
					  <td style="vertical-align: top;">{{ number_format($cartItem->subtotal, 0) }}{{ Config::get('settings.currency') }}</td>
					</tr>
					@endforeach
				  </tbody>
				</table>
				<ul class="text-right checkout">
				  <li><strong>Tổng tiền: <span class="text-color">{{ number_format(Cart::total(), 0); }}{{ Config::get('settings.currency') }}</span></strong></li>
				  <li style="font-size: 11px;"><strong>Giao hàng</strong>: Miễn phí trong nội thành Hà Nội, giảm 5% khi giao hàng ngoại thành Hà Nội</li>
				  <li><button type="submit" class="btn btn-default">Cập nhật số lượng</button></li>
				</ul>
			</form>
		</div>
	  </div>
	  <div class="col-sm-6">
	  	<h3 class="headline first-child text-color">
			<span class="border-color">Giao dịch</span>
		</h3>
		@if(Cart::count() > 0)
			@if (Sentry::check())
				<div class="info-board info-board-orange">
					<h4>Chào {{ $u->first_name }}</h4>
					@if(empty($u->phone) || empty($u->hometown))
					<div>
						Bạn cần nhập thêm các thông tin bắt buộc dưới đây
					</div>
					@endif
				</div>
			@else
				<div class="info-board info-board-orange">
					<h4>Thành viên VIP</h4>
					<p>Tích điểm mua hàng, nhận nhiều khuyến mãi</p>
					<p align="center">
					  <a id="fb-connect" class="btn btn-default btn-facebook" rel="0" href="{{ URL::to('oauth/session/facebook') }}" class="popup_oauth"><i class="fa fa-facebook"></i> Đăng nhập bằng Facebook</a>
					</p>
					<p align="center">
					  <a data-toggle="modal" href="#modal_loginBox" href="{{ route('signin') }}" class="btn btn-default"><i class="fa fa-sign-in"></i> Đăng nhập</a>
					  <a data-toggle="modal" href="#modal_signupBox" href="{{ route('signup') }}" class="btn btn-default"><i class="fa fa-arrow-circle-down"></i> Đăng kí</a>
					</p>
				</div>
				- hoặc -
			@endif
			<div class="info-board info-board-green">
				<form action="/shop/checkout" method="post" class="form-horizontal" role="form" id="formCheckout" name="formCheckout">
				  <!-- CSRF Token -->
				  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
				  <h3 style="margin-top: 0px;">Thông tin người mua @if (Sentry::check()) <a href="{{ URL::route('profile') }}" class="pull-right">sửa</a> @endif</h3>
				  <hr style="margin: 4px 0 10px 0" />
				  @if (!Sentry::check())
					  <div class="form-group">
					    <label for="full_name" class="col-xs-3 control-label">* Họ tên</label>
					    <div class="col-xs-9">
					      <input type="text" class="form-control" name="full_name" id="full_name" placeholder="bắt buộc" required value="{{ Input::old('full_name') }}">
						  {{ $errors->first('full_name', '<span class="help-block">:message</span>') }}
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="email" class="col-xs-3 control-label">* Email</label>
					    <div class="col-xs-9">
					      <input type="text" class="form-control" name="email" id="email" placeholder="bắt buộc" required  value="{{ Input::old('email') }}">
						  {{ $errors->first('email', '<span class="help-block">:message</span>') }}
					    </div>
					  </div>
				  @else
					  <div class="form-group">
					    <label for="full_name" class="col-xs-3 control-label">Họ tên</label>
					    <div class="col-xs-9">
					      <div style="padding-top: 8px;">{{ $u->first_name }} {{ $u->last_name }}</div>
					    </div>
					  </div>
					  <input type="hidden" name="email" value="{{ $u->email }}">
					  <input type="hidden" name="full_name" value="{{ $u->first_name }} {{ $u->last_name }}">
				  @endif
				  <div class="form-group">
				    <label for="phone" class="col-xs-3 control-label">* Điện thoại</label>
				    <div class="col-xs-9">
			  			@if((!is_null($u) && empty($u->phone)) || is_null($u))
				      		<input type="text" class="form-control show-popover" name="phone" id="phone"  value="{{ Input::old('phone') }}" placeholder="bắt buộc" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Chúng tôi sẽ liên hệ với bạn qua số điện thoại này để giao dịch." data-original-title="Số điện thoại" required>
						  	{{ $errors->first('phone', '<span class="help-block">:message</span>') }}
				      	@else
				      		<div style="padding-top: 8px;">{{ $u->phone }}</div>
					 		<input type="hidden" name="phone" value="{{ $u->phone }}">
				      	@endif
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="email" class="col-xs-3 control-label">Địa chỉ</label>
				    <div class="col-xs-9">
				    	@if((!is_null($u) && empty($u->hometown)) || is_null($u))
				      		<textarea class="form-control" name="hometown" placeholder="Nhập chính xác địa chỉ nếu bạn muốn chúng tôi chuyển hàng cho bạn." required>{{ Input::old('hometown') }}</textarea>
						  	{{ $errors->first('hometown', '<span class="help-block">:message</span>') }}
				      	@else
				      		<div style="padding-top: 8px;">{{ $u->hometown }}</div>
				      	@endif
				    </div>
				  </div>
				  <h3>Thông tin thang toán</h3>
				  <hr style="margin: 4px 0 10px 0" />
				  <div class="form-group">
				    <label for="full_name" class="col-xs-3 control-label">Thanh toán</label>
				    <div class="col-xs-9">
				    	<select class="form-control" name="payment_gateway">
				    		@foreach(Config::get('cart.payment_gateways') as $key => $pg)
				    			@if($pg['status'] == true)
				    				<option value="{{ $key }}">{{ $pg['name'] }}</option>
				    			@endif
				    		@endforeach
				    	</select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="full_name" class="col-xs-3 control-label">Vận chuyển</label>
				    <div class="col-xs-9">
				    	<select class="form-control" name="shipping_method">
				    		@foreach(Config::get('cart.shipping_method') as $key => $sm)
				    			@if($sm['status'] == true)
				    				<option value="{{ $key }}">{{ $sm['name'] }}</option>
				    			@endif
				    		@endforeach
				    	</select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="full_name" class="col-xs-3 control-label">Ngày nhận</label>
				    <div class="col-xs-9">
				      <input type="text" class="form-control" name="shipping_date" id="shipping_date" placeholder="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="full_name" class="col-xs-3 control-label">Ghi chú</label>
				    <div class="col-xs-9">
				      <textarea class="form-control" name="customer_note" style="height: 80px;" placeholder="Thêm thông tin về đơn hàng để chúng tôi thực hiện giao dịch tốt hơn.">{{ Input::old('customer_note') }}</textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-xs-offset-3 col-sm-9">
				      <button type="submit" class="btn btn-color" data-form="formCheckout" data-toggle="modal" data-target="#confirmCheckout" data-title="Gửi đơn hàng" data-message="Bạn có chắc muốn thực hiện giao dịch này ?">Gửi đơn hàng & thanh toán</button>
				    </div>
				  </div>
				</form>
			</div>
		@else
			<p>Giỏ hàng chưa có sản phẩm. Vui lòng thêm sản phẩm vào Giỏ hàng để gửi đơn hàng và thực hiện thanh toán.</p>
		@endif
	  </div>
	</div>
</div><!-- Dialog show event handler -->

@include('frontend/cart/inc/confirm')
<hr />
@stop