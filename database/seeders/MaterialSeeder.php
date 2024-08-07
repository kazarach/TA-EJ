<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\MaterialUnit;
use App\Models\MaterialCategory;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = MaterialCategory::pluck('id')->toArray();
        $units = MaterialUnit::pluck('id')->toArray();

        $materials = [
            [
                'name' => 'Kancing merah',
                'code' => 'KCGMR01',
                'purchase_price' => 1000,
                'stock' => 1000,
            ],
            [
                'name' => 'Resleting pink',
                'code' => 'RLTPN01',
                'purchase_price' => 1500,
                'stock' => 2000,
            ],
            [
                'name' => 'Benang putih',
                'code' => 'BNGPT01',
                'purchase_price' => 5000,
                'stock' => 3000,
            ],
            [
                'name' => 'Benang merah',
                'code' => 'BNGMR01',
                'purchase_price' => 10000,
                'stock' => 4000,
            ],
            [
                'name' => 'Kain merah',
                'code' => 'KAIN01',
                'purchase_price' => 15000,
                'stock' => 5000,
            ],
            [
                'name' => 'Kain putih',
                'code' => 'KAIN02',
                'purchase_price' => 14000,
                'stock' => 6000,
            ],
            [
                'name' => 'Kain hitam',
                'code' => 'KAIN03',
                'purchase_price' => 13000,
                'stock' => 7000,
            ],
            [
                'name' => 'Kain biru',
                'code' => 'KAIN04',
                'purchase_price' => 12000,
                'stock' => 8000,
            ],
            [
                'name' => 'Kain hijau',
                'code' => 'KAIN05',
                'purchase_price' => 11000,
                'stock' => 9000,
            ],
            [
                'name' => 'Kain kuning',
                'code' => 'KAIN06',
                'purchase_price' => 10000,
                'stock' => 10000,
            ],
            [
                'name' => 'Kancing putih',
                'code' => 'KCGPT01',
                'purchase_price' => 2000,
                'stock' => 11000,
            ],
            [
                'name' => 'Kancing hitam',
                'code' => 'KCGHT01',
                'purchase_price' => 2500,
                'stock' => 12000,
            ],
            [
                'name' => 'Kancing biru',
                'code' => 'KCGHR01',
                'purchase_price' => 3000,
                'stock' => 13000,
            ],
            [
                'name' => 'Resleting merah',
                'code' => 'RLTMH01',
                'purchase_price' => 3500,
                'stock' => 14000,
            ],
            [
                'name' => 'Resleting putih',
                'code' => 'RLTPU01',
                'purchase_price' => 4000,
                'stock' => 15000,
            ],
            [
                'name' => 'Resleting hitam',
                'code' => 'RLTHM01',
                'purchase_price' => 4500,
                'stock' => 16000,
            ],
            [
                'name' => 'Resleting biru',
                'code' => 'RLTHR01',
                'purchase_price' => 5000,
                'stock' => 17000,
            ],
            [
                'name' => 'Benang hitam',
                'code' => 'BNGHT01',
                'purchase_price' => 5500,
                'stock' => 18000,
            ],
            [
                'name' => 'Benang hijau',
                'code' => 'BNGHJ01',
                'purchase_price' => 6000,
                'stock' => 19000,
            ],
            [
                'name' => 'Benang kuning',
                'code' => 'BNGKN01',
                'purchase_price' => 6500,
                'stock' => 20000,
            ],
        ];

        foreach ($materials as $material) {
            Material::create([
                'name' => $material['name'],
                'stock' => $material['stock'],
                'unit_id' => $units[array_rand($units)],
                'category_id' => $categories[array_rand($categories)],
                'code' => $material['code'],
                'purchase_price' => $material['purchase_price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
