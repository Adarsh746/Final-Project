<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetrolPumbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertol_pumbs', function (Blueprint $table) {
            $table->increments('pumb_id')->primarykey();
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('place_id')->on('local_places');
            $table->string('pumb_address');
            $table->time('pumb_open_time');
            $table->time('pumb_close_time');
            $table->string('pumb_image');
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
        Schema::dropIfExists('pertol_pumbs');
    }
}
