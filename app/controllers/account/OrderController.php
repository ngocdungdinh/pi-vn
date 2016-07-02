<?php namespace Controllers\Account;

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

use AuthorizedController;
use Input;
use Jinput;
use CartOrder;
use Redirect;
use Request;
use Permission;
use Sentry;
use Validator;
use View;

class OrderController extends AuthorizedController {

	public function getIndex() {
		$this->data['orders'] = CartOrder::where('email', $this->u->email)->orderBy('created_at', 'desc')->paginate(10);
		return View::make('frontend/account/order', $this->data);
	}
}