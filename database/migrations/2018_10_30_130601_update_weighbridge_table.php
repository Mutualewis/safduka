<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWeighbridgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weighbridge_info_wbi', function (Blueprint $table) {
            $table->integer('rgn_id')->unsigned();
            $table->integer('bkg_id')->unsigned();
            $table->integer('trp_id')->unsigned();
            $table->integer('wb_id')->unsigned();
            $table->integer('pl_id')->unsigned();
            $table->integer('wbi_document_unit')->unsigned();
            $table->integer('wbi_document_quantity')->unsigned();;
            $table->string('wbi_representative_name');
            $table->string('wbi_representative_id');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weighbridge_info_wbi', function (Blueprint $table) {
            $table->dropColumn('ctr_id');
            $table->dropColumn('csn_id');
            $table->dropColumn('cb_id');
            $table->dropColumn('slr_id');
        });
    }
}
