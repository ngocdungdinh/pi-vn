<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

class NewslettersController extends BaseController {

	/**
	 * Newsletter page.
	 *
	 * @return View
	 */
	public function getNewsletter()
	{
		$newsletter = new Newsletter;

		if(Sentry::check()) {
			$newsletter = Newsletter::where('email', Sentry::getUser()->email)->first();
		}

		$this->data['newsletter'] = $newsletter;
		return View::make('frontend/newsletters', $this->data);
	}

	/**
	 * subscribe new email.
	 *
	 * @param  string  $slug
	 * @return View
	 * @throws NotFoundHttpException
	 */
	public function postNewsletter()
	{
		// Declare the rules for the form validation
		$rules = array(
			'ntype'        => 'required',
			'email-newsletter'       => 'required|email|unique:newsletters,email'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			return Redirect::route('newsletters')->withErrors($validator);
		}

		$newsletter = new Newsletter;
		$newsletter->email 				= e(Input::get('email-newsletter'));
		$newsletter->is_news 			= e(Input::get('other_news', 0));
		
		if(Sentry::check()) {
			$newsletter->user_id 		= Sentry::getId();
			$newsletter->email 			= Sentry::getUser()->email;
		}

		if(Input::get('ntype') == 1) {
			$newsletter->is_conceive 	= 1;
		} else if(Input::get('ntype') == 2) {
			$newsletter->is_pregnant 	= 1;
			$newsletter->day 			= e(Input::get('day'));
			$newsletter->month 			= e(Input::get('month'));
			$newsletter->year 			= e(Input::get('year'));

		} else if(Input::get('ntype') == 3) {
			$newsletter->is_baby 		= 1;
			$newsletter->day 			= e(Input::get('day'));
			$newsletter->month 			= e(Input::get('month'));
			$newsletter->year 			= e(Input::get('year'));
		}

		$newsletter->save();

		$this->data['newsletter'] = $newsletter;

		Session::put('tempemail', $newsletter->email);
		# TODO !
		return View::make('frontend/newsletters', $this->data);
	}
}