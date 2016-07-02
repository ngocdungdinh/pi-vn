@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Quản lý chuyên mục ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-th-large"></span> Chuyên mục
    	@if ( Sentry::getUser()->hasAnyAccess(['cart','cart.createcategory']) )
    		<a href="{{ route('createcategory/cart') }}" class="btn btn-default btn-xs">Tạo chuyên mục</a>
    	@endif
    </h3>

    <div class="row">
    	<div class="col-md-4">
	    	<div class="panel panel-default">
			  <div class="panel-heading">
			  	Thêm chuyên mục
			  </div>
			  <div class="panel-body">
			  	<form method="post" action="/admin/cart/categories/create" autocomplete="off" class="form-horizontal" role="form">
					<!-- CSRF Token -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />

					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="name">Tiêu đề</label>
						<div class="input-group">
							<input class="form-control" type="text" name="name" id="name" value="{{ Input::old('name') }}" />
						</div>
					</div>
					<div class="form-group">
						<label for="status">Trạng thái</label>
						<div class="input-group">
							<select name="status" class="form-control">
								<option value="on">Hiển thị</option>
								<option value="off">Ẩn</option>
							</select>
						</div>
					</div>
					<hr />
					<label for="inputEmail1" class="col-lg-2 control-label"></label>
					<div class="col-lg-2">
						<button type="submit" class="btn btn-success btn-sm">Lưu</button>
					</div>
				</form>
			  </div>
			</div>
		</div>
		<div class="col-md-8 nopl">
	    	<div class="panel panel-default">
			  <div class="panel-heading">
			  	Danh sách
			  </div>
			  <div class="panel-body">
		  		<div class="dd" id="sortableList">
				    <ol class="dd-list">
				  		@foreach ($categories as $category)
							<li class="dd-item nested-list-item" data-order="{{ $category->showon_menu }}" data-id="{{ $category->id }}">
						      <div class="dd-handle nested-list-handle">
						        <span class="glyphicon glyphicon-move"></span>
						      </div>
						      <div class="nested-list-content">{{ $category->name }} <small>- {{ $category->status }}</small>
						      	@if ( Sentry::getUser()->hasAnyAccess(['cart','cart.editcategory']) )
						        <div class="pull-right">
						          <a href="{{ route('updatecategory/cart', $category->id) }}" class="btn btn-default btn-xs">@lang('button.edit')</a>
						        </div>
						        @endif
						      </div>
						      <ol class="dd-list">
								@foreach ($category->subscategories()->orderBy('showon_menu', 'ASC')->get() as $subcate)
									<li class="dd-item nested-list-item" data-order="{{ $subcate->showon_menu }}" data-id="{{ $subcate->id }}">
								      <div class="dd-handle nested-list-handle">
								        <span class="glyphicon glyphicon-move"></span>
								      </div>
								      <div class="nested-list-content">{{ $subcate->name }} <small>- {{ $subcate->status }}</small>
								      	@if ( Sentry::getUser()->hasAnyAccess(['cart','cart.editcategory']) )
								        <div class="pull-right">
								          <a href="{{ route('updatecategory/cart', $subcate->id) }}" class="btn btn-default btn-xs">@lang('button.edit')</a>
								        </div>
								        @endif
								      </div>
									      <ol class="dd-list">
											@foreach ($subcate->subscategories()->orderBy('showon_menu', 'ASC')->get() as $ssubcate)
												<li class="dd-item nested-list-item" data-order="{{ $ssubcate->showon_menu }}" data-id="{{ $ssubcate->id }}">
											      <div class="dd-handle nested-list-handle">
											        <span class="glyphicon glyphicon-move"></span>
											      </div>
											      <div class="nested-list-content">{{ $ssubcate->name }} <small>- {{ $ssubcate->status }}</small>
											      	@if ( Sentry::getUser()->hasAnyAccess(['cart','cart.editcategory']) )
											        <div class="pull-right">
											          <a href="{{ route('updatecategory/cart', $ssubcate->id) }}" class="btn btn-default btn-xs">@lang('button.edit')</a>
											        </div>
											        @endif
											      </div>
											    </li>
											@endforeach
										   </ol>
								    </li>
								@endforeach
							   </ol>
						    </li>
				  		@endforeach
			  		</ol>
			    </div>
			    <p id="success-indicator" style="margin-right: 10px; display: none;">
		          <span class="glyphicon glyphicon-ok"></span> Đã lưu lại thứ tự
		        </p>
			  </div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function()
		{
		    // activate Nestable for list 1
		    $('#sortableList').nestable({ 
			   dropCallback: function(details) {
			       console.log(details);
			       var order = new Array();
			       $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
			         order[index] = $(elem).attr('data-id');
			       });

			       if (order.length === 0){
			        var rootOrder = new Array();
			        $("#sortableList > ol > li").each(function(index,elem) {
			          rootOrder[index] = $(elem).attr('data-id');
			        });
			       }

			       $.post('/admin/cart/updateposition', 
			        { 
			          source : details.sourceId, 
			          destination: details.destId, 
			          order:JSON.stringify(order),
			          rootOrder:JSON.stringify(rootOrder) 
			        }, 
			        function(data) {
			         // console.log('data '+data); 
			        })
			       .done(function() { 
			          $( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();
			       })
			       .fail(function() {  })
			       .always(function() {  });
		     }
		   })
		});
	</script>
@stop
