<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {

            $table->increments('id')->primarykey();
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->integer('job_id')->unsigned()->default(NULL);
            $table->foreign('job_id')->references('job_id')->on('jobs');
            $table->string('job_name');
            $table->string('others');
            $table->integer('admin_id')->unsigned()->default(NULL);
            $table->foreign('admin_id')->references('admin_id')->on('admins');
            $table->integer('employeer_id')->unsigned()->default(NULL);
            $table->foreign('employeer_id')->references('employeer_id')->on('employeers');
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
        Schema::dropIfExists('tickets');
    }
}
