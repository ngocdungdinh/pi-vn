<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

class BaseController extends Controller {

	/**
	 * Message bag.
	 *
	 * @var Illuminate\Support\MessageBag
	 */
	protected $messageBag = null;
	public $data = array();

	/**
	 * Initializer.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// CSRF Protection
		$this->beforeFilter('csrf', array('on' => 'post'));

		$this->data['sliders'] = Sliders::find(1);



		$this->data['categories'] = Category::where('showon_menu', '>', 0)->orderBy('showon_menu', 'ASC')->get();

		$this->data['prod_cate_type_1'] = CartCategory::where('type_id', 1)->orderBy('showon_menu', 'ASC')->get();
		$this->data['prod_cate_type_2'] = CartCategory::where('type_id', 2)->orderBy('showon_menu', 'ASC')->get();

		$this->data['intros'] = Post::where('post_type', 'intro')->where('status','published')->orderBy('updated_at', 'DESC')->get();
		$this->data['services'] = Post::where('post_type', 'service')->get();

		
		$this->data['payment_gateways'] = Config::get('cart.payment_gateways');
		$this->data['shipping_method'] = Config::get('cart.shipping_method');
		
		$this->data['u'] = $this->u = Sentry::check() ? Sentry::getUser() : null;
		//
		$this->messageBag = new Illuminate\Support\MessageBag;
	}

	public function notfound() {
		
		return View::make('frontend/notfound', $this->data);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
