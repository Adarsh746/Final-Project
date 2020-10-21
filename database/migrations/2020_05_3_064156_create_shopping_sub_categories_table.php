<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingsubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_sub_categories', function (Blueprint $table) {
            $table->increments('shopping_sub_cat_id')->primarykey();
            $table->integer('shopping_cat_id')->unsigned();
            $table->foreign('shopping_cat_id')->references('shopping_cat_id')->on('shopping_categories');
            $table->string('shopping_sub_cat_name');
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
        Schema::dropIfExists('shopping_sub_categories');
    }
}
