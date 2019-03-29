<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->integer('discount')->default(0);
            
            //Foreign keys, producto y cart
            $table->unSignedBigInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts');

             $table->unSignedBigInteger('product_id');
          $table->foreign('product_id')->references('id')->on('products');
  
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
        Schema::dropIfExists('cart_details');
    }
}
