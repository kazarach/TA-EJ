<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectStatus;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectstatuses = ProjectStatus::pluck('id')->toArray();

        Project::create([
            'name' => 'Ramadhan 2024',
            'start_date' => '2024-03-03',
            'end_date' => '2024-03-13',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Ramadhan 2024 v2',
            'start_date' => '2024-03-05',
            'end_date' => '2024-03-20',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Pesanan Bu Minah',
            'start_date' => '2024-03-23',
            'end_date' => '2024-04-05',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Batch Kerudung Mei',
            'start_date' => '2024-04-03',
            'end_date' => '2024-04-13',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);

        // New projects for August-September with overlapping dates
        Project::create([
            'name' => 'Proyek Agustus 1',
            'start_date' => '2024-08-01',
            'end_date' => '2024-08-15',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Proyek Agustus 2',
            'start_date' => '2024-08-05',
            'end_date' => '2024-08-20',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Proyek Agustus 3',
            'start_date' => '2024-08-10',
            'end_date' => '2024-08-25',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Proyek Agustus 4',
            'start_date' => '2024-08-15',
            'end_date' => '2024-08-31',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Proyek September 1',
            'start_date' => '2024-09-01',
            'end_date' => '2024-09-15',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Proyek September 2',
            'start_date' => '2024-09-05',
            'end_date' => '2024-09-20',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Proyek September 3',
            'start_date' => '2024-09-10',
            'end_date' => '2024-09-25',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
        Project::create([
            'name' => 'Proyek September 4',
            'start_date' => '2024-09-15',
            'end_date' => '2024-09-30',
            'status_id' => $projectstatuses[array_rand($projectstatuses)],
        ]);
    }
}
