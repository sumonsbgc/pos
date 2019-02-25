<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * i have some confusion;
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplier_id');
            $table->string('product_type');
            $table->string('quantity');
            $table->string('cash_purchase')->nullable();
            $table->string('credit_purchase')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('transaction_id')->nullable();
            $table->time('purchase_date');
<<<<<<< HEAD
=======
            $table->string('supplier_name');
>>>>>>> 472865d7e993a7f5ce3eda1d9871ce6f09354437
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
        Schema::dropIfExists('purchases');
    }
}
