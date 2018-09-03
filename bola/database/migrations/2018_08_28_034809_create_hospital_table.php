<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",200)->index()->comment("医院名称");
            $table->string("code")->comment("医院代码");
            $table->string("image",255)->comment("医院图片");
            $table->integer("subjectid")->index()->comment("医院科室");
            $table->integer("skillid")->index()->comment("医院专业特长");
            $table->smallInteger("bed_num")->comment("医院座位数");
            $table->smallInteger("pyhsician_num")->comment("医院医生数");
            $table->tinyInteger("status")->comment("医院在线状态");
            $table->string("address",255)->comment("医院详细地址");
            $table->integer("provinceid")->index()->comment("医院所在省份");
            $table->integer("cityid")->index()->comment("医院所在县市区");
            $table->integer("countyid")->index()->comment("医院所在地区");
            $table->integer("townid")->index()->comment("医院所在镇");
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
        Schema::dropIfExists('hospital');
    }
}
