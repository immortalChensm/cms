<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
           $table->increments('id')->comment('banner表');
            $table->string('title')->comment('图片名称');
            $table->string('image')->comment('图片');
            $table->string('url')->comment('链接');
            $table->tinyInteger('type')->default(0)->comment('1 首页banner');
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
        Schema::dropIfExists('banner');

    }
}
