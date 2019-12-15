<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cat_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->text('short_desc');
            $table->text('long_desc');
            $table->float('discount_price',10,2)->nullable();
            $table->float('product_price',10,2);
            $table->integer('quantity');
            $table->string('size');
            $table->text('image');
            $table->text('gallery_image');
            $table->integer('status');
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
        Schema::dropIfExists('products');
    }
}
