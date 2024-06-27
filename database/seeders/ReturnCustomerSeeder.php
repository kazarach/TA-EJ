<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ReturnCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('return_customers')->insert([
            [
                'product_id' => 1,
                'category_id' => 1,
                'quantity' => 10,
                'information' => "Beli ulang pindah distributor",
                'return_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'category_id' => 1,
                'quantity' => 5,
                'information' => "Beli ulang pindah distributor",
                'return_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'category_id' => 2,
                'quantity' => 10,
                'information' => "Ganti size dari XL ke L",
                'return_date' => Carbon::create(2024, 7, 14),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'category_id' => 2,
                'quantity' => 3,
                'information' => "Ganti size dari XL ke L",
                'return_date' => Carbon::create(2024, 7, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'category_id' => 3,
                'quantity' => 3,
                'information' => "Rusak bagian lengan, Kancing, Resleting (lihat label di packaging)",
                'return_date' => Carbon::create(2024, 7, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'category_id' => 4,
                'quantity' => 10,
                'information' => "Batal gagal lunas",
                'return_date' => Carbon::create(2024, 7, 16),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'category_id' => 4,
                'quantity' => 15,
                'information' => "Salah kirim product",
                'return_date' => Carbon::create(2024, 7, 16),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
