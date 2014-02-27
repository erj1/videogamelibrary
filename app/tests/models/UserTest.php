<?php

use \Mockery as M;

class UserTest extends TestCase
{
	public function testUserIsAdmin()
	{
		// Arrange
		$user = M::mock('User')->makePartial();
		$user->shouldReceive('getAttribute')
		     ->once()
		     ->with('is_admin')
		     ->andReturn(1);

		// Act
		$isAdmin = $user->isAdmin();

		// Assert
		$this->assertTrue($isAdmin);
	}

	public function testUserIsNotAdmin()
	{
		// Arrange
		$user = M::mock('User')->makePartial();
		$user->shouldReceive('getAttribute')
		     ->once()
		     ->with('is_admin')
		     ->andReturn(0);

		// Act
		$isAdmin = $user->isAdmin();

		// Assert
		$this->assertFalse($isAdmin);
	}
}
