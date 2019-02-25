<?php

use Illuminate\Database\Seeder;

class Rolestableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'description' => 'it has all privillege',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'stuff',
                'description' => 'it has not all privillege',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'sales_manager',
                'description' => 'it has not all privillege',
                'created_at' => new DateTime()
            ]
        ]);
    }
}
