<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransportersTrpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transporters_trp', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable()->index('fk_trp_country_rgn1_idx');
			$table->string('trp_name', 45);
			$table->string('trp_initials', 45)->nullable();
			$table->string('trp_description', 45)->nullable();
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
		Schema::drop('transporters_trp');
	}

}
