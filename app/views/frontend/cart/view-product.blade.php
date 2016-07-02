@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ $product->name }} | {{ $category->name }} ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div>
	<ol class="breadcrumb hidden-xs">
		<li><a href="/"><i class="fa fa-home"></i></a></li>
		@if($category->parent_id != 0)
			<li><a href="{{ route('shop-category', $parent_category->slug) }}">{{ $parent_category->name }}</a></li>
		@endif
		<li class="active"><a href="{{ route('shop-category', $category->slug) }}">{{ $category->name }}</a></li>
		<li class="active">{{ $product->name }}</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-3 nopl">
		<div>
			@include('frontend/cart/inc/sidebar')
		</div>
	</div>
	<div class="col-md-9 nop">
		<div class="shop-item" style="border-bottom: 1px solid #eeeeee; margin-bottom: 40px; padding-bottom: 20px;">
			<div class="row">
				<div class="col-md-7">
					<div class="product-img" style="overflow: hidden">
						<a href="{{ asset($product->mpath . '/'. $product->mname) }}" id="zoom01" class="cloud-zoom" rel="position:'inside', adjustX:20, adjustY:-3, tint:'#FFFFFF', softFocus:1, smoothMove:5, tintOpacity:0.8" onclick="return hs.expand(this)"><img src="{{ asset($product->mpath . '/550x500/'. $product->mname) }}" width="100%" /></a>
					</div>
					<div class="row" style="padding: 4px 0">
						<div class="col-md-6" align="left">
							<div class="itemPicZoom">
                                <div class="itemPicZoomText">
                                <span class="glyphicon glyphicon-zoom-in"></span>
                                	Di chuột vào ảnh để phóng to
                                </div>
                            </div>
						</div>
						<div class="col-md-6" align="right">
							<div class="itemPicDownload">
								<a target="_blank" id="ctl00_ContentRegion_megaImageDownloadOriginalLink" href="{{ asset($product->mpath . '/'. $product->mname) }}">Xem ảnh gốc</a>
							</div>
						</div>
					</div>
					<div style="padding: 0 10px 15px 10px;">
						<div class="row">
							@foreach($product_medias as $m)
						    <div id="productImg{{ $m->id }}" class="col-xs-3 product-medias">
							  <a href="{{ asset($m->mpath .'/'. $m->mname ) }}" rel="useZoom: 'zoom01', smallImage: '{{ asset($m->mpath .'/550x500/'. $m->mname ) }}'" class="cloud-zoom-gallery highslide">
							    <img style="cursor: pointer" src="{{ asset($m->mpath .'/100x100_crop/'. $m->mname ) }}" width="100%" />
							  </a>
						    </div>
						    @endforeach
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<h3 class="product-title first-child">{{ $product->name }}</h3>
					@for ($i=1; $i <= 5 ; $i++)	                     
					  <span class="glyphicon glyphicon-star{{ ($i <= $product->review_cache) ? '' : '-empty'}}"></span>
                    @endfor
                    {{ number_format($product->review_cache, 1);}} stars
					<span class="text-muted reviews"><a href="#reviews-anchor" id="open-review-box">({{$product->review_count}} nhận xét)</a></span>
					<hr style="margin: 5px 0" />
					<p class="text-muted product-excerpt">
					  {{ $product->excerpt }}
					</p>
					<form class="form-horizontal" role="form">
						@foreach($attributes as $attr)
							@if($attr->parent_id == 0)
							  <div class="form-group">
							    <label class="col-xs-5 control-label">{{ $attr->name }}</label>
							    <div class="col-xs-7">
							      <p class="form-control-static product-attributes">
						  			@foreach($attributes as $subattr)
						  				@if($subattr->parent_id == $attr->id)
						  					@if(in_array($subattr->id, $attrIds))
						  						<a href="/shop/search?{{ $attr->slug }}[]={{$subattr->id}}">{{ $subattr->name }}</a>
						  					@endif
						  				@endif
						  			@endforeach
							      </p>
							    </div>
							  </div>
							@endif
						@endforeach
					</form>
					<hr style="margin: 10px 0" />
					<div style="text-align: center">
						<div class="price-block">
						  <span class="price">
						  	@if($product->discount_price)
								<span class="new">{{ number_format($product->discount_price, 0) }} {{ Config::get('settings.currency') }}</span>
								<span class="old">{{ number_format($product->price, 0) }}</span>
							@else
								<span class="new">{{ number_format($product->price, 0) }} {{ Config::get('settings.currency') }}</span>
							@endif
						  </span>
						  <input type="number" name="qty" id="qty" value="1" class="form-control">
						</div>
						<div class="discount-text">
							@if($product->discount_price)
								Giảm <strong>{{ 100-round(($product->discount_price*100)/$product->price) }} %</strong> - tiết kiệm <strong>{{ number_format($product->price - $product->discount_price, 0)}} {{ Config::get('settings.currency') }}</strong>
							@endif
						</div>
						<a class="btn btn-color add-to-basket" href="javascript:void(0)" data-pro-id="{{ $product->id }}" data-qty="1"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
					</div>
				</div>
			</div>
			<div class="row">
			  <div class="col-sm-8">
				<h3 class="headline text-color">
				  <span class="border-color">Thông tin sản phẩm</span>
				</h3>
				<div class="product-info-body">
				  {{ $product->content }}
				  <div>
					<div class="shared_social clearfix">
						<ul>
							<li>
								<a target="_blank" href="mailto:?subject=Bài viết này khá hay và hữu ích&amp;body=Hi%2c%0d%0a%0a{{ $product->url() }}">
				                    <img src="/assets/img/social/share-email.gif">
				                </a>
							</li>
							<li class="plusone">
								<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
								<div class="g-plusone" data-size="medium"></div>
								<!-- Đặt thẻ này sau thẻ Nút +1 cuối cùng. -->
								<script type="text/javascript">
								  window.___gcfg = {lang: 'vi'};

								  (function() {
								    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
								    po.src = 'https://apis.google.com/js/plusone.js';
								    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
								  })();
								</script>
							</li>
							<li class="facebook">
								<div class="fb-like" data-href="{{ $product->url() }}" data-width="100" data-height="" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="false" data-send="false"></div>
							</li>
						</ul>
					</div>
				  </div>
				</div>
				<hr />
				<div>
		            <div class="well" id="reviews-anchor">
					  <h3 class="headline text-color" style="margin-top: 0">
					    <span class="border-color">Nhận xét sản phẩm</span>
					  </h3>
		              <div class="row">
		                <div class="col-md-12">
		                  @if(Session::get('errors'))
		                    <div class="alert alert-danger">
		                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                       <h5>Có lỗi xảy ra:</h5>
		                       @foreach($errors->all('<li>:message</li>') as $message)
		                          {{$message}}
		                       @endforeach
		                    </div>
		                  @endif
		                  @if(Session::has('review_posted'))
		                    <div class="alert alert-success">
		                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                      <h5>Gửi nhận xét thành công!</h5>
		                    </div>
		                  @endif
		                  @if(Session::has('review_removed'))
		                    <div class="alert alert-success">
		                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                      <h5>Nhận xét của bạn đã bị xóa!</h5>
		                    </div>
		                  @endif
		                </div>
		              </div>
		              <div class="row" id="post-review-box" style="display:block;">
		                <div class="col-md-12">
		                  {{Form::open(array('method'=>'post', 'url'=>'/shop/postreview/'.$product->slug))}}
		                  {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
		                  <div class="stars starrr" data-rating="{{Input::old('rating',0)}}"></div>
		                  <p>
		                  	{{Form::textarea('comment', null, array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','placeholder'=>'Viết nhận xét cho sản phẩm này...'))}}
		                  </p>
		                  <div align="right">
		                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Hủy</a>
		                    <button class="btn btn-success btn-red" type="submit">Gửi</button>
		                  </div>
		                {{Form::close()}}
		                </div>
		              </div>
		              <hr style="margin:6px 0" />
		              @if($reviews->count())
			              @foreach($reviews as $review)
			              <hr>
			                <div class="row">
			                  <div class="col-md-12">
			                    @for ($i=1; $i <= 5 ; $i++)
			                      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
			                    @endfor

			                    {{ $review->user ? $review->user->first_name.' '.$review->user->last_name : 'Khách'}} <span class="pull-right">{{$review->timeago}}</span> 
			                    
			                    <p>{{{$review->comment}}}</p>
			                  </div>
			                </div>
			              @endforeach
			              {{ $reviews->links(); }}
			            @else
			            <p>Chưa có nhận xét nào!</p>
			            @endif
		            </div>
		            <div>
						<h3 class="headline text-color" style="margin-top: 0">
							<span class="border-color">Bình luận</span>
						</h3>
		           		<div class="fb-comments" data-href="{{ $product->url() }}" data-numposts="10" data-width="470"></div>
		            </div>
				</div>
			  </div>
			  <div class="col-sm-4 hidden-xs">
				<h3 class="headline text-color">
				  <span class="border-color">Sản phẩm liên quan</span>
				</h3>
				<div>
					<ul class="blog-p-popular">
						@foreach($product_related as $product)
						  <li style="overflow: hidden">
						  	<a href="/shop/p/{{ $product->slug }}">
						  		<img class="pull-right thumbnail" style="float: right; margin-left: 7px;" src="{{ asset($product->mpath . '/100x100_crop/'. $product->mname) }}" width="">
						  		{{$product->name}}<br />
								@if(isset($product->discount_price) && $product->discount_price)
									<span class="label label-info">{{ number_format($product->discount_price, 0) }}</span>
								@elseif(isset($product->price) && $product->price)
									<span class="label label-info">{{ number_format($product->price, 0) }}</span>
								@endif
						  	</a>
						  </li>
						@endforeach
					</ul>
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('assets/js/highslide-full.min.js') }}"></script>
<script src="{{ asset('assets/js/cloud-zoom.1.0.3.js') }}"></script>
<script type="text/javascript">
	$('#zoom01, .cloud-zoom-gallery').CloudZoom();

	hs.graphicsDir = '/assets/img/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.fadeInOut = true;
	hs.dimmingOpacity = 0.8;
	hs.outlineType = 'rounded-white';
	hs.captionEval = 'this.thumb.alt';
	hs.marginBottom = 105; // make room for the thumbstrip and the controls
	hs.numberPosition = 'caption';

	// Add the slideshow providing the controlbar and the thumbstrip
	hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 5000,
		repeat: false,
		useControls: true,
		overlayOptions: {
			className: 'text-controls',
			position: 'bottom center',
			relativeTo: 'viewport',
			offsetY: -60
		},
		thumbstrip: {
			position: 'bottom center',
			mode: 'horizontal',
			relativeTo: 'viewport'
		}
	});
</script>
@stop