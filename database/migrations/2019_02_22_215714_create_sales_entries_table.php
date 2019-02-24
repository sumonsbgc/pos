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
            $table->integer('product_id');
            $table->string('product_imei')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('sale_quantity');
            $table->string('retail_price');
            $table->string('total_price');
            $table->string('discount');
            $table->string('vat');
            $table->string('net_amount');
            $table->string('receive_amount');
            $table->string('due_amount');
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
        Schema::dropIfExists('sales_entries');
    }
}
