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
            $table->string('receipt_no')->unique();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('customer_name');
            $table->string('customer_contact_no');
            $table->text('customer_add');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('sale_quantity');
            $table->string('retail_rate');
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
