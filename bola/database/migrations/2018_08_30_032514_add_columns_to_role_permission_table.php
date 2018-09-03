<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToRolePermissionTable extends Migration
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
            $table->string("title")->index()->comment("权限中文名称");
            $table->string("group")->index()->comment("权限分组");
            $table->string("action")->index()->comment("权限操作");
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
            $table->dropColumn("group");
            $table->dropColumn("action");
        });
    }
}
