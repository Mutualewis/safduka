<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProcessChargesPrcgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('process_charges_prcgs', function (Blueprint $table) {
            //
            $table->integer('prcgs_team_id')->nullable()->change();
            // $table->foreign('prcgs_rate_id')->references('id')->on('rates_rts')->onDelete('restrict');
            // $table->foreign('prcgs_team_id')->references('id')->on('teams_tms')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('process_charges_prcgs', function (Blueprint $table) {
            //
        });
    }
}
