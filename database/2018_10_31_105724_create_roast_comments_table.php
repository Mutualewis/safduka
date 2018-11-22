<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoastCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roast_comments', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('st_mill_id')->unsigned()->nullable();
                $table->integer('st_wr_id')->unsigned()->nullable();
                $table->integer('qp_id')->unsigned()->nullable();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roast_comments');
    }
}
