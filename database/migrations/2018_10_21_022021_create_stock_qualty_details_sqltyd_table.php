<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockQualtyDetailsSqltydTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_qualty_details_sqltyd', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('st_id')->nullable()->index('st_id');
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
		Schema::drop('stock_qualty_details_sqltyd');
	}

}
