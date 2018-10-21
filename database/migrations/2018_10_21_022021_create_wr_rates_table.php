<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWrRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wr_rates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('wr_id')->nullable();
			$table->float('storage_rate', 10, 0)->nullable();
			$table->float('handling_bag_rate', 10, 0)->nullable();
			$table->float('warrant_rate', 10, 0)->nullable();
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
		Schema::drop('wr_rates');
	}

}
