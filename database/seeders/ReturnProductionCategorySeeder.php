<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReturnProductionCategory;


class ReturnProductionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Efficient Material', 'Different from Planning', 'Change Material', 'Wrong Material'];

        foreach ($categories as $category) {
            ReturnProductionCategory::create(['name' => $category]);
        }
    }
}
