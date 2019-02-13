<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOuttIdToQualtyDetailsQltydTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qualty_details_qltyd', function (Blueprint $table) {
            $table->integer('outt_id')->unsigned()->after('st_mill_id')->nullable();
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
            $table->dropColumn('outt_id')->unsigned()->nullable()->change();
        });
    }
}
