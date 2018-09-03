<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nav', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",100)->index()->comment("菜单名");
            $table->string("icon",50)->comment("菜单图标");
            $table->string("link",100)->comment("菜单链接");
            $table->integer("parent_id")->comment("菜单parent_id");
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
        Schema::dropIfExists('nav');
    }
}
