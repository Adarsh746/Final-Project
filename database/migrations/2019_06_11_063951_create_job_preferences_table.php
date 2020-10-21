<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_preferences', function (Blueprint $table) {
            $table->increments('pref_id')->primarykey();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('job_name');
            $table->integer('quali_id_1')->unsigned();
            $table->foreign('quali_id_1')->references('quali_id')->on('qualifications');
            $table->integer('subject_id_1')->unsigned();
            $table->foreign('subject_id_1')->references('subject_id')->on('subjects');
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
            $table->integer('exp_salary');
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
        Schema::dropIfExists('job_preferences');
    }
}
