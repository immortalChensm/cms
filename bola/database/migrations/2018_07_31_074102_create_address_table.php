<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('address', function (Blueprint $table) {
            $table->increments('id')->comment('地址表');
            $table->string('title')->comment('标题');
            $table->string('mobile')->comment('联系电话');
            $table->string('place')->comment('位置');
            $table->string('address')->comment('具体地址');
            $table->tinyInteger('status')->default(1)->comment('1显示 2不显示');
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
        Schema::dropIfExists('address');
    }
}
