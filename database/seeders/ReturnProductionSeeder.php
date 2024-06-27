<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ReturnProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('return_productions')->insert([
            [
                'material_id' => 1,
                'category_id' => 1,
                'quantity' => 10,
                'information' => "Material lebih dikarenakan potongan lebih efisien",
                'return_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 2,
                'category_id' => 1,
                'quantity' => 5,
                'information' => "Material lebih dikarenakan potongan lebih efisien",
                'return_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 1,
                'category_id' => 2,
                'quantity' => 10,
                'information' => "Material yang dibutuhkan lebih sedikit daripada planning (perlu dirubah pada tabel product)",
                'return_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 3,
                'category_id' => 2,
                'quantity' => 3,
                'information' => "Material yang dibutuhkan lebih sedikit daripada planning (perlu dirubah pada tabel product)",
                'return_date' => Carbon::create(2024, 7, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 2,
                'category_id' => 3,
                'quantity' => 3,
                'information' => "Material sedikit berubah",
                'return_date' => Carbon::create(2024, 7, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 1,
                'category_id' => 4,
                'quantity' => 10,
                'information' => "Salah Material yang digunakan",
                'return_date' => Carbon::create(2024, 7, 16),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 3,
                'category_id' => 4,
                'quantity' => 15,
                'information' => "Salah Material yang digunakan",
                'return_date' => Carbon::create(2024, 7, 16),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
