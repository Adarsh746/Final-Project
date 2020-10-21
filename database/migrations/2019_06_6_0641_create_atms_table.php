<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atms', function (Blueprint $table) {
            $table->increments('atm_id')->primarykey();
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('place_id')->on('local_places');
            $table->string('state_name');
            $table->string('atm_type');
            $table->string('atm_bank');
            $table->string('atm_address');
            $table->time('atm_open_time');
            $table->time('atm_close_time');
            $table->string('atm_image');
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
        Schema::dropIfExists('atms');
    }
}
