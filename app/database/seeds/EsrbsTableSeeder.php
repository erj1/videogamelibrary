<?php

use Carbon\Carbon;

class EsrbsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('esrbs')->truncate();

		$esrbs = [
			[
				'id'          => 1,
				'name'        => 'Early Childhood',
				'description' => 'Content is intended for young children.',
				'image'       => 'ratingsymbol_ec.png',
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now()
			],
			[
				'id'          => 2,
				'name'        => 'Everyone',
				'description' => 'Content is generally suitable for all ages. '.
								 'May contain minimal cartoon, fantasy or mild '.
								 'violence and/or infrequent use of mild language.',
				'image'       => 'ratingsymbol_e.png',
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now()
			],
			[
				'id'          => 3,
				'name'        => 'Everyone 10+',
				'description' => 'Content is generally suitable for ages 10 and up. '.
								 'May contain more cartoon, fantasy or mild violence, '.
								 'mild language and/or minimal suggestive themes.',
				'image'       => 'ratingsymbol_e10.png',
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now()
			],
			[
				'id'          => 4,
				'name'        => 'Teen',
				'description' => 'Content is generally suitable for ages 13 '.
				                 'and up. May contain violence, suggestive themes, '.
				                 'crude humor, minimal blood, simulated gambling '.
				                 'and/or infrequent use of strong language.',
				'image'       => 'ratingsymbol_t.png',	
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now()
			],
			[
				'id'          => 5,
				'name'        => 'Mature',
				'description' => 'Content is generally suitable for ages 17 and up. '.
				                 'May contain intense violence, blood and gore, '.
				                 'sexual content and/or strong language.',
				'image'       => 'ratingsymbol_m.png',
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now()
			],
			[
				'id'          => 6,
				'name'        => 'Adults Only',
				'description' => 'Content suitable only for adults ages 18 '.
				                 'and up. May include prolonged scenes of intense '.
				                 'violence, graphic sexual content and/or gambling '.
				                 'with real currency.',
				'image'       => 'ratingsymbol_ao.png',
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now()
			],
			[
				'id'          => 7,
				'name'        => 'Rating Pending',
				'description' => 'Not yet assigned a final ESRB rating. Appears '.
				                 'only in advertising, marketing and promotional '.
				                 'materials related to a game that is expected to '.
				                 'carry an ESRB rating, and should be replaced by '.
				                 'a game\'s rating once it has been assigned.',
				'image'       => 'ratingsymbol_rp.png',
				'created_at'  => Carbon::now(),
				'updated_at'  => Carbon::now()
			],
		];

		// Uncomment the below to run the seeder
		DB::table('esrbs')->insert($esrbs);
	}

}
