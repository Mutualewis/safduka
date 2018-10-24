<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPinColumnToGrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coffee_growers_cgr', function (Blueprint $table) {
            $table->string('cgr_pin', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coffee_growers_cgr', function (Blueprint $table) {
            $table->dropColumn('cgr_pin');
        });
    }
}
