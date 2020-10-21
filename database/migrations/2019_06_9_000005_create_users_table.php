<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id')->primarykey();
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact');
            $table->date('dob');
            $table->integer('account_status')->default('0');
            $table->integer('nation_id')->unsigned();
            $table->foreign('nation_id')->references('nation_id')->on('nations');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('district_id')->on('districts');
            $table->integer('post_office_id')->unsigned();
            $table->foreign('post_office_id')->references('post_office_id')->on('post_offices');
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
        Schema::dropIfExists('users');
    }
}
