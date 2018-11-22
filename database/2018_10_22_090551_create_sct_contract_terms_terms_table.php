<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSctContractTermsTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sct_contract_terms_sctt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sct_id')->unsigned();
            $table->integer('term_id')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
        Schema::table('sct_contract_terms_sctt', function (Blueprint $table) {
            //
            $table->foreign('sct_id')->references('id')->on('service_contract_sct')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('term_id')->references('id')->on('terms_tms')->onDelete('restrict')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sct_contract_terms_sctt');
    }
}
