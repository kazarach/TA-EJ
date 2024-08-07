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
        $productions = [];
        $product_ids = range(1, 10);
        $project_ids = range(1, 8);

        for ($day = 1; $day <= 30; $day++) {
            $date = Carbon::create(2024, 8, $day);

            for ($i = 0; $i < 3; $i++) {
                $productions[] = [
                    'quantity' => rand(10, 100),
                    'product_id' => $product_ids[$i % count($product_ids)],
                    'project_id' => $project_ids[array_rand($project_ids)],
                    'production_date' => $date,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('productions')->insert($productions);
    }
}
