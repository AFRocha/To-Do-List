<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * @return void
     */

    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username', 255);
            $table->string('password', 255);
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}