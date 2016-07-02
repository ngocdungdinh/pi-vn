<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

class CartController extends BaseController {
	public function getIndex()
	{
		$this->data['filter'] = $filter = Jinput::get('sort', 'lastest');
		$sort = array('lastest', 'featured', 'review', 'discount');
		if(!in_array($filter, $sort)) {
			$filter = 'lastest';
		}

		switch ($filter) {
			case 'discount':
				$this->data['products'] = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('status', 'published')
					->where('discount_price', '>', 0)
					->orderBy('updated_at', 'DESC')->paginate(24);
				$this->data['meta_title'] = 'Sản phẩm khuyến mãi';
				break;
			case 'review':
				$this->data['products'] = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('status', 'published')
					->orderBy('review_count', 'DESC')->paginate(24);
				$this->data['meta_title'] = 'Sản phẩm được đánh giá tốt';
				break;
			case 'featured':
				$this->data['products'] = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('is_featured', 1)
					->where('status', 'published')
					->orderBy('updated_at', 'DESC')->paginate(24);
				$this->data['meta_title'] = 'Sản phẩm nổi bật';
				break;
			
			default:
				$this->data['products'] = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('status', 'published')
					->orderBy('created_at', 'DESC')->paginate(24);
				$this->data['meta_title'] = 'Sản phẩm mới';
				break;
		}

		return View::make('frontend/cart/index', $this->data);
	}

	public function getCategory($catSlug) {
		$curr_time = new Datetime;
		$last_week = $curr_time->modify('-'.Config::get('app.backdays').' day');

		$this->data['filter'] = $filter = Jinput::get('sort', 'lastest');
		$sort = array('lastest', 'featured', 'review', 'discount');
		if(!in_array($filter, $sort)) {
			$filter = 'lastest';
		}

		$this->data['category'] = $this->data['parent_category'] = $category = CartCategory::where('slug', $catSlug)->first();
		
		// Check if the news category exists
		if (is_null($category))
		{
			// If we ended up in here, it means that a page or a news post
			// don't exist. So, this means that it is time for 404 error page.
			return App::abort(404);
		}

		if($category->parent_id != 0) {
			$this->data['parent_category'] = $category->parent;
		}

		switch ($filter) {
			case 'discount':
				$this->data['products'] = $category->rposts()->select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('status', 'published')
					->where('discount_price', '>', 0)
					->orderBy('updated_at', 'DESC')->paginate(24);
				$this->data['meta_title'] = 'Sản phẩm khuyến mãi';
				break;
			case 'review':
				$this->data['products'] = $category->rposts()->select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('status', 'published')
					->orderBy('review_count', 'DESC')->paginate(24);
				$this->data['meta_title'] = 'Sản phẩm được đánh giá tốt';
				break;
			case 'featured':
				$this->data['products'] = $category->rposts()->select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('is_featured', 1)
					->where('status', 'published')
					->orderBy('updated_at', 'DESC')->paginate(24);
				$this->data['meta_title'] = 'Sản phẩm nổi bật';
				break;
			
			default:
				$this->data['products'] = $category->rposts()->select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('status', 'published')
					->orderBy('created_at', 'DESC')->paginate(24);
				$this->data['meta_title'] = 'Sản phẩm mới';
				break;
		}

		// Show the page
		return View::make('frontend/cart/category', $this->data);
	}

