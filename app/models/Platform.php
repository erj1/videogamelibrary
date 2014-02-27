<?php

class Platform extends Eloquent
{
	/**
	 * Fillable
	 *
	 * The attributes that can be dynamically assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'alias'];

	/**
	 * Games
	 *
	 * Provides a collection of games for this platform.
	 *
	 * @return Collection
	 */
	public function games()
	{
		return $this->hasMany('Game', 'platform_id');
	}
}