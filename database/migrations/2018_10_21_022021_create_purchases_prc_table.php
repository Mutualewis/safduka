<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesPrcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases_prc', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cfd_id')->nullable()->index('cfd_id');
			$table->integer('cb_id')->nullable();
			$table->decimal('prc_price', 18)->nullable();
			$table->decimal('prc_confirmed_price', 18)->nullable();
			$table->decimal('prc_hedge', 18, 10)->nullable();
			$table->decimal('prc_value', 18)->nullable();
			$table->decimal('prc_bric_value', 18)->nullable();
			$table->integer('prc_fob_id')->nullable();
			$table->integer('sst_id')->nullable();
			$table->integer('ibs_id')->nullable();
			$table->integer('bs_id')->nullable()->index('fk_bs_id_idx');
			$table->integer('br_id')->nullable();
			$table->decimal('prc_purchase_contract_ratio', 18, 10)->nullable();
			$table->integer('inv_id')->nullable();
			$table->integer('inv_weight')->nullable();
			$table->string('inv_outturn', 45)->nullable();
			$table->string('inv_mark', 45)->nullable();
			$table->integer('py_id')->nullable();
			$table->integer('war_id')->nullable();
			$table->integer('rl_id')->nullable();
			$table->integer('gr_id')->nullable();
			$table->integer('cn_id')->nullable();
			$table->timestamps();
			$table->index(['cb_id','sst_id','bs_id','br_id','inv_id','py_id','war_id','rl_id','gr_id','cn_id'], 'index_multiple');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchases_prc');
	}

}
