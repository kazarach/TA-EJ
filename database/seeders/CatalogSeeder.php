<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('catalogs')->insert([
            [
                'name' => 'Juli Batch 1',
                'due_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juli Batch 2',
                'due_date' => Carbon::create(2024, 7, 30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agustus Batch 1',
                'due_date' => Carbon::create(2024, 8, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
