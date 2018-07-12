<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRefNoToProcessChargesPrcgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('process_charges_prcgs', function (Blueprint $table) {
            //
            $table->string('ref_no')->nullable();
           
        });
        Schema::table('process_charges_prcgs', function (Blueprint $table) {
            //
            $table->string('ref_no')->unsigned()->change();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
