<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceContractSctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_contract_sct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sct_no');
            $table->integer('cgr_id')->unsigned();
            $table->date('sct_date');
            $table->date('sct_from_date');
            $table->date('sct_to_date');
            $table->integer('ct_id')->unsigned();
            $table->string('other_details', 200);
            $table->string('upload_path', 200);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
        Schema::table('service_contract_sct', function (Blueprint $table) {
            //
            $table->foreign('cgr_id')->references('id')->on('coffee_growers_cg')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('ct_id')->references('id')->on('contract_type_ct')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_contract_sct');
    }
}
