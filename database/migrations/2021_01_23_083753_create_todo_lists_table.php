<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_for_name');
            $table->string('user_for_email');
            $table->integer('user_id')->unsigned();//автор статьи из таблици users
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('task_name');
            $table->string('task_text');
            $table->boolean('task_done');
            $table->timestamps();
            
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_lists');
    }
}
