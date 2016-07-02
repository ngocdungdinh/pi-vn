<!-- <div class="bs-sidebar affix" data-spy="affix" data-offset-top="80" data-offset-bottom="365"> -->
<div>
<div class="categories-box">
	<div style="margin-top: 12px">
		<div class="ctitle">
			<span>DANH MỤC SẢN PHẨM</span>
			<span class="cshadown"></span>
		</div>
	</div>
	<ul class="nav nav-pills nav-stacked catelist">
		@foreach($product_categories as $pcat)
			@if($pcat->parent_id == 0)
			<li>
				<a {{ isset($parent_category) && $parent_category->slug == $pcat->slug ? 'class="active"' : '' }} href="{{ route('shop-category', $pcat->slug) }}">{{ $pcat->name }}</a>
				<ul class="nav nav-pills nav-stacked subcatelist">
					@foreach($product_categories as $spcat)
						@if($spcat->parent_id == $pcat->id)
							<li>
								<a {{ isset($category) && $category->slug == $spcat->slug ? 'class="active"' : '' }} href="{{ route('shop-category', $spcat->slug) }}">{{ $spcat->name }}</a>
							</li>
						@endif
					@endforeach
				</ul>
			</li>
			@endif
		@endforeach
	</ul>
</div>
<div class="categories-box hidden-xs">
	<div style="margin-top: 12px">
		<div class="ctitle">
			<span>THƯƠNG HIỆU</span>
			<span class="cshadown"></span>
		</div>
	</div>
	<ul class="nav nav-pills nav-stacked catelist">
		@foreach($manufacturers as $man)
			<li>
				<a href="/shop/search?thuong-hieu[]={{$man->id}}">{{ $man->name }}</a>
			</li>
		@endforeach
	</ul>
</div>
<div class="categories-box hidden-xs">
	<div style="margin-top: 12px">
		<div class="ctitle">
			<span>SAMMISHOP</span>
			<span class="cshadown"></span>
		</div>
	</div>
	<div class="well">
		<strong>Cửa hàng:</strong><br />
		số 52 ngõ Núi Trúc ( ngõ cạnh số 59 ) phố Núi Trúc<br />
		<br />
		<strong>Điện thoại mua lẻ:</strong> 094.567.7911 / 04.62732145 <br />( có thể gọi hoặc nhắn tin từ 9h-21h ) <br /><br />
		<strong>Điện thoại mua sỉ:</strong> 098.6677.911<br /><br />
		<strong>Email:</strong><br />
		sammi.shop86@gmail.com<br />
	</div>
	<div class="well" style="padding: 10px; overflow: hidden">
		<div class="fb-like-box" data-href="{{ Config::get('app.socialapp.facebook.url') }}" data-width="206" data-height="184" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
	</div>
</div>
</div>