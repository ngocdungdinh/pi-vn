@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Quản lý sản phẩm ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-th-large"></span> Sản phẩm
    	@if ( Sentry::getUser()->hasAnyAccess(['cart','cart.createproduct']) )
    		<a href="{{ route('createpost/cart') }}" class="btn btn-default btn-xs">Đăng sản phẩm</a>
    	@endif
    </h3>
    <div>
	    <ul class="nav nav-tabs">
		  <li {{ $status=='' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/cart') }}">Tất cả</a></li>
		  <li {{ $status=='published' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/cart?status=published') }}">Hiển thị</a></li>
		  <li {{ $status=='draft' ? 'class="active"' : '' }}><a href="{{ URL::to('admin/cart?status=draft') }}">Ẩn</a></li>
		</ul>
    </div><br />
  	<form method="get" action="{{ route('search/cart') }}" autocomplete="off" role="form" class="form-horizontal">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
			<div class="col-lg-2 nop">
				<div>
				<input class="form-control pull-left" type="text" name="key" id="key" value="{{ Input::old('key', (isset($keyword) ? $keyword : '')) }}" placeholder="tên sản phẩm..." />
				</div>
				<div>
					<label><input type="checkbox" name="discount" value="1" {{ isset($discount) && $discount ? 'checked="checked"' : ''}}> Giảm giá</label>
				</div>
			</div>
			<div class="col-lg-3">
				<select class="form-control" name="category_id">
					<option value="0">Chuyên mục</option>
					@foreach($categories as $category)
						@if($category->parent_id == 0)
							<option value="{{ $category->id }}" {{ (isset($category_id) && $category->id == $category_id) ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
							@foreach ($category->subscategories as $subcate)
								<option value="{{ $subcate->id }}" {{ (isset($category_id) && $subcate->id == $category_id) ? 'selected="selected"' : '' }}> - {{ $subcate->name }}</option>
							@endforeach
						@endif
					@endforeach
				</select>
			</div>
			<div class="col-lg-2 nop">
				<input class="form-control pull-left" type="text" name="price_from" id="price_from" value="{{ Input::old('price_from', (isset($price_from) ? $price_from : '')) }}" placeholder="từ giá" />
			</div>
			<div class="col-lg-2 nopr">
				<input class="form-control pull-left" type="text" name="price_to" id="price_to" value="{{ Input::old('price_to', (isset($price_to) ? $price_to : '')) }}" placeholder="đến giá" />
			</div>
			<div class="col-lg-2 nopr">
				<select name="stock_status" id="stock_status" class="form-control">
					<option value="in_stock" {{ $stock_status=='in_stock' ? 'selected="selected"' : '' }}>Còn hàng</option>
					<option value="out_of_stock" {{ $stock_status=='out_of_stock' ? 'selected="selected"' : '' }}>Hết hàng</option>
					<option value="pre_order" {{ $stock_status=='pre_order' ? 'selected="selected"' : '' }}>Đặt hàng trước</option>
				</select>
			</div>
			<div class="col-lg-1">
				<input type="submit" class="btn btn-default btn-info" name="search" value="Tìm" />
			</div>
		</div>
  	</form>
	<table class="table table-hover">
		<thead>
			<tr>
				<th width="110"></th>
				<th class="span6">@lang('admin/news/table.title')</th>
				<th class="span2">Chuyên mục</th>
				<th width="80">Phản hồi</th>
				<th width="150">Ngày</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
			<tr>
				<td>
					@if ( $product->mname )
						@if ( Sentry::getUser()->hasAnyAccess(['cart','cart.editproduct']) )
							<a href="{{ route('updatepost/cart', $product->id) }}"><img src="{{ asset($product->mpath . '/100x100_crop/'. $product->mname) }}" width=""></a>
						@else
							<img src="{{ asset($product->mpath . '/100x100_crop/'. $product->mname) }}" width="">
						@endif
						<span class="label label-default">Sku: {{ $product->sku }}</span>
					@endif
				</td>
				<td>
					@if ( Sentry::getUser()->hasAnyAccess(['cart','cart.editproduct']) )
						<a href="{{ route('updatepost/cart', $product->id) }}"><strong>{{ $product->name }}</strong></a>
					@else
						{{ $product->name }}
					@endif
					<div>
						Giá: 
						@if(isset($product->discount_price) && $product->discount_price)
							<span class="label label-info">{{ number_format($product->discount_price, 0) }}</span> <span class="label label-default">{{ number_format($product->price, 0) }}</span> 
						@elseif(isset($product->price) && $product->price)
							<span class="label label-info">{{ number_format($product->price, 0) }}</span>
						@endif
					</div>
				</td>
				<td>
					@if($product->category)
						<a href="{{ URL::to('admin/cart/search?category_id='.$product->category->id) }}"> {{ $product->category->name }}</a>
					@endif
				<td>{{ $product->comment_count }} <span class="glyphicon glyphicon-comment" style="color:#76797c"></span></td>
				<td>
					<span title="{{ $product->created_at }}">{{ $product->created_at }}</span>
					<br />
					{{ $product->status }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $products->appends($appends)->links() }}
@stop
