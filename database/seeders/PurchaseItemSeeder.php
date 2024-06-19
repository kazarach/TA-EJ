<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PurchaseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('archive_purchase_items')->insert([
            [
                'transaction_id' => 1,
                'material_id' => 1,
                'quantity' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_id' => 1,
                'material_id' => 2,
                'quantity' => 62,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_id' => 1,
                'material_id' => 3,
                'quantity' => 31,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
