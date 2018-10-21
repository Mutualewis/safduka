<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrpRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trp_rates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('wr_id')->nullable();
			$table->integer('trp_id')->nullable();
			$table->float('rate', 10, 0)->nullable();
			$table->dateTime('date_ended')->nullable();
			$table->timestamps();
			$table->integer('active')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trp_rates');
	}

}
