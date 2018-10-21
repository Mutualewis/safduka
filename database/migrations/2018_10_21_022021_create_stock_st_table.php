<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockStTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_st', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable();
			$table->integer('csn_id')->nullable()->index('index3');
			$table->integer('cb_id')->nullable();
			$table->string('st_outturn', 45)->nullable();
			$table->integer('st_coffee_type')->nullable();
			$table->string('st_mark')->nullable();
			$table->string('st_name', 45)->nullable();
			$table->integer('prc_id')->nullable()->index('prc_id_idx');
			$table->integer('sts_id')->default(1);
			$table->integer('pr_id')->nullable()->index('pr_id_idx11');
			$table->string('gr_id', 45)->nullable()->index('index2');
			$table->integer('st_ref_id')->nullable();
			$table->integer('st_dispatch_net')->nullable();
			$table->integer('st_gross')->nullable();
			$table->decimal('st_tare', 18)->nullable();
			$table->decimal('st_moisture', 18)->nullable();
			$table->integer('st_net_weight')->nullable();
			$table->integer('st_packages')->nullable();
			$table->integer('st_bags')->nullable();
			$table->integer('st_pockets')->nullable();
			$table->integer('pkg_id')->nullable();
			$table->integer('cgrad_id')->nullable();
			$table->integer('prt_id')->nullable();
			$table->integer('bs_id')->nullable()->index('fk_bs_id_st_idx');
			$table->integer('ibs_id')->nullable();
			$table->decimal('prc_price', 18, 10)->nullable();
			$table->decimal('st_price', 18, 10)->nullable();
			$table->decimal('st_value', 18, 10)->nullable();
			$table->decimal('st_bric_value', 18, 10)->nullable();
			$table->decimal('st_hedge', 18, 10)->nullable();
			$table->decimal('st_diff', 18, 10)->nullable();
			$table->integer('br_id')->nullable();
			$table->integer('sl_id')->nullable();
			$table->integer('usr_id')->nullable();
			$table->integer('st_ended_by')->nullable();
			$table->integer('st_quality_check')->nullable();
			$table->string('st_rejected', 45)->nullable();
			$table->integer('st_credited')->nullable();
			$table->integer('st_weight_check')->nullable();
			$table->integer('st_additional_processed')->nullable();
			$table->integer('st_partial_delivery')->nullable();
			$table->integer('sct_id')->nullable();
			$table->integer('st_disposed_by')->nullable();
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
		Schema::drop('stock_st');
	}

}
