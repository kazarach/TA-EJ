<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductionWorkforceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('production_workforces')->insert([
            [
                'production_id' => 1,
                'workforce_id' => 1,
            ],
            [
                'production_id' => 2,
                'workforce_id' => 2,
            ],
            [
                'production_id' => 2,
                'workforce_id' => 3,
            ],
            [
                'production_id' => 2,
                'workforce_id' => 4,
            ],
            [
                'production_id' => 3,
                'workforce_id' => 1,
            ],
            [
                'production_id' => 3,
                'workforce_id' => 2,
            ],
            [
                'production_id' => 4,
                'workforce_id' => 4,
            ],
            [
                'production_id' => 4,
                'workforce_id' => 2,
            ],
            [
                'production_id' => 5,
                'workforce_id' => 1,
            ],
            [
                'production_id' => 5,
                'workforce_id' => 2,
            ],
            [
                'production_id' => 6,
                'workforce_id' => 4,
            ],
            [
                'production_id' => 6,
                'workforce_id' => 1,
            ],
        ]);
    }
}
