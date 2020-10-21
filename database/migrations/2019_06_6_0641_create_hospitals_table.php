<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('hospital_id')->primarykey();
            $table->string('hospital_name');
            $table->string('hospital_capacity');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('place_id')->on('local_places');
            $table->integer('user_id')->unsigned();          
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->string('image5');
            $table->string('image6');
            $table->string('image7');
            $table->string('image8');
            $table->string('image9');
            $table->string('image10');
            $table->string('address');
            $table->string('logo');
            $table->string('banner');
            $table->string('website');
            $table->string('facebook');
            
            $table->string('instagram');
            $table->string('whatsapp');
            
            $table->time('open_time');
            $table->time('close_time');
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
        Schema::dropIfExists('hospitals');
    }
}
