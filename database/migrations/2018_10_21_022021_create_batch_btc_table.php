<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBatchBtcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batch_btc', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('btc_number')->nullable();
			$table->integer('st_id')->nullable()->index('st_id_idx');
			$table->integer('btc_weight')->nullable();
			$table->decimal('btc_tare', 18)->nullable();
			$table->integer('btc_net_weight')->nullable()->index('f');
			$table->integer('btc_packages')->nullable();
			$table->integer('btc_bags')->nullable();
			$table->integer('btc_pockets')->nullable();
			$table->integer('otb_id')->nullable();
			$table->integer('btc_prev_id')->nullable();
			$table->integer('btc_instructed_by')->nullable();
			$table->integer('btc_ended_by')->nullable();
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
		Schema::drop('batch_btc');
	}

}
