<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(1); //создаем поле типа интеджер, говорим что оно будет от 0 и выше и по умолчанию там 0, определенный выше.
            
            $table->string('slug')->unique(); //тайтл в транслите он должен быть уникальным
            $table->string('title'); //заглловок
            $table->text('description')->nullable(); //описание и значение nullable, значит что по умолчанию поле можно не заполнять, не обязательное поле
            
            $table->timestamps();
            $table->softDeletes();//при удалении записи поле заполняеться и пишется дата удаления
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}
