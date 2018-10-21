<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMovementInstructionTypeMitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movement_instruction_type_mit', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('mit_name', 45)->nullable();
			$table->string('mit_description', 45)->nullable();
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
		Schema::drop('movement_instruction_type_mit');
	}

}
