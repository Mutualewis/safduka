<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockLocationSlocTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_location_sloc', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('bt_id')->nullable()->index('index2');
			$table->integer('loc_row_id')->nullable();
			$table->integer('loc_column_id')->nullable();
			$table->integer('btc_zone')->nullable();
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
		Schema::drop('stock_location_sloc');
	}

}
