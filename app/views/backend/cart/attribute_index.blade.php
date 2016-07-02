@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Quản lý thuộc tính ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-th-large"></span> Thuộc tính sản phẩm
    </h3>

    <div class="row">
    	<div class="col-md-4">
	    	<div class="panel panel-default">
			  <div class="panel-heading">
			  	Thêm thuộc tính
			  </div>
			  <div class="panel-body">
			  	<form method="post" action="/admin/cart/attributes/create" autocomplete="off" class="form-horizontal" role="form">
					<!-- CSRF Token -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />

					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="name">Tiêu đề</label>
						<div class="input-group">
							<input class="form-control" type="text" name="name" id="name" value="{{ Input::old('name') }}" />
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
				  		@foreach ($attributes as $attribute)
							<li class="dd-item nested-list-item" data-order="{{ $attribute->position }}" data-id="{{ $attribute->id }}">
						      <div class="dd-handle nested-list-handle">
						        <span class="glyphicon glyphicon-move"></span>
						      </div>
						      <div class="nested-list-content">
						      	@if($attribute->mname)
						      		<img src="{{ asset($attribute->mpath . '/100x100_crop/' . $attribute->mname) }}" width="100%" />
						      	@endif

						      	{{ $attribute->name }}
						      	@if ( Sentry::getUser()->hasAnyAccess(['cart','cart.editcategory']) )
						        <div class="pull-right">
						          <a href="{{ route('updateattribute/cart', $attribute->id) }}" class="btn btn-default btn-xs">@lang('button.edit')</a>
						        </div>
						        @endif
						      </div>
						      <ol class="dd-list">
								@foreach ($attribute->subsattributes()->orderBy('position', 'ASC')->get() as $subattr)
									<li class="dd-item nested-list-item" data-order="{{ $subattr->position }}" data-id="{{ $subattr->id }}">
								      <div class="dd-handle nested-list-handle">
								        <span class="glyphicon glyphicon-move"></span>
								      </div>
								      <div class="nested-list-content">
								      	@if($subattr->mname)
								      		<img src="{{ asset($subattr->mpath . '/100x100_crop/' . $subattr->mname) }}" style="height: 20px; width: 20px;" />
								      	@endif

								      	{{ $subattr->name }}
								        <div class="pull-right">
								          <a href="{{ route('updateattribute/cart', $subattr->id) }}" class="btn btn-default btn-xs">@lang('button.edit')</a>
								        </div>
								      </div>
									      <ol class="dd-list">
											@foreach ($subattr->subsattributes()->orderBy('position', 'ASC')->get() as $ssubattr)
												<li class="dd-item nested-list-item" data-order="{{ $ssubattr->position }}" data-id="{{ $ssubattr->id }}">
											      <div class="dd-handle nested-list-handle">
											        <span class="glyphicon glyphicon-move"></span>
											      </div>
											      <div class="nested-list-content">{{ $ssubattr->name }}
											        <div class="pull-right">
											          <a href="{{ route('updateattribute/cart', $ssubattr->id) }}" class="btn btn-default btn-xs">@lang('button.edit')</a>
											        </div>
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

			       $.post('/admin/cart/updateattrposition', 
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
