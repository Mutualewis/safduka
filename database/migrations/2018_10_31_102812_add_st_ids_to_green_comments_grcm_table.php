<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStIdsToGreenCommentsGrcmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('green_comments_grcm', function (Blueprint $table) {
            $table->integer('st_mill_id')->unsigned();
            $table->renameColumn('cfd_id', 'st_wr_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('green_comments_grcm', function (Blueprint $table) {
            $table->renameColumn('st_wr_id', 'cfd_id');
            $table->dropColumn('st_mill_id');
        });
    }
}
