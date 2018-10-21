<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonPerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person_per', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('dprt_id')->nullable();
			$table->integer('rgn_id')->nullable();
			$table->string('per_fname', 45)->nullable();
			$table->string('per_sname', 45)->nullable();
			$table->string('per_email')->nullable();
			$table->integer('per_extension')->nullable();
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
		Schema::drop('person_per');
	}

}
