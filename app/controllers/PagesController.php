<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

class PagesController extends BaseController {

	/**
	 * View a news post.
	 *
	 * @param  string  $slug
	 * @return View
	 * @throws NotFoundHttpException
	 */
	public function getView($slug)
	{
		// Get this news post data
		$this->data['page'] = $page = Post::where('slug', $slug)->first();

		$media = null;
		switch ($page->post_type) {
			case 'intro':
				//$this->data['pages'] = $pages = Post::where('post_type', 'intro')->get();
				$post_type = 'intro';
				$this->data['page_slug'] = 'gioi-thieu';
				$this->data['page_group'] = 'Giới thiệu';
				break;
			case 'service':
				//$this->data['pages'] = $pages = Post::where('post_type', 'service')->get();
				$post_type = 'service';
				$this->data['page_slug'] = 'dich-vu';
				$this->data['page_group'] = 'Dịch vụ';
				break;
			default:
				//$this->data['pages'] = $pages = Post::where('post_type', 'page')->get();
				$post_type = 'page';
				$this->data['page_slug'] = 'page';
				$this->data['page_group'] = 'Thông tin';
		}

		// Get all the news posts
		$this->data['pages'] = Post::select('posts.*', 'medias.mpath', 'medias.mname')
			->leftJoin('medias', 'medias.id', '=', 'posts.media_id')
			->where('status', 'published')
			->where('post_type', $post_type)
			->orderBy('publish_date', 'ASC')->get();


		$media = null;
		if($page->media_id) {
			$this->data['media'] = $media = Media::find($page->media_id);
		} else {
			$this->data['media'] = '';
		}

		// Check if the news post exists
		if (is_null($page))
		{
			// If we ended up in here, it means that a page or a news post
			// don't exist. So, this means that it is time for 404 error page.
			return App::abort(404);
		}

		// Show the page
		return View::make('frontend/pages/view-page', $this->data);
	}

}