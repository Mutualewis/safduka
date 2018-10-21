<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupmenuGpmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groupmenu_gpm', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('dprt_id')->index('fk_dprt_idx_idx');
			$table->integer('mn_id')->index('fk_menu_idx_idx');
			$table->string('rl_ids', 45)->nullable();
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
		Schema::drop('groupmenu_gpm');
	}

}
