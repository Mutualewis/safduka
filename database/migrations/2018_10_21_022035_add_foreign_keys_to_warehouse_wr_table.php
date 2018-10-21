<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWarehouseWrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('warehouse_wr', function(Blueprint $table)
		{
			$table->foreign('rgn_id', 'fk_warehouse_wr_region_rgn1')->references('id')->on('region_rgn')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('warehouse_wr', function(Blueprint $table)
		{
			$table->dropForeign('fk_warehouse_wr_region_rgn1');
		});
	}

}
