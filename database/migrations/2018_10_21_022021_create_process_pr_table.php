<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessPrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('process_pr', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable();
			$table->integer('csn_id')->nullable();
			$table->integer('sct_id')->nullable();
			$table->integer('prcss_id')->nullable();
			$table->string('pr_instruction_number', 45)->nullable()->unique('pr_instruction_number_UNIQUE');
			$table->string('pr_reference_name', 45)->nullable();
			$table->integer('pr_weight_in')->nullable();
			$table->string('pr_other_instructions')->nullable();
			$table->integer('pr_weight_processed')->nullable();
			$table->integer('pr_okay_to_process')->nullable();
			$table->string('pr_supervisor', 45)->nullable();
			$table->integer('pr_confirmed_by')->nullable();
			$table->integer('cgrad_id')->nullable();
			$table->integer('bs_id')->nullable();
			$table->date('pr_date')->nullable();
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
		Schema::drop('process_pr');
	}

}
