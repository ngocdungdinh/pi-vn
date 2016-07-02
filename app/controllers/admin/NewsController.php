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
use Post;
use Royalty;
use Category;
use CategoryPost;
use PostTag;
use Media;
use DateTime;
use Redirect;
use Permission;
use Sentry;
use Str;
use Validator;
use View;
use Config;

class NewsController extends AdminController {

	/**
	 * Show a list of all the news posts.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		$this->data['status'] = $status = Input::get('status');
		// Grab all the news posts

		$this->data['posts'] = Post::withTrashed()->select('posts.*', 'medias.mpath', 'medias.mname')
		->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
		->where(function($query){
			if($this->data['status'] == 'deleted') {
				$query->whereNotNull('posts.deleted_at');
			} elseif($this->data['status'] != 'deleted' && $this->data['status'] != '') {
				$query->where('posts.status', $this->data['status']);
				$query->whereNull('posts.deleted_at');
			}
		})
		->where('post_type', 'post')
		->orderBy('created_at', 'DESC')
		->paginate(30);

		$this->data['appends'] = array(
			'status' => $status,
		);

		$this->data['categories'] = Category::orderBy('showon_menu', 'ASC')->get();
		$this->data['writers'] = Sentry::findAllUsersWithAccess('admin');
		// Show the page
		return View::make('backend/news/index', $this->data);
	}

	/**
	 * Search post.
	 *
	 * @return View
	 */
	public function getSearch()
	{
		$this->data['type'] = $type = Input::get('type', 0);
		$this->data['status'] = $status = Input::get('status');
		$this->data['user_id'] = $user_id = Input::get('user_id', 0);
		$this->data['keyword'] = $keyword = Input::get('key');
		$this->data['category_id'] = $category_id = Input::get('category_id', 0);
		$this->data['keyslug'] = $keyslug = Str::slug($keyword);
		// Grab the news posts
		
		$this->data['appends'] = array(
			'type' => $type,
			'status' => $status,
			'user_id' => $user_id,
			'keyword' => $keyword,
			'category_id' => $category_id,
			'keyslug' => $keyslug
		);

		$this->data['posts'] = Post::withTrashed()->select('posts.*', 'medias.mpath', 'medias.mname')
		->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
		->where('post_type', 'post')
		->where(function($query){
			if($this->data['keyslug'])
				$query->where('slug', 'like', '%'.$this->data['keyslug'].'%');
		})
		->where(function($query){
			if($this->data['category_id'])
				$query->where('category_id', '=', $this->data['category_id']);
		})
		->where(function($query){
			if($this->data['user_id'])
				$query->where('user_id', '=', $this->data['user_id']);
		})
		->where(function($query){
			if($this->data['type'])
			{
				switch ($this->data['type']) {
					case 'homepage':
						$query->where('showon_homepage', 1);
						break;
					case 'featured':
						$query->where('is_featured', 1);
						break;
					case 'popular':
						$query->where('is_popular', 1);
						break;
				}
			} else {
				$query->orderBy('created_at', 'DESC');
			}
		})
		->orderBy('created_at', ($this->data['type'] && $this->data['type']=='oldest' ? 'asc' : 'desc'))
		->paginate(30);

		$this->data['categories'] = Category::orderBy('showon_menu', 'ASC')->get();
		$this->data['writers'] = Sentry::findAllUsersWithAccess('admin');

		// Show the page
		return View::make('backend/news/index', $this->data);
	}

