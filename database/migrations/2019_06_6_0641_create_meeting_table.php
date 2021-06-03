<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting', function (Blueprint $table) {
            $table->increments('meeting_id')->primarykey();
            $table->string('meeting_topic');
            $table->date('date');
             $table->integer('user_id')->unsigned();
              $table->foreign('user_id')->references('user_id')->on('users');
            $table->integer('franchise_id')->unsigned();
            $table->foreign('franchise_id')->references('franchise_id')->on('franchises');
            
            $table->time('open_time');
            $table->time('close_time');

            $table->string('description');
           
           
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
        Schema::dropIfExists('meeting');
    }
}
