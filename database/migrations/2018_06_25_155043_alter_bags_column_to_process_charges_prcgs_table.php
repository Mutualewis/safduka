<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBagsColumnToProcessChargesPrcgsTable extends Migration
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
            $table->string('bags');
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
