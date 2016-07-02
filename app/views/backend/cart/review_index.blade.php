@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Đơn hàng ::
@parent
@stop

{{-- Page content --}}
@section('content')
<h3>
	<span class="glyphicon glyphicon-th-large"></span> Nhận xét sản phẩm
</h3>
<div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th width="40"></th>
				<th width="120">Người gửi</th>
				<th class="span2">Nội dung</th>
				<th width="80">Trạng thái</th>
				<th width="100">Ngày</th>
				<th width="60"></th>
			</tr>
		</thead>
		@foreach($reviews as $review)
		<tr>
			<td>{{ $review->id }}</td>
			<td>
				{{ $review->user ? $review->user->first_name.' '.$review->user->last_name : 'Khách'}}
			</td>
			<td>
                <blockquote style="font-size: 14px;">{{$review->comment}}</blockquote>
				<div>
	                @for ($i=1; $i <= 5 ; $i++)
	                  <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
	                @endfor
	                - <a href="/shop/p/{{ $review->slug }}" target="_blank">{{ $review->name }}</a>
                </div>
			</td>
			<td>
				@if($review->spam)
					<span class="label label-warning">Spam</span>
				@elseif($review->approved)
					<span class="label label-success">Hiển thị</span>
				@endif
			</td>
			<td>{{$review->timeago}}</td>
			<td>
				<div class="dropdown">
				  <a data-toggle="dropdown" href="#" class="btn btn-info btn-xs pull-right">...</a>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="right: 0; left: auto">
				  	@if($review->spam)
				    	<li><a href="/admin/cart/reviews/{{ $review->id }}/approve">Hiển thị</a></li>
				    @else
				    	<li><a href="/admin/cart/reviews/{{ $review->id }}/spam">Spam</a></li>
				    @endif
				    <li><a onclick="confirmDelete(this); return false;" href="/admin/cart/reviews/{{ $review->id }}/delete">Xóa</a></li>
				  </ul>
				</div>
			</td>
		</tr>
		@endforeach
	</table>
	{{ $reviews->links(); }}
</div>
@stop