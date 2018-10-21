<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientClTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_cl', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('cl_name', 50);
			$table->string('cl_address')->nullable();
			$table->string('cl_courier', 45)->nullable();
			$table->string('cl_telephone', 45)->nullable();
			$table->string('cl_email')->nullable();
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
		Schema::drop('client_cl');
	}

}
