@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Widgets ::
@parent
@stop

{{-- Page content --}}
@section('content')
<h3>
	<span class="fa fa-puzzle-piece"></span> Widgets
</h3>
<div class="row">
	@foreach($widgets as $widget)
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">{{ $widget->name }}</div>
			  <div class="panel-body">
			    <p>ID: {{ $widget->id }}</p>
			    <p>{{ $widget->description }}</p>
			    #{{ $widget->slug }}
			  </div>
			</div>
		</div>
	@endforeach
</div>
@stop