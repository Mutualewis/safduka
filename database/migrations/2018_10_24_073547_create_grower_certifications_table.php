<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrowerCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grower_certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cgr_id')->unsigned();
            $table->integer('crt_id')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
        Schema::table('grower_certifications', function (Blueprint $table) {
            //
            $table->foreign('cgr_id')->references('id')->on('coffee_growers_cgr')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('crt_id')->references('id')->on('certification_crt')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grower_certifications');
    }
}
