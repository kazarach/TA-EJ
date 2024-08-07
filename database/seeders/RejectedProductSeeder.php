<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RejectedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = range(1, 10); // Assuming product IDs range from 1 to 10
        $grades = range(1, 3); // Assuming grade IDs range from 1 to 3

        $rejectedProducts = [
            [
                'product_id' => $products[array_rand($products)],
                'grade_id' => $grades[array_rand($grades)],
                'quantity' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => $products[array_rand($products)],
                'grade_id' => $grades[array_rand($grades)],
                'quantity' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => $products[array_rand($products)],
                'grade_id' => $grades[array_rand($grades)],
                'quantity' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => $products[array_rand($products)],
                'grade_id' => $grades[array_rand($grades)],
                'quantity' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => $products[array_rand($products)],
                'grade_id' => $grades[array_rand($grades)],
                'quantity' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('rejected_products')->insert($rejectedProducts);
    }
}
