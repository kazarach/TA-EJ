<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ReturnMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('return_materials')->insert([
            [
                'material_id' => 1,
                'category_id' => 1,
                'quantity' => 10,
                'information' => "Material Sobek/Terpotong",
                'return_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 2,
                'category_id' => 1,
                'quantity' => 5,
                'information' => "Material Sobek/Terpotong",
                'return_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 1,
                'category_id' => 2,
                'quantity' => 10,
                'information' => "Warna berubah dikarenakan penyimpanan",
                'return_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 3,
                'category_id' => 2,
                'quantity' => 3,
                'information' => "Warna berubah dikarenakan penyimpanan",
                'return_date' => Carbon::create(2024, 7, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 2,
                'category_id' => 3,
                'quantity' => 3,
                'information' => "Salah warna",
                'return_date' => Carbon::create(2024, 7, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 3,
                'category_id' => 3,
                'quantity' => 15,
                'information' => "Salah Bahan",
                'return_date' => Carbon::create(2024, 7, 16),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_id' => 1,
                'category_id' => 4,
                'quantity' => 10,
                'information' => "Warna ganti coklat -> merah",
                'return_date' => Carbon::create(2024, 7, 16),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
