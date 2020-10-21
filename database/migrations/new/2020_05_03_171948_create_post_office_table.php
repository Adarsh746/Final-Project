<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostOfficeTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_office', function (Blueprint $table) {
            $table->increments('post_office_id')->primarykey();
            $table->string('post_office_name');
            $table->integer('pincode')->unsigned()->unique();
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('district_id')->on('districts');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('post_office');
    }
}

