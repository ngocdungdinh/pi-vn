<?php namespace Controllers\Admin;

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

use AdminController;
use Post;
use CartProduct;
use CartOrder;
use Permission;
use User;
use Cache;
use View;
use Redirect;
use Config;

class DashboardController extends AdminController {

	/**
	 * Show the administration dashboard page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		$this->data['posts']['published'] = Post::select('id', 'user_id', 'title', 'created_at', 'publish_date', 'status')->where('post_type', 'post')->where('status', 'published')->orderBy('created_at', 'DESC')->paginate(10);
		$this->data['posts']['submitted'] = Post::select('id', 'user_id', 'title', 'created_at', 'publish_date', 'status')->where('post_type', 'post')->where('status', 'submitted')->orderBy('created_at', 'DESC')->paginate(10);
		$this->data['posts']['returned'] = Post::select('id', 'user_id', 'title', 'created_at', 'publish_date', 'status')->where('post_type', 'post')->where('status', 'returned')->orderBy('created_at', 'DESC')->paginate(10);
		$this->data['posts']['draft'] = Post::select('id', 'user_id', 'title', 'created_at', 'publish_date', 'status')->where('post_type', 'post')->where('status', 'draft')->orderBy('created_at', 'DESC')->paginate(10);
		
		if(Config::get('app.module.cart')) {
			// get lastest orders
			// get lastest reviews
			// total products
			$this->data['cart']['products'] = CartProduct::where('status', 'published')->count();
			// total orders : new / processing / complete / invoice
			$this->data['cart']['orders'] = CartOrder::count();
			$this->data['cart']['orders_new'] = CartOrder::where('status', 'new')->count();
			$this->data['cart']['orders_processing'] = CartOrder::where('status', 'processing')->count();
			$this->data['cart']['orders_complete'] = CartOrder::where('status', 'completed')->count();
		}

		// get lastest user
		$this->data['users'] = User::orderBy('created_at', 'desc')->paginate(5);
		// Show the page
		return View::make('backend/dashboard', $this->data);
	}

	public function getDeleteCaches()
	{
		Cache::flush();
		return Redirect::back();
	}
}
