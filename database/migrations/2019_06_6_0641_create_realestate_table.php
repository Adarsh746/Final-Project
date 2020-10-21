<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestate', function (Blueprint $table) {
            $table->increments('property_id')->primarykey();
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('place_id')->on('local_places');
            $table->integer('user_id')->unsigned();          
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('property_type');
            $table->string('property_category');
            $table->string('discription');
            $table->string('address');
            $table->integer('rate');
            $table->integer('mobile_number');
            $table->integer('mobile_number2');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
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
        Schema::dropIfExists('realestate');
    }
}
