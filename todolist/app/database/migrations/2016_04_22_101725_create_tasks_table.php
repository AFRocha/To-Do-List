<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

    /**
     * @return void
     */

    public function up()
    {
        Schema::create('tasks', function(Blueprint $table)
        {
            $table->increments('id');
            //Foreign key - User (id);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title', 255);
            $table->string('description', 512);
            $table->dateTime('datetime'); 
            $table->tinyInteger('active');
        });
    }

    /**
     * @return void
     */

    public function down()
    {
        Schema::drop('tasks');
    }

}