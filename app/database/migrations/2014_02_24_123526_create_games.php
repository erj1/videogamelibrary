<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGames extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table)
		{
			// PK
			$table->increments('id');

			// Platform ID - FK
			$table->integer('platform_id')->unsigned();

			// ESRB ID - FK
			$table->integer('esrb_id')->unsigned()->nullable();

			// Name
			$table->string('name');

			// Image Location
			$table->string('image')->nullable();

			// Created At / Updated At
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('games');
	}

}
