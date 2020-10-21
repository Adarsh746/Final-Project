<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxies', function (Blueprint $table) {
            $table->increments('taxi_id')->primarykey();
            $table->string('taxi_name');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('place_id')->on('local_places');
            $table->integer('user_id')->unsigned();          
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('image1');
            $table->string('image2');
            $table->string('catagory');
            $table->string('taxi_type');
            $table->string('taxi_capacity');
            $table->string('discription');
            $table->string('address');
            $table->string('vehicle_no');
            $table->time('availabe_time');
            $table->integer('rate');
            $table->integer('mobile_number');
            $table->integer('mobile_number2');
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('taxies');
    }
}
