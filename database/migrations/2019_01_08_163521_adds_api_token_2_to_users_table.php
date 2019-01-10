<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddsApiToken2ToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_usr', function (Blueprint $table) {
            $table->string('api_token', 60)->unique()->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('users_usr', function (Blueprint $table) {
            $table->dropColumn(['api_token']);
        });
    }
}
