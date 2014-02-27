<?php

use \Mockery as M;

class EsrbTest extends TestCase
{
	public function testEsrbHasStaticPath()
	{
		// Arrange
		$path = null;

		// Act
		$path = Esrb::$path;

		// Assert
		$this->assertEquals('/images/esrb/', $path);
	}

	public function testEsrbImageUrlAttribute()
	{
		// Arrange
		$esrb = M::mock('Esrb')->makePartial();
		$esrb->shouldReceive('getAttribute')->once()->with('image')->andReturn('ratingsymbol_e.png');

		$path = null;

		// Act
		$path = $esrb->image_url;

		// Assert
		$this->assertEquals('/images/esrb/ratingsymbol_e.png', $path);
	}
}