	public function getProduct($slug) {

		// attributes
		$this->data['attributes'] = $attributes = CartAttribute::orderBy('position', 'ASC')->get();
		// Get this news post data
		$this->data['product'] = $product = CartProduct::select('cart_products.*', 'cart_products.id AS id', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
			->where('slug', $slug)
			->where('status', 'published')
			->first();

		// Check if the news post exists
		if (is_null($product))
		{
			// If we ended up in here, it means that a page or a news post
			// don't exist. So, this means that it is time for 404 error page.
			return App::abort(404);
		}

		$this->data['category'] = $this->data['parent_category'] = $category = CartCategory::find($product->category_id);
		
		if($category->parent_id != 0) {
			$this->data['parent_category'] = $category->parent;
		}

		$this->data['product_tags'] = $product_tags = $product->tags;
		$this->data['product_attributes'] = $product_attributes = $product->attributes;
		$this->data['product_medias'] = $product_medias = $product->productmedias;

		$attrIds = array();
		foreach ($product_attributes as $a) {
			$attrIds[] = $a->id;
		}
		$this->data['attrIds'] = $attrIds;

		$this->data['product_related'] = $product_related = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('status', 'published')
					->orderBy('updated_at', 'DESC')->take(5)->get();

		$this->data['reviews'] = $reviews = $product->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(100);

		// Show the page
		return View::make('frontend/cart/view-product', $this->data);
	}

	public function postReview($slug) {

		$input = array(
			'comment' => Input::get('comment'),
			'rating'  => Input::get('rating')
		);
		// instantiate Rating model
		$review = new CartReview;

		// Validate that the user's input corresponds to the rules specified in the review model
		$validator = Validator::make( $input, $review->getCreateRules());

		// If input passes validation - store the review in DB, otherwise return to product page with error message 
		if ($validator->passes()) {
			$review->storeReviewForProduct($slug, $input['comment'], $input['rating']);
			return Redirect::to('shop/p/'.$slug.'#reviews-anchor')->with('review_posted',true);
		}
		
		return Redirect::to('shop/p/'.$slug.'#reviews-anchor')->withErrors($validator)->withInput();
	}

	public function getSearch() {

		$inputs = Jinput::all();
		$this->data['keyword']  = $keyword = isset($inputs['k']) ? $inputs['k'] : '';

		// attributes
		$this->data['attributes'] = $attributes = CartAttribute::orderBy('position', 'ASC')->get();
		foreach ($attributes as $key => $attr) {
			if($attr->parent_id == 0)
				$attrfilter[] = $attr->slug;
		}
		$inputs = Jinput::all();

		$attrs = array();
		$attrIds = array();
		foreach ($inputs as $key => $value) {
			if(in_array($key, $attrfilter) && count($value) >= 1)
			{
				$attrs[$key] = $value;
				$attrIds = array_merge($attrIds, $value);
			}
		}
		$this->data['attrs'] = $attrs;
		$this->data['attrIds'] = $attrIds;
		// print_r($attrs); die();
		$this->data['havingCount'] = count($this->data['attrs']);
		$this->data['products'] = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
			->leftJoin('cart_product_attribute', 'cart_product_attribute.product_id', '=', 'cart_products.id')
			->where(function($query){
				if($this->data['keyword']) {
					$keyslug = Str::slug($this->data['keyword']);
					$query->where('cart_products.slug', 'like', '%'.$keyslug.'%');
				}
				if($this->data['attrs'] && count($this->data['attrs']) > 0) {
					$query->whereIn('cart_product_attribute.attribute_id', $this->data['attrIds'])->havingRaw('COUNT(DISTINCT cart_product_attribute.attribute_id) = '.$this->data['havingCount']);
				}
			})
			->where('cart_products.status', 'published')
			->orderBy('cart_products.created_at', 'DESC')
			->groupBy('cart_products.id')
			->paginate(24);
		// Find post
			
		// $this->data['posts'] = Post::select('posts.*', 'posts.id as id', 'posts.slug as slug', 'users.username', 'users.first_name', 'users.last_name', 'users.avatar', 'medias.mpath', 'medias.mname')
		// 	->join('users', 'users.id', '=', 'posts.user_id')
		// 	->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
		// 	->where('posts.status', 'published')
		// 	// ->where('posts.post_type', 'post')
		// 	->whereRaw("(posts.slug LIKE '%$keyword_slug%')")
		// 	->orderBy('posts.publish_date', 'DESC')
		// 	->orderBy('posts.post_type', 'ASC')->paginate(20);
		// Show the page
		// echo count($this->data['attrs']);
		return View::make('frontend/cart/search', $this->data);
	}

	public function postAddBasket() {

		$basket['id'] = Jinput::get('pro_id', 0);
		$product = CartProduct::find($basket['id']);
		if(!is_null($product)) {
			$basket['name'] = $product->name;
			$basket['price'] = $product->discount_price ? $product->discount_price : $product->price;
			$basket['qty'] = Jinput::get('qty');

			$media = Media::find($product->media_id);
			$basket['options'] = array('mpath' => $media->mpath, 'mname' => $media->mname, 'slug' => $product->slug, 'old_price' => $product->price);
			Cart::add($basket);
		}
		return View::make('frontend/cart/inc/smallcart', $this->data);
	}

	public function getBasket() {
		// print_r(Cart::content()); die();
		return View::make('frontend/cart/cart', $this->data);
	}


	public function postBasket() {
		$qty = Input::get('qty');

		// print_r($qty); die();
		$k = 0;
		foreach (Cart::content() as $key => $cartItem) {
			// print_r($item); die();
			if($qty[$k] == 0) {
				Cart::remove($key);
			} else {
				Cart::update($key, array('qty' => $qty[$k]));
			}
			$k++;
		}

		return Redirect::to('shop/cart');
	}

	public function postCheckout() {

		if(Cart::count() <= 0) {
			return Redirect::back()->with('error', Lang::get('auth/cart.checkout.error'));
		}
		// Declare the rules for the form validation
		$rules = array(
			'full_name'   => 'required|min:3',
			'email' => 'required|email',
			'phone' => 'required',
			'hometown' => 'required',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$full_name 			= Jinput::get('full_name');
		$email 				= Jinput::get('email');
		$phone 				= Jinput::get('phone');
		$hometown 			= Jinput::get('hometown');
		$payment_gateway 	= Jinput::get('payment_gateway');
		$shipping_method 	= Jinput::get('shipping_method');
		$shipping_date 		= Jinput::get('shipping_date');
		$customer_note 		= Jinput::get('customer_note');

		$order = new CartOrder;
		if(Sentry::check()) {
			$order->full_name 		= $this->u->first_name.' '.$this->u->last_name;
			$order->address 		= empty($this->u->hometown) ? $hometown : $this->u->hometown;
			$order->email 			= $this->u->email;
			$order->user_id			= $this->u->id;
			$order->phone 			= empty($this->u->phone) ? $phone : $this->u->phone;

			//update to profile
			$this->u->hometown 	= $order->hometown;
			$this->u->phone 	= $order->phone;
			$this->u->save();
		} else {
			$order->full_name 		= $full_name;
			$order->address 		= $hometown;
			$order->email 			= $email;
			$order->phone 			= $phone;
		}

		$order->customer_note 	= $customer_note;
		$order->payment_gateway = $payment_gateway;
		$order->shipping_method = $shipping_method;
		$order->shipping_date 	= $shipping_date;
		$order->status 			= 'new';
		$order->code 			= strtoupper(uniqid());
		$order->total 			= Cart::total();

		if($order->save()) {
			// get cart
			foreach(Cart::content() as $cartItem) {
				$orderproduct = new CartOrderProduct;
				$orderproduct->order_id = $order->id;
				$orderproduct->product_id = $cartItem->id;
				$orderproduct->qty = $cartItem->qty;
				$orderproduct->price = $cartItem->options->price ? $cartItem->options->price : 0;
				$orderproduct->discount_price = $cartItem->price;
				$orderproduct->subtotal = $cartItem->subtotal;
				$orderproduct->save();
			}
			Cart::destroy();
			return Redirect::to('/shop/thankyou?order_id='.$order->id)->with('success', Lang::get('auth/cart.checkout.success'));
		}
		return Redirect::back()->with('error', Lang::get('auth/cart.checkout.error'));
	}

	public function getInvoice($code)
	{
		if(is_null($order = CartOrder::where('code', $code)->first()))
    		return Redirect::to('notfound');
    	
		$this->data['order'] = $order;
		$this->data['products'] = $order->products;
		return View::make('frontend/cart/invoice', $this->data);
	}

	public function getThankyou() {

		$this->data['order_id'] = Jinput::get('order_id', 0);
		$this->data['order'] = CartOrder::find($this->data['order_id']);
		if(!is_null($this->data['order']))
    		return View::make('frontend/cart/thankyou', $this->data);
		
		return Redirect::to('/');
	}
}