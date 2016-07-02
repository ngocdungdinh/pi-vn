<?php namespace Controllers\Profile;

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

use BaseController;
use Redirect;
use User;
use Lang;
use Post;
use Category;
use Place;
use Media;
use EventPlace;
use UserFollow;
use Validator;
use View;
use Sentry;
use Mailer;
use Input;

class ProfileController extends BaseController {

	/**
	 * Redirect to the profile page.
	 *
	 * @return Redirect
	 */
	public function getIndex($username)
	{
		$this->data['profile'] = $profile = User::select('users.*')
				->where('username', $username)->first();
		if(is_null($this->data['profile']))
			return Redirect::route('home')->with('error', Lang::get('message.error.notallow'));

		$this->data['existfollow'] = UserFollow::existfollow($profile->id);

		$this->data['pages'] = $pages = e(Input::get('p', 'dash'));
		$this->data['type'] = $type = Input::get('type', '');

		if($pages == '' || $pages == 'dash')
		{
		} else {
		}
		// Redirect to the profile page
		return View::make('frontend/profile/'.$pages, $this->data);
	}


	public function postFollow()
	{
		// Declare the rules for the form validation
		$rules = array(
			'follow_id' => 'required|exists:users,id'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return 0;
		}

		// Grab the user
		$user = Sentry::getUser();
		$follow = User::find(e(Input::get('follow_id')));
		if($follow) {
			// check exist follow
			$userfollow = UserFollow::where('user_id', $user->id)->where('follow_id', $follow->id)->first();
			if(is_null($userfollow))
			{
				$userfollow = new UserFollow;
				$userfollow->user_id = $user->id;
				$userfollow->follow_id = $follow->id;
				$userfollow->save();

				// update follow count
				$follow->follows = $follow->follows + 1;
				$follow->save();
				// send mail
				$obj['title'] = "acb";
				Mailer::sendmail('userfollow', $obj, $user, $follow, false);
				return 1;
			}
		}

		return 0;
	}


	public function postUnFollow()
	{
		// Declare the rules for the form validation
		$rules = array(
			'follow_id' => 'required|exists:users,id'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return 0;
		}

		// Grab the user
		$user = Sentry::getUser();
		$follow = User::find(e(Input::get('follow_id')));
		if($follow) {
			// check exist follow
			$userfollow = UserFollow::where('user_id', $user->id)->where('follow_id', $follow->id)->first();
			if(!is_null($userfollow))
			{
				$userfollow->delete();

				// update follow count
				$follow->follows = $follow->follows - 1;
				$follow->save();

				return 1;
			}
		}

		return 0;
	}

}
