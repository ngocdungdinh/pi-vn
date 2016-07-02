<div class="shop-product normal show-popover" data-toggle="popover" data-placement="top">
  <a href="{{ route('shop-product', $product->slug) }}"><img src="{{ asset($product->mpath . '/200x200_crop/'. $product->mname) }}" width="97%"></a>
  <div class="product-item-info">
	  <a href="javascript:void(0)" data-pro-id="{{ $product->id }}" data-qty="1" class="btn btn-xs btn-default pull-right add-to-basket"><i class="fa fa-shopping-cart"></i></a>
	  <!-- <p class="text-muted">
		Nunc in neque nec arcu vulputate ullamcorper.
	  </p> -->
	  <p class="price">
	  	@if($product->discount_price)
			<span class="new">{{ number_format($product->discount_price, 0) }} {{ Config::get('settings.currency') }}</span>
			<span class="old">{{ number_format($product->price, 0) }}</span>
		@else
			<span class="new">{{ number_format($product->price, 0) }} {{ Config::get('settings.currency') }}</span>
		@endif
	  <a href="{{ route('shop-product', $product->slug) }}"><h5 class="shop-item-link" style="height: 32px; overflow: hidden;">{{ $product->name }}</h5></a>
	  </p>
  </div>
  <div class="hover-content">
  	<img src="{{ asset($product->mpath . '/550x500/'. $product->mname) }}" width="100%">
  </div>
</div>