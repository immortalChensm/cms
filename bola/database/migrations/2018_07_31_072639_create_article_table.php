<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('article', function (Blueprint $table) {
            $table->increments('id')->comment('文章表');
            $table->string('title')->comment('标题');
            $table->string('name')->comment('名称');
            $table->string('image')->comment('图片');
            $table->text('connent')->comment('简介');
            $table->tinyInteger('status')->default(1)->comment('1显示 2不显示');
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
       Schema::dropIfExists('article');
    }
}
