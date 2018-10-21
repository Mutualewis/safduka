<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoffeeGrowersCgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coffee_growers_cg', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('gt_id')->nullable();
			$table->string('cg_name', 50);
			$table->string('cg_organisation')->nullable();
			$table->string('cg_code', 50);
			$table->string('cg_mark', 45)->nullable();
			$table->string('cg_email', 45)->nullable();
			$table->string('cg_mobile', 45)->nullable();
			$table->string('cg_postal_address', 45)->nullable();
			$table->string('cg_land_line', 45)->nullable();
			$table->string('cg_vat_number', 45)->nullable();
			$table->string('cg_physical_address', 45)->nullable();
			$table->string('cg_date_registered', 45)->nullable();
			$table->string('cg_sub_county', 45)->nullable();
			$table->integer('cg_is_active')->nullable();
			$table->string('cg_app_transaction', 45)->nullable();
			$table->string('cg_postal_town', 45)->nullable();
			$table->integer('cnt_id')->nullable();
			$table->integer('rgn_id')->nullable();
			$table->integer('ctr_id')->nullable();
			$table->string('cg_post_code', 45)->nullable();
			$table->string('cg_factory_id', 45)->nullable();
			$table->string('cg_cert', 45)->nullable();
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
		Schema::drop('coffee_growers_cg');
	}

}
