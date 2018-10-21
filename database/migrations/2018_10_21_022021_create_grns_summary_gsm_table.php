<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGrnsSummaryGsmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grns_summary_gsm', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('gsm_season')->nullable();
			$table->string('gsm_warehouse_from', 45)->nullable();
			$table->string('gsm_buyer', 45)->nullable();
			$table->string('gsm_month', 45)->nullable();
			$table->integer('gsm_weight')->nullable();
			$table->integer('gsm_expected_weight')->nullable();
			$table->integer('gsm_weight_difference')->nullable();
			$table->integer('gsm_percentage_weight_difference')->nullable();
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
		Schema::drop('grns_summary_gsm');
	}

}
