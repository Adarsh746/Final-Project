 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_products', function (Blueprint $table) {
            $table->increments('shopping_pro_id')->primarykey();
            $table->string('shopping_pro_name');
            $table->string('shopping_pro_details');
            $table->integer('shopping_pro_status')->unsigned();
            $table->integer('shopping_pro_stock')->unsigned();
            $table->integer('shopping_pro_price')->unsigned();
            $table->string('image');
            $table->string('shopping_pro_additional_details');
            $table->integer('shopping_pro_franchise_id')->unsigned();
            $table->foreign('shopping_pro_franchise_id')->references('franchise_id')->on('franchises');
            $table->integer('shopping_sub_cat_id')->unsigned();
            $table->foreign('shopping_sub_cat_id')->references('shopping_sub_cat_id')->on('shopping_sub_categories');
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
