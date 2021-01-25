<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');
            //$table->increments('id');

            $table->integer('category_id')->nullable()->unsigned();
            //$table->foreign('category_id')->nullable()->unsigned();
            $table->integer('user_id')->unsigned();//автор статьи из таблици users
            
            $table->string('slug')->unique(); //тайтл в транслите он должен быть уникальным
            $table->string('title');

            $table->text('excerpt')->nullable();//выдержка из статьи

            $table->text('content_raw');//markdown пишет сюда при написании статьи
            $table->text('content_html');// рид онли поле, сюда данные пишется на основании raw, а система сама перегенерирует данные сюда

            $table->boolean('is_published')->default(false);//tiny int
            $table->timestamp('published_at')->nullable();//дата публикации статьи

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');

            //$table->foreign('category_id')->nullable()->unsigned();
            
            $table->foreign('category_id')->references('id')->on('blog_categories');

            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
