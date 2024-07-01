<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemGrade;


class ItemGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = ['Normal Grade', 'Grade B', 'Grade C'];

        foreach ($grades as $grade) {
            ItemGrade::create(['name' => $grade]);
        }
    }
}
