@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ $category->name }} | {{ $meta_title }} ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<div id="primary" class="inner group" />
	<div class="layout-sidebar-left group">
		<div id="container">
			<div id="content" role="main">
				<div id="breadcrumb">
                    <a class="home" href="{{route('home')}}">Home</a>  &rsaquo;
                    @if($category->type_id == 1)
                        <a href="#">Vật liệu xây dựng</a>  &rsaquo;
                    @else
                        <a href="#">Đồ nội thất</a>  &rsaquo;
                    @endif

                    @if($category->parent_id != 0)
                        <a href="{{ route('shop-category', $parent_category->slug) }}">{{ $parent_category->name }}</a>  &rsaquo;
                    @endif
                    <a href="{{ route('shop-category', $parent_category->slug) }}">{{ $category->name }}</a></div>
				<h1 class="page-title">{{ $category->name }}</h1>
				<h2></h2>
				<ul class="products">
					<li class="product border shadow first">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/001.png" class="attachment-shop_small wp-post-image" alt="001" title="001" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Elegant Glasses</strong>
							</div>
							<span class="price">&#36;250.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
					<li class="product border shadow">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/interior-150x150.jpg" class="attachment-shop_small wp-post-image" alt="interior" title="interior" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Interior Black</strong>
							</div>
							<span class="price">&#36;60,000.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
					<li class="product border shadow">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/001b-150x150.jpg" class="attachment-shop_small wp-post-image" alt="001b" title="001b" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">PINK BATHROOM</strong>
							</div>
							<span class="price">&#36;450.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
					<li class="product border shadow last">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/wood-150x150.jpg" class="attachment-shop_small wp-post-image" alt="wood" title="wood" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Wood design</strong>
							</div>
							<span class="price"><del>&#36;340.00</del> <ins>&#36;340.00</ins></span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
					<li class="product border shadow first">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/warmroom-150x150.jpg" class="attachment-shop_small wp-post-image" alt="warmroom" title="warmroom" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Hot Room</strong>
							</div>
							<span class="price">&#36;730.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
					<li class="product border shadow">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/Fotolia_19668952_Subscription_XL-150x150.jpg" class="attachment-shop_small wp-post-image" alt="Fotolia_19668952_Subscription_XL" title="Fotolia_19668952_Subscription_XL" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Nice pillows</strong>
							</div>
							<span class="price"><del>&#36;420.00</del> <ins>&#36;380.00</ins></span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
					<li class="product border shadow">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/originalparquet_001_big-150x150.jpg" class="attachment-shop_small wp-post-image" alt="originalparquet_001_big" title="originalparquet_001_big" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Gold mahibo</strong>
							</div>
							<span class="price"><del>&#36;1,000.00</del> <ins>&#36;450.00</ins></span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
					<li class="product border shadow last">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/wood5-150x150.jpg" class="attachment-shop_small wp-post-image" alt="wood" title="wood" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Wood Flor</strong>
							</div>
							<span class="price">&#36;650.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
					<li class="product border shadow first last-row">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/kitchen-150x150.jpg" class="attachment-shop_small wp-post-image" alt="kitchen" title="kitchen" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Dark Kitchen</strong>
							</div>
							<span class="price">&#36;940.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
					<li class="product border shadow last-row">
						<a href="product_single.html">
							<div class="thumbnail">
								<img width="150" height="150" src="images/common/ktichen21-150x150.jpg" class="attachment-shop_small wp-post-image" alt="ktichen2" title="ktichen2" />
								<div class="thumb-shadow"></div>
								<strong class="below-thumb">Wood Kitchen</strong>
							</div>
							<span class="price">&#36;367.00</span>
						</a>
						<div class="buttons">
							<a href="product_single.html" class="details">DETAILS</a>&nbsp;<a href="#" class="add-to-cart">ADD TO CART</a>
						</div>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<div id="sidebar" class="shop group">
			<div id="product_categories-3" class="widget-1 widget-first widget widget_product_categories">
				<h3>Categories</h3>
				<ul>
					<li class="cat-item cat-item-22">
						<a href="#" title="View all posts filed under Brand">Brand</a>
						<ul class="children">
							<li class="cat-item cat-item-28"><a href="#" title="View all posts filed under Wallmart">Wallmart</a></li>
							<li class="cat-item cat-item-26"><a href="#" title="View all posts filed under Ikea">Ikea</a></li>
							<li class="cat-item cat-item-25"><a href="#" title="View all posts filed under Pathio">Pathio</a></li>
							<li class="cat-item cat-item-24"><a href="#" title="View all posts filed under Furnishop">Furnishop</a></li>
							<li class="cat-item cat-item-23"><a href="#" title="View all posts filed under Brand name">Brand name</a></li>
						</ul>
					</li>
					<li class="cat-item cat-item-18">
						<a href="#" title="View all posts filed under Categories">Categories</a>
						<ul class="children">
							<li class="cat-item cat-item-34"><a href="#" title="View all posts filed under Wood">Wood</a></li>
							<li class="cat-item cat-item-33"><a href="#" title="View all posts filed under Bathroom">Bathroom</a></li>
							<li class="cat-item cat-item-21"><a href="#" title="View all posts filed under Kitchen">Kitchen</a></li>
							<li class="cat-item cat-item-20"><a href="#" title="View all posts filed under Bedroom">Bedroom</a></li>
							<li class="cat-item cat-item-19"><a href="#" title="View all posts filed under Garden">Garden</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="text-image-3" class="widget-2 widget-last widget text-image">
				<div class="text-image" style="text-align:left"><img src="images/free.jpg" alt="" /></div>
			</div>
		</div>
	</div>
	<!-- END PRIMARY SECTION -->

	<!-- START NEWSLETTER FORM -->
	<div id="newsletter-form" class="group">
		<div class="inner">
			<div class="newsletter-section group">
				<p class="description special-font"><strong>Stay Updated:</strong> subscribe our special newsletter</p>
				<form method="post" action="#">
					<fieldset>
						<ul class="group">
							<li><label for="fullname">Your name</label><input type="text" name="fullname" id="fullname" class="name-field text-field autoclear" /></li>
							<li><label for="email">Your email</label><input type="text" name="email" id="email" class="email-field text-field autoclear" /></li>
							<li><input type="submit" value="Subscribe" class="submit-field" /></li>
						</ul>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<!-- ENDSTART NEWSLETTER FORM -->
@stop