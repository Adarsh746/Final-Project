<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('doctor_id')->primarykey();
            $table->string('doctor_name');
            $table->string('designation');
            $table->integer('hospital_id')->unsigned();
            $table->foreign('hospital_id')->references('hospital_id')->on('hospitals');
            $table->string('image');
            $table->time('open_time');
            $table->time('close_time');
            $table->integer('mobile_number');
            $table->string('address');
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
        Schema::dropIfExists('doctors');
    }
}
