<?php

class BaseController extends Controller {

	public function __construct()
	{
		// Fetch the User object, or set it to false if not logged in
		if (Auth::check()) {
			$user = Auth::user();
		}
		else {
			$user = false;
		}

		// Sharing is caring
		View::share('current_user', $user);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}