	public function getStatistics()
	{
		$this->data['start_date'] = Input::get('start_date', date("Y-m-d H:i:s", strtotime('first day of this month')));
		$this->data['end_date'] = Input::get('end_date', date("Y-m-d H:i:s", strtotime("now")));

		$this->data['categories'] = Category::orderBy('showon_menu', 'ASC')->get();
		$this->data['writers'] = Sentry::findAllUsersWithAccess('admin');

		$this->data['type'] = $type = Input::get('type', 0);
		$this->data['user_id'] = $user_id = Input::get('user_id', 0);
		$this->data['category_id'] = $category_id = Input::get('category_id', 0);
		// Grab the news posts
		
		$this->data['appends'] = array(
			'type' => $type,
			'user_id' => $user_id,
			'category_id' => $category_id,
		);

		$this->data['posts'] = $posts = Post::select('*', 'posts.id as id')
		->join('users', 'users.id', '=', 'posts.user_id')
		->leftJoin('royalties', 'posts.id','=', 'royalties.item_id')
		->where('posts.post_type', 'post')
		->where('posts.status', 'published')
		->where(function($query){
			if($this->data['category_id'])
				$query->where('posts.category_id', '=', $this->data['category_id']);
		})
		->where(function($query){
			if($this->data['user_id'])
				$query->where('posts.user_id', '=', $this->data['user_id']);
		})
		->where(function($query){
			if($this->data['type'])
			{
				switch ($this->data['type']) {
					case 'royalty':
						$query->where('royalties.item_type', 'post');
						break;
					case 'notroyalty':
						$query->whereNull('royalties.id');
						break;
				}
				switch ($this->data['type']) {
					case 'mostview':
						$query->orderBy('posts.view_count', 'desc');
						break;
				}
			} else {
				$query->orderBy('posts.created_at', 'DESC');
			}
		})
		->where('posts.publish_date', '>=', $this->data['start_date'])
		->where('posts.publish_date', '<=', $this->data['end_date'])
		->orderBy('posts.created_at', ($this->data['type'] && $this->data['type']=='oldest' ? 'asc' : 'desc'))
		->groupBy('posts.id')
		->paginate(200);

		$counts = array();
		foreach ($posts as $key => $post) {
			if(!isset($counts['cat'][$post->category_id]['count']))
				$counts['cat'][$post->category_id]['count'] = 0;
			$counts['cat'][$post->category_id]['count'] = $counts['cat'][$post->category_id]['count'] + 1;
			
			if(!isset($counts['user'][$post->user_id]['count']))
				$counts['user'][$post->user_id]['count'] = 0;
			$counts['user'][$post->user_id]['count'] = $counts['user'][$post->user_id]['count'] + 1;

			# code...
		}
		$this->data['counts'] = $counts;

		return View::make('backend/news/statistics', $this->data);
	}

	/**
	 * News post create.
	 *
	 * @return View
	 */
	public function getCreate()
	{
		if ( !Sentry::getUser()->hasAnyAccess(['news','news.create']) )
			return View::make('backend/notallow');

		$categories = Category::orderBy('showon_menu', 'ASC')->get();
		// Show the page
		return View::make('backend/news/create', compact('categories'));
	}

