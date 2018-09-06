<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospital', function (Blueprint $table) {
            //
            $table->string("pccm")->index()->nullable()->comment("pccm等级");
            $table->integer("icu_seat")->index()->nullable()->comment("剩余icu床位");
            $table->integer("general_seat")->index()->nullable()->comment("剩余普通床位");
            $table->string("street")->index()->nullable()->comment("街道社区");
            $table->integer("hospital_adminid")->index()->nullable()->comment("该医院的医生管理员");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital', function (Blueprint $table) {
            //
            $table->dropColumn("pccm");
            $table->dropColumn("icu_seat");
            $table->dropColumn("general_seat");
            $table->dropColumn("street");
            $table->dropColumn("hospital_adminid");
        });
    }
}
