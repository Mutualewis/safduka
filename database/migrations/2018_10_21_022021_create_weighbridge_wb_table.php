<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeighbridgeWbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weighbridge_wb', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable();
			$table->integer('csn_id')->nullable();
			$table->integer('cb_id')->nullable();
			$table->integer('slr_id')->nullable();
			$table->string('wb_ticket', 45)->nullable();
			$table->string('wb_delivery_number', 45)->nullable();
			$table->string('wb_vehicle_plate', 45)->nullable();
			$table->integer('wb_weight_in')->nullable();
			$table->integer('wb_weight_out')->nullable();
			$table->integer('wb_confirmedby')->nullable();
			$table->dateTime('wb_time_in')->nullable();
			$table->dateTime('wb_time_out')->nullable();
			$table->string('wb_movement_permit', 45)->nullable();
			$table->string('wb_driver_name', 45)->nullable();
			$table->string('wb_driver_id', 45)->nullable();
			$table->date('wb_dispatch_date')->nullable();
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
		Schema::drop('weighbridge_wb');
	}

}
