<?php

use Carbon\Carbon;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$users = [[
			'id'         => '1',
			'email'      => 'andy@example.com',
			'password'   => Hash::make('password'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]];

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
