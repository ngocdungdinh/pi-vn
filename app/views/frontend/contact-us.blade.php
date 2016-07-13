@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Contact us ::
@parent
@stop

{{-- Page content --}}
@section('content')
		<!-- START PRIMARY SECTION -->
<div id="primary" class="inner group">
	<div class="layout-sidebar-right group">
		<!-- START CONTENT -->
		<div id="content" role="main" class="group">
			<h2>Liên hệ</h2>
			<div id="post-73" class="post-73 page type-page status-publish hentry group">
				<form id="contact-form-contact-page" class="contact-form" method="post" action="sendmail.html" enctype="multipart/form-data">
					<div class="usermessagea"></div>
					<fieldset>
						<ul>
							<li class="text-field">
								<label for="name-contact-page">
									<span class="label">Họ tên</span>
								</label>
								<input type="text" name="name" id="name-contact-page" class="required" value="" />
								<div class="msg-error"></div>
							</li>
							<li class="text-field">
								<label for="email-contact-page">
									<span class="label">Email</span>
								</label>
								<input type="text" name="email" id="email-contact-page" class="required email-validate" value="" />
								<div class="msg-error"></div>
							</li>
							<li class="textarea-field">
								<label for="message-contact-page">
									<span class="label">Nội dung</span>
								</label>
								<textarea name="message" id="message-contact-page" rows="8" cols="30" class="required"></textarea>
								<div class="msg-error"></div>
							</li>
							<li class="submit-button">
								<input type="hidden" name="action" value="sendmail" id="action" />
								<input type="submit" name="sendemail" value="Gửi liên hệ" class="sendmail alignright" />
							</li>
						</ul>
					</fieldset>
				</form>
				<script type="text/javascript">
					var error_messages = {
						name: "Hãy điền tên của bạn",
						email: "Hãy điền địa chỉ email chính xác",
						message: "Gửi tin nhắn cho chúng tôi"
					};
				</script>
			</div>
			<div id="comments">
				<!--<p class="nocomments">&nbsp;</p>-->
			</div>
			<!-- #comments -->
		</div>
		<!-- END CONTENT -->
		<!-- START SIDEBAR -->
		<div id="sidebar" class="group">

		</div>
		<!-- END SIDEBAR -->
	</div>
	<!-- START EXTRA CONTENT -->
	<!-- END EXTRA CONTENT -->
</div>
@stop
