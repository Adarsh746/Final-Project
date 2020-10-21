<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_items', function (Blueprint $table) {
            $table->increments('property_id')->primarykey();
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('place_id')->on('local_places');
            $table->integer('user_id')->unsigned();          
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->integer('shopping_sub_cat_id')->unsigned();
            $table->foreign('shopping_sub_cat_id')->references('shopping_sub_cat_id')->on('shopping_sub_categories');
            $table->string('discription');
            $table->date('date_of_manufacture');
            $table->string('address');
            $table->integer('rate');
            $table->integer('mobile_number');
            $table->integer('mobile_number2');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
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
        Schema::dropIfExists('realestate');
    }
}
