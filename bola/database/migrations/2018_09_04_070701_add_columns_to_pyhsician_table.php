<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToPyhsicianTable extends Migration
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
            $table->string("cert",255)->nullable()->comment("医生资质");
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
            $table->dropColumn("cert");
        });
    }
}
