<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeColumnToJoinrecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('joinrecord', function (Blueprint $table) {
            //
            $table->tinyInteger("type")->comment("申请类型1为医联体2为PCCM3为教学培训申请");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('joinrecord', function (Blueprint $table) {
            //
            $table->dropColumn("type");
        });
    }
}
