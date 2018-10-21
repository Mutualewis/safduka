<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessChargesPrcgsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('process_charges_prcgs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('prcgs_instruction_no', 75)->nullable();
			$table->integer('prcgs_rate_id')->unsigned()->index('process_charges_prcgs_prcgs_rate_id_foreign');
			$table->string('prcgs_service', 75)->nullable();
			$table->decimal('prcgs_rate');
			$table->decimal('prcgs_total');
			$table->integer('prcgs_team_id')->unsigned()->nullable()->index('process_charges_prcgs_prcgs_team_id_foreign');
			$table->string('bags');
			$table->string('ref_no')->nullable();
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
		Schema::drop('process_charges_prcgs');
	}

}
