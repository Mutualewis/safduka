<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstructedStockLocationInslocTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructed_stock_location_insloc', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ilf_id')->nullable();
			$table->integer('insloc_ref')->nullable();
			$table->integer('bt_id')->nullable()->index('fkx_btid_idx');
			$table->integer('loc_row_id')->nullable();
			$table->integer('loc_column_id')->nullable();
			$table->integer('btc_zone')->nullable();
			$table->integer('insloc_weight')->nullable()->index('f');
			$table->string('insloc_reason')->nullable();
			$table->integer('mit_id')->nullable();
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
		Schema::drop('instructed_stock_location_insloc');
	}

}
