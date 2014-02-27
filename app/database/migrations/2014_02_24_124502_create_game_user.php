<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_user', function(Blueprint $table)
		{
			// PK
			$table->increments('id');

			// Game ID - FK
			$table->integer('game_id')->unsigned();

			// User ID - FK
			$table->integer('user_id')->unsigned();

			// User Game Rating
			$table->tinyInteger('rating')->unsigned()->nullable();

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
		Schema::drop('game_user');
	}

}
