<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatrimonyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrimony', function (Blueprint $table) {
            $table->increments('mat_reg_id')->primarykey();
            $table->integer('city_id')->unsigned();
            $table->string('name');
            $table->integer('age');
            $table->integer('height');
            $table->integer('weight');
            $table->string('gender');
            $table->string('religion');
            $table->string('caste');
            $table->foreign('city_id')->references('place_id')->on('local_places');
            $table->string('address');
            $table->integer('mobile_number');
            $table->integer('mobile_number2');
            $table->string('education');
            $table->string('job');
            $table->string('image');
            $table->string('demands');
            $table->string('color');
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
        Schema::dropIfExists('matrimony');
    }
}
