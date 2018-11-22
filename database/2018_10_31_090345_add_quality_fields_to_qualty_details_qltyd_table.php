<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQualityFieldsToQualtyDetailsQltydTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qualty_details_qltyd', function (Blueprint $table) {
            $table->integer('rw_class')->unsigned()->nullable();
            $table->integer('rw_quality')->unsigned()->nullable();
            $table->integer('roast_class')->unsigned()->nullable();
            $table->integer('roast_quality')->unsigned()->nullable();
            $table->integer('cup_class')->unsigned()->nullable();
            $table->integer('cup_quality')->unsigned()->nullable();
            $table->integer('overall_class')->unsigned()->nullable();
            $table->integer('overall_comments')->unsigned()->nullable();
            $table->integer('cupped_by')->unsigned()->nullable();
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
            $table->dropColumn(['rw_class', 'rw_quality', 'roast_class', 'roast_quality', 'cup_class', 'cup_quality', 'overall_class', 'overall_comments', 'cupped_by']);
        });
    }
}
