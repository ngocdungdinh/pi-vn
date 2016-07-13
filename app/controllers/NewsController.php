<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

class NewsController extends BaseController {

	public function getIndex()
	{

		// Get all the news posts
		$this->data['posts'] = Post::select('posts.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', 'post')
			->orderBy('publish_date', 'DESC')->paginate(12);

		// Show the page
		return View::make('frontend/news/category', $this->data);
	}
	/**
	 * Returns all the news posts.
	 *
	 * @return View
	 */
	public function getCategory($catSlug)
	{
		$curr_time = new Datetime;
		$last_week = $curr_time->modify('-'.Config::get('app.backdays').' day');

		$this->data['category'] = $category = Category::where('slug', $catSlug)->first();
		
		// Check if the news category exists
		if (is_null($category))
		{
			// If we ended up in here, it means that a page or a news post
			// don't exist. So, this means that it is time for 404 error page.
			return App::abort(404);
		}

		// Get all the news posts
		$this->data['posts'] = $category->rposts()->select('posts.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', 'post')
			->orderBy('publish_date', 'DESC')->paginate(12);


		$this->data['mostview_post'] = $category->rposts()->select('posts.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', 'post')
			->where('publish_date', '>', $last_week)
			->orderBy('view_count', 'DESC')->take(4)->get();
			
		// Show the page
		return View::make('frontend/news/category', $this->data);
	}

	/**
	 * Returns all the news posts.
	 *
	 * @return View
	 */
	public function getTag($tagSlug)
	{
		$curr_time = new Datetime;
		$last_week = $curr_time->modify('-'.Config::get('app.backdays').' day');

		$this->data['tag'] = $tag = Tag::where('slug', $tagSlug)->first();
		// Check if the news category exists
		if (is_null($tag))
		{
			// If we ended up in here, it means that a page or a news post
			// don't exist. So, this means that it is time for 404 error page.
			return App::abort(404);
		}
		// Get all the news posts
		$this->data['posts'] = $tag->posts()->select('posts.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', 'post')
			->orderBy('publish_date', 'DESC')->paginate(12);
			
		// Show the page
		return View::make('frontend/news/tag', $this->data);
	}

	/**
	 * View a news post.
	 *
	 * @param  string  $slug
	 * @return View
	 * @throws NotFoundHttpException
	 */
	public function getView($catSlug, $slug)
	{
		$curr_time = new Datetime;
		$last_week = $curr_time->modify('-'.Config::get('app.backdays').' day');

		$this->data['category'] = $category = Category::where('slug', $catSlug)->first();
		
		// Get this news post data
		$this->data['post'] = $post = Post::select('posts.*', 'posts.id AS id', 'medias.mpath', 'medias.mname')->where('slug', $slug)
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', 'post')->first();

		// Check if the news post exists
		if (is_null($post))
		{
			// If we ended up in here, it means that a page or a news post
			// don't exist. So, this means that it is time for 404 error page.
			return App::abort(404);
		}
		$this->data['post_tags'] = $post_tags = $post->tags;
		$postTagArr = [0];
		foreach ($post_tags as $key => $tag) {
			$postTagArr[] = $tag->id;
		}

		// Get this post comments
		$this->data['comments'] = $post->comments()->with(array(
			'author' => function($query)
			{
				$query->withTrashed();
			},
		))->orderBy('created_at', 'DESC')->get();

		// Get all the news posts
		$this->data['category_posts'] = $category->rposts()->select('posts.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', 'post')
			->where('slug', '!=', $slug)
			->orderBy('publish_date', 'DESC')->take(4)->get();

		$this->data['mostview_post'] = $category->rposts()->select('posts.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', 'post')
			->where('slug', '!=', $slug)
			//->where('publish_date', '>', $last_week)
			->orderBy('view_count', 'DESC')->take(5)->get();


		$this->data['product_related'] = $product_related = CartProduct::select('cart_products.*', 'medias.mpath', 'medias.mname')
					->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id')
					->where('status', 'published')
					->orderBy('updated_at', 'DESC')->take(5)->get();
					
		// UPDATE count_view
		$postViewId = null;
        if(!Cookie::get('ses_last_views_news') || Cookie::get('ses_last_views_news') != 'post_'.$post->id) {
	        $post->view_count = $post->view_count + 1;
	        $post->save();
            $postViewId = Cookie::queue('ses_last_views_news', 'post_'.$post->id, 5);
        }

		// Show the page
		return View::make('frontend/news/view-post', $this->data)->withCookie($postViewId);
	}

	/**
	 * View a news post.
	 *
	 * @param  string  $slug
	 * @return Redirect
	 */
	public function postView($catSlug, $slug)
	{
		// The user needs to be logged in, make that check please
		if ( ! Sentry::check())
		{
			return Redirect::to($catSlug."/$slug#comments")->with('error', 'You need to be logged in to post comments!');
		}

		$this->data['category'] = $category = Category::where('slug', $catSlug)->first();
		
		// Get all the news posts
		$this->data['category_posts'] = $category->rposts()->select('posts.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', 'post')
			->where('slug', '!=', $slug)
			->orderBy('publish_date', 'DESC')->take(4)->get();

		// Get this news post data
		$post = Post::where('slug', $slug)->first();

		// Declare the rules for the form validation
		$rules = array(
			'comment' => 'required|min:3',
		);

		// Create a new validator instance from our dynamic rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now
		if ($validator->fails())
		{
			// Redirect to this news post page
			return Redirect::to($catSlug."/$slug#comments")->withInput()->withErrors($validator);
		}

		// Save the comment
		$comment = new Comment;
		$comment->user_id = Sentry::getUser()->id;
		$comment->content = e(Input::get('comment'));
		$comment->comment_type = 'post';

		// Was the comment saved with success?
		if($post->comments()->save($comment))
		{
			// Redirect to this news post page
			return Redirect::to($catSlug."/$slug#comments")->with('success', 'Your comment was successfully added.');
		}

		// Redirect to this news post page
		return Redirect::to($catSlug."/$slug#comments")->with('error', 'There was a problem adding your comment, please try again.');
	}

	/**
	 * Return unique slug.
	 *
	 * @return slug
	 */
	public function slug($slug)
	{
		$existPost = Post::where('slug', $slug)->first();

		if (!is_null($existPost)) {
			return $slug.'-'.time();
		}

		return $slug;
	}
}
