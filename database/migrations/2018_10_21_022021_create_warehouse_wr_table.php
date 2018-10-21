<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWarehouseWrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('warehouse_wr', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('rgn_id')->nullable()->index('fk_warehouse_wr_region_rgn1_idx');
			$table->integer('wrt_id')->nullable();
			$table->string('wr_name', 45);
			$table->string('wr_initials', 45)->nullable();
			$table->string('wr_description', 45)->nullable();
			$table->timestamps();
			$table->string('wr_attention', 75);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('warehouse_wr');
	}

}