	/**
	 * News post create form processing.
	 *
	 * @return Redirect
	 */
	public function postCreate()
	{
		if ( !Sentry::getUser()->hasAnyAccess(['news','news.create']) )
			return View::make('backend/notallow');

		// Declare the rules for the form validation
		$rules = array(
			'title'   => 'required|min:3',
			// 'excerpt' => 'required|min:3',
			'content' => 'required|min:3'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Create a new news post
		$post = new Post;

		// Update the news post data
		$post->title            = e(Input::get('title'));

		if (Input::get('slug'))
		{
			$post->slug         = $this->slug(Input::get('slug'));
		} else {
			$post->slug         = e(Str::slug(Input::get('title')));
		}

		$post->excerpt          = Input::get('excerpt');
		$post->content          = Input::get('content');
		$post->is_featured      = e(Input::get('is_featured', 0));
		$post->is_popular       = e(Input::get('is_popular', 0));
		$post->showon_homepage	= e(Input::get('showon_homepage', 0));
		$post->allow_comments	= e(Input::get('allow_comments', 0));
		$post->publish_date     = Input::get('publish_date') ? Input::get('publish_date') : new DateTime;
		$post->media_id     	= e(Input::get('media_id'));
		$post->status          	= e(Input::get('status'));

		$post->meta_title       = e(Input::get('meta-title'));
		$post->meta_description = e(Input::get('meta-description'));
		$post->meta_keywords    = e(Input::get('meta-keywords'));
		$post->user_id          = Sentry::getId();

		// Was the news post created?
		if($post->save())
		{
			// Update reference topics
			$topicIds = e(Input::get('topics'));
			if($topicIds) {
	  			$post->insertTags($topicIds);
			}

			// Update reference tags
			$tagIds = e(Input::get('tags'));
			if($tagIds) {
	  			$post->insertTags($tagIds);
			}

			// Update reference categories
			if(Input::get('categories'))
	  		{
	  			foreach(Input::get('categories') as $cateId)
	  			{
	  				$catepost = new CategoryPost;
	  				$catepost->category_id = $cateId;
	  				$catepost->post_id = $post->id;
	  				$catepost->save();
	  				$post->category_id = $cateId;
	  			}
	  			$post->save();
	  		}
			// Redirect to the new news post page
			return Redirect::to("admin/news/$post->id/edit")->with('success', Lang::get('admin/news/message.create.success'));
		}

		// Redirect to the news post create page
		return Redirect::to('admin/news/create')->with('error', Lang::get('admin/news/message.create.error'));
	}

	/**
	 * News post update.
	 *
	 * @param  int  $postId
	 * @return View
	 */
	public function getEdit($postId = null)
	{

		// Check if the news post exists
		if (is_null($post = Post::withTrashed()->find($postId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/news')->with('error', Lang::get('admin/news/message.does_not_exist'));
		}
		$this->data['post'] = $post;
		$this->data['categories'] = $categories = Category::orderBy('showon_menu', 'ASC')->get();
		$post_categories = $post->categoryposts()->get();

		$catIds = array();
		foreach ($post_categories as $cat) {
			$catIds[] = $cat->category_id;
		}
		$media = null;
		if($post->media_id) {
			$media = Media::find($post->media_id);
		}

		$topics = $post->topics;
		$topicIds = array();
		foreach ($topics as $t) {
			$topicIds[] = $t->id;
		}

		$tags = $post->tags;
		$tagIds = array();
		foreach ($tags as $t) {
			$tagIds[] = $t->id;
		}
		// get royalties
		$royalties = Royalty::select('*')
			->where('item_type', 'post')
			->where('item_id', $post->id)
			->get();
		$royalyTotal = Royalty::select('*')
			->where('item_type', 'post')
			->where('item_id', $post->id)
			->sum('total');
		// Show the page	

		$this->data['catIds'] = $catIds;	
		$this->data['topicIds'] = $topicIds;	
		$this->data['tagIds'] = $tagIds;	
		$this->data['media'] = $media;	
		$this->data['topics'] = $topics;	
		$this->data['tags'] = $tags;	
		$this->data['royalties'] = $royalties;	
		$this->data['royalyTotal'] = $royalyTotal;	

		if(!Permission::has_access('news', 'full') || ($post->status == 'published' && !Permission::has_access('news', 'publish')) || ( !Permission::has_access('news', 'edit', $post->user_id)) || !is_null($post->deleted_at) )
			return View::make('backend/news/view', $this->data);
		else
			return View::make('backend/news/edit', $this->data);
	}

	/**
	 * News Post update form processing page.
	 *
	 * @param  int  $postId
	 * @return Redirect
	 */
	public function postEdit($postId = null)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['news','news.edit']) )
			return View::make('backend/notallow');

		// Check if the news post exists
		if (is_null($post = Post::find($postId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/news')->with('error', Lang::get('admin/news/message.does_not_exist'));
		}

		// Declare the rules for the form validation
		$rules = array(
			'title'   => 'required|min:3',
			// 'excerpt' => 'required|min:3',
			'content' => 'required|min:3',
			'publish_date' => 'required',
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
		$post->title            = e(Input::get('title'));

		if (Input::get('slug')) 
		{
			if((Input::get('slug') != $post->slug))
				$post->slug         = $this->slug(Input::get('slug'));
		} else {
			$post->slug         = e(Str::slug(Input::get('title')));
		}

		$post->excerpt          = Input::get('excerpt');
		$post->content          = Input::get('content');
		$post->is_featured      = e(Input::get('is_featured', 0));
		$post->is_popular       = e(Input::get('is_popular', 0));
		$post->showon_homepage	= e(Input::get('showon_homepage', 0));
		$post->allow_comments	= e(Input::get('allow_comments', 0));
		$post->publish_date     = e(Input::get('publish_date'));
		$post->media_id     	= e(Input::get('media_id'));
		$post->status          	= e(Input::get('status'));

		$post->meta_title       = e(Input::get('meta-title'));
		$post->meta_description = e(Input::get('meta-description'));
		$post->meta_keywords    = e(Input::get('meta-keywords'));

		// Was the news post updated?
		if($post->save())
		{
			// Update reference topics/tags
			$topicIds = e(Input::get('topics'));
			$tagIds = e(Input::get('tags'));

			if($topicIds || $tagIds) {
	  			$post->removeTag();
	  			$post->insertTags($topicIds);
	  			$post->insertTags($tagIds);
			}

			// Update reference categories
			if(Input::get('categories'))
	  		{
	  			$post->removeCate();
	  			foreach(Input::get('categories') as $cateId)
	  			{
	  				$catepost = new CategoryPost;
	  				$catepost->category_id = $cateId;
	  				$catepost->post_id = $post->id;
	  				if(!$post->category_id)
	  					$post->category_id = $cateId;
	  				$catepost->save();
	  			}
	  			if(!$post->category_id)
	  				$post->save();
	  		}
			// Redirect to the new news post page
			return Redirect::to("admin/news/$postId/edit")->with('success', Lang::get('admin/news/message.update.success'));
		}

		// Redirect to the news post management page
		return Redirect::to("admin/news/$postId/edit")->with('error', Lang::get('admin/news/message.update.error'));
	}

	/**
	 * Delete the given news post.
	 *
	 * @param  int  $postId
	 * @return Redirect
	 */
	public function getDelete($postId)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['news','news.delete']) )
			return View::make('backend/notallow');

		// Check if the news post exists
		if (is_null($post = Post::find($postId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/news')->with('error', Lang::get('admin/news/message.not_found'));
		}

		// Delete the news post
		$post->delete();

		// Redirect to the news posts management page
		return Redirect::to('admin/news')->with('success', Lang::get('admin/news/message.delete.success'));
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
        	$media->featuredSize = Config::get('image.featuredsize');
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
            echo 'Co loi xay ra!';
        }else{
        	if (!is_null($post = Post::find(e(Input::get('post_id')))))
			{
				$post->category_id = Input::get('category_id');
				$post->save();
				echo 1;
			}
        }
    }


	/**
	 * get news list to modal.
	 *
	 * @param  int  $postId
	 * @param  int  $categoryId
	 * @return Redirect
	 */
	public function getPostList() {

		$this->data['tag_id'] = $tag_id = Input::get('tag_id');
		$this->data['keyword'] = $keyword = Input::get('keyword');
		$this->data['category_id'] = $category_id = Input::get('category_id');
		$this->data['keyslug'] = $keyslug = Str::slug($keyword);
		// Grab the news posts
		$posts = Post::select('*')
		->where('status', 'published')
		->where(function($query){
			if($this->data['keyslug']) {
				$query->where('slug', 'like', '%'.$this->data['keyslug'].'%');
			}
		})
		->where(function($query){
			if($this->data['category_id']) {
				$query->where('category_id', '=', $this->data['category_id']);
			}
		})
		->where('post_type', 'post')
		->orderBy('created_at', 'DESC')
		->paginate(10);

		$categories = Category::orderBy('showon_menu', 'ASC')->get();

		// Show the page
		return View::make('backend/news/postlist', compact('posts', 'categories', 'category_id', 'keyword', 'tag_id'));
    }


	/**
	 * Restore a deleted user.
	 *
	 * @param  int  $id
	 * @return Redirect
	 */
	public function getRestore($postId = null)
	{

		// Check if the news post exists
		if (is_null($post = Post::withTrashed()->find($postId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/news')->with('error', Lang::get('admin/news/message.does_not_exist'));
		}
		$post->user_id = Sentry::getId();
		$post->status = 'draft';
		$post->save();

		$post->restore();

		// Redirect to the news management page
		return Redirect::route('update/news', $post->id)->with('success', Lang::get('admin/news/message.restore.success'));
	}

	/**
	 * Return unique slug.
	 *
	 * @return User
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
