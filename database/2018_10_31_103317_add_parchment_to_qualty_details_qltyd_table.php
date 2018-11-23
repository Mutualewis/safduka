<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParchmentToQualtyDetailsQltydTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qualty_details_qltyd', function (Blueprint $table) {
            $table->integer('pct_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qualty_details_qltyd', function (Blueprint $table) {
            $table->dropColumn('pct_id');
        });
    }
}
