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

		$this->data['categories'] = Category::where('showon_menu', '>', 0)->orderBy('showon_menu', 'ASC')->get();

		$this->data['product_categories'] = CartCategory::orderBy('showon_menu', 'ASC')->get();

		$this->data['manufacturers'] = CartAttribute::select('cart_attributes.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'cart_attributes.media_id')
			->where('cart_attributes.parent_id', 15) // thuong-hieu
			->orderBy('position', 'ASC')->get();

		
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
