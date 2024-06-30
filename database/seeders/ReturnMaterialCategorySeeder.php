<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReturnMaterialCategory;

class ReturnMaterialCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Broken Material', 'Damaged Color', 'Change Material', 'Changing Color'];

        foreach ($categories as $category) {
            ReturnMaterialCategory::create(['name' => $category]);
        }
    }
}
