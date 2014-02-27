<?php

use Carbon\Carbon;

class GameUserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('game_user')->truncate();

		$now = Carbon::now();

		$gameuser = [
			['id' => 1, 'game_id' => 1, 'user_id' => 1, 'rating' => 5, 'created_at' => $now, 'updated_at' => $now],
			['id' => 2, 'game_id' => 2, 'user_id' => 1, 'rating' => 4, 'created_at' => $now, 'updated_at' => $now],
			['id' => 3, 'game_id' => 3, 'user_id' => 1, 'rating' => 3, 'created_at' => $now, 'updated_at' => $now],
			['id' => 4, 'game_id' => 4, 'user_id' => 1, 'rating' => 2, 'created_at' => $now, 'updated_at' => $now],
			['id' => 5, 'game_id' => 1, 'user_id' => 2, 'rating' => 3, 'created_at' => $now, 'updated_at' => $now],
			['id' => 6, 'game_id' => 2, 'user_id' => 2, 'rating' => 2, 'created_at' => $now, 'updated_at' => $now],
			['id' => 7, 'game_id' => 3, 'user_id' => 2, 'rating' => 4, 'created_at' => $now, 'updated_at' => $now],
			['id' => 8, 'game_id' => 4, 'user_id' => 2, 'rating' => 5, 'created_at' => $now, 'updated_at' => $now],
		];

		// Uncomment the below to run the seeder
		DB::table('game_user')->insert($gameuser);
	}

}
