<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartchmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parchment_type_pty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pty_name');
            $table->timestamp('pty_date_added')->useCurrent();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parchment_type_pty');
    }
}
