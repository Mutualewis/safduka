<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaleSlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_sl', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable()->index('fk_sale_country_idx');
			$table->integer('csn_id')->nullable()->index('fk_coffee_season_idx');
			$table->integer('cb_id')->nullable();
			$table->integer('sltyp_id')->nullable();
			$table->string('sl_no', 45)->nullable();
			$table->date('sl_date')->nullable();
			$table->decimal('sl_hedge', 10, 3)->nullable();
			$table->integer('sl_margin')->nullable();
			$table->string('sl_month', 10)->nullable();
			$table->integer('sl_coffee_type')->nullable();
			$table->string('sl_catalogue_confirmedby', 45)->nullable();
			$table->string('sl_quality_confirmedby', 45)->nullable();
			$table->string('sl_auction_confirmedby', 45)->nullable();
			$table->timestamps();
			$table->index(['sl_no','sltyp_id'], 'sl_no');
			$table->index(['cb_id','sltyp_id','sl_catalogue_confirmedby','sl_quality_confirmedby','sl_auction_confirmedby'], 'indx_multiple');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sale_sl');
	}

}
