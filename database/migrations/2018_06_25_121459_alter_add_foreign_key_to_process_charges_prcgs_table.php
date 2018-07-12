<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddForeignKeyToProcessChargesPrcgsTable extends Migration
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
            $table->integer('prcgs_instruction_no')->change();
           
        });
        Schema::table('process_charges_prcgs', function (Blueprint $table) {
            //
            $table->integer('prcgs_instruction_no')->unsigned()->change();
           
        });
        // Schema::table('process_charges_prcgs', function (Blueprint $table) {
        //     //
        //     $table->foreign('prcgs_instruction_no')->references('id')->on('process_pr')->onDelete('restrict');
        // });
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
