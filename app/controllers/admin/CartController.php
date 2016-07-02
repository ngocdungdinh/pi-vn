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
use Input;
use Lang;
use CartCategory;
use CartProduct;
use CartCategoryProduct;
use CartProductMedia;
use CartAttribute;
use CartProductAttribute;
use CartOrder;
use CartOrderProduct;
use CartReview;
use Media;
use Redirect;
use Sentry;
use Str;
use Validator;
use View;
use Config;

class CartController extends AdminController {	

	/**
	 * Show a list of all the news products.
	 *
	 * @return View
	 */
	public function getProductIndex()
	{
		$this->data['status'] = $status = Input::get('status');
		$this->data['stock_status'] = $stock_status = Input::get('stock_status');
		// Grab all the news products
		if($status) {
			$this->data['products'] = $products = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
			->where('status', $status)->orderBy('created_at', 'DESC')
			->paginate(30);
		} else {
			$this->data['products'] = $products = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
			->orderBy('created_at', 'DESC')->paginate(30);
		}

		$this->data['appends'] = array(
			'status' => $status,
		);

		$this->data['categories'] = $categories = CartCategory::orderBy('showon_menu', 'ASC')->get();

		// Show the page
		return View::make('backend/cart/product_index', $this->data);
	}

	/**
	 * Search post.
	 *
	 * @return View
	 */
	public function getProductSearch()
	{
		$this->data['status'] 		= $status = Input::get('status');
		$this->data['keyword'] 		= $keyword = Input::get('key');
		$this->data['category_id'] 	= $category_id = Input::get('category_id');
		$this->data['keyslug'] 		= $keyslug = Str::slug($keyword);
		$this->data['stock_status'] = $stock_status = Input::get('stock_status');
		$this->data['price_from'] 	= $price_from = Input::get('price_from');
		$this->data['price_to'] 	= $price_to = Input::get('price_to');
		$this->data['discount'] 	= $discount = Input::get('discount');

		$this->data['appends'] = array(
			'stock_status' => $stock_status,
			'status' => $status,
			'keyword' => $keyword,
			'category_id' => $category_id,
			'price_from' => $price_from,
			'price_to' => $price_to,
			'keyslug' => $keyslug
		);

		// Grab the news products
		$this->data['products'] = $products = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
			->where(function($query){
				if($this->data['keyslug'])
					$query->where('slug', 'like', '%'.$this->data['keyslug'].'%');

				if($this->data['category_id'])
					$query->where('category_id', '=', $this->data['category_id']);

				if($this->data['stock_status'])
					$query->where('stock_status', '=', $this->data['stock_status']);

				if($this->data['price_from'])
					$query->where('price', '>=', $this->data['price_from']);

				if($this->data['price_to'])
					$query->where('price', '<=', $this->data['price_to']);

				if($this->data['discount'])
					$query->where('discount_price', '>', 0);

			})
			->orderBy('created_at', 'DESC')->paginate(30);

		$this->data['categories'] = $categories = CartCategory::orderBy('showon_menu', 'ASC')->get();

		// Show the page
		return View::make('backend/cart/product_index', $this->data);
	}

	/**
	 * News post create.
	 *
	 * @return View
	 */
	public function getProductCreate()
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.createproduct']) )
			return View::make('backend/notallow');

