<?php

class UserController extends BaseController
{
	/**
	 * User
	 *
	 * @var User
	 */
	private $user;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		// set the authentcated user to the user attribute
		$this->user = Auth::user();
	}

	/**
	 * Edit
	 *
	 * Shows to the user the information that she can change.
	 *
	 * @return Response
	 */
	public function edit()
	{
		return View::make('user.edit', [
			'user' => $this->user
		]);
	}

	/**
	 * Update
	 *
	 * Validates and updates the user account
	 *
	 * @return Redirect
	 */
	public function update()
	{
		$rules = [
			'email' => "required|email|unique:users,email,".$this->user->id,
			'password' => "required|min:8|confirmed",
			'password_confirmation' => 'required|min:8'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user = Auth::user();

		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		$user->save();

		Session::flash('success', 'Your Information Has Been Updated.');
		return Redirect::back();
	}
}
