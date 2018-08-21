<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('admins', function (Blueprint $table) {
            $table->increments('id')->comment('管理员表');
            $table->string('account')->comment('账号');
            $table->string('password')->comment('密码');
            $table->tinyInteger('status')->default(1)->comment('1开启 2关闭');
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
        Schema::dropIfExists('admins');

        
    }
}
