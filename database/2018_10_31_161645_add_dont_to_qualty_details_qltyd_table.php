<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDontToQualtyDetailsQltydTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qualty_details_qltyd', function (Blueprint $table) {
            $table->integer('dont')->unsigned()->nullable();
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
            $table->dropColumn('dont');
        });
    }
}
