<?php

class LoginController extends BaseController
{
	public function getIndex()
	{
		return View::make('login.index');
	}

	public function postIndex()
	{
		$input = Input::only('email', 'password', 'remember');

		$rules = [
			'email'    => 'required|email',
			'password' => 'required',
			'remember' => 'integer'
		];

		$validator = Validator::make($input, $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Auth::attempt([
			'email'    => Input::get('email'),
			'password' => Input::get('password')
		], Input::has('remember'))) {

			if (Auth::user()->isAdmin()) {
				return Redirect::intended('/admin/dashboard');
			}

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
