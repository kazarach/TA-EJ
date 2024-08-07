<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Sengud',
                'class_id' => 1,
                'telp' => '0812-4567-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suryati',
                'class_id' => 2,
                'telp' => '0898-5765-4321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maryono',
                'class_id' => 3,
                'telp' => '0855-5555-5555',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Andi',
                'class_id' => 4,
                'telp' => '0813-1234-5678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi',
                'class_id' => 5,
                'telp' => '0821-8765-4321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Citra',
                'class_id' => 1,
                'telp' => '0819-5555-1234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dewi',
                'class_id' => 2,
                'telp' => '0856-7890-4321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eko',
                'class_id' => 3,
                'telp' => '0877-2345-6789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fani',
                'class_id' => 4,
                'telp' => '0815-5678-4321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gina',
                'class_id' => 5,
                'telp' => '0899-1234-5678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
