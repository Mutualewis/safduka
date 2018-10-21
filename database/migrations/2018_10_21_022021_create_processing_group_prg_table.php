<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessingGroupPrgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processing_group_prg', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('prcss_id')->nullable();
			$table->string('prg_input_type', 45)->nullable();
			$table->string('prg_instruction', 45)->nullable();
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
		Schema::drop('processing_group_prg');
	}

}
