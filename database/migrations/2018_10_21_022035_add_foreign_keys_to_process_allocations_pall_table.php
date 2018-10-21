<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProcessAllocationsPallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('process_allocations_pall', function(Blueprint $table)
		{
			$table->foreign('pr_id', 'fk_pr_id')->references('id')->on('process_pr')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('st_id', 'fk_st_id')->references('id')->on('stock_st')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('process_allocations_pall', function(Blueprint $table)
		{
			$table->dropForeign('fk_pr_id');
			$table->dropForeign('fk_st_id');
		});
	}

}
