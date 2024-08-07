<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productionMachines = [];
        $machine_ids = range(1, 11);

        for ($production_id = 1; $production_id <= 90; $production_id++) {
            // Ensure each production has at least 2 to 3 machine entries
            $num_machines = rand(2, 3);
            $assigned_machines = [];

            for ($i = 0; $i < $num_machines; $i++) {
                $machine_id = $machine_ids[array_rand($machine_ids)];
                while (in_array($machine_id, $assigned_machines)) {
                    $machine_id = $machine_ids[array_rand($machine_ids)];
                }
                $assigned_machines[] = $machine_id;

                $productionMachines[] = [
                    'production_id' => $production_id,
                    'machine_id' => $machine_id,
                ];
            }
        }

        DB::table('production_machines')->insert($productionMachines);
    }
}
