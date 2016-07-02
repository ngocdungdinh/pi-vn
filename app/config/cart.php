<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| Cart Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'payment_gateways' => array(
		'bacs' => array('name' => 'Chuyển tiền qua tài khoản ngân hàng', 'status' => true),
		'cheque' => array('name' => 'Trả tiền khi nhận hàng', 'status' => true),
		'cod' => array('name' => 'Trả tiền sau khi nhận hàng', 'status' => false),
		'checkout' => array('name' => 'Trả tiền bằng thẻ tín dụng', 'status' => false),
		'paypal' => array('name' => 'Trả tiền bằng tài khoản Paypal', 'status' => false),
	),

	'shipping_method' => array(
		'local_pickup' => array('name' => 'Đến cửa hàng lấy', 'status' => true),
		'local_delivery' => array('name' => 'Giao hàng tận nơi', 'status' => true),
		'international_delivery' => array('name' => 'Chuyển hàng quốc tế', 'status' => false),
		'free_shipping' => array('name' => 'Miễn phí vận chuyển', 'status' => false),
		'flat_rate' => array('name' => 'Giá bán đồng nhất', 'status' => false),
	),
);