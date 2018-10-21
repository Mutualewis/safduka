<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProcessChargesPrcgsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('process_charges_prcgs', function(Blueprint $table)
		{
			$table->foreign('prcgs_rate_id')->references('id')->on('rates_rts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('prcgs_team_id')->references('id')->on('teams_tms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('process_charges_prcgs', function(Blueprint $table)
		{
			$table->dropForeign('process_charges_prcgs_prcgs_rate_id_foreign');
			$table->dropForeign('process_charges_prcgs_prcgs_team_id_foreign');
		});
	}

}
