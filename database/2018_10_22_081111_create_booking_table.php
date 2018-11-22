<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_bkg', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bkg_ref_no');
            $table->integer('cgr_id')->unsigned();
            $table->date('bkg_delivery_date');
            $table->date('bkg_validity_date')->nullable();
            $table->tinyInteger('bkg_sample_received')->default(0);
            $table->string('bkg_remarks')->nullable();
            // Option 2:
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
        Schema::table('booking_bkg', function (Blueprint $table) {
            //
            $table->foreign('cgr_id')->references('id')->on('coffee_growers_cg')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('booking_bkg');
    }
}
