<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RejectedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rejected_products')->insert([
            [
                'product_id' => 2,
                'grade_id' => 2,
                'quantity' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'grade_id' => 2,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
