<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Soft Delete
	 *
	 * Indicates that user accounts should be soft deleted.
	 *
	 * @var boolean
	 */
	protected $softDelete = true;

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Games
	 *
	 * Provides a collection of games that are owned by this user
	 *
	 * @return Collection
	 */
	public function games()
	{
		return $this->belongsToMany('Game')->withPivot('rating')->withTimestamps();
	}

	/**
	 * Is This User An Administrator
	 *
	 * A simple way to determine if a user has administrative privileges or not.
	 *
	 * @return boolean
	 */
	public function isAdmin()
	{
		return ($this->is_admin === 1);
	}

	public function getDates()
	{
		$dates = parent::getDates();

		$dates[] = 'birthday';

		return $dates;
	}

}