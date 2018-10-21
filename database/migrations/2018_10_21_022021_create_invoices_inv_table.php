<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesInvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices_inv', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('inv_no', 45)->nullable();
			$table->date('inv_date')->nullable();
			$table->integer('inv_confirmedby')->nullable();
			$table->timestamps();
			$table->index(['inv_confirmedby','inv_no'], 'indx_confirmedby');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices_inv');
	}

}
