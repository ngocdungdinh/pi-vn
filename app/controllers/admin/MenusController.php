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
use Jinput;
use Lang;
use Menu;
use MenuLink;
use DateTime;
use Redirect;
use Sentry;
use Str;
use Validator;
use View;
use Config;

class MenusController extends AdminController {

	public function getIndex()
	{
		$this->data['menus'] = Menu::select('*')->get();
		$this->data['mId'] = $mId = Input::get('m', 0);
		if($mId) 
		{
			$this->data['links'] = MenuLink::select('*')->where('menu_id', $mId)->orderBy('showon', 'ASC')->get();
		}

		// Show the page
		return View::make('backend/menus/index', $this->data);
	}

	public function postCreate()
	{
		if ( !Sentry::getUser()->hasAnyAccess(['menus','menus.create']) )
			return View::make('backend/notallow');

		$this->data['menu_id'] = $menu_id = Input::get('menu_id', 0);

		// Declare the rules for the form validation
		$rules = array(
			'title'   => 'required',
			'position' => 'required',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if(isset($menu_id) && $menu_id)
		{		
			// update a new news menu
			$menu = Menu::find($menu_id);
		} else {
			// Create a new news menu
			$menu = new Menu;
		}

		// Update the news menu data
		$menu->title            = Input::get('title');
		$menu->position        	= e(Input::get('position'));
		$menu->status      		= 'on';

		// Was the news menu created?
		if($menu->save())
		{
			// Redirect to the new news menu page
			return Redirect::to("admin/menus")->with('success', Lang::get('general.success'));
		}

		// Redirect to the news category create page
		return Redirect::to('admin/menus')->with('error', Lang::get('general.error'));
	}



	public function postLinkCreate()
	{
		if ( !Sentry::getUser()->hasAnyAccess(['menus','menus.create']) )
			return View::make('backend/notallow');

		$this->data['link_id'] = $link_id = Input::get('link_id', 0);

		// Declare the rules for the form validation
		$rules = array(
			'title'   => 'required',
			'url' => 'required',
			'menu_id' => 'required',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if(isset($link_id) && $link_id)
		{		
			// update a new news menu
			$link = MenuLink::find($link_id);
		} else {
			// Create a new news menu
			$link = new MenuLink;	
		}

		// Update the news menu data
		$link->title            = Input::get('title');
		$link->alt            	= Input::get('alt');
		$link->target        	= Input::get('target');
		$link->url        		= Input::get('url');
		$link->menu_id        	= Input::get('menu_id');
		$link->parent_id        = Input::get('parent_id');

		// Was the news menu created?
		if($link->save())
		{
			// Redirect to the new news menu page
			return Redirect::to("admin/menus?m=".$link->menu_id)->with('success', Lang::get('general.success'));
		}

		// Redirect to the news category create page
		return Redirect::to("admin/menus?m=".$link->menu_id)->with('error', Lang::get('general.error'));
	}

	public function updateLinksPosition() {
		if ( !Sentry::getUser()->hasAnyAccess(['menus','menus.full']) )
			return View::make('backend/notallow');
		$this->data['data_sort'] = $data_sort = Input::get('datasort');
		if($data_sort)
		{
			$sortArr = explode(',', $data_sort);
			if(count($sortArr > 1))
			{
				foreach ($sortArr as $sort) {
					if(isset($sort[0]) && $sort[0])
					{
						list($link_id, $showon) = explode(':', $sort);
						if($link_id)
						{
							$link = MenuLink::find($link_id);
							$link->showon = $showon;
							$link->save();
						}
					}
				}
				return 1;
			}
		}
		return 0;
	}
	
	/**
	 * Delete the given news post.
	 *
	 * @param  int  $catId
	 * @return Redirect
	 */
	public function getDelete($menuId)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['menus','menus.delete']) )
			return View::make('backend/notallow');

		// Check if the news post exists
		if (is_null($menu = Menu::find($menuId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/menus')->with('error', Lang::get('general.error'));
		}

		// Delete the categories category
		$menu->delete();

		// Redirect to the news category create page
		return Redirect::to("admin/menus")->with('success', Lang::get('general.success'));
	}

	/**
	 * Delete the given news post.
	 *
	 * @param  int  $catId
	 * @return Redirect
	 */
	public function getLinkDelete($linkId)
	{
		if ( !Sentry::getUser()->hasAnyAccess(['menus','menus.delete']) )
			return View::make('backend/notallow');

		// Check if the news post exists
		if (is_null($link = MenuLink::find($linkId)))
		{
			// Redirect to the news management page
			return Redirect::to('admin/menus')->with('error', Lang::get('general.error'));
		}

		$menu_id = $link->menu_id;
		// Delete the categories category
		$link->delete();

		// Redirect to the news category create page
		return Redirect::to("admin/menus?m=".$menu_id)->with('success', Lang::get('general.success'));
	}
}