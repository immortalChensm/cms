<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToConsulationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consulation', function (Blueprint $table) {
            //
            $table->string("ill_desc")->nullable()->comment("患者病情");
            $table->string("ill_breath")->nullable()->comment("呼吸支持");
            $table->string("ill_room")->nullable()->comment("病房");
            $table->string("ill_transfer")->nullable()->comment("转运需求");
            $table->string("ill_ntime")->nullable()->comment("时间需求");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consulation', function (Blueprint $table) {
            //
            $table->dropColumn("ill_desc");
            $table->dropColumn("ill_breath");
            $table->dropColumn("ill_room");
            $table->dropColumn("ill_transfer");
            $table->dropColumn("ill_ntime");
        });
    }
}