		$categories = CartCategory::orderBy('showon_menu', 'ASC')->get();
		// Show the page
		return View::make('backend/cart/product_create', compact('categories'));
	}

	/**
	 * News post create form processing.
	 *
	 * @return Redirect
	 */
	public function postProductCreate()
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.createproduct']) )
			return View::make('backend/notallow');

		// Declare the rules for the form validation
		$rules = array(
			'name'   => 'required|min:3',
			// 'excerpt' => 'required|min:3',
			// 'content' => 'required|min:3'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Create a new cart product
		$product = new CartProduct;

		// Update the cart product data
		$product->name            = e(Input::get('name'));

		if (Input::get('slug'))
		{
			$product->slug         = $this->slug(Input::get('slug'));
		} else {
			$product->slug         = e(Str::slug(Input::get('name')));
		}

		$product->excerpt          = Input::get('excerpt');
		$product->content          = Input::get('content');
		$product->price      		= e(Input::get('price', 0));
		$product->discount_price	= e(Input::get('discount_price', 0));
		$product->quantity			= e(Input::get('quantity', 1));
		$product->stock_status		= e(Input::get('stock_status'));

		$product->is_featured      = e(Input::get('is_featured', 0));
		$product->is_popular       = e(Input::get('is_popular', 0));
		$product->showon_homepage	= e(Input::get('showon_homepage', 0));
		$product->allow_comments	= e(Input::get('allow_comments', 0));
		$product->media_id     	= e(Input::get('media_id'));
		$product->status          	= e(Input::get('status'));

		$product->meta_title       = e(Input::get('meta-title'));
		$product->meta_description = e(Input::get('meta-description'));
		$product->meta_keywords    = e(Input::get('meta-keywords'));
		$product->user_id          = Sentry::getId();

		// Was the news product created?
		if($product->save())
		{
			// Update reference categories
			if(Input::get('categories'))
	  		{
	  			foreach(Input::get('categories') as $cateId)
	  			{
	  				$cateproduct = new CartCategoryProduct;
	  				$cateproduct->category_id = $cateId;
	  				$cateproduct->product_id = $cateId;
	  				$cateproduct->save();
	  				$product->category_id = $cateId;
	  			}
	  			$product->save();
	  		}
			// Redirect to the new product page
			return Redirect::to("admin/cart/products/$product->id/edit")->with('success', Lang::get('admin/news/message.create.success'));
		}

		// Redirect to the news product create page
		return Redirect::to('admin/cart/products/create')->with('error', Lang::get('admin/news/message.create.error'));
	}

	/**
	 * News post update.
	 *
	 * @param  int  $productId
	 * @return View
	 */
	public function getProductEdit($productId = null)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.editproduct']) )
			return View::make('backend/notallow');

		// Check if the product exists
		if (is_null($product = CartProduct::find($productId)))
		{
			// Redirect to the product management page
			return Redirect::to('admin/cart')->with('error', Lang::get('admin/news/message.does_not_exist'));
		}
		$categories = CartCategory::orderBy('showon_menu', 'ASC')->get();
		$product_categories = $product->categoryproducts()->get();

		$catIds = array();
		foreach ($product_categories as $cat) {
			$catIds[] = $cat->category_id;
		}
		$media = null;
		if($product->media_id) {
			$media = Media::find($product->media_id);
		}
		$tags = $product->tags;
		$tagIds = array();
		foreach ($tags as $t) {
			$tagIds[] = $t->id;
		}

		// attributes
		$attributes = CartAttribute::orderBy('position', 'ASC')->get();
		$product_attributes = $product->attributes;
		$attrIds = array();
		foreach ($product_attributes as $a) {
			$attrIds[] = $a->id;
		}

		// Show the page
		return View::make('backend/cart/product_edit', compact('product', 'categories', 'catIds', 'media', 'tags', 'tagIds', 'attributes', 'product_attributes', 'attrIds'));
	}

	/**
	 * News Post update form processing page.
	 *
	 * @param  int  $productId
	 * @return Redirect
	 */
	public function postProductEdit($productId = null)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.editproduct']) )
			return View::make('backend/notallow');

		// Check if the cart product exists
		if (is_null($product = CartProduct::find($productId)))
		{
			// Redirect to the cart management page
			return Redirect::to('admin/cart')->with('error', Lang::get('admin/news/message.does_not_exist'));
		}

		// Declare the rules for the form validation
		$rules = array(
			'name'   => 'required|min:3',
			// 'excerpt' => 'required|min:3',
			// 'content' => 'required|min:3'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Update the news post data
		$product->name            = e(Input::get('name'));

		if (Input::get('slug')) 
		{
			if((Input::get('slug') != $product->slug))
				$product->slug         = $this->slug(Input::get('slug'));
		} else {
			$product->slug         = e(Str::slug(Input::get('name')));
		}

		$product->sku          	= Input::get('sku');
		$product->excerpt          	= Input::get('excerpt');
		$product->content          	= Input::get('content');
		$product->price      		= e(Input::get('price', 0));
		$product->discount_price	= e(Input::get('discount_price', 0));
		$product->quantity			= e(Input::get('quantity', 1));
		$product->stock_status		= e(Input::get('stock_status'));

		$product->is_featured      	= e(Input::get('is_featured', 0));
		$product->is_popular       	= e(Input::get('is_popular', 0));
		$product->showon_homepage	= e(Input::get('showon_homepage', 0));
		$product->allow_comments	= e(Input::get('allow_comments', 0));
		$product->media_id     		= e(Input::get('media_id'));
		$product->status          	= e(Input::get('status'));

		$product->meta_title       	= e(Input::get('meta-title'));
		$product->meta_description 	= e(Input::get('meta-description'));
		$product->meta_keywords    	= e(Input::get('meta-keywords'));

		// Was the news product updated?
		if($product->save())
		{
			// Update reference tags
			$tagIds = e(Input::get('tags'));
			if($tagIds) {
	  			$product->removeTag();
	  			$product->insertTags($tagIds);
			}

			$attrIds = Input::get('attrs');
			$product->attributes()->sync($attrIds);

			// Update reference categories
			if(Input::get('categories'))
	  		{
	  			$product->removeCate();
	  			foreach(Input::get('categories') as $cateId)
	  			{
	  				$cateproduct = new CartCategoryProduct;
	  				$cateproduct->category_id = $cateId;
	  				$cateproduct->product_id = $product->id;
	  				$cateproduct->save();
	  				$product->category_id = $cateId;
	  			}
	  		}
	  		if(!$product->category_id) {
	  			$product->save();
	  		}
			// Redirect to the new news product page
			return Redirect::to("admin/cart/products/$productId/edit")->with('success', Lang::get('admin/news/message.update.success'));
		}

		// Redirect to the news post management page
		return Redirect::to("admin/cart/products/$productId/edit")->with('error', Lang::get('admin/news/message.update.error'));
	}

	/**
	 * Delete the given news product.
	 *
	 * @param  int  $productId
	 * @return Redirect
	 */
	public function getProductDelete($productId)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.deleteproduct']) )
			return View::make('backend/notallow');

		// Check if the news product exists
		if (is_null($product = CartProduct::find($productId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/cart')->with('error', Lang::get('admin/news/message.not_found'));
		}

		// Delete the news product
		$product->delete();

		// Redirect to the news posts management page
		return Redirect::to('admin/cart')->with('success', Lang::get('admin/news/message.delete.success'));
	}
	/**
	 * Set cover image.
	 *
	 * @param  int  $postId
	 * @param  int  $mediaId
	 * @return Redirect
	 */
	public function postSetCover() {

        $rules = array(
            'media_id' => 'required'
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails())
        {
            Messages::add('error','Co loi xay ra!');
        }else{
        	$media = Media::find(e(Input::get('media_id')));
        	if (!is_null($post = Post::find(e(Input::get('post_id')))) && !is_null($media))
			{
				$post->media_id = $media->id;
				$post->save();
				return $media->toJson();
			} else if($media) {
				return $media->toJson();
			}
        }
	}
	/**
	 * Set primary category post.
	 *
	 * @param  int  $postId
	 * @param  int  $categoryId
	 * @return Redirect
	 */
	public function postSetCategory() {

        $rules = array(
            'category_id' => 'required'
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails())
        {
            Messages::add('error','Co loi xay ra!');
        }else{
        	if (!is_null($product = CartProduct::find(e(Input::get('product_id')))))
			{
				$product->category_id = Input::get('category_id');
				$product->save();
				echo 1;
			}
        }
    }

    public function postAddImage() {

        $rules = array(
            'media_id' => 'required'
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails())
        {
            Messages::add('error','Co loi xay ra!');
        }else{
        	$media = Media::find(e(Input::get('media_id')));
        	if (!is_null($product = CartProduct::find(e(Input::get('product_id')))) && !is_null($media))
			{
				$existmedia = CartProductMedia::where('product_id', $product->id)->where('media_id', $media->id)->first();
				if(is_null($existmedia)) {
					$productmedia = new CartProductMedia;
					$productmedia->media_id = $media->id;
					$productmedia->product_id = $product->id;
					$productmedia->save();
					return $media->toJson();
				}

				$media->status = 0;
				return $media->toJson();
				
			} else if($media) {
				$media->status = 0;
				return $media->toJson();
			}
        }
    }


    public function postRemoveImage() {

        $rules = array(
            'media_id' => 'required'
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails())
        {
            Messages::add('error','Co loi xay ra!');
        }else{
        	$productmedia = CartProductMedia::where('product_id', Input::get('product_id'))->where('media_id', Input::get('media_id'))->first();

        	if (!is_null($productmedia))
			{
				$productmedia->delete();
				return json_encode(array('status'=> 1, 'media_id' => Input::get('media_id')));
			} else {
				return json_encode('status', 0);
			}
        }
    }


	/**
	 * Return unique slug.
	 *
	 * @return User
	 */
	public function slug($slug)
	{
		$existPost = CartProduct::where('slug', $slug)->first();

		if (!is_null($existPost)) {
			return $slug.'-'.time();
		}

		return $slug;
	}



	/**
	 * Show a list of all the categories.
	 *
	 * @return View
	 */
	public function getCategoryIndex()
	{
		// Grab all the categories
		$categories = CartCategory::where('parent_id', '=', 0)->orderBy('showon_menu', 'ASC')->get();

		// Show the page
		return View::make('backend/cart/category_index', compact('categories'));
	}

	/**
	 * News post create.
	 *
	 * @return View
	 */
	public function getCategoryCreate()
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.createcategory']) )			
			return View::make('backend/notallow');

		// Grab all the categories
		$categories = CartCategory::where('parent_id', '=', 0)->orderBy('showon_menu', 'ASC')->get();
		// Show the page
		return View::make('backend/cart/category_create', compact('categories'));
	}
	/**
	 * News post create form processing.
	 *
	 * @return Redirect
	 */
	public function postCategoryCreate()
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.createcategory']) )
			return View::make('backend/notallow');

		// Declare the rules for the form validation
		$rules = array(
			'name'   => 'required|min:3',
			'status' => 'required'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Create a new news category
		$category = new CartCategory;

		// Update the news category data
		$category->name            	= Input::get('name');
		$category->slug             = e(Str::slug(Input::get('name')));
		$category->parent_id        = e(Input::get('parent_id'));
		$category->showon_menu      = e(Input::get('showon_menu'));
		$category->showon_homepage  = e(Input::get('showon_homepage'));
		$category->status           = e(Input::get('status'));
		$category->user_id          = Sentry::getId();

		// Was the cart category created?
		if($category->save())
		{
			// Redirect to the new cart category page
			return Redirect::to("admin/cart/categories")->with('success', Lang::get('admin/categories/message.create.success'));
		}

		// Redirect to the cart category create page
		return Redirect::to('admin/cart/categories/create')->with('error', Lang::get('admin/categories/message.create.error'));
	}

	/**
	 * News category update.
	 *
	 * @param  int  $catId
	 * @return View
	 */
	public function getCategoryEdit($catId = null)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.editcategory']) )
			return View::make('backend/notallow');

		// Check if the cart category exists
		if (is_null($category = CartCategory::find($catId)))
		{
			// Redirect to the cart management page
			return Redirect::to('admin/cart/categories')->with('error', Lang::get('admin/categories/message.does_not_exist'));
		}
		// Grab all the categories
		$categories = CartCategory::where('parent_id', '=', 0)->orderBy('showon_menu', 'ASC')->get();

		// Show the page
		return View::make('backend/cart/category_edit', compact('category', 'categories'));
	}

	/**
	 * News Category update form processing page.
	 *
	 * @param  int  $catId
	 * @return Redirect
	 */
	public function postCategoryEdit($catId = null)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.editcategory']) )
			return View::make('backend/notallow');

		// Check if the cart category exists
		if (is_null($category = CartCategory::find($catId)))
		{
			// Redirect to the cart management page
			return Redirect::to('admin/cart/categories')->with('error', Lang::get('admin/categories/message.does_not_exist'));
		}

		// Declare the rules for the form validation
		$rules = array(
			'name'   => 'required|min:3',
			'status' => 'required'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Update the news post data
		$category->name            	= Input::get('name');
		$category->slug             = e(Str::slug(Input::get('name')));
		$category->parent_id        = e(Input::get('parent_id'));
		$category->showon_menu      = e(Input::get('showon_menu'));
		$category->showon_homepage  = e(Input::get('showon_homepage'));
		$category->status           = e(Input::get('status'));

		// Was the news post updated?
		if($category->save())
		{
			// Redirect to the new news category page
			return Redirect::to("admin/cart/categories/$catId/edit")->with('success', Lang::get('admin/categories/message.update.success'));
		}

		// Redirect to the categories category management page
		return Redirect::to("admin/cart/categories/$catId/edit")->with('error', Lang::get('admin/categories/message.update.error'));
	}

	/**
	 * Delete the given cart category.
	 *
	 * @param  int  $catId
	 * @return Redirect
	 */
	public function getCategoryDelete($catId)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.deletecategory']) )
			return View::make('backend/notallow');

		// Check if the cart post exists
		if (is_null($category = CartCategory::find($catId)))
		{
			// Redirect to the cart management page
			return Redirect::to('admin/cart/categories')->with('error', Lang::get('admin/categories/message.not_found'));
		}

		if($category->parent_id==0) {
			foreach ($category->subscategories as $subcate) {
				$subcate->parent_id = 0;
				$subcate->save();
			}
		}

		// Delete the categories category
		$category->delete();

		// Redirect to the categories posts management page
		return Redirect::to('admin/cart/categories')->with('success', Lang::get('admin/categories/message.delete.success'));
	}
	
	/* Attributes */


	/**
	 * Show a list of all the categories.
	 *
	 * @return View
	 */
	public function getAttributeIndex()
	{
		// Grab all the categories
		$attributes = CartAttribute::select('cart_attributes.*', 'medias.mpath', 'medias.mname')->where('parent_id', '=', 0)
			->leftJoin('medias', 'medias.id', '=', 'cart_attributes.media_id')
			->orderBy('position', 'ASC')->get();
		// Show the page
		return View::make('backend/cart/attribute_index', compact('attributes'));
	}

	/**
	 * News post create form processing.
	 *
	 * @return Redirect
	 */
	public function postAttributeCreate()
	{
		// Declare the rules for the form validation
		$rules = array(
			'name'   => 'required'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Create a new news attribute
		$attribute = new CartAttribute;

		// Update the news attribute data
		$attribute->name            	= Input::get('name');
		$attribute->slug             = e(Str::slug(Input::get('name')));
		$attribute->position      = e(Input::get('position'));
		$attribute->description      = e(Input::get('description'));

		// Was the cart attribute created?
		if($attribute->save())
		{
			// Redirect to the new cart Attribute page
			return Redirect::to("admin/cart/attributes")->with('success', Lang::get('admin/categories/message.create.success'));
		}

		// Redirect to the cart Attribute create page
		return Redirect::to('admin/cart/attributes')->with('error', Lang::get('admin/categories/message.create.error'));
	}

	/**
	 * News category update.
	 *
	 * @param  int  $catId
	 * @return View
	 */
	public function getAttributeEdit($catId = null)
	{
		// Check if the cart category exists
		if (is_null($attribute = CartAttribute::find($catId)))
		{
			// Redirect to the cart management page
			return Redirect::to('admin/cart/attributes')->with('error', Lang::get('admin/categories/message.does_not_exist'));
		}
		// Grab all the categories
		$attributes = CartAttribute::where('parent_id', '=', 0)->orderBy('position', 'ASC')->get();
		$media = Media::find($attribute->media_id);

		// Show the page
		return View::make('backend/cart/attribute_edit', compact('attribute', 'attributes', 'media'));
	}

	/**
	 * News Category update form processing page.
	 *
	 * @param  int  $attrId
	 * @return Redirect
	 */
	public function postAttributeEdit($attrId = null)
	{

		// Check if the cart category exists
		if (is_null($attribute = CartAttribute::find($attrId)))
		{
			// Redirect to the cart management page
			return Redirect::to('admin/cart/attributes')->with('error', Lang::get('admin/categories/message.does_not_exist'));
		}

		// Declare the rules for the form validation
		$rules = array(
			'name'   => 'required|min:3'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Update the news post data
		$attribute->name            	= Input::get('name');
		$attribute->slug             = e(Str::slug(Input::get('name')));
		$attribute->description  = Input::get('description');
		$attribute->media_id  = Input::get('media_id');

		// Was the news post updated?
		if($attribute->save())
		{
			// Redirect to the new news attribute page
			return Redirect::to("admin/cart/attributes/$attrId/edit")->with('success', Lang::get('admin/categories/message.update.success'));
		}

		// Redirect to the categories attribute management page
		return Redirect::to("admin/cart/attributes/$attrId/edit")->with('error', Lang::get('admin/categories/message.update.error'));
	}

	/**
	 * Delete the given cart attribute.
	 *
	 * @param  int  $catId
	 * @return Redirect
	 */
	public function getAttributeDelete($catId)
	{
		// Check if the cart post exists
		if (is_null($attribute = CartAttribute::find($catId)))
		{
			// Redirect to the cart management page
			return Redirect::to('admin/cart/attributes')->with('error', Lang::get('admin/categories/message.not_found'));
		}

		if($attribute->parent_id==0) {
			foreach ($attribute->subsattributes as $subcate) {
				$subcate->parent_id = 0;
				$subcate->save();
			}
		}

		// Delete the attributes attribute
		$attribute->delete();

		// Redirect to the attributes posts management page
		return Redirect::to('admin/cart/attributes')->with('success', Lang::get('admin/categories/message.delete.success'));
	}

	public function postAttributeOrder()
	{
	    $source       = e(Input::get('source'));
	    $destination  = e(Input::get('destination', 0));

	    $item             = CartAttribute::find($source);
	    $item->parent_id  = $destination;  
	    $item->save();

	    $ordering       = json_decode(Input::get('order'));
	    $rootOrdering   = json_decode(Input::get('rootOrder'));

	    if($ordering){
	      foreach($ordering as $order=>$item_id){
	        if($itemToOrder = CartAttribute::find($item_id)){
	            $itemToOrder->position = $order;
	            $itemToOrder->save();
	        }
	      }
	    } else {
	      foreach($rootOrdering as $order=>$item_id){
	        if($itemToOrder = CartAttribute::find($item_id)){
	            $itemToOrder->position = $order;
	            $itemToOrder->save();
	        }
	      }
	    }

	    return 'ok ';
	}

	public function postCategoryOrder()
	{
	    $source       = e(Input::get('source'));
	    $destination  = e(Input::get('destination', 0));

	    $item             = CartCategory::find($source);
	    $item->parent_id  = $destination;  
	    $item->save();

	    $ordering       = json_decode(Input::get('order'));
	    $rootOrdering   = json_decode(Input::get('rootOrder'));

	    if($ordering){
	      foreach($ordering as $order=>$item_id){
	        if($itemToOrder = CartCategory::find($item_id)){
	            $itemToOrder->showon_menu = $order;
	            $itemToOrder->save();
	        }
	      }
	    } else {
	      foreach($rootOrdering as $order=>$item_id){
	        if($itemToOrder = CartCategory::find($item_id)){
	            $itemToOrder->showon_menu = $order;
	            $itemToOrder->save();
	        }
	      }
	    }

	    return 'ok ';
	}

	public function getOrdersIndex()
	{
		$this->data['status'] = $status = Input::get('status');

		$this->data['orders'] = $orders = CartOrder::where(function($query){
				if($this->data['status'])
					$query->where('status', $this->data['status']);
			})
			->orderBy('created_at', 'desc')->paginate(10);
		// Show the page
		return View::make('backend/cart/orders_index', $this->data);
	}

	public function getOrdersEdit($orderId)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.editorder']) )
			return View::make('backend/notallow');

		// Check if the cart category exists
		if (is_null($order = CartOrder::find($orderId)))
		{
			// Redirect to the cart management page
			return Redirect::to('admin/cart/orders')->with('error', Lang::get('admin/general.does_not_exist'));
		}

		$this->data['order'] = $order;
		$this->data['products'] = $order->products;

		// Show the page
		return View::make('backend/cart/orders_edit', $this->data);
	}

	public function postOrdersEdit($orderId)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['cart','cart.editcategory']) )
			return View::make('backend/notallow');

		// Check if the cart order exists
		if (is_null($order = CartOrder::find($orderId)))
		{
			// Redirect to the cart management page
			return Redirect::to('admin/cart/orders')->with('error', Lang::get('admin/general.does_not_exist'));
		}

		// Declare the rules for the form validation
		$rules = array(
			'status' => 'required'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$order->address 			= Input::get('hometown');
		$order->shipping_date 		= Input::get('shipping_date');
		$order->customer_note 		= Input::get('customer_note');
		$order->admin_note 			= Input::get('admin_note');
		$order->status 				= Input::get('status');
		$order->code 				= Input::get('code');

		// Was the order updated?
		if($order->save())
		{
			// Redirect to the new order page
			return Redirect::to("admin/cart/orders/$orderId/edit")->with('success', Lang::get('general.success'));
		}

		// Redirect to the categories order management page
		return Redirect::to("admin/cart/orders/$orderId/edit")->with('error', Lang::get('general.error'));
	}

	public function postOrderProductsEdit($orderId)
	{
		// 
	}

	public function getReviewsIndex()
	{
		$this->data['reviews'] = CartReview::select('cart_reviews.*', 'cart_products.slug', 'cart_products.name')
			->join('cart_products', 'cart_products.id', '=', 'cart_reviews.product_id')
			->orderBy('cart_reviews.created_at', 'desc')
			->paginate(20);
		return View::make("backend/cart/review_index", $this->data);
	}

	public function getReviewDelete($rId)
	{

		// Check if the news post exists
		if (is_null($review = CartReview::find($rId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/cart/reviews')->with('error', Lang::get('message.not_found'));
		}
		
		$review->delete();

		return Redirect::to('admin/cart/reviews')->with('success', Lang::get('general.success'));
	}

	public function getReviewSpam($rId)
	{

		// Check if the news post exists
		if (is_null($review = CartReview::find($rId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/cart/reviews')->with('error', Lang::get('message.not_found'));
		}

		$review->spam = 1;
		$review->approved = 0;
		$review->save();

		return Redirect::to('admin/cart/reviews')->with('success', Lang::get('general.success'));
	}

	public function getReviewApprove($rId)
	{

		// Check if the news post exists
		if (is_null($review = CartReview::find($rId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/cart/reviews')->with('error', Lang::get('message.not_found'));
		}
		
		$review->spam = 0;
		$review->approved = 1;
		$review->save();

		return Redirect::to('admin/cart/reviews')->with('success', Lang::get('general.success'));
	}
}