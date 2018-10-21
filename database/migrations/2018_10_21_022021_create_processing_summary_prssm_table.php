<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessingSummaryPrssmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processing_summary_prssm', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('prssm_buyer', 45)->nullable();
			$table->string('prssm_year', 45)->nullable();
			$table->string('prssm_month', 45)->nullable();
			$table->integer('prssm_total_allocated')->nullable();
			$table->integer('prssm_results')->nullable();
			$table->integer('prssm_difference')->nullable();
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
		Schema::drop('processing_summary_prssm');
	}

}
