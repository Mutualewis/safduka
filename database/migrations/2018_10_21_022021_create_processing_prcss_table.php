<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessingPrcssTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processing_prcss', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('prcss_name', 45)->nullable();
			$table->string('prcss_initial', 45)->nullable();
			$table->string('prcss_description')->nullable();
			$table->integer('prcss_auction')->nullable();
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
		Schema::drop('processing_prcss');
	}

}
