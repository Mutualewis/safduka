<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDashboardViewPermDvpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dashboard_view_perm_dvp', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('dv_id')->nullable();
			$table->integer('dprt_id')->nullable();
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
		Schema::drop('dashboard_view_perm_dvp');
	}

}
