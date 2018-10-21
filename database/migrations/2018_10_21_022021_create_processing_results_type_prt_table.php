<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessingResultsTypePrtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processing_results_type_prt', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('prcss_id')->nullable();
			$table->string('prt_name', 45)->nullable();
			$table->string('prt_initials', 45)->nullable();
			$table->string('prt_description')->nullable();
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
		Schema::drop('processing_results_type_prt');
	}

}
