@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ $post->title }} ::
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')

@parent
@stop

{{-- Update the Meta Description --}}
@section('meta_description')

@parent
@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')

@parent
@stop

{{-- Page content --}}
@section('content')
<div>
	<ol class="breadcrumb hidden-xs">
		<li><a href="/"><i class="fa fa-home"></i></a></li>
		<li class="active"><a href="/news">Tin tức cẩm nang</a></li>
	  	<li class="active"><a href="{{ route('view-category', $category->slug) }}">{{ $category->name }}</a></li>
	</ol>
</div>
<div>
	<div class="row">
		<div class="colu main-content col-md-8">
			<div class="box-info">
				<div class="well">
					<div class="news-content">
						<h2>{{ $post->title }}</h2>
						<div class="row news-content-info">
							<div class="colu col-md-7">
								<i class="glyphicon glyphicon-calendar"></i> {{ $post->publish_date }}
							</div>
							<div class="colu col-md-5" align="right">
								<div class="social">
									<a class="ico-fb ico" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $post->url() }}"></a>
									<a target="_blank" href="https://plus.google.com/share?url={{ $post->url() }}" class="ico-google ico"></a>
									<a href="http://embed2.linkhay.com/actions/link/post/embed.php?source_url={{ $post->url() }}" target="_blank" class="ico-linkhay ico"></a>
								</div>
							</div>
						</div>
						<div style="overflow: hidden">
							<div>
								<div class="news-body">
									<p class="news-content-excerpt"><strong>{{ $post->excerpt }}</strong></p>
									<p>{{ $post->content }}</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="news-tags">
					<strong>Tags:</strong> 
						@foreach( $post_tags as $tag )
							<a class="tags_link" href="{{ URL::to('tags/'.$tag->slug) }}">{{ $tag->name }}</a> 
						@endforeach
				</div>
			</div>
			<h3>Phản hồi</h3>
			<div class="fb-comments" data-href="{{ $post->url() }}" data-numposts="10" data-width="637"></div>
			<hr />
		</div>
		<div class="col-right colu col-md-4">
			<ul class="nav nav-pills nav-stacked">
				@foreach($categories as $cat)
			  		<li {{ $category->slug==$cat->slug ? 'class="active"' : '' }}><a href="/{{ $cat->slug }}">{{ $cat->name }}</a></li>
				@endforeach
		    </ul>
			<div class="box-info hidden-xs">
				<div class="well" style="padding: 5px;">
					<div class="shared-social-text" style="padding-top: 15px;">Chia sẻ bài viết này:</div>
					<div class="shared_social clearfix">
						<ul>
							<li>
								<a target="_blank" href="mailto:?subject=Bài viết này khá hay và hữu ích&amp;body=Hi%2c%0d%0a%0a{{ $post->url() }}">
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
								<div class="fb-like" data-href="{{ $post->url() }}" data-width="100" data-height="" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="false" data-send="false"></div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="box-info hidden-xs">
				<div class="well" style="padding: 5px;">
					<div class="fb-like-box" data-href="{{ Config::get('app.socialapp.facebook.url') }}" data-width="285" data-height="184" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
				</div>
			</div>
			<div>
				<h3 class="headline text-color">
				  <span class="border-color">Có thể bạn thích</span>
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
@stop
