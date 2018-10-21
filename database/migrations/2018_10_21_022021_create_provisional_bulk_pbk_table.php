<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvisionalBulkPbkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provisional_bulk_pbk', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable();
			$table->integer('csn_id')->nullable();
			$table->integer('sct_id')->nullable();
			$table->integer('prcss_id')->nullable();
			$table->string('pbk_instruction_number', 45)->nullable()->unique('pbk_instruction_number_UNIQUE');
			$table->string('pbk_reference_name', 45)->nullable();
			$table->integer('pbk_weight_in')->nullable();
			$table->string('pbk_other_instructions')->nullable();
			$table->integer('pbk_weight_processed')->nullable();
			$table->integer('pbk_confirmed_by')->nullable();
			$table->integer('cgrad_id')->nullable();
			$table->integer('bs_id')->nullable();
			$table->date('pbk_date')->nullable();
			$table->integer('prp_id')->nullable();
			$table->string('pbk_comments', 45)->nullable();
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
		Schema::drop('provisional_bulk_pbk');
	}

}
