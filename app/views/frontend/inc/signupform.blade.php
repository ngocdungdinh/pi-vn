<div class="row">
	<div class="col-md-5">
		<p>Bạn có tài khoản Facebook?</p>
		<p>
			<a id="fb-connect" class="btn btn-default btn-facebook" rel="0" href="{{ URL::to('oauth/session/facebook') }}" class="popup_oauth"><i class="fa fa-facebook"></i> Đăng kí bằng Facebook</a>
		</p>
	</div>
	<div class="col-md-7" style="border-left: 1px solid #eeeeee">
		<form role="form" method="post" action="{{ route('signup') }}" autocomplete="off">
			<!-- CSRF Token -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="form-group">
				<input type="text" class="form-control show-popover" name="first_name" id="first_name" value="{{ Input::old('first_name') }}" placeholder="Tên bạn" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Nên có 2 từ." data-original-title="Tên bạn" />
				{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
			</div>
			<div class="form-group">
				<input type="text" class="form-control show-popover" name="username" id="username" value="{{ Input::old('username') }}" placeholder="Tên tài khoản" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Viết liền, không dấu, có thể có dấu gạch dưới (_)." data-original-title="Tên tài khoản" />
				{{ $errors->first('username', '<span class="help-block">:message</span>') }}
			</div>
			<div class="form-group{{ $errors->first('email', ' has-error') }}">
				<input type="text" class="form-control show-popover" name="email" id="email" value="{{ Input::old('email') }}" placeholder="Địa chỉ e-mail" />
					{{ $errors->first('email', '<span class="help-block">:message</span>') }}
			</div>
			<hr />
			<div class="form-group{{ $errors->first('password', ' has-error') }}">
				<div class="row">
					<div class="col-sm-6">
					  <input type="password" class="form-control margin-bottom-xs" name="password" id="password" placeholder="Mật khẩu" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Three symbols minimum." data-original-title="Password">
					  {{ $errors->first('password', '<span class="help-block">:message</span>') }}
					</div>
					<div class="col-sm-6">
					  <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Xác nhận mật khẩu" data-toggle="popover" data-trigger="focus" data-content="Make sure you still remember it." data-original-title="Repeat Password">
					  {{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-offset-4 col-lg-6">
					<button type="submit" class="btn btn-default btn-color">Đăng ký</button>
				</div>
			</div>
		</form>
	</div>
</div>