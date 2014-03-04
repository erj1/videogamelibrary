<?php

class LoginController extends BaseController
{
	public function getIndex()
	{
		return View::make('login.index');
	}

	public function postIndex()
	{
		$input = Input::only('email', 'password');

		$rules = [
			'email'    => 'required|email',
			'password' => 'required'
		];

		$validator = Validator::make($input, $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Auth::attempt([
			'email'    => Input::get('email'),
			'password' => Input::get('password')
		])) {
			
			return Redirect::intended('/');
		}

		Session::flash('error', 'Incorrect Email or Password.');
		return Redirect::back();
	}

	/**
	 * Logout
	 *
	 * @return Redirect
	 */
	public function getLogout()
	{
		// remove all session items
		Session::flush();

		// redirect back to the home page
		return Redirect::to('/');
	}
}
