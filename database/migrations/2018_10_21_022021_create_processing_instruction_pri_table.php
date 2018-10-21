<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessingInstructionPriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processing_instruction_pri', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('prg_id')->nullable();
			$table->string('pri_name', 45)->nullable();
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
		Schema::drop('processing_instruction_pri');
	}

}
