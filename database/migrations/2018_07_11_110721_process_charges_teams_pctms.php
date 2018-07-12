<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcessChargesTeamsPctms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_charges_teams_pctms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prcgs_id')->unsigned();
            $table->integer('prcgs_team_id')->unsigned();
            $table->string('bags');
            $table->string('descr');
            
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
        Schema::table('process_charges_teams_pctms', function (Blueprint $table) {
            //
            $table->foreign('prcgs_id')->references('id')->on('process_charges_prcgs')->onDelete('restrict');
            $table->foreign('prcgs_team_id')->references('id')->on('teams_tms')->onDelete('restrict');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('process_charges_teams_pctms');
    }
}
