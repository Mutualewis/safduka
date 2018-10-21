<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGroupmenuGpmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('groupmenu_gpm', function(Blueprint $table)
		{
			$table->foreign('dprt_id', 'fk_dprt_idx')->references('id')->on('department_dprt')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('mn_id', 'fk_menu_idx')->references('id')->on('menu_mn')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('groupmenu_gpm', function(Blueprint $table)
		{
			$table->dropForeign('fk_dprt_idx');
			$table->dropForeign('fk_menu_idx');
		});
	}

}
