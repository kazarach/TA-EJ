<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('archive_purchase_transactions')->insert([
            [
                'supplier_id' => 1,
                'total' => 1000,
                'paid' => 1000,
                'payment_id' => 1,
                'discount' => 2.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 2,
                'total' => 2000,
                'paid' => 2000,
                'payment_id' => 2,
                'discount' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 3,
                'total' => 2000,
                'paid' => 1500,
                'payment_id' => 4,
                'discount' => 7.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
