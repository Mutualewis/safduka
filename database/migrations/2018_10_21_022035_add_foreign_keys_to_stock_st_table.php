<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStockStTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stock_st', function(Blueprint $table)
		{
			$table->foreign('prc_id', 'prc_id')->references('id')->on('purchases_prc')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stock_st', function(Blueprint $table)
		{
			$table->dropForeign('prc_id');
		});
	}

}
