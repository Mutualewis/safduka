<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWarehouseChargesWrchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('warehouse_charges_wrch', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('wr_id')->nullable();
			$table->integer('chty_id')->nullable();
			$table->integer('chty_rate')->nullable();
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
		Schema::drop('warehouse_charges_wrch');
	}

}
