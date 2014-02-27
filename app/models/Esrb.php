<?php

class Esrb extends Eloquent
{
	/**
	 * Image Path
	 *
	 * The image path from the document root
	 *
	 * @string
	 */
	public static $path = '/images/esrb/';

	/**
	 * Fillable
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'image'];

	/**
	 * Games
	 *
	 * Provides a collection of games with this rating.
	 *
	 * @return Collection
	 */
	public function games()
	{
		return $this->hasMany('Game');
	}

	/**
	 * Full Image URL Path
	 *
	 * Gives the url of the ESRB image
	 *
	 * @return string
	 */
	public function getImageUrlAttribute()
	{
		return static::$path . $this->image;
	}
}
