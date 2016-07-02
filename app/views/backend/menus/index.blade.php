@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Quản lý trang ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-book"></span> Quản lý menu
    </h3>
    <div class="row">
    	<div class="col-md-4">
	    	<div class="panel panel-default">
			  <div class="panel-heading">
			  	Menu
			  	@if ( Sentry::getUser()->hasAnyAccess(['menus','menus.create']) )
			  		<a href="javascript:void(0)" onclick="$('#add-menu').fadeToggle(); $('#create-title').focus()" class="pull-right"><span class="glyphicon glyphicon-plus"></span></a>
			  	@endif
			  </div>
			  <div class="panel-body">
				<div class="panel-group" id="accordion">					
				  @foreach($menus as $menu)
					  <div class="panel {{ (isset($mId) && $mId == $menu->id) ? 'panel-primary' : 'panel-info' }}">
					    <div class="panel-heading">
					      <h4 class="panel-title" style="overflow: hidden">
					      	<a href="{{ URL::to('admin/menus?m='.$menu->id) }}" class="pull-left">{{ $menu->title }} <small>- {{ $menu->position }}</small></a>
					        <a data-toggle="collapse" data-parent="#accordion" href="#menu{{ $menu->id }}" class="pull-right">
					          <span class="glyphicon glyphicon-collapse-down"></span>
					        </a>
					      </h4>
					    </div>
					    <div id="menu{{ $menu->id }}" class="panel-collapse collapse">
					      <div class="panel-body">
					    	@if ( Sentry::getUser()->hasAnyAccess(['menus','menus.edit']) )
					    		<div>
					    			<form method="post" action="{{ route('create/menu') }}" autocomplete="off" class="form-horizontal" role="form">
										<!-- CSRF Token -->
										<input type="hidden" name="_token" value="{{ csrf_token() }}" />
										<input type="hidden" name="menu_id" value="{{ $menu->id }}" />
										<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
											<label class="col-lg-4 control-label" for="title">Tên menu</label>
											<div class="col-lg-8">
												<input class="form-control" type="text" name="title" id="title" value="{{ $menu->title }}" />
											</div>
										</div>
										<div class="form-group">
											<label for="position" class="col-lg-4 control-label">Vị trí</label>
											<div class="col-lg-8">
												<select name="position" id="position" class="form-control">
													<option value="nav" {{ $menu->position=='nav' ? 'selected="selected"' : '' }}>- Navigation</option>
													<option value="sidebar" {{ $menu->position=='sidebar' ? 'selected="selected"' : '' }}>- sidebar</option>
													<option value="top" {{ $menu->position=='top' ? 'selected="selected"' : '' }}>- Top</option>
													<option value="middle" {{ $menu->position=='middle' ? 'selected="selected"' : '' }}>- Middle</option>
													<option value="bottom" {{ $menu->position=='bottom' ? 'selected="selected"' : '' }}>- Bottom</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12" align="right">
											<button type="submit" class="btn btn-success btn-sm">Sửa</button>
											@if ( Sentry::getUser()->hasAnyAccess(['menus','menus.delete']) )
												<a onclick="confirmDelete(this); return false;" href="{{ route('delete/menu', $menu->id) }}" class="btn btn-danger btn-xs">@lang('button.delete')</a>
											@endif
										</div>
					    			</form>
					    		</div>
					    	@endif
					      </div>
					    </div>
					  </div>
				  @endforeach
				</div>
			    <div id="add-menu" style="display:none">
			    	@if ( Sentry::getUser()->hasAnyAccess(['menus','menus.create']) )
			    		<hr />
			    		<div>
			    			<form method="post" action="{{ route('create/menu') }}" autocomplete="off" class="form-horizontal" role="form">
								<!-- CSRF Token -->
								<input type="hidden" name="_token" value="{{ csrf_token() }}" />
								<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
									<label class="col-lg-4 control-label" for="create-title">Tên menu</label>
									<div class="col-lg-8">
										<input class="form-control" type="text" name="title" id="create-title" value="{{ Input::old('name') }}" />
									</div>
								</div>
								<div class="form-group">
									<label for="position" class="col-lg-4 control-label">Vị trí</label>
									<div class="col-lg-8">
										<select name="position" id="position" class="form-control">
											<option value="nav">- Navigation</option>
											<option value="sidebar">- sidebar</option>
											<option value="top">- Top</option>
											<option value="middle">- Middle</option>
											<option value="bottom">- Bottom</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12" align="right">
									<button type="submit" class="btn btn-success btn-sm">Tạo</button>
								</div>
			    			</form>
			    		</div>
			    	@endif
			    </div>
			  </div>
			</div>
		</div>
    	<div class="col-md-8 nopl">
	    	<div class="panel panel-default">
			  <div class="panel-heading">
			  	Cấu trúc liên kết của menu
			  	@if ( Sentry::getUser()->hasAnyAccess(['menus','menus.create']) && isset($links) )
			  		<a href="javascript:void(0)" onclick="$('#add-link').fadeToggle(); $('#link-title').focus()" class="pull-right"><span class="glyphicon glyphicon-plus"></span></a>
			  	@endif
			  </div>
			  <div class="panel-body">
			    @if(isset($links))
			    	@if($links->count())			    		
						<div class="panel-group" id="accordion">
						  <ol class="itemsort">
							  @foreach($links as $link)
							  	<li class="link-item big" data-lid="{{$link->id}}" data-showon="{{$link->showon}}">
								  <div class="panel panel-warning">
								    <div class="panel-heading">
								      <h4 class="panel-title" style="overflow: hidden">
								      	{{ $link->title }} <small>- {{ $link->target }}</small>
								        <a data-toggle="collapse" data-parent="#accordion" href="#link{{ $link->id }}" class="pull-right">
								          <span class="glyphicon glyphicon-collapse-down"></span>
								        </a>
								      </h4>
								    </div>
								    <div id="link{{ $link->id }}" class="panel-collapse collapse">
								      <div class="panel-body">
								    	@if ( Sentry::getUser()->hasAnyAccess(['menus','menus.edit']) )
								    		<div>
								    			<form method="post" action="{{ route('create/link') }}" autocomplete="off" class="form-horizontal" role="form">
													<!-- CSRF Token -->
													<input type="hidden" name="_token" value="{{ csrf_token() }}" />
													<input type="hidden" name="link_id" value="{{ $link->id }}" />
													<input type="hidden" name="menu_id" value="{{ $link->menu_id }}" />
													<input type="hidden" name="parent_id" value="0" />
													<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
														<label class="col-lg-4 control-label" for="link-title">Tên liên kết</label>
														<div class="col-lg-4">
															<input class="form-control" type="text" name="title" id="link-title" value="{{  $link->title }}" />
														</div>
														<div class="col-lg-4">
															<input class="form-control" type="text" name="alt" id="" value="{{ $link->alt }}" placeholder="alt..." />
														</div>
													</div>
													<div class="form-group {{ $errors->has('alt') ? 'has-error' : '' }}">
														<label class="col-lg-4 control-label" for="url">Đường dẫn</label>
														<div class="col-lg-8">
															<input class="form-control" type="text" name="url" id="url" value="{{ $link->url }}" placeholder="http://" />
														</div>
													</div>
													<div class="form-group">
														<label for="target" class="col-lg-4 control-label">Loại</label>
														<div class="col-lg-5">
															<select name="target" id="target" class="form-control">
																<option value="_self" {{ $link->target=='_self' ? 'selected="selected"' : '' }}>Mở ở trang hiện tại</option>
																<option value="_blank" {{ $link->target=='_blank' ? 'selected="selected"' : '' }}>Mở ở cửa sổ mới</option>
															</select>
														</div>
													</div>
													<div class="col-lg-12" align="right">
														<button type="submit" class="btn btn-success btn-sm">Sửa</button>
														@if ( Sentry::getUser()->hasAnyAccess(['menus','menus.delete']) )
															<a onclick="confirmDelete(this); return false;" href="{{ route('delete/link', $link->id) }}" class="btn btn-danger btn-xs">@lang('button.delete')</a>
														@endif
													</div>
								    			</form>
								    		</div>
								    	@endif
								      </div>
								    </div>
								  </div>
								</li>
							  @endforeach
						  </ol>
						</div>
						<div style="padding: 5px 2px; color: #666666" align="right"><i>Kéo thả để sắp xếp vị trí</i></div>
			    	@else
			    		Chưa có liên kết
			    	@endif
				  	<div id="add-link" style="display:none;">
			    		<hr />
			    		<div>
			    			<form method="post" action="{{ route('create/link') }}" autocomplete="off" class="form-horizontal" role="form">
								<!-- CSRF Token -->
								<input type="hidden" name="_token" value="{{ csrf_token() }}" />
								<input type="hidden" name="menu_id" value="{{ $mId }}" />
								<input type="hidden" name="parent_id" value="0" />
								<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
									<label class="col-lg-4 control-label" for="link-title">Tên liên kết</label>
									<div class="col-lg-4">
										<input class="form-control" type="text" name="title" id="link-title" value="{{ Input::old('title') }}" />
									</div>
									<div class="col-lg-4">
										<input class="form-control" type="text" name="alt" id="" value="{{ Input::old('alt') }}" placeholder="alt..." />
									</div>
								</div>
								<div class="form-group {{ $errors->has('alt') ? 'has-error' : '' }}">
									<label class="col-lg-4 control-label" for="url">Đường dẫn</label>
									<div class="col-lg-8">
										<input class="form-control" type="text" name="url" id="url" value="{{ Input::old('url') }}" placeholder="http://" />
									</div>
								</div>
								<div class="form-group">
									<label for="target" class="col-lg-4 control-label">Loại</label>
									<div class="col-lg-4">
										<select name="target" id="target" class="form-control">
											<option value="_self">Mở ở trang hiện tại</option>
											<option value="_blank">Mở ở cửa sổ mới</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12" align="right">
									<button type="submit" class="btn btn-success btn-sm">Tạo</button>
								</div>
			    			</form>
			    		</div>
				  	</div>
			    @else
			    	<p>Chọn một menu bên trái để thêm liên kết</p>
			    @endif
			  </div>
			</div>
		</div>
    </div>
    <script src="{{ asset('assets/js/jquery-sortable.min.js') }}"></script>
    <script type="text/javascript">    	

		var adjustment;
		var p = 1;
	  	$("ol.itemsort").sortable({
		  group: 'itemsort',
		  handle: '.panel-heading',
		  pullPlaceholder: true,
		  onDrop: function  ($item, container, _super) {
			$item.removeClass("dragged").removeAttr("style")
			$("body").removeClass("dragging")
			  
			// $("ol.itemsort").children("li").attr('data-drive', 1).attr('data-sure', 1);

			p = 1;
			$("ol.itemsort").children("li").each(function(){
				$(this).attr('data-showon', p++);
			});

			updateLinksPosition();
		  }
		});
    </script>
@stop
