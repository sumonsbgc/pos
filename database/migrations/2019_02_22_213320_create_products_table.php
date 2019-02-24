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
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('supplier_id')->nullable();
            $table->string('product_name');
            $table->string('product_description');
            $table->string('purchase_rate');
            $table->string('retail_rate')->nullable();
            $table->string('quantity');
            $table->string('unit')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('notes')->nullable();
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
