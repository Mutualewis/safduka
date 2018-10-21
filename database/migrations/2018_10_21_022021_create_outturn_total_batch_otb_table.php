<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutturnTotalBatchOtbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outturn_total_batch_otb', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('otb_weight')->nullable();
			$table->integer('otb_confirmed_by')->nullable();
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
		Schema::drop('outturn_total_batch_otb');
	}

}
