<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		$this->call('UsersTableSeeder');
		$this->call('PlatformsTableSeeder');
		$this->call('EsrbsTableSeeder');
		$this->call('GamesTableSeeder');
		$this->call('GameUserTableSeeder');
	}

}