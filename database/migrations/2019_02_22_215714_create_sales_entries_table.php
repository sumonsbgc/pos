<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * i have some confusion
     * @return void
     */
    public function up()
    {
        Schema::create('sales_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('receipt_no');
            $table->unsignedInteger('product_id');
            $table->string('product_imei')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('sale_quantity');
            $table->string('retail_price');
            $table->string('total_price');
            $table->string('discount')->nullable();
            $table->string('vat')->nullable();
            $table->string('net_amount')->nullable();
            $table->string('receive_amount')->nullable();
            $table->string('due_amount')->nullable();
            $table->timestamps();

//            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
//            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('sales_entries');
    }
}
