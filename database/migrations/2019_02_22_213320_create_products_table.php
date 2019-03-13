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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('supplier_id')->nullable();
            $table->string('product_name');
            $table->string('product_description');
            $table->string('purchase_rate');
            $table->string('retail_rate')->nullable();
            $table->string('product_imei')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('product_image')->nullable();
            $table->string('notes')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
//            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
//            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
//            $table->engine = 'InnoDB';
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
