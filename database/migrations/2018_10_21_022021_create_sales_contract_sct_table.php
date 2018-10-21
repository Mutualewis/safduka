<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesContractSctTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_contract_sct', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable();
			$table->integer('cl_id')->nullable();
			$table->string('sct_number')->unique('sct_number_UNIQUE');
			$table->string('sct_description')->nullable();
			$table->integer('sct_packages')->nullable();
			$table->string('sct_month')->nullable();
			$table->date('sct_bulk_date')->nullable();
			$table->date('sct_disposal_date')->nullable();
			$table->integer('sct_shipped')->nullable();
			$table->integer('bs_id')->nullable();
			$table->integer('sct_stuffed')->nullable();
			$table->integer('sct_packaging_method')->nullable();
			$table->integer('pkg_id')->nullable();
			$table->integer('yr_id')->nullable();
			$table->string('sct_complemantary_condition')->nullable();
			$table->integer('sct_weight')->nullable();
			$table->integer('sct_approved_weight')->nullable();
			$table->date('sct_start_date')->nullable();
			$table->date('sct_end_date')->nullable();
			$table->date('sct_date')->nullable();
			$table->string('sct_client_reference')->nullable();
			$table->integer('sct_user')->nullable();
			$table->integer('sct_updated_user')->nullable();
			$table->integer('sct_status')->nullable();
			$table->integer('pt_id')->nullable();
			$table->integer('bgs_id')->nullable();
			$table->integer('pu_id')->nullable();
			$table->integer('cf_id')->nullable();
			$table->integer('trm_id')->nullable();
			$table->integer('sct_cancelled')->nullable();
			$table->string('sct_destination', 45)->nullable();
			$table->integer('sct_price')->nullable();
			$table->integer('sct_bric_confirmed')->nullable();
			$table->integer('sct_shipment')->nullable();
			$table->integer('sct_coffee_type')->nullable();
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
		Schema::drop('sales_contract_sct');
	}

}
