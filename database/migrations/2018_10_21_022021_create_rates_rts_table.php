<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatesRtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rates_rts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('prc_id')->nullable();
			$table->string('service', 75)->nullable();
			$table->float('rate', 10, 0);
			$table->boolean('active')->default(0);
			$table->float('bagsize', 10, 0);
			$table->dateTime('date_ended')->nullable();
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
		Schema::drop('rates_rts');
	}

}
