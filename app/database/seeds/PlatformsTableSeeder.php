<?php

use Carbon\Carbon;

class PlatformsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('platforms')->truncate();

		$platforms = [
			[
				'id'         => 1,
				'name'       => 'Nintendo Wii',
				'alias'      => 'Wii',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id'         => 2,
				'name'       => 'Sony Playstation 2',
				'alias'      => 'PS2',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]
		];

		// Uncomment the below to run the seeder
		DB::table('platforms')->insert($platforms);
	}

}
