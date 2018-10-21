<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessAllocationsPallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('process_allocations_pall', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pr_id')->nullable()->index('fk_pr_id_idx');
			$table->integer('st_id')->nullable()->index('fk_st_id_idx');
			$table->integer('cfd_id')->nullable();
			$table->integer('pall_allocated_weight')->nullable();
			$table->integer('pall_packages')->nullable();
			$table->integer('pall_processed_weight')->nullable();
			$table->integer('pall_tags')->nullable();
			$table->decimal('pall_ratios', 18, 15)->nullable();
			$table->integer('pall_extra_processing')->nullable();
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
		Schema::drop('process_allocations_pall');
	}

}
