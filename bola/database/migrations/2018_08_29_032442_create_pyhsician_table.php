<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePyhsicianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pyhsician', function (Blueprint $table) {
            $table->increments('id');
            $table->string("image",255)->nullable()->comment("医生图片");
            $table->string("username",50)->comment("医生姓名");
            $table->string("mobile",11)->comment("医生手机号");
            $table->integer("hospitalid")->index()->comment("所属医院");
            $table->string("hospital_code")->index()->comment("所属医院代码");
            $table->integer("subjectid")->index()->comment("所负责的科室");
            $table->integer("skillid")->comment("所负责的专业特长");
            $table->integer("positionid")->index()->comment("医生的职称id");
            $table->integer("userid")->index()->comment("用户id");
            $table->text("introduction")->comment("医生简介");
            $table->tinyInteger("status")->comment("医生状态上下线");
            $table->tinyInteger("recommend")->comment("医生是否推荐");
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
        Schema::dropIfExists('pyhsician');
    }
}
