<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessResultsPrtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('process_results_prts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pr_id')->nullable();
			$table->integer('st_id')->nullable()->index('st_id_idx');
			$table->integer('cfd_id')->nullable();
			$table->integer('prt_id')->nullable();
			$table->integer('prts_weight')->nullable();
			$table->integer('prts_packages')->nullable();
			$table->integer('cgrad_id')->nullable();
			$table->integer('bs_id')->nullable();
			$table->integer('wr_id')->nullable();
			$table->string('loc_row', 45)->nullable();
			$table->string('loc_column', 45)->nullable();
			$table->integer('btc_zone')->nullable();
			$table->integer('prts_return_to_stock')->nullable();
			$table->integer('cp_id')->nullable();
			$table->decimal('sqltyd_acidity', 18)->nullable();
			$table->decimal('sqltyd_body', 18)->nullable();
			$table->decimal('sqltyd_flavour', 18)->nullable();
			$table->string('sqltyd_description', 45)->nullable();
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
		Schema::drop('process_results_prts');
	}

}
