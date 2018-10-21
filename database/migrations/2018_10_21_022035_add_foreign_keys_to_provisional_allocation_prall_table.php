<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProvisionalAllocationPrallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('provisional_allocation_prall', function(Blueprint $table)
		{
			$table->foreign('cfd_id', 'fk_cfd_id')->references('id')->on('coffee_details_cfd')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('st_id', 'fk_prall_st_id')->references('id')->on('stock_st')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('provisional_allocation_prall', function(Blueprint $table)
		{
			$table->dropForeign('fk_cfd_id');
			$table->dropForeign('fk_prall_st_id');
		});
	}

}
