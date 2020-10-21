 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFranchisesGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchises_groups', function (Blueprint $table) {
            $table->increments('franchises_group_id')->primarykey();
            $table->string('franchises_group_name');
            $table->integer('post_office_id')->unsigned();
            $table->foreign('post_office_id')->references('post_office_id')->on('post_offices');
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
        Schema::dropIfExists('franchises_groups');
    }
}
