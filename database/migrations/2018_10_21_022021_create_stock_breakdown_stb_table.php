<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockBreakdownStbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_breakdown_stb', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('st_id')->nullable();
			$table->integer('br_id')->nullable();
			$table->integer('stb_weight')->nullable();
			$table->decimal('stb_value', 18, 10)->nullable();
			$table->decimal('stb_hedge', 18, 10)->nullable();
			$table->integer('stb_bric_bags')->nullable();
			$table->integer('bs_id')->nullable();
			$table->integer('ibs_id')->nullable();
			$table->decimal('stb_bulk_ratio', 18, 10)->nullable();
			$table->decimal('stb_value_ratio', 18, 10)->nullable();
			$table->decimal('stb_purchase_contract_ratio', 18, 10)->nullable();
			$table->integer('cb_id')->nullable();
			$table->integer('cgr_id')->nullable();
			$table->integer('prc_id')->nullable();
			$table->integer('cn_id')->nullable();
			$table->timestamps();
			$table->index(['st_id','br_id','stb_value','stb_weight','bs_id','ibs_id','stb_bulk_ratio','cb_id','cgr_id','prc_id','cn_id'], 'index_multiple');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stock_breakdown_stb');
	}

}
