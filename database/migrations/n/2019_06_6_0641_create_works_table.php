<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('work_id')->primarykey();
             $table->string('work_name');
            

             $table->integer('book_id')->unsigned();          
            $table->foreign('book_id')->references('book_id')->on('bookings');
            
            $table->integer('user_id')->unsigned();          
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->integer('franchise_id')->unsigned();          
            $table->foreign('franchise_id')->references('franchise_id')->on('franchises');
            
             $table->string('descrption');
             $table->time('time');
             $table->date('work_date');
          
            
            

          
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
        Schema::dropIfExists('works');
    }
}
