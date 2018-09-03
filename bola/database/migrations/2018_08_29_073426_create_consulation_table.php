<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsulationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulation', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",50)->index()->comment("病人姓名");
            $table->string("mobile",11)->index()->comment("病人电话");
            $table->string("description",255)->nullable()->comment("病人病情描述");
            $table->string("transfer_desc",255)->nullable()->comment("病人转诊描述");
            $table->string("case_illfile",255)->nullable()->comment("病人附件链接");
            $table->integer("userid")->index()->comment("提交的医生");
            $table->string("hospital_mobile",11)->index()->comment("医生的电话");
            $table->integer("assign_hospitalid")->index()->nullable()->comment("分配好的医院id");
            $table->timestamp("assign_time")->nullable()->comment("分配时间");
            $table->tinyInteger("status")->comment("状态");
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
        Schema::dropIfExists('consulation');
    }
}
