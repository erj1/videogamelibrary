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
			'username'   => "required|min:3|max:32|unique:users,username,".$this->user->id,
			'email'      => "required|email|unique:users,email,".$this->user->id,
			'first_name' => "max:255",
			'last_name'  => "max:255",
			'month'      => "integer|digits_between:1,12",
			'day'        => "integer|digits_between:1,31",
			'year'       => "integer"
		];

		$validator = Validation::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		dd('Passed Validation');
	}
}
