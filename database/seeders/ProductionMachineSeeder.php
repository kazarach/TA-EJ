<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductionMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('production_machines')->insert([
            [
                'production_id' => 1,
                'machine_id' => 1,
            ],
            [
                'production_id' => 2,
                'machine_id' => 2,
            ],
            [
                'production_id' => 2,
                'machine_id' => 3,
            ],
            [
                'production_id' => 2,
                'machine_id' => 4,
            ],
            [
                'production_id' => 2,
                'machine_id' => 5,
            ],
            [
                'production_id' => 3,
                'machine_id' => 1,
            ],
            [
                'production_id' => 3,
                'machine_id' => 5,
            ],
            [
                'production_id' => 4,
                'machine_id' => 2,
            ],
            [
                'production_id' => 5,
                'machine_id' => 1,
            ],
            [
                'production_id' => 5,
                'machine_id' => 2,
            ],
            [
                'production_id' => 6,
                'machine_id' => 4,
            ],
            [
                'production_id' => 6,
                'machine_id' => 5,
            ],
        ]);
    }
}
