<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchasesPrcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchases_prc', function(Blueprint $table)
		{
			$table->foreign('bs_id', 'fk_bs_id')->references('id')->on('basket_bs')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchases_prc', function(Blueprint $table)
		{
			$table->dropForeign('fk_bs_id');
		});
	}

}
