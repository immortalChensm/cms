<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->comment("产品分类名称");
            $table->text("desc")->nullable()->default("")->comment("产品分类描述");
            $table->string("icon")->nullable()->default("")->comment("产品分类图标");
            $table->text("image")->comment("产品分类图片");
            $table->integer("parent_id")->default(0);
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
        Schema::dropIfExists('products_category');
    }
}
