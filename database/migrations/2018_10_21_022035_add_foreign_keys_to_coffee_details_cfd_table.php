<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoffeeDetailsCfdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('coffee_details_cfd', function(Blueprint $table)
		{
			$table->foreign('cgrad_id', 'fk_coffee_details_cfd_coffee_grade_cgr1')->references('id')->on('coffee_grade_cgrad')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('csn_id', 'fk_coffee_details_cfd_coffee_season_csn1')->references('id')->on('coffee_seasons_csn')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('ctyp_id', 'fk_coffee_details_cfd_coffee_type_ctyp1')->references('id')->on('coffee_type_ctyp')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('sl_id', 'fk_coffee_details_cfd_sale_sl1')->references('id')->on('sale_sl')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('slr_id', 'fk_coffee_details_cfd_seller_slr')->references('id')->on('seller_slr')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('wr_id', 'fk_coffee_details_cfd_warehouse_wr1')->references('id')->on('warehouse_wr')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('coffee_details_cfd', function(Blueprint $table)
		{
			$table->dropForeign('fk_coffee_details_cfd_coffee_grade_cgr1');
			$table->dropForeign('fk_coffee_details_cfd_coffee_season_csn1');
			$table->dropForeign('fk_coffee_details_cfd_coffee_type_ctyp1');
			$table->dropForeign('fk_coffee_details_cfd_sale_sl1');
			$table->dropForeign('fk_coffee_details_cfd_seller_slr');
			$table->dropForeign('fk_coffee_details_cfd_warehouse_wr1');
		});
	}

}
