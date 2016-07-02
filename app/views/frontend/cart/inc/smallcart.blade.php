<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/assets/img/basket.png"> {{ Cart::count() }} sản phẩm - {{ number_format(Cart::total(), 0); }} {{ Config::get('settings.currency') }}</a>
<div class="dropdown-menu">
	@if(Cart::count() <= 0)
		<div>Chưa có sản phẩm</div>
	@else
	<div class="small-cart">
		@foreach(Cart::content() as $cartItem)
			<div class="row small-cart-item">
				<div class="col-xs-7" style="padding-left: 0">
					<img src="{{ asset($cartItem->options->mpath . '/100x100_crop/'. $cartItem->options->mname) }}" width="40" class="thumbnail" style="float: left; margin-right: 8px; margin-bottom: 0px;">
					{{ $cartItem->name }}
				</div>
				<div class="col-xs-2">x{{ $cartItem->qty }}</div>
				<div class="col-xs-3">{{ number_format($cartItem->subtotal, 0) }}{{ Config::get('settings.currency') }}</div>
			</div>
		@endforeach
	</div>
	<div style="padding: 15px;" align="right">
		<a href="/shop/cart" class="btn btn-xs btn-color" style="padding: 5px 10px">Xem giỏ hàng</a>
	</div>
	@endif
</div>