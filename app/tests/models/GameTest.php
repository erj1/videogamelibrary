<?php

use \Mockery as M;

class GameTest extends TestCase
{
	public function testGameHasStaticPath()
	{
		// Arrange
		$path = null;

		// Act
		$path = Game::$path;

		// Assert
		$this->assertEquals('/images/games/', $path);
	}

	public function testGameImageUrlAttribute()
	{
		// Arrange
		$game = M::mock('Game')->makePartial();
		$game->shouldReceive('getAttribute')
		     ->once()
		     ->with('image')
		     ->andReturn('wii-mario-cart-wii.png');

		$path = null;

		// Act
		$path = $game->image_url;

		// Assert
		$this->assertEquals('/images/games/wii-mario-cart-wii.png', $path);
	}

	// ------------------------------------------------------------------------

	/**
	 * @dataProvider dataGameGenerateImageName
	 */
	public function testGameGenerateImageName($alias, $title, $type, $expected)
	{
		// Arrange

		// Act
		$fileName = Game::generateImageName($alias, $title, $type);

		// Assert
		$this->assertEquals($expected, $fileName);
	}

	public function dataGameGenerateImageName()
	{
		return [
			['Wii', 'Mario Cart Wii', null, 'wii-mario-cart-wii.jpg'],
			['Wii', 'Mario Cart Wii', 'JPG', 'wii-mario-cart-wii.jpg'],
			['Wii', 'Kirby\'s Epic Yarn', null, 'wii-kirbys-epic-yarn.jpg'],
			['PS2', 'Final Fantasy X', null, 'ps2-final-fantasy-x.jpg'],
			['PS2', 'Tony Hawk\'s Pro Skater 3', null, 'ps2-tony-hawks-pro-skater-3.jpg']
		];
	}

	// ------------------------------------------------------------------------
}
