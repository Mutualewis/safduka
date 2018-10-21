<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessChargesTeamsPctmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('process_charges_teams_pctms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('prcgs_id')->unsigned()->index('process_charges_teams_pctms_prcgs_id_foreign');
			$table->integer('prcgs_team_id')->unsigned()->index('process_charges_teams_pctms_prcgs_team_id_foreign');
			$table->string('bags');
			$table->string('descr');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('process_charges_teams_pctms');
	}

}
