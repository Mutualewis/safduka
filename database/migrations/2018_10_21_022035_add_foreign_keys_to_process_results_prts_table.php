<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProcessResultsPrtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('process_results_prts', function(Blueprint $table)
		{
			$table->foreign('st_id', 'st_id_idx')->references('id')->on('stock_st')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('process_results_prts', function(Blueprint $table)
		{
			$table->dropForeign('st_id_idx');
		});
	}

}
