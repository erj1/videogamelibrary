<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			// PK
			$table->increments('id');

			// Email Address
			$table->string('email')->unique();

			// Username
			$table->string('username', 32)->unique();

			// Password
			$table->string('password');

			// First Name
			$table->string('first_name')->nullable();

			// Last Name
			$table->string('last_name')->nullable();

			// Birthday
			$table->date('birthday')->nullable();

			// Is Admin?
			$table->boolean('is_admin')->default(false);

			// Created At / Updated At
			$table->timestamps();

			// Deleted At
			$table->softDeletes();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
