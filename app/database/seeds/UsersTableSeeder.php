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
			'username'   => 'AdminAndy',
			'password'   => Hash::make('password'),
			'first_name' => 'Andy',
			'last_name'  => 'Admin',
			'birthday'   => '1984-04-04',
			'is_admin'   => 1,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]];

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
