@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
{{ $page->title }} ::
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
<div class="row">
	<div class="col-md-9">
		<h3 class="headline first-child text-color">
			<span class="border-color">{{ $page->title }}</span>
		</h3>
		<p><strong>{{ $page->excerpt }}</strong></p>
		<p>{{ $page->content }}</p>
		<div>
			@if($page->widgets()->count())
				@foreach($page->widgets as $widget)
					@include('widgets/'.$widget->form.'/view')
				@endforeach
			@endif
		</div>
	</div>
	<div class="col-md-3">
		<div class="categories-box hidden-xs">
			<div style="margin-top: 12px">
				<div class="ctitle">
					<span>SAMMI's SHOP</span>
					<span class="cshadown"></span>
				</div>
			</div>
			<ul class="nav nav-pills nav-stacked catelist">
				@foreach($pages as $p)
			        <li><a href="{{ URL::to('page/'.$p->slug) }}" {{ $page->slug ==  $p->slug ? 'class="active"' : ''}}>{{ $p->title }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@stop