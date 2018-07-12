<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveToRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rates_rts', function (Blueprint $table) {
            //
            $table->boolean('active')->after('rate')->default(0);
            $table->double('bagsize')->after('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rates_rts', function (Blueprint $table) {
            //
        });
    }
}
