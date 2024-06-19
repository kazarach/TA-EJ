<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SellingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('archive_selling_items')->insert([
            [
                'transaction_id' => 1,
                'product_id' => 1,
                'quantity' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_id' => 1,
                'product_id' => 2,
                'quantity' => 62,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_id' => 1,
                'product_id' => 3,
                'quantity' => 31,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
