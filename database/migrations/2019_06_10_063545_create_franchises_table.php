<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFranchisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchises', function (Blueprint $table) {
           
            $table->increments('franchise_id')->primarykey();
            $table->string('franchise_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact')->unique();
            $table->string('contact1');
            $table->date('DOB');
            $table->string('blood_group');
            $table->string('image');
            $table->string('prem_address');
            $table->string('curr_address');
            $table->integer('account_status')->default('0');
            $table->integer('aproval_status')->default('0');
            $table->integer('nation_id')->unsigned();
            $table->foreign('nation_id')->references('nation_id')->on('nations');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('district_id')->on('districts');
            $table->integer('post_office_id')->unsigned();
            $table->foreign('post_office_id')->references('post_office_id')->on('post_office');
            $table->rememberToken();
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
        Schema::dropIfExists('franchises');
    }
}
