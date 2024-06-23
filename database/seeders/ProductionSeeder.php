<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productions')->insert([
            [
                'quantity' => 10,
                'product_id' => 1,
                'project_id' => 1,
                'production_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 3,
                'product_id' => 1,
                'project_id' => 2,
                'production_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 53,
                'product_id' => 3,
                'project_id' => 2,
                'production_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 13,
                'product_id' => 2,
                'project_id' => 2,
                'production_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 25,
                'product_id' => 2,
                'project_id' => 3,
                'production_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 15,
                'product_id' => 3,
                'project_id' => 4,
                'production_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
