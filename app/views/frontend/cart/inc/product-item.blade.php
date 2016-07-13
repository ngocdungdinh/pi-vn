@if($product)
	<a href="{{ route('shop-product', $product->slug) }}">
		<div class="thumbnail">
			<img width="150" height="150" src="{{ asset($product->mpath . '/200x200_crop/'. $product->mname) }}" class="attachment-shop_small wp-post-image" />
			<div class="thumb-shadow"></div>
			<strong class="below-thumb">{{ $product->name }}</strong>
		</div>
		@if($product->price != '')
			@if($product->discount_price)
				<span class="price">{{ number_format($product->discount_price, 0) }} {{ Config::get('settings.currency') }}</span>
				<span class="price" style="text-decoration: line-through;">{{ number_format($product->price, 0) }}</span>
			@else
				<span class="price">{{ number_format($product->price, 0) }} {{ Config::get('settings.currency') }}</span>
			@endif

		@endif
	</a>
	<div class="buttons">
		<a href="{{ route('shop-product', $product->slug) }}" class="details">CHI TIẾT</a>
	</div>
@endif