<?php

use Carbon\Carbon;

class GamesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('games')->truncate();

		$games = [
			[
				'id'          => 1,
				'platform_id' => 1,
				'esrb_id'     => 2,
				'name'        => 'Mario Cart Wii',
				'image'       => 'wii-mario-cart-wii.jpg',
				'rating'      => 5,
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now(),
			],
			[
				'id'          => 2,
				'platform_id' => 1,
				'esrb_id'     => 2,
				'name'        => 'Kirby\'s Epic Yarn',
				'image'       => 'wii-kirbys-epic-yarn.jpg',
				'rating'      => 4,
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now(),
			],
			[
				'id'          => 3,
				'platform_id' => 2,
				'esrb_id'     => 4,
				'name'        => 'Final Fantasy X',
				'image'       => 'ps2-final-fantasy-x.jpg',
				'rating'      => 3,
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now(),
			],
			[
				'id'          => 4,
				'platform_id' => 2,
				'esrb_id'     => 4,
				'name'        => 'Tony Hawk\'s Pro Skater 3',
				'image'       => 'ps2-tony-hawks-pro-skater-3.jpg',
				'rating'      => 2,
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now(),
			],
		];

		// Uncomment the below to run the seeder
		DB::table('games')->insert($games);
	}

}
