<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('job_id')->primarykey();
            $table->integer('employeer_id')->unsigned();
            $table->foreign('employeer_id')->references('employeer_id')->on('employeers');
            $table->string('job_name');
            $table->string('job_discription');
            $table->integer('quali_id_1')->unsigned();
            $table->foreign('quali_id_1')->references('quali_id')->on('qualifications');
            $table->integer('subject_id_1')->unsigned();
            $table->foreign('subject_id_1')->references('subject_id')->on('subjects');
            $table->integer('quali_id_2')->unsigned();
            $table->foreign('quali_id_2')->references('quali_id')->on('qualifications');
            $table->integer('subject_id_2')->unsigned();
            $table->foreign('subject_id_2')->references('subject_id')->on('subjects');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('cat_id')->on('categories');
            $table->integer('sub_cat_id')->unsigned();
            $table->foreign('sub_cat_id')->references('sub_cat_id')->on('sub_categories');
            $table->integer('nation_id')->unsigned();
            $table->foreign('nation_id')->references('nation_id')->on('nations');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('district_id')->on('districts');
            $table->string('experience');
            $table->string('job_type');
            $table->integer('salary');
            $table->integer('job_status');
            $table->integer('verification_status')->default('0');
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
        Schema::dropIfExists('jobs');
    }
}
