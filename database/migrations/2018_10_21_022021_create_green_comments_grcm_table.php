<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGreenCommentsGrcmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('green_comments_grcm', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cfd_id')->nullable()->index('fk_green_comments_grcm_coffee_details_cfd1_idx');
			$table->integer('qp_id')->nullable()->index('fk_green_comments_grcm_green_type_gtyp1_idx');
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
		Schema::drop('green_comments_grcm');
	}

}
