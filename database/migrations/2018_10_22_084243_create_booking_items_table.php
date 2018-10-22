<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_items_bki', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bkg_id')->unsigned();
            $table->integer('pty_id')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
        Schema::table('booking_items_bki', function (Blueprint $table) {
            //
            $table->foreign('bkg_id')->references('id')->on('booking_bkg')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('booking_items_bki');
    }
}
