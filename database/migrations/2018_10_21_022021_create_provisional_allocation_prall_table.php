<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvisionalAllocationPrallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provisional_allocation_prall', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pbk_id')->nullable()->index('fk_prall_pr_id_idx');
			$table->integer('st_id')->nullable()->index('fk_prall_st_id_idx');
			$table->integer('cfd_id')->nullable()->index('fk_cfd_id_idx');
			$table->integer('prall_allocated_weight')->nullable();
			$table->integer('prall_packages')->nullable();
			$table->integer('prall_processed_weight')->nullable();
			$table->decimal('prall_ratios', 18, 15)->nullable();
			$table->integer('prall_extra_processing')->nullable();
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
		Schema::drop('provisional_allocation_prall');
	}

}
