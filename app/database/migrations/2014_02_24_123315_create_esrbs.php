<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEsrbs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('esrbs', function(Blueprint $table)
		{
			// PK
			$table->increments('id');

			// Name
			$table->string('name');

			// Description
			$table->text('description')->nullable();

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
		Schema::drop('esrbs');
	}

}
