<?php

use Illuminate\Auth\UserInterface;

class Game extends Eloquent
{
	/**
	 * Image Path
	 *
	 * The image path from the document root
	 *
	 * @var string
	 */
	public static $path = '/images/games/';

	/**
	 * Fillable
	 *
	 * @var array
	 */
	protected $fillable = ['platform_id', 'esrb_id', 'name', 'image'];

	/**
	 * Rating Range
	 *
	 * @array
	 */
	static public $ratingRange = [1, 2, 3, 4, 5];

	/**
	 * ESRB
	 *
	 * Provides the ESRB rating for this game
	 *
	 * @return Esrb
	 */
	public function esrb()
	{
		return $this->belongsTo('Esrb');
	}

	/**
	 * Image URL
	 *
	 * Provides the image URL
	 *
	 * @return string
	 */
	public function getImageUrlAttribute()
	{
		return static::$path . $this->image;
	}

	/**
	 * Platform
	 *
	 * Provides the platform for which this game belongs.
	 *
	 * @return Platform
	 */
	public function platform()
	{
		return $this->belongsTo('Platform');
	}

	 /**
	  * Generate Image Name
	  *
	  * Creates an image file name based upon the platform and game title.
	  *
	  * @param string $platform_alias The alias of the platform
	  * @param string $game_title     The title of the game
	  * @param string $file_type      The image extension
	  *
	  * @return string
	  */ 
	 public static function generateImageName($platform_alias, $game_title, $file_type = 'jpg')
	 {
	 	// convert the platform alias
	 	$alias = strtolower($platform_alias);

	 	/*
	 	 * convert the game title
		 * first remove all non-alphanumeric characters except a space
		 * second replace all double spaces and single spaces with a hyphen
		 */
	 	$title = preg_replace('/([^a-z0-9 ])+/', '', strtolower($game_title)); 
	 	$title = str_replace(['  ', ' '], '-', $title);

	 	// convert the file type
	 	$type = is_null($file_type) ? 'jpg' : strtolower($file_type);

		return "{$alias}-{$title}.{$type}";

	}
}
