<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoffeeDetailsCfdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coffee_details_cfd', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('csn_id')->index('fk_coffee_details_cfd_coffee_season_csn1_idx');
			$table->integer('ctyp_id')->nullable()->index('fk_coffee_details_cfd_coffee_type_ctyp1_idx');
			$table->integer('sl_id')->nullable()->index('index9');
			$table->integer('slr_id')->nullable()->index('fk_coffee_details_cfd_seller_slr_idx');
			$table->integer('cb_id')->nullable();
			$table->integer('cg_id')->nullable();
			$table->integer('bs_id')->nullable();
			$table->integer('ibs_id')->nullable();
			$table->integer('usr_id')->nullable();
			$table->integer('cfd_additional_processed')->nullable();
			$table->integer('sct_id')->nullable();
			$table->integer('cfd_lot_no')->nullable();
			$table->string('cfd_outturn', 100)->nullable()->index('index10');
			$table->integer('war_id')->nullable();
			$table->integer('wr_id')->nullable()->index('fk_coffee_details_cfd_warehouse_wr1_idx');
			$table->integer('ml_id')->nullable();
			$table->string('cfd_grower_mark', 100)->nullable();
			$table->integer('cgrad_id')->nullable()->index('fk_coffee_details_cfd_coffee_grade_cgr1_idx');
			$table->integer('cfd_weight')->nullable();
			$table->integer('cfd_bags')->nullable();
			$table->integer('cfd_pockets')->nullable();
			$table->integer('cfd_dnt')->unsigned()->nullable()->default(0);
			$table->integer('cfd_ended_by')->nullable();
			$table->integer('cfd_withdrawn_from')->nullable();
			$table->integer('cfd_lot_withdrawn_from')->unsigned()->nullable();
			$table->integer('pr_id')->nullable();
			$table->integer('prt_id')->nullable();
			$table->timestamps();
			$table->index(['cfd_lot_no','wr_id','ml_id','cgrad_id','cfd_outturn'], 'index');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coffee_details_cfd');
	}

}
