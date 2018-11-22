<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeighbridgeInfoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_bkg', function (Blueprint $table) {
            $table->integer('wbi_id')->unsigned();
            $table->foreign('wbi_id')->references('id')->on('weighbridge_info_wbi')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_bkg', function (Blueprint $table) {
            $table->dropColumn('wbi_id');
        });
    }
}
