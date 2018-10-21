<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProcessChargesTeamsPctmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('process_charges_teams_pctms', function(Blueprint $table)
		{
			$table->foreign('prcgs_id')->references('id')->on('process_charges_prcgs')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('process_charges_teams_pctms', function(Blueprint $table)
		{
			$table->dropForeign('process_charges_teams_pctms_prcgs_id_foreign');
			$table->dropForeign('process_charges_teams_pctms_prcgs_team_id_foreign');
		});
	}

}
