<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInstructedStockLocationInslocTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('instructed_stock_location_insloc', function(Blueprint $table)
		{
			$table->foreign('bt_id', 'fkx_btid')->references('id')->on('batch_btc')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('instructed_stock_location_insloc', function(Blueprint $table)
		{
			$table->dropForeign('fkx_btid');
		});
	}

}
