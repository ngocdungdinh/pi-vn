<?php
	$wdata = json_decode($widget->content);
?>
@if($widget->status == 'open')
	@if($wdata->showtitle)
		<h3 class="headline text-color">
			<span class="border-color">{{ $widget->title }}</span>
		</h3>
	@endif
	{{ $wdata->content }}
@endif