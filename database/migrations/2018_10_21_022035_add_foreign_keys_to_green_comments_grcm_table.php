<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGreenCommentsGrcmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('green_comments_grcm', function(Blueprint $table)
		{
			$table->foreign('cfd_id', 'fk_green_comments_grcm_coffee_details_cfd1')->references('id')->on('coffee_details_cfd')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('qp_id', 'fk_green_comments_grcm_green_type_gtyp1')->references('id')->on('quality_parameters_qp')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('green_comments_grcm', function(Blueprint $table)
		{
			$table->dropForeign('fk_green_comments_grcm_coffee_details_cfd1');
			$table->dropForeign('fk_green_comments_grcm_green_type_gtyp1');
		});
	}

}
