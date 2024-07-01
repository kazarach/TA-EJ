<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReturnCustomerCategory;


class ReturnCustomerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Rejected','Buy Back', 'Size Change', 'Canceled'];

        foreach ($categories as $category) {
            ReturnCustomerCategory::create(['name' => $category]);
        }
    }
}
