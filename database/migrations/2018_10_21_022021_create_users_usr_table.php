<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersUsrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_usr', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('per_id')->nullable();
			$table->string('usr_name');
			$table->string('usr_email')->unique();
			$table->string('password', 60);
			$table->boolean('usr_edit_privilage');
			$table->boolean('usr_active');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users_usr');
	}

}
