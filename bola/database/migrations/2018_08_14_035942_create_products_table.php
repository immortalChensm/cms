<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title")->comment("产品标题");
            $table->string("image",225)->nullable()->default("")->comment("产品图片");
            $table->text("desc")->comment("产品简介");
            $table->text("content")->comment("产品内容");
            $table->integer("product_category_id")->comment("产品所属分类");
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
        Schema::dropIfExists('products');
    }
}
