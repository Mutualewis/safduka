<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNetInputWeightToOutturnOuttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outturns_outt', function (Blueprint $table) {
            $table->integer('net_input_weight')->unsigned()->after('empty_bag_weight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outturns_outt', function (Blueprint $table) {
            $table->dropColumn('net_input_weight');
        });
    }
}
