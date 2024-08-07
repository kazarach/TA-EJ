<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionWorkforceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productionWorkforces = [];
        $workforce_ids = range(1, 20);

        for ($production_id = 1; $production_id <= 90; $production_id++) {
            // Ensure each production has at least 2 to 3 workforce entries
            $num_workforces = rand(2, 3);
            $assigned_workforces = [];

            for ($i = 0; $i < $num_workforces; $i++) {
                $workforce_id = $workforce_ids[array_rand($workforce_ids)];
                while (in_array($workforce_id, $assigned_workforces)) {
                    $workforce_id = $workforce_ids[array_rand($workforce_ids)];
                }
                $assigned_workforces[] = $workforce_id;

                $productionWorkforces[] = [
                    'production_id' => $production_id,
                    'workforce_id' => $workforce_id,
                ];
            }
        }

        DB::table('production_workforces')->insert($productionWorkforces);
    }
}
