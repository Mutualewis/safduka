<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReleaseInstructionsRlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('release_instructions_rl', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trp_id')->nullable();
			$table->dateTime('trp_assigned_at')->nullable();
			$table->string('rl_ref_no', 45)->nullable();
			$table->string('rl_no', 45)->nullable();
			$table->date('rl_date')->nullable();
			$table->integer('rl_confirmedby')->nullable();
			$table->timestamps();
			$table->integer('rl_warehouseto')->unsigned();
			$table->index(['trp_id','rl_ref_no','rl_no'], 'indx_trpl_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('release_instructions_rl');
	}

}
