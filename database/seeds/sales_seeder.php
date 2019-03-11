<?php

use Illuminate\Database\Seeder;

class sales_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){

            DB::table('sales_entries')->insert([
                'receipt_no' => str_random(5),
                'product_id' => str_random(5),
                'product_imei' => str_random(5),
                'customer_id' => str_random(5),
                'customer_name' => str_random(5),
                'customer_contact_no' => str_random(5),
                'customer_add' => str_random(5),
                'user_id' => str_random(5),
                'sale_quantity' => str_random(5),
                'retail_rate' => str_random(5),
                'discount' => str_random(5),
                'vat' => str_random(5),
                'net_amount' => str_random(5),
                'receive_amount' => str_random(5),
                'due_amount' => str_random(5),

            ]);
        }
    }
}
