<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmptyWeightToOutturnOuttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outturns_outt', function (Blueprint $table) {
            $table->integer('empty_bag_weight')->unsigned()->after('st_gross')->nullable();
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
            $table->dropColumn('empty_bag_weight');
        });
    }
}
