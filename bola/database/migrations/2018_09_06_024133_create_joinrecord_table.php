<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinrecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joinrecord', function (Blueprint $table) {
            $table->increments('id');
            $table->string("mobile",11)->index()->comment("手机号");
            $table->string("username",50)->index()->comment("姓名");
            $table->string("cert")->nullable()->comment("凭证");
            $table->tinyInteger("status")->default(0)->comment("状态");
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
        Schema::dropIfExists('joinrecord');
    }
}
