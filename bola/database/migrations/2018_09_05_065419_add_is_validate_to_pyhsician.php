<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsValidateToPyhsician extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pyhsician', function (Blueprint $table) {
            //
            $table->tinyInteger("is_validate")->nullable()->default(0)->comment("医生资料是否完善");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pyhsician', function (Blueprint $table) {
            //
            $table->dropColumn("is_validate");
        });
    }
}
