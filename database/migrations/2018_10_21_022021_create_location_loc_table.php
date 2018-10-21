<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationLocTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location_loc', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('wr_id')->nullable();
			$table->string('loc_row', 45)->nullable();
			$table->string('loc_column', 45)->nullable();
			$table->string('loc_description', 45)->nullable();
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
		Schema::drop('location_loc');
	}

}
