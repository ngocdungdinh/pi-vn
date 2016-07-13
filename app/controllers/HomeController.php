<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showIndex()
	{
		$curr_time = new Datetime;
		$last_week = $curr_time->modify('-37 day');

		// Get all the news posts
		$this->data['featured_posts'] = Post::select('posts.*', 'medias.mpath', 'medias.mname')
			->join('medias', 'medias.id', '=', 'posts.media_id')
			->where('post_type', 'post')
			->where('status', 'published')
			->where('is_featured', 1)
			->where('showon_homepage', 1)
			->orderBy('publish_date', 'DESC')->take(3)->get();

		$this->data['home_posts'] = Post::select('posts.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', 'post')
			->where('showon_homepage', 1)
			->orderBy('publish_date', 'DESC')->get(4);

		$this->data['last_products'] = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
			->where('status', 'published')
			->orderBy('created_at', 'DESC')->paginate(24);
			
		return View::make('frontend/home', $this->data);
	}
}