<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cates', function (Blueprint $table) {
            $table->increments('id')->comment('分类表');
            $table->integer('pid')->comment('父id')->default(0);
            $table->string('title')->comment('标题');
            $table->string('image')->comment('图片');
            $table->string('url')->comment('链接');
            $table->tinyInteger('type')->default(0);
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
        Schema::dropIfExists('cates');
    }
}
