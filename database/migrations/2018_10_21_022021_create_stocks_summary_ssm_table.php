<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksSummarySsmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks_summary_ssm', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('wr_name', 45)->nullable();
			$table->string('ssm_buyer', 45)->nullable();
			$table->integer('ssm_weight')->nullable();
			$table->integer('ssm_storage')->nullable();
			$table->integer('ssm_count')->nullable();
			$table->integer('ssm_average_storage')->nullable();
			$table->integer('ssm_value')->nullable();
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
		Schema::drop('stocks_summary_ssm');
	}

}
