<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('permissions', function (Blueprint $table) {
            $table->string("title")->comment("权限名称");
            $table->string("action")->comment("权限url");
            $table->string("module")->comment("权限模块");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn("title");
            $table->dropColumn("action");
            $table->dropColumn("module");
        });
    }
}